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
        $related = DB::select('select * from products where category_id = :category_id and id !=:id', [$category_id, $id]);
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
        // foreach($cart->items as $product => $val){
        //     dd($product);
        //     // value cart
        // }
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
                return view('user.product.payment-type.cash', ['product_id' => null, 'product' => $cart]);
            } else {
                return view('user.product.payment-type.paypal', ['product_id' => null, 'product' => $cart]);
            }
        } else {
            $oldCart = $request->session()->get('cart');
            $cart = new Cart($oldCart);

            foreach ($cart->items as $key => $val) {
                if($key == $request->product_id) {
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

    public function cashSingleProduct(Request $request) {
        $validate = Validator::make($request->all(), [
            'product_id' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
            'payment_type' => 'required'
        ]);

        if($validate->fails()) {
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

        return redirect()->route('product.shopping.cart')->with('success', 'Your Product has been order');
    }
}
