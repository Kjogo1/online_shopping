<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //

    public function index(string $id) {
        $categories = DB::select('SELECT * FROM categories');
        if($id == 1) {
            // $products = DB::select('select * from products');
            $products = Product::orderBy('id', 'DESC')->get();
            return view('user.category.index', ['categories' => $categories, 'products' => $products]);
        }
        // $products = DB::select('select * from products where category_id = :id', [$id]);
        $products = Product::where('category_id', $id)->get();
        // dd(request()->segment('3')  == $category->id);

        return view('user.category.index', ['categories' => $categories, 'products' => $products]);
    }
}
