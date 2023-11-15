<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title-page')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('storage/images/' . $gambar[0]->path . '') }}" type="image/icon type">

    <!-- bootstrap -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/b1f0352e54.js" crossorigin="anonymous"></script>
    <!-- Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        html,
        body {
            font-family: 'Poppins';
            width: 100%;
        }
    </style>

</head>

<body>
    <!-- component -->
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
        <div
            class="sidebar  z-10 fixed invisible lg:visible flex flex-col top-0 left-0 w-full lg:w-64 bg-blue-950 h-full border-r animate__animated animate__fadeInLeft">
            <div class="flex items-center justify-end h-14 border-b">
                <button type="button" class="btn-close -m-2.5 me-2 block lg:hidden rounded-md p-2.5 text-white-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="overflow-y-auto overflow-x-hidden flex-grow">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-white">Menu</div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ url('dashboard/main') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 {{ request()->is('dashboard/main') ? 'border-blue-500 pr-6' : '' }}">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-gauge"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('dashboard/jadwal') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 {{ request()->is('dashboard/jadwal') || request()->is('dashboard/tambah-jadwal') || request()->is('dashboard/edit-jadwal/*') || request()->is('dashboard/search-jadwal') ? 'border-blue-500 pr-6' : '' }} ">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-calendar-days"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Kelola Jadwal</span>
                            {{-- <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-indigo-500 bg-indigo-50 rounded-full">New</span> --}}
                        </a>
                    </li>
                    {{-- <li>
                        <a href="#"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                            <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span>
                        </a>
                    </li> --}}
                    {{-- <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-gray-500">Tasks</div>
                        </div>
                    </li> --}}
                    {{-- <li>
                        <a href="#"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Available Tasks</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Clients</span>
                            <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-500 bg-green-50 rounded-full">15</span>
                        </a>
                    </li> --}}
                    <li class="px-5">
                        <div class="flex flex-row items-center h-8">
                            <div class="text-sm font-light tracking-wide text-white">Settings</div>
                        </div>
                    </li>
                    <li>
                        <a href="{{ url('dashboard/gambar') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 {{ request()->is('dashboard/gambar') || request()->is('dashboard/edit-gambar/*') ? 'border-blue-500 pr-6' : '' }} ">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-image"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Kelola Gambar</span>
                            {{-- <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-indigo-500 bg-indigo-50 rounded-full">New</span> --}}
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('dashboard/konten') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 {{ request()->is('dashboard/konten') || request()->is('dashboard/edit-konten/*') ? 'border-blue-500 pr-6' : '' }} ">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-font"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Kelola Konten</span>
                            {{-- <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-indigo-500 bg-indigo-50 rounded-full">New</span> --}}
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('dashboard/pengukuran') }}"
                            class="mb-4 relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-white hover:text-gray-800 border-l-4 {{ request()->is('dashboard/pengukuran') || request()->is('dashboard/tambah-pengukuran') || request()->is('dashboard/edit-pengukuran/*') ? 'border-blue-500 pr-6' : '' }} ">
                            <span class="inline-flex justify-center items-center ml-4">
                                <i class="fas fa-ruler"></i>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Kelola Pengukuran</span>
                            {{-- <span
                                class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-indigo-500 bg-indigo-50 rounded-full">New</span> --}}
                        </a>
                    </li>
                    <div class="border-t"></div>
                    <li class="">
                        <a href="{{ url('dashboard/logout') }}"
                            class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50  text-white hover:text-gray-800 border-l-4 border-transparent ">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content p-4 mx-4 lg:mx-8 lg:ml-64 ">
            <button type="button"
                class="btn-open -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
            @include('components/message')
            <div
                class="p-4 mt-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 animate__animated animate__fadeInUp">

                @yield('content')
            </div>
        </div>
    </div>

</body>
<script>
    const btnClose = document.querySelector(".btn-close");
    const btnOpen = document.querySelector(".btn-open");
    const menu = document.querySelector(".sidebar");
    const layout = document.querySelector(".content");
    const mediaQuery = window.matchMedia('(min-width: 1024px)')

    btnOpen.addEventListener("click", () => {
        if (mediaQuery.matches) {
            menu.classList.toggle("lg:visible")
            layout.classList.toggle("lg:ml-64")
        } else {
            menu.classList.remove("lg:visib;e")
            menu.classList.toggle("invisible")
        }

    });

    btnClose.addEventListener("click", () => {
        menu.classList.toggle("invisible");

    });
</script>
@yield('footer-script')

</html>
