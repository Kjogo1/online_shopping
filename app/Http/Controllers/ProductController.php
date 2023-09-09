<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Str;
use Symfony\Component\Uid\UuidV7;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $categories = DB::select('select * from categories');
        // return view('user.product.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        // $related = Product::where('category_id', $product->category_id)->get(10);
        $category_id = $product->category_id;
        $id = $product->id;
        // dd($id);
        $related = Product::where('category_id', $category_id)->whereNot('id', $id)->limit(10)->get();
        // $related = DB::select('select * from products where category_id = :category_id and id !=:id', [$category_id, $id]);
        // dd($related);
        return view('user.category.show', compact('product', 'related'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function addToCart(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->back();
    }

    public function getCart(Request $request)
    {
        if (!$request->session()->has('cart')) {
            return view('user.cart.index');
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        // foreach($cart->items as $key => $val){
        //     var_dump($key);
        //     // value cart
        // }
        // dd($cart->totalPrice);
        // dd($cart->totalQty);
        // dd($cart->items[2]['qty']);
        return view('user.cart.index', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function checkoutView(Request $request)
    {
        if (!$request->session()->has('cart')) {
            return redirect()->route('product.shopping.cart');
        }
        return view('user.product.checkout');
    }

    public function checkoutShow(Request $request, string $id)
    {
        if (!$request->session()->has('cart')) {
            return redirect()->route('product.shopping.cart');
        }
        return view('user.product.single-checkout', ['id' => $id]);
    }

    public function checkoutType(Request $request)
    {
        if (!$request->session()->has('cart')) {
            return redirect()->route('product.shopping.cart');
        }

        $request->validate(['payment_type' => 'required']);

        if ($request->product_id == null) {
            $oldCart = $request->session()->get('cart');
            $cart = new Cart($oldCart);

            if ($request->payment_type === 'Cash') {
                return view('user.product.payment-type.cash', ['product_id' => null, 'product' => $cart->items, 'totalPrice' => $cart->totalPrice]);
            } else {
                return view('user.product.payment-type.paypal', ['product_id' => null, 'product' => $cart->items, 'totalPrice' => $cart->totalPrice]);
            }
        } else {
            $oldCart = $request->session()->get('cart');
            $cart = new Cart($oldCart);

            foreach ($cart->items as $key => $val) {
                if ($key == $request->product_id) {
                    $product = $val;
                }
            }
            // dd($product);
            if ($request->payment_type === 'Cash') {
                return view('user.product.payment-type.cash', ['product_id' => $request->product_id, 'product' => $product]);
            } else {
                return view('user.product.payment-type.paypal', ['product_id' => $request->product_id, 'product' => $product]);
            }
        }
    }

    public function cashSingleProduct(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'payment_type' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->route('product.shopping.cart');
        }

        // $request['payment_id'] = Str::uuid();

        auth()->user()->orderProduct()->create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'payment_type' => $request->payment_type,
            'payment_id' => Str::uuid(),
        ]);
        $cart = $request->session()->get('cart');

        foreach ($cart->items as $key => $val) {
            if ($key == $request->product_id) {
                // $product = $key;
                $totalPrice = $cart->totalPrice - $cart->items[$key]['price'];     // dd($cart->items[2]['qty']);
                $totalQty = $cart->totalQty - $cart->items[$key]['qty'];
                $cart->updateItem($totalQty, $totalPrice);
                unset($cart->items[$key]); // retrieving the value and remove it from the array
                break;
            }
        }

        // $request->session()->forget('cart');

        return redirect()->route('product.shopping.cart')->with('success', 'Your Product has been order');
    }

    public function CashProduct(Request $request)
    {
        if (!$request->session()->has('cart')) {
            return redirect()->route('product.shopping.cart');
        }

        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);

        foreach ($cart->items as $product) {
            auth()->user()->orderProduct()->create([
                'product_id' => $product['item']->id,
                'quantity' => $product['qty'],
                'price' => $product['price'],
                'payment_type' => 'Cash',
                'payment_id' => Str::uuid(),
            ]);
            // var_dump($product['item']->id);
        }

        $request->session()->forget('cart');
        return redirect()->route('product.shopping.cart')->with('success', 'Your Product has been order');
    }

    public function orderNow(Request $request) {
        // $id = $request->segment();
        $request->validate([
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric'
        ]);
        // dd($request);
        $id = $request->product_id;
        $quantity = $request->quantity;
        return view('user.product.order-checkout', ['id' => $id, 'quantity' => $quantity]);
    }

    public function orderType(Request $request) {
        $request->validate([
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'payment_type' => 'required'
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->payment_type === 'Cash') {
            return view('user.product.payment-type.order-cash', ['quantity' => $request->quantity, 'product' => $product]);
        } else {
            return view('user.product.payment-type.order-paypal', ['quantity' => $request->quantity, 'product' => $product]);
        }
    }

    public function orderCash(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'payment_type' => 'required'
        ]);

        if ($validate->fails()) {
            return redirect()->route('product.shopping.cart')->withErrors('error', 'Something went wrong.');
        }

        auth()->user()->orderProduct()->create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'payment_type' => $request->payment_type,
            'payment_id' => Str::uuid(),
        ]);

        return redirect()->route('product.shopping.cart')->with('success', 'Your Product has been order');
    }
}
