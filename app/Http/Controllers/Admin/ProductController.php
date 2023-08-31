<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Models\Product;
use App\Rules\GreaterThanZeroRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = DB::select('select * from categories');
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'nullable',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'price' => ['required', 'numeric', new GreaterThanZeroRule],
            'quantity' => ['required', 'numeric', new GreaterThanZeroRule]
        ]);

        // dd($validate->errors());

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        // if($request->image) {
            // $image = time().'.'.$request->image->getClientOriginalExtension();
            // $request->image->storeAs('public/images', $image);
            // $request['image'] = $image;
            $imageFile = time() . '.' . $request['image']->extension();
            $request['image']->storeAs('public/products', $imageFile);
            $request['image'] = $imageFile;
        // }

        $request['uuid'] = Str::uuid();
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'uuid' => $request->uuid,
            'image' => $imageFile,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('admin.product.index')->with('success', 'You created product successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $product = Product::findOrFail($id);
        $categories = DB::select('select * from categories');
        return view('admin.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // dd($request->image);
        if($request->image) {
            $validate = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'description' => 'nullable',
                'category_id' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'price' => ['required', 'numeric', new GreaterThanZeroRule],
                'quantity' => ['required', 'numeric', new GreaterThanZeroRule]
            ]);
        } else {
            $validate = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'description' => 'nullable',
                'category_id' => 'required',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif',
                'price' => ['required', 'numeric', new GreaterThanZeroRule],
                'quantity' => ['required', 'numeric', new GreaterThanZeroRule]
            ]);
        }

        $product = Product::findOrFail($id);

        if($validate->fails()) {
            return redirect()->back()->withErrors($validate->errors());
        }

        if($request->image) {
            $imageFile = time() . '.' . $request['image']->extension();
            $request['image']->storeAs('public/products', $imageFile);
            $request['image'] = $imageFile;
        } else {
            $imageFile = $product->image;
            $request['image'] = $imageFile;
        }
        $request['uuid'] = Str::uuid();

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'uuid' => $request->uuid,
            'image' => $imageFile,
            'price' => $request->price,
            'quantity' => $request->quantity
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Updated Product Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
