@extends('user.partials')
@section('content')
    <div class="mx-10">

        <div id="gallery" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg"
                        class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                        alt="">
                </div>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>



        <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
            @foreach ($categories as $category)
                <a href="{{ route('category.index', $category->id) }}"
                    class="{{ request()->segment('3') == $category->id ? 'text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800' : ' text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center mr-3 mb-3 dark:text-white dark:focus:ring-gray-800' }}">{{ $category->name }}</a>
            @endforeach
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
            @foreach ($products as $product)
                {{-- <a href="{{ route('product.show', $product->id) }}"> --}}
                    <div
                        class="md:hover:scale-105 hover:scale-110 transition delay-150 duration-300 ease-in-out pb-2 rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="h-auto max-w-full rounded-lg"
                            src="{{'/storage/products/'.$product->image}}" alt="">
                        <div class="mx-2">
                            <span
                                class="text-gray-800 dark:text-white block text-lg overflow-hidden whitespace-nowrap">{{$product->name}}</span>
                            <div class="flex md:flex-row justify-between flex-col mt-1">
                                <span class="text-gray-800 dark:text-white text-sm md:text-md">Price: ${{$product->price}}</span>
                                {{-- <span class="text-gray-800 dark:text-white text-sm md:text-md">Quantity: {{$product->quantity}}</span> --}}
                            </div>
                            <div class="flex flex-row items-center justify-between mt-2">
                                <div>
                                    <button class="bg-blue-500 rounded-md p-2 hover:bg-blue-600">
                                        <img src="{{ asset('assets/image/outlet_favorite.svg') }}">
                                    </button>
                                    <form action="{{route('product.cart', $product->id)}}" method="POST" class="inline">
                                        @csrf
                                        @method('GET')
                                        <button class="bg-blue-500 rounded-md p-2  w-10 hover:bg-blue-600" type="submit">
                                            <img src="{{ asset('assets/image/cart_outlet.png') }}">
                                        </button>
                                    </form>
                                </div>
                                <a href="{{ route('product.show', $product->id) }}" class="text-gray-800 dark:text-white bg-orange-600 hover:bg-orange-700 rounded-md p-2">
                                    See More
                                </a>
                            </div>
                        </div>
                    </div>
                {{-- </a> --}}
            @endforeach
        </div>


    </div>
@endsection
