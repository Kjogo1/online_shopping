@extends('user.partials')
@section('content')
    <div class="flex flex-col mx-5 my-5">

        <div class="flex justify-center">
            <div class=" rounded-lg  md:w-5/6 ">
                <img class="object-cover w-full rounded-sm h-fit md:h-fit md:w-full md:rounded-md"
                    src="{{ '/storage/products/' . $product->image }}" alt="image">
            </div>
        </div>

        <div class="grid md:w-5/6 m-auto w-full">

            <div
                class="flex flex-col p-4 mt-5 shadow rounded-lg bg-white border border-gray-200  dark:border-gray-700 dark:bg-gray-800 ">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->name }}</h5>
                <div class="flex flex-row justify-between">
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Quantity: {{ $product->quantity }}</p>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price: ${{ $product->price }}</p>
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Category: {{ $product->category->name }}</p>

                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $product->description }}</p>

                <div class="flex flex-row items-center justify-between mt-2">
                    <button class="bg-blue-500 rounded-md p-2 hover:bg-blue-600">
                        <img src="{{ asset('assets/image/outlet_favorite.svg') }}">
                    </button>
                    <form action="{{route('product.cart', $product->id)}}" method="POST" class="inline">
                        @csrf
                        @method('GET')
                    <button type="submit" class="text-gray-800 dark:text-white bg-blue-500 rounded-md p-2 uppercase hover:bg-blue-600">
                        Add To Cart
                    </button>
                    </form>
                </div>
                <div class="flex md:flex-row flex-col justify-between mt-2">
                    <div class="flex mt-w-20">
                        <button class="bg-blue-500 rounded-md p-2 hover:bg-blue-600" id="add">
                            <img src="{{ asset('assets/image/plus.svg') }}">
                        </button>
                        {{-- <form class="inline mr-5"> --}}
                            <input type="number" name="quantity"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mx-2"
                            placeholder="" required value="1" id="value" pattern="/[0-9]/g">
                            {{-- <input type="submit" class="hidden">
                        </form> --}}
                        <button class="bg-blue-500 rounded-md p-2 hover:bg-blue-600" id="minus">
                            <img src="{{ asset('assets/image/minus.svg') }}">
                        </button>
                    </div>
                    <button
                        class="text-gray-800 dark:text-white bg-blue-500 rounded-md p-2 uppercase mt-w-20 hover:bg-blue-600">
                        Order Now
                    </button>
                </div>
            </div>

        </div>

        <div class="mt-5">
            <ul class="flex flex-row scroll-x list-none snap-mandatory w-full">
                @foreach ($related as $product)
                <li class="mr-5">
                    <span class="flex flex-col w-56 md:hover:scale-105 hover:scale-110 transition delay-150 duration-300 ease-in-out pb-2 rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="w-56 h-56 object-fill rounded-md" src="{{'/storage/products/'.$product->image}}"
                            alt="Image">
                            <span class="text-gray-700 dark:text-gray-400 text-lg overflow-hidden whitespace-nowrap ml-2">{{$product->name}}</span>
                            <span class="text-gray-700 dark:text-gray-400 ml-2">Price: ${{$product->price}}</span>
                            <div class="my-3 ml-2">
                                <a href="{{route('product.show', $product->id)}}" class="text-white bg-blue-500 rounded-md p-2 hover:bg-blue-600">See More</a>
                            </div>
                    </span>
                </li>
                @endforeach

                <li class="mr-5">
                    <span class="flex flex-col w-56 md:hover:scale-105 hover:scale-110 transition delay-150 duration-300 ease-in-out pb-2 rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="w-56 h-56 rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                            alt="Image">
                            <span class="text-gray-700 dark:text-gray-400 text-lg overflow-hidden whitespace-nowrap ml-2">Tite</span>
                            <span class="text-gray-700 dark:text-gray-400 ml-2">Price: $100</span>
                            <div class="my-3 ml-2">
                                <a href="#" class="text-white bg-blue-500 rounded-md p-2 hover:bg-blue-600">See More</a>
                            </div>
                    </span>
                </li>
                <li class="mr-5">
                    <span class="flex flex-col w-56 md:hover:scale-105 hover:scale-110 transition delay-150 duration-300 ease-in-out pb-2 rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="w-56 rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                            alt="Image">
                            <span class="text-gray-700 dark:text-gray-400 text-lg overflow-hidden whitespace-nowrap ml-2">Tite</span>
                            <span class="text-gray-700 dark:text-gray-400 ml-2">Price: $100</span>
                            <div class="my-3 ml-2">
                                <a href="#" class="text-white bg-blue-500 rounded-md p-2 hover:bg-blue-600">See More</a>
                            </div>
                    </span>
                </li>
                <li class="mr-5">
                    <span class="flex flex-col w-56 md:hover:scale-105 hover:scale-110 transition delay-150 duration-300 ease-in-out pb-2 rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="w-56 rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                            alt="Image">
                            <span class="text-gray-700 dark:text-gray-400 text-lg overflow-hidden whitespace-nowrap ml-2">Tite</span>
                            <span class="text-gray-700 dark:text-gray-400 ml-2">Price: $100</span>
                            <div class="my-3 ml-2">
                                <a href="#" class="text-white bg-blue-500 rounded-md p-2 hover:bg-blue-600">See More</a>
                            </div>
                    </span>
                </li>
                <li class="mr-5">
                    <span class="flex flex-col w-56 md:hover:scale-105 hover:scale-110 transition delay-150 duration-300 ease-in-out pb-2 rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="w-56 rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                            alt="Image">
                            <span class="text-gray-700 dark:text-gray-400 text-lg overflow-hidden whitespace-nowrap ml-2">Tite</span>
                            <span class="text-gray-700 dark:text-gray-400 ml-2">Price: $100</span>
                            <div class="my-3 ml-2">
                                <a href="#" class="text-white bg-blue-500 rounded-md p-2 hover:bg-blue-600">See More</a>
                            </div>
                    </span>
                </li>
                <li class="mr-5">
                    <span class="flex flex-col w-56 md:hover:scale-105 hover:scale-110 transition delay-150 duration-300 ease-in-out pb-2 rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="w-56 rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                            alt="Image">
                            <span class="text-gray-700 dark:text-gray-400 text-lg overflow-hidden whitespace-nowrap ml-2">Tite</span>
                            <span class="text-gray-700 dark:text-gray-400 ml-2">Price: $100</span>
                            <div class="my-3 ml-2">
                                <a href="#" class="text-white bg-blue-500 rounded-md p-2 hover:bg-blue-600">See More</a>
                            </div>
                    </span>
                </li>
                <li class="mr-5">
                    <span class="flex flex-col w-56 md:hover:scale-105 hover:scale-110 transition delay-150 duration-300 ease-in-out pb-2 rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="w-56 rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                            alt="Image">
                            <span class="text-gray-700 dark:text-gray-400 text-lg overflow-hidden whitespace-nowrap ml-2">Tite</span>
                            <span class="text-gray-700 dark:text-gray-400 ml-2">Price: $100</span>
                            <div class="my-3 ml-2">
                                <a href="#" class="text-white bg-blue-500 rounded-md p-2 hover:bg-blue-600">See More</a>
                            </div>
                    </span>
                </li>
                <li class="mr-5">
                    <span class="flex flex-col w-56 md:hover:scale-105 hover:scale-110 transition delay-150 duration-300 ease-in-out pb-2 rounded-lg shadow bg-white border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="w-56 rounded-md" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg"
                            alt="Image">
                            <span class="text-gray-700 dark:text-gray-400 text-lg overflow-hidden whitespace-nowrap ml-2">Tite</span>
                            <span class="text-gray-700 dark:text-gray-400 ml-2">Price: $100</span>
                            <div class="my-3 ml-2">
                                <a href="#" class="text-white bg-blue-500 rounded-md p-2 hover:bg-blue-600">See More</a>
                            </div>
                    </span>
                </li>
            </ul>


        </div>
    </div>
    <script>
        const add = document.querySelector('#add');
        const minus = document.querySelector('#minus');
        const value = document.querySelector('#value').value;
        // const pattern = '/^[0-9]+$/'
        const pattern = /[0-9]/g;

        let reg = value.match(pattern);
        if(reg == null){
            console.log('error');
        }
           let currentValue = parseInt(value);

        add.addEventListener('click', (e) => {
            currentValue = currentValue + 1;
            // console.log(currentValue)
            document.querySelector('#value').value = currentValue
        })

        minus.addEventListener('click', (e) => {
            if(currentValue > 1) {
                currentValue = currentValue - 1
                document.querySelector('#value').value = currentValue
            }
        })
        // console.log(value)
    </script>
@endsection
