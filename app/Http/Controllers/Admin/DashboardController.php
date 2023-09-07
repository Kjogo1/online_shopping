<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // profit
        $data =  DB::select('SELECT
        products.price AS product_price,
        products.startup_price,
        order_products.quantity,
        order_products.price
        FROM order_products INNER JOIN products ON order_products.product_id = products.id');

        // $profit = $data[1]->price - ($data[1]->startup_price*$data[1]->quantity);

        $profit = 0.0;
        foreach ($data as $val) {
            $profit += $val->price - ($val->startup_price * $val->quantity);
        }

        // Most sell Product
        $getCountProduct = DB::select('SELECT product_id,
         SUM(quantity) AS totalQuantity,
         COUNT(*)
         FROM order_products
         GROUP BY product_id ORDER BY totalQuantity DESC');

        $mostSell =  $getCountProduct[0];

        $getMostSellProduct = Product::findOrFail($getCountProduct[0]->product_id);


        // Top Buy Customer
        $mostBuyCustomer = DB::select('SELECT user_id,
         SUM(price) AS totalPrice,
         COUNT(*)
        FROM order_products
        GROUP BY user_id ORDER BY totalPrice DESC');

        $mostBuyUser = $mostBuyCustomer[0]->totalPrice;

        $user = DB::select('SELECT name FROM users WHERE id = ?', [$mostBuyCustomer[0]->user_id]);

        $username =$user[0]->name;

        return view('admin.dashboard.index', compact('profit', 'mostSell', 'getMostSellProduct', 'mostBuyUser', 'username'));
    }
}
