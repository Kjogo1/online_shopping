@extends('admin.partials')
@section('content')
<h2 class="text-gray-700 uppercase bg-gray-100 dark:bg-gray-900 dark:text-gray-400 text-2xl mb-5">
    Product
</h2>
    {{-- <a href="{{'/storage/products/'.$product->image}}"
        class="grid grid-cols-2 md:grid-cols-2 items-center bg-white border border-gray-200 rounded-lg shadow md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

        <div class="flex flex-col justify-between p-4">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
            <div class="flex flex-row justify-between">
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Quantity: {{ $product->quantity }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: ${{ $product->price }}</p>
            </div>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Category: {{ $product->category->name }}</p>

            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
        </div>

    </a> --}}

    <div class="grid grid-rows-1 rounded-lg shadow  bg-white border border-gray-200 md:max-w-3xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <img class="object-cover w-full rounded-sm h-fit md:h-fit md:w-full md:rounded-md" src="{{'/storage/products/'.$product->image}}"
        alt="image">

        <div class="flex flex-col justify-between p-4">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
            {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p> --}}
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Startup Price: ${{ $product->startup_price }}</p>

            <div class="flex flex-row justify-between">
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Quantity: {{ $product->quantity }}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: ${{ $product->price }}</p>
            </div>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Category: {{ $product->category->name }}</p>

            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>
        </div>
    </div>
@endsection
