@extends('user.partials')
@section('content')
    <div class="text-gray-700 dark:text-gray-400 m-5 flex flex-row justify-center h-screen">
        @if (Session::has('cart'))
            <div class="flex flex-col gap-4 mb-5 md:w-3/6">
                @foreach ($products as $product)
                    <div
                        class="relative flex md:flex-row flex-col md:hover:scale-110 hover:scale-105 transition delay-150 duration-300 ease-in-out rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="h-fit md:w-2/6 w-fit rounded-lg object-cover"
                            src="{{ '/storage/products/' . $product['item']->image }}" alt="">
                        <div class="mx-2">
                            <div
                                class="absolute animate-bounce inline-flex items-center justify-center md:-right-3 w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                                {{ $product['qty'] }}</div>

                            <span
                                class="text-gray-800 dark:text-white block text-lg overflow-hidden whitespace-nowrap">{{ $product['item']->name }}</span>
                            <div class="flex justify-between flex-col mt-1">
                                <span class="text-gray-800 dark:text-white text-sm md:text-md">Price:
                                    ${{ $product['price'] }}</span>
                                    <a href="{{route('product.checkout.show', $product['item']->id)}}" class="mt-2 text-gray-800 dark:text-white text-sm md:text-md bg-blue-500 hover:bg-blue-600 rounded-md p-2">checkout</a>

                            </div>
                            {{-- <form method="POST">
                                @csrf
                                @method('POST') --}}

                            {{-- </form> --}}
                        </div>

                    </div>
                @endforeach
                <div>
                    Total: ${{ $totalPrice }}
                </div>
                <div>
                    <a href="{{ route('product.checkout.index') }}"
                        class="bg-blue-500 hover:bg-blue-600 rounded-md p-2 text-white">Checkout</a>
                </div>
            </div>
        @else
            <div class="rounded-md h-screen w-3/6 text-center flex flex-col justify-center">
                <span class="md:text-2xl text-xl">
                    Your Cart Is Empty.
                </span>
                {{-- <div class="flex flex-col">
                    Please Login or Sign up.
                </div> --}}
            </div>
        @endif
    </div>
@endsection
