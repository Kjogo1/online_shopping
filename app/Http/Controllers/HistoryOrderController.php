<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryOrderController extends Controller
{
    //
    public function index() {

    //     +"id": 2
    // +"quantity": 10.0
    // +"payment_id": "PAYID-MT3ASWA4BB156617T008391R"
    // +"payment_type": "PayPal"
    // +"price": 1.0
    // +"product_id": 2
    // +"user_id": 3
    // +"deleted_at": null
    // +"created_at": "2023-09-04 01:42:44"
    // +"updated_at": "2023-09-04 01:42:44"
    // +"uuid": "678ffbda-61e0-46d1-99d8-fa55b6eb62b2"
    // +"category_id": 2
    // +"name": "clothes2"
    // +"description": "hello"
    // +"image": "1693791764.jpg"

        if(auth()->user()) {
            $user_id = auth()->user()->id;
            $products = DB::select('select
            order_products.quantity,
            order_products.payment_id,
            order_products.payment_type,
            order_products.price,
            order_products.created_at,
            products.category_id,
            products.name,
            products.description,
            products.image
            FROM order_products INNER JOIN products ON order_products.product_id = products.id where user_id = :user_id ORDER BY order_products.created_at DESC', [$user_id]);
            // dd($products);

            return view('user.product.history-order', compact('products'));
        }
        // $order = DB::select('select * from order_products where user_id = :user_id', [$user_id]);
        // $check = [];

        // foreach($order as $key => $val) {
        //    $check[$key] = $val->product_id;
        // }

        // $product = DB::table('products')->whereIn('id', $check)->get();

    }
}
