@extends('user.partials')
@section('content')
<div class="mx-10 text-gray-700 dark:text-gray-400 h-screen flex items-center flex-col">
    <h2 class="text-2xl font-semibold mt-5">
        Summary Payment by PayPal
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

                <form method="POST" action="{{ route('product.order.paypal') }}">
                    @csrf
                    @method('POST')
                    <input value="{{ $product->id }}" name="product_id" hidden>
                    <input value="{{ $quantity }}" name="quantity" hidden>
                    <input value="{{ $product->price * $quantity }}" name="price" hidden>
                    {{-- <input value="PayPal" name="payment_type" hidden> --}}
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 p-2 rounded-md text-white">
                        Order
                    </button>
                </form>
            </span>

    </div>
</div>
@endsection
