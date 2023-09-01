@extends('user.partials')
@section('content')

<div class="flex flex-col mx-5 my-5">

    <div class="flex justify-center">
        <div class=" rounded-lg  md:w-5/6 ">
            <img class="object-cover w-full rounded-sm h-fit md:h-fit md:w-full md:rounded-md"
            src="{{ '/storage/products/' . $product->image }}" alt="image">
        </div>
    </div>

    <div class="flex flex-col p-4 mt-5 shadow rounded-lg bg-white border border-gray-200  dark:border-gray-700 dark:bg-gray-800 ">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
        <div class="flex flex-row justify-between">
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Quantity: {{ $product->quantity }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: ${{ $product->price }}</p>
        </div>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Category: {{ $product->category->name }}</p>

        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>

        <div class="flex flex-row items-center justify-between mt-2">
            <button class="bg-blue-500 rounded-md p-2">
                <img src="{{ asset('assets/image/outlet_favorite.svg') }}">
            </button>
            <button class="text-gray-800 dark:text-white bg-blue-500 rounded-md p-2 uppercase">
                Add To Cart
            </button>
        </div>
        <div class="flex md:flex-row flex-col justify-between mt-2">
            <div class="flex mt-w-20">
                <button class="bg-blue-500 rounded-md p-2">
                    <img src="{{ asset('assets/image/plus.svg') }}">
                </button>
                    <input type="number" name="quantity"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-2"
                    placeholder="" required>
                <button class="bg-blue-500 rounded-md p-2">
                    <img src="{{ asset('assets/image/minus.svg') }}">
                </button>
            </div>
            <button class="text-gray-800 dark:text-white bg-blue-500 rounded-md p-2 uppercase mt-w-20">
                Order Now
            </button>
        </div>
    </div>
</div>

@endsection
