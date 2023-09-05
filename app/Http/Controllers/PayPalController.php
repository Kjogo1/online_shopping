<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use Throwable;

class PayPalController extends Controller
{
    //
    private $gateway;
    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {
        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->total,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        // if(!$request->session()->has('cart')) {
        //     return redirect()->route('product.shopping.cart');
        // }
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $oldCart = $request->session()->get('cart');
                $cart = new Cart($oldCart);

                foreach ($cart->items as $product) {
                    auth()->user()->orderProduct()->create([
                        'product_id' => $product['item']->id,
                        'quantity' => $product['qty'],
                        'price' => $product['price'],
                        'payment_type' => 'PayPal',
                        'payment_id' => $request->input('paymentId'),
                    ]);
                    // var_dump($product['item']->id);
                }

                $request->session()->forget('cart');
                // return "Payment Successful";
                return redirect()->route('product.shopping.cart')->with('success', 'Your Product has been order');
            } else {
                return $response->getMessage();
            }
        }
    }

    public function error()
    {
        return 'User decline';
    }

    // single product
    public function paySingle(Request $request)
    {
        $request->session()->put('temp', $request->product_id);
        $request->session()->put('temp_price', $request->price);
        $request->session()->put('temp_quantity', $request->quantity);

        try {
            $response = $this->gateway->purchase(array(
                'amount' => $request->price,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('single-success'),
                'cancelUrl' => url('single-error'),
                // 'product_id' => $request->product_id, 'quantity' => $request->quantity, 'price' => $request->price
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }

    public function singleSuccess(Request $request)
    {
        // if(!$request->session()->has('cart')) {
        //     return redirect()->route('product.shopping.cart');
        // }
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {
                $product_id = $request->session()->get('temp');
                $quantity = $request->session()->get('temp_price');
                $price = $request->session()->get('temp_quantity');

                auth()->user()->orderProduct()->create([
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'payment_type' => 'PayPal',
                    'payment_id' => $request->input('paymentId'),
                ]);

                $cart = $request->session()->get('cart');

                foreach ($cart->items as $key => $val) {
                    if ($key == $product_id) {
                        // $product = $key;
                        // dd($key);
                        $totalPrice = $cart->totalPrice - $cart->items[$key]['price'];     // dd($cart->items[2]['qty']);
                        $totalQty = $cart->totalQty - $cart->items[$key]['qty'];
                        $cart->updateItem($totalQty, $totalPrice);
                        unset($cart->items[$key]); // retrieving the value and remove it from the array
                        break;
                    }
                }


                $request->session()->forget('temp');
                $request->session()->forget('temp_price');
                $request->session()->forget('temp_quantity');

                // return "Payment Successful";
                return redirect()->route('product.shopping.cart')->with('success', 'Your Product has been order');
            } else {
                return $response->getMessage();
            }
        }
    }

    public function singleError()
    {
        return 'User decline';
    }
}
