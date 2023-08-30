@extends('admin.partials')
@section('content')

<h2 class="text-gray-700 uppercase bg-gray-100 dark:bg-gray-900 dark:text-gray-400 text-2xl mb-5">
    Product
</h2>
<div class="mb-5 flex justify-end">
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
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="bg-yellow-300 hover:bg-yellow-500 rounded-md p-2">Update</a>
                    <a href="#" class="bg-red-600 hover:bg-red-700 rounded-md p-2">Delete</a>
                    <a href="#" class="bg-blue-500 hover:bg-blue-600 rounded-md p-2 text-white">See More</a>
                </td>
            </tr>

        </tbody>
    </table>
</div>

@endsection
