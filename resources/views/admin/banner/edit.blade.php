@extends('admin.partials')
@section('content')
    <h2 class="text-gray-700 uppercase bg-gray-100 dark:bg-gray-900 dark:text-gray-400 text-2xl mb-5">
        Edit Banner
    </h2>

    <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Banner
                    Title</label>
                <input type="text" id="title" name="title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required value="{{ $banner->title }}">
                @if ($errors->has('title'))
                    <span class="text-red-500 text-sm">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>

        <div class="text-gray-900 dark:text-white text-md">Banner Status</div>
        <div class="grid md:grid-cols-2 md:gap-6">
            <div
                class="border p-2 my-5 rounded-md  border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <input type="radio" id="show" name="is_active" value="1"
                    @if ($banner->is_active) checked="true" @endif>
                <label for="show">
                    <span class="text-lg text-gray-900 dark:text-white">Show</span>
                </label>
            </div>
            <div
                class="border p-2 my-5 rounded-md  border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <input type="radio" id="hidden" name="is_active" value="0"
                    @if (!$banner->is_active) checked="true" @endif>
                <label for="hidden">
                    <span class="text-lg text-gray-900 dark:text-white">Hidden</span>
                </label>
            </div>

        </div>
        @if ($errors->has('is_active'))
            <span class="text-red-500 text-sm">{{ $errors->first('is_active') }}</span>
        @endif


        <img src="{{'/storage/banner/'.$banner->image}}" class="md:w-96 w-full object-cover rounded-md mt-1">

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload Image</label>
        <input
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            aria-describedby="image" id="image" name="image" type="file" accept="image/*">
        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help"></div>
        @if ($errors->has('image'))
            <span class="text-red-500 text-sm">{{ $errors->first('image') }}</span>
        @endif

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 mt-5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
@endsection
