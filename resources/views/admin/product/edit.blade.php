@extends('admin.partials')
@section('content')
    <h2 class="text-gray-700 uppercase bg-gray-100 dark:bg-gray-900 dark:text-gray-400 text-2xl mb-5">
        Edit Product
    </h2>

    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Product
                    Name</label>
                <input type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required value="{{$product->name}}">
                @if ($errors->has('name'))
                    <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-6">
                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Product
                    Quantity</label>
                <input type="number" id="quantity" name="quantity"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required value="{{$product->quantity}}">
                @if ($errors->has('quantity'))
                    <span class="text-red-500 text-sm">{{ $errors->first('quantity') }}</span>
                @endif
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Product
                    Price</label>
                <input type="number" id="price" name="price"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required value="{{$product->price}}">
                @if ($errors->has('price'))
                    <span class="text-red-500 text-sm">{{ $errors->first('price') }}</span>
                @endif
            </div>

            <div class="mb-6">
                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Product
                    Category</label>
                <select id="category" name="category_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected disabled>Choose a Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('category'))
                    <span class="text-red-500 text-sm">{{ $errors->first('category') }}</span>
                @endif
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="mb-6">
                <label for="startup_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Product
                    Startup Price</label>
                <input type="text" id="startup_price" name="startup_price"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required value="{{$product->startup_price}}">
                @if ($errors->has('startup_price'))
                    <span class="text-red-500 text-sm">{{ $errors->first('startup_price') }}</span>
                @endif
            </div>
        </div>

        <img src="{{'/storage/products/'.$product->image}}" class="md:w-96 w-full object-cover rounded-md mt-1">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5" for="image">Upload Image (picture is optional)</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="image" id="image" name="image" type="file">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help"></div>
        @if ($errors->has('image'))
            <span class="text-red-500 text-sm">{{ $errors->first('image') }}</span>
        @endif

        <label for="Description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-5">Your
            Description</label>
        <textarea id="Description" rows="4" name="description"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write your Description...">{{$product->description}}</textarea>

        @if ($errors->has('description'))
            <span class="text-red-500 text-sm">{{ $errors->first('description') }}</span>
        @endif
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 mt-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
