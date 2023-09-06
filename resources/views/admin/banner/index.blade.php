@extends('admin.partials')
@section('content')
    <h2 class="text-gray-700 uppercase bg-gray-100 dark:bg-gray-900 dark:text-gray-400 text-2xl mb-5">
        Banner
    </h2>
    <div class="mb-5 flex justify-between">
        <a href="#" class="uppercase dark:text-white bg-orange-600 rounded-md p-2 hover:bg-orange-700">Archive</a>
        <a href="{{ route('admin.banner.create') }}"
            class="uppercase dark:text-white bg-blue-500 rounded-md p-2 hover:bg-blue-700">Create</a>
    </div>
    <span class="text-md text-gray-500 dark:text-gray-400">The banner show on the top is the one which display on your website (you should show only one)</span>
    <div class="relative overflow-x-auto rounded-md">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Banner
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Is Active
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($banners as $banner)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 w-fit">
                        <td class="md:px-6 md:py-4">
                            <img src="{{ '/storage/banner/' . $banner->image }}"
                                class="w-12 md:w-12 mr-2 object-cover rounded-sm" alt="image" srcset="">
                        </td>
                        <td class="px-6 py-4">
                            {{ $banner->title }}
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.banner.updateStatus', $banner->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input hidden value="{{ $banner->is_active }}" name="is_active">
                                <button class="bg-blue-500 rounded-md p-2 text-white" type="submit">
                                    @if ($banner->is_active)
                                        Show
                                    @else
                                        Hidden
                                    @endif
                                </button>
                            </form>
                        </td>
                        <td class="px-6 py-4">
                    <div class="flex flex-row items-center">
                        <a href="{{route('admin.banner.edit', $banner->id)}}" class="bg-yellow-300 hover:bg-yellow-500 rounded-md p-2 mr-1">Update</a>
                        <form action="{{route('admin.banner.destroy', $banner->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 rounded-md p-2">Delete</button>
                        </form>
                        <a href="{{route('admin.banner.show', $banner->id)}}" class="bg-blue-500 hover:bg-blue-600 rounded-md p-2 text-white mr-1 ml-1">See More</a>
                    </div>
                </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
