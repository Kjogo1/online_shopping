@extends('user.partials')
@section('content')
    <h3 class="md:text-2xl mt-5 text-xl font-semibold text-gray-700 dark:text-gray-400 flex flex-row justify-center">
        History Order
    </h3>
    <div class="text-gray-700 dark:text-gray-400 mt-5 flex flex-row justify-center min-h-screen">

        <div class="flex flex-col gap-4 mb-5 md:w-3/6">


            <div class="flex flex-col gap-4 mb-5 md:w-5/6 mx-5">
                @foreach ($products as $product)
                    <div
                        class="relative flex md:flex-row flex-col md:hover:scale-110 hover:scale-105 transition delay-150 duration-300 ease-in-out rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="h-fit md:w-2/6 w-fit rounded-lg object-cover"
                            src="{{ '/storage/products/' . $product->image }}" alt="image">
                        <div class="mx-2 mt-2">

                            <span
                                class="text-gray-800 dark:text-white block text-lg overflow-hidden whitespace-nowrap">{{ $product->name }}</span>
                            <div class="flex justify-center flex-col mt-1">
                                <span class="text-gray-800 dark:text-white text-md md:text-md">Price:
                                    ${{ $product->price }}</span>
                                <span class="text-gray-800 dark:text-white text-md md:text-md">Quantity:
                                    {{ $product->quantity }}</span>
                            </div>

                            <span
                            class="text-gray-800 dark:text-white block text-md overflow-hidden whitespace-nowrap">Order Date: {{ $product->created_at }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
