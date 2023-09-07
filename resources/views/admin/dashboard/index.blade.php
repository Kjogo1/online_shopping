@extends('admin.partials')
@section('content')
<h2 class="text-gray-700 uppercase bg-gray-100 dark:bg-gray-900 dark:text-gray-400 text-2xl mb-5">
    Dashboard
</h2>

<div class="flex flex-row justify-around">
    <div class="grid grid-rows-1 mr-2 rounded-lg shadow w-2/6 bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-400 p-3">
        <h3 class="text-lg font-semibold">
            Profit
        </h3>
        <div>
            OverAll Profit: ${{$profit}}
        </div>
    </div>

    <div class="grid grid-rows-1 mr-2 rounded-lg shadow w-2/6 bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-400 p-3">
        <h3 class="text-lg font-semibold">
            Most Sell Product
        </h3>
        <div class="flex flex-row justify-between">
            <p>Product</p>
            <p class="font-semibold text-lg">{{$getMostSellProduct->name}}</p>
        </div>
        <div class="flex flex-row justify-between">
            <p>Sold Quantity</p>
            <p class="font-semibold text-lg">{{$mostSell->totalQuantity}}</p>
        </div>
    </div>

    <div class="grid grid-rows-1 rounded-lg shadow w-2/6 bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-400 p-3">
        <h3 class="text-lg font-semibold">
            Most Buy Customer
        </h3>
        <div>
            Customer Name: {{$username}}
        </div>
        <div>
            Amount: ${{$mostBuyUser}}
        </div>
    </div>
</div>
@endsection
