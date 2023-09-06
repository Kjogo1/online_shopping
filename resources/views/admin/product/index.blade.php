@extends('admin.partials')
@section('content')

<h2 class="text-gray-700 uppercase bg-gray-100 dark:bg-gray-900 dark:text-gray-400 text-2xl mb-5">
    Product
</h2>
<div class="mb-5 flex justify-between">
    <a href="#" class="uppercase dark:text-white bg-orange-600 rounded-md p-2 hover:bg-orange-700">Archive</a>
    <a href="{{route('admin.product.create')}}" class="uppercase dark:text-white bg-blue-500 rounded-md p-2 hover:bg-blue-700">Create</a>
</div>
<div class="relative overflow-x-auto rounded-md">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Startup Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Add Product to Banner
                </th>
                <th scope="col" class="px-6 py-3">
                    Add Product to slider
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 w-fit">
                <td class="md:px-6 md:py-4 flex md:flex-row flex-col">
                    <img src="{{'/storage/products/'.$product->image}}" class="w-15 md:w-12 mr-2 object-cover rounded-sm" alt="image" srcset="">
                    <span class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" >
                        {{$product->name}}
                    </span>
                </td>
                {{-- <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" >
                    {{$product->name}}
                </td> --}}
                <td class="px-6 py-4">
                    {{$product->quantity}}
                </td>
                <td class="px-6 py-4">
                    {{$product->category->name}}
                </td>
                <td class="px-6 py-4">
                    ${{$product->startup_price}}
                </td>
                <td class="px-6 py-4">
                    ${{$product->price}}
                </td>
                <td class="px-6 py-4">
                    <form method="POST" action="{{route('admin.banner.product')}}">
                        @csrf
                        @method("POST")
                        <input hidden value="{{$product->id}}" name="product_id">
                        <button class="dark:text-white bg-blue-500 rounded-md p-2 hover:bg-blue-700" type="submit">
                            Add to Banner
                        </button>
                    </form>
                </td>
                <td class="px-6 py-4">
                    <form method="POST" action="">
                        @csrf
                        @method("POST")
                        <input hidden value="{{$product->id}}" name="product_id">
                        <button class="dark:text-white bg-blue-500 rounded-md p-2 hover:bg-blue-700" type="submit">
                            Add to Slideshow
                        </button>
                    </form>
                </td>
                <td class="px-6 py-4">
                    <div class="flex flex-row items-center justify-between">
                        <a href="{{route('admin.product.edit', $product->id)}}" class="bg-yellow-300 hover:bg-yellow-500 rounded-md p-2">Update</a>
                        <form action="{{route('admin.product.destroy', $product->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 rounded-md p-2">Delete</button>
                        </form>
                        <a href="{{route('admin.product.show', $product->id)}}" class="bg-blue-500 hover:bg-blue-600 rounded-md p-2 text-white">See More</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
