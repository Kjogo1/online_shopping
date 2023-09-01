<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OnlineShop</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        .maxheight {
            height: 100vh;
        }

        .minheight {
            height: 50vh;
        }

        .scroll-child {
            overflow: auto;
            -ms-overflow-style: none;
            /* Internet Explorer 10+ */
            scrollbar-width: none;
            /* Firefox */

            -webkit-animation-name: move;
            -webkit-animation-duration: 4s;
            -webkit-animation-iteration-count: infinite;
            -webkit-animation-delay: 1s;
            -webkit-animation-direction: alternate;
            -webkit-animation-timing-function: linear;
        }

        .box:hover {
            -webkit-animation-play-state: paused;
        }

        @-webkit-keyframes move {
            0% {
                margin-left: 0px;
            }

            100% {
                margin-left: -790px;
            }
        }

        .scroll-child::-webkit-scrollbar {
            display: none;
            /* Safari and Chrome */
        }
    </style>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900">
    @include('layouts.navbar')
    {{-- <div id="default-carousel" class="relative w-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                <img src="{{ asset('assets/image/slide.png') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                <img src="{{ asset('assets/image/slide.png') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out " data-carousel-item>
                <img src="{{ asset('assets/image/slide.png') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover" alt="...">
            </div>

        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
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
    </div> --}}

    <div class="relative">
        <span
            class="text-gray-800 dark:text-white absolute top-1/2 left-1/2 md:text-2xl font-semibold text-xl md:max-w-lg">Title</span>
        <img src="{{ asset('assets/image/slide.png') }}" class="w-full h-56 md:h-fit object-cover">
    </div>

    <h2 class="text-gray-800 dark:text-white font-semibold md:text-3xl text-xl flex flex-row justify-center m-5">Our
        Sponser</h2>


    <div class=" flex items-center flex-row my-2 scroll-child box">
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/netflix.png') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">Netflix</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/microsoft.png') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">Microsoft</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/youtube.png') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">Youtube</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/unilever.png') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">unilever</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/twitter.png') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">twitter</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/starbucks.png') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">starbucks</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/visa.svg') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">Visa</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/tesla.svg') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">Tesla</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/mastercard.svg') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">MasterCard</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/google.png') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">Google</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/firebase.svg') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">FireBase</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/ebay.png') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">Ebay</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/apple.png') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">Apple</span>
        </span>
        <span class="flex flex-row items-center mx-10">
            <img src="{{ asset('assets/image/android.png') }}" class="w-10 object-cover">
            <span class="uppercase text-gray-800 dark:text-white ml-1">android</span>
        </span>
    </div>

    <div class="flex justify-center items-center maxheight flex-col">
        <h2 class="text-gray-800 dark:text-white font-semibold md:text-3xl text-xl blokc">Our Mission</h2>
        <span class="text-gray-800 dark:text-white md:max-w-3xl max-w-sm">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.
        </span>
    </div>

    <div class="flex justify-center items-center maxheight flex-col">
        <h2 class="text-gray-800 dark:text-white font-semibold md:text-3xl text-xl blokc">Our Service</h2>

        <span class="text-sm text-gray-800 dark:text-white my-5 mx-5">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua.
        </span>
        <span class="grid grid-cols-2 md:grid-cols-4 gap-4 mx-5">
            <span class="text-gray-800 dark:text-white md:max-w-3xl max-w-sm flex flex-col items-center">
                <img src="{{ asset('assets/image/sketch.png') }}" class="w-10">
                <span class="block">
                    Well Design
                </span>
                <span class="text-sm">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                </span>
            </span>

            <span class="text-gray-800 dark:text-white md:max-w-3xl max-w-sm flex flex-col items-center">
                <img src="{{ asset('assets/image/bestproduct.png') }}" class="w-10">
                <span class="block">
                    Best Product
                </span>
                <span class="text-sm ">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                </span>
            </span>

            <span class="text-gray-800 dark:text-white md:max-w-3xl max-w-sm flex flex-col items-center">
                <img src="{{ asset('assets/image/gold.png') }}" class="w-10">
                <span class="block">
                    Save Money
                </span>
                <span class="text-sm ">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                </span>
            </span>

            <span class="text-gray-800 dark:text-white md:max-w-3xl max-w-sm flex flex-col items-center">
                <img src="{{ asset('assets/image/delivery.png') }}" class="w-10">
                <span class="block">
                    Free Delivery
                </span>
                <span class="text-sm ">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.
                </span>
            </span>
        </span>
    </div>

    @include('layouts.footer')
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
</body>

</html>
