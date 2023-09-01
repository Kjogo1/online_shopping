<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //

    public function index(string $id) {
        $categories = DB::select('select * from categories');
        $products = DB::select('select * from products where category_id = :id', [$id]);
        // dd(request()->segment('3')  == $category->id);

        return view('user.category.index', ['categories' => $categories, 'products' => $products]);
    }
}
