@extends('user.partials')
@section('content')
    <div class="mx-10 mt-5 text-gray-700 dark:text-gray-400 h-screen flex items-center flex-col">
        <div class="">
            <h2 class="text-2xl font-semibold my-5">
                Summary Product
            </h2>

            <div class="border rounded-md border-gray-200 dark:bg-gray-800">
                    <span class="flex flex-col p-5">
                        <span class="text-xl break-words max-w-md">
                            Product Name: {{ $product->name }}
                        </span>
                        <span class="text-md">
                            Quantity : {{ $quantity }}
                        </span>
                        <span class="text-md">
                            Price: ${{ $product->price * $quantity }}
                        </span>

                        <form method="POST" action="{{ route('product.order.cash') }}">
                            @csrf
                            @method('POST')
                            <input value="{{ $product->id }}" name="product_id" hidden>
                            <input value="{{ $quantity }}" name="quantity" hidden>
                            <input value="{{ $product->price * $quantity }}" name="price" hidden>
                            <input value="Cash" name="payment_type" hidden>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 p-2 rounded-md text-white">
                                Order
                            </button>
                        </form>
                    </span>
            </div>
        </div>
    </div>
@endsection
