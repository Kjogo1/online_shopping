@extends('user.partials')
@section('content')
<div class="mx-10 text-gray-700 dark:text-gray-400 h-screen flex items-center flex-col">
    <h2 class="text-2xl font-semibold mt-5">
        Payment Method
    </h2>

    <form class="md:w-1/6 w-3/6" method="POST" action="{{route('product.checkout.type')}}">
        @csrf
        @method('POST')
        <div class="border p-2 my-5 rounded-md  border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <input type="radio" id="Cash" name="payment_type" value="Cash" checked>
            <label for="Cash">
                <span class="text-lg">Cash</span>
                <span class="text-md block ml-5">Pay with cash</span>
            </label>
        </div>
        <div class="border p-2 my-5 rounded-md  border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <input type="radio" id="PayPal" name="payment_type" value="PayPal">
            <label for="PayPal">
                <span class="text-lg">PayPal</span>
                <span class="text-md block ml-5">Pay with Bank Account Visa, MasterCard, ...</span>
            </label>
        </div>
        <div class="flex flex-row justify-between items-center">
            <a class="bg-orange-500 hover:bg-orange-600 text-white p-2 rounded-md">
                Back
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md">
                Next
            </button>
        </div>
    </form>
</div>
@endsection
