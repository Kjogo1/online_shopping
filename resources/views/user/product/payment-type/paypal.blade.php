@extends('user.partials')
@section('content')
<div class="mx-10 text-gray-700 dark:text-gray-400 h-screen flex items-center flex-col">
    <h2 class="text-2xl font-semibold mt-5">
        Summary Payment by PayPal
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

                <form method="POST" action="{{ route('product.checkout.single.paypal') }}">
                    @csrf
                    @method('POST')
                    <input value="{{ $product_id }}" name="product_id" hidden>
                    <input value="{{ $product['qty'] }}" name="quantity" hidden>
                    <input value="{{ $product['price'] }}" name="price" hidden>
                    {{-- <input value="PayPal" name="payment_type" hidden> --}}
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
                    <div>
                        Total: ${{ $totalPrice }}
                    </div>
                @endif

                <form method="POST" action="{{route('product.checkout.paypal')}}">
                    @csrf
                    @method('POST')
                    <input hidden value="{{$totalPrice}}" name="total">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 p-2 rounded-md text-white">
                        Order
                    </button>
                </form>
            </span>
        @endif
    </div>
</div>
@endsection
