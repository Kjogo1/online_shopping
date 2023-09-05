@extends('user.partials')
@section('content')
    <div class="mx-10 mt-5 text-gray-700 dark:text-gray-400 h-screen flex items-center flex-col">
        <div class="">
            <h2 class="text-2xl font-semibold my-5">
                Summary Product
            </h2>

            <div class="border rounded-md border-gray-200 dark:bg-gray-800">
                @if ($product_id)
                    <span class="flex flex-col p-5">
                        <span class="text-xl break-words max-w-md">
                            Product Name: {{ $product['item']->name }}
                        </span>
                        <span class="text-md">
                            Quantity : {{ $product['qty'] }}
                        </span>
                        <span class="text-md">
                            Price: {{ $product['price'] }}
                        </span>

                        <form method="POST" action="{{ route('product.checkout.single.cash') }}">
                            @csrf
                            @method('POST')
                            <input value="{{ $product_id }}" name="product_id" hidden>
                            <input value="{{ $product['qty'] }}" name="quantity" hidden>
                            <input value="{{ $product['price'] }}" name="price" hidden>
                            <input value="Cash" name="payment_type" hidden>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 p-2 rounded-md text-white">
                                Order
                            </button>
                        </form>
                    </span>
                @else
                    <span class="flex flex-col p-5">
                        @if (Session::has('cart'))
                            @foreach ($product as $product)
                                <span class="text-xl max-w-md break-words">
                                    Product Name: {{ $product['item']->name }}
                                </span>
                                <span class="text-md">
                                    Quantity : {{ $product['qty'] }}
                                </span>
                                <span class="text-md">
                                    Price: {{ $product['price'] }}
                                </span>
                                <hr class="mb-5">
                            @endforeach
                        @endif

                        <form method="POST" action="{{route('product.checkout.cash')}}">
                            @csrf
                            @method('POST')
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 p-2 rounded-md text-white">
                                Order
                            </button>
                        </form>
                    </span>
                @endif
            </div>
        </div>
    </div>
@endsection
