<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index() {
        $data =  DB::select('select
        products.price AS product_price,
        products.startup_price,
        order_products.quantity,
        order_products.price
        FROM order_products INNER JOIN products ON order_products.product_id = products.id');

        // $profit = $data[1]->price - ($data[1]->startup_price*$data[1]->quantity);
        dd($data);
        return view('admin.dashboard.index');
    }
}
