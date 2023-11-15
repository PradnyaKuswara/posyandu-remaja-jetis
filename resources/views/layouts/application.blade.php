<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title-page')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('storage/images/' . $gambar[0]->path . '') }}">

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
    <style type="text/css">
        @font-face {
            font-family: TiemposHeadlineSemibold;
            src: url('{{ asset('fonts/TiemposHeadline-Semibold.otf') }}');
        }

        @font-face {
            font-family: OpenSans;
            src: url('{{ asset('fonts/OpenSans-VariableFont_wdth,wght.ttf') }}');
        }

        html,
        body {
            width: 100%;
            scroll-behavior: smooth;
            scroll-padding-top: 40px;
            scroll-padding-bottom: 40px;
        }

        .open-sans {
            font-family: OpenSans;
        }

        .tiempos {
            font-family: TiemposHeadlineSemibold;
        }
    </style>

</head>

<body>
    <div class="min-h-screen min-w-full">
        @include('components/message')
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-4 lg:px-8 border shadow-lg  bg-white dark:bg-orange-300"
                aria-label="Global">
                <div class="flex lg:flex-1 ">
                    <a href="{{ url('/') }}" class="-m-1.5 p-1.5">
                        <span class="sr-only ">Your Company</span>
                        <img class="h-8 w-auto" src="{{ asset('storage/images/' . $gambar[0]->path . '') }}"
                            alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="btn-open -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12 ">
                    <a href="{{ url('/') }}"
                        class="text-sm leading-6 open-sans text-gray-900 {{ Request::path() == '/' ? 'font-bold' : 'font-light' }}">Home</a>
                    <a href="{{ url('/informasi') }}"
                        class="text-sm leading-6 open-sans text-gray-900 {{ Request::path() == 'informasi' ? 'font-bold' : 'font-light' }}">Informasi</a>
                </div>
                <div class="invisible hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="{{ url('/login') }}" class="text-sm open-sans font-semibold leading-6 text-gray-900">Log
                        in
                        <span aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="menu hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div
                    class="layout fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-full sm:ring-4 sm:ring-gray-900/10 animate__animated animate__fadeInDown">
                    <div class="flex items-center justify-between">
                        {{-- <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                        </a> --}}
                        <button type="button" class="btn-close -m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="{{ url('/') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base open-sans font-semibold leading-7 text-gray-900 hover:bg-blue-950 hover:text-white">Home</a>
                                <a href="{{ url('/informasi') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base open-sans font-semibold leading-7 text-gray-900 hover:bg-blue-950 hover:text-white">Informasi</a>
                            </div>
                            {{-- <div class="py-6">
                                <a href="{{ url('/login') }}"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base open-sans font-semibold leading-7 text-gray-900 hover:bg-blue-950 hover:text-white">Log
                                    in</a>
                            </div> --}}
                            <div class="py-6">
                                <span class="block text-sm text-gray-500 open-sans sm:text-center dark:text-gray-400">©
                                    {{ \Carbon\Carbon::now()->format('Y') }}
                                    <a href="{{ url('/') }}" class="hover:underline">Posyandu Remaja
                                        Jetis</a>.
                                    All Rights
                                    Reserved.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content-section')
        </main>

        <footer>
            <div id="footer" class="w-full max-w-screen-2xl mx-auto md:pb-6 bg-blue-950">
                <hr class=" border-gray-500 sm:mx-auto dark:border-gray-700 my-6" />
                <div class="p-2  grid grid-cols-2 lg:grid-cols-10 place-content-center">
                    <div class="lg:col-span-2">
                        <span
                            class="block text-xl open-sans  font-extrabold  text-white text-left dark:text-gray-400">Layanan
                        </span>
                        <span
                            class="block text-xl open-sans  font-extrabold  text-white text-left dark:text-gray-400">Informasi
                        </span>
                        <span
                            class="block text-xl open-sans  font-extrabold  text-white text-left dark:text-gray-400">Dan
                            Pengaduan
                        </span>
                    </div>
                    <div class="lg:col-span-2">
                        <span
                            class="block text-xs open-sans  lg:text-sm text-white font-extrabold  text-left dark:text-gray-400">Kantor
                            Pusat</span>
                        <span class="block text-xs open-sans lg:text-sm text-white  text-left dark:text-gray-400">Desa
                            Sendangsari
                        </span>
                        <span
                            class="block text-xs open-sans lg:text-sm text-white  text-left dark:text-gray-400">Padukuhan
                            Jetis Rt 1-6</span>
                    </div>

                    <div class="lg:col-span-2">
                        <span
                            class="block text-xs open-sans lg:text-sm text-white font-extrabold text-left dark:text-gray-400">Nomor
                            Telepon</span>
                        <span
                            class="block text-xs open-sans lg:text-sm text-white  text-left dark:text-gray-400">0895-6223-57199</span>
                        <span
                            class="block text-xs open-sans lg:text-sm text-white  text-left dark:text-gray-400">0858-0121-1676</span>
                    </div>

                    <div class="lg:col-span-2">
                        <span
                            class="block text-xs open-sans lg:text-sm text-white font-extrabold  text-left dark:text-gray-400">Media
                            Sosial</span>
                        <a href=""> <span
                                class="block text-xs mr-2 open-sans lg:text-sm text-white  text-left dark:text-gray-400">
                                <i class="fas fa-reguler fa-envelope"></i> posyanduremajajetis@gmail.com </span></a>
                        <a href=""> <span
                                class="block text-xs open-sans lg:text-sm text-white  text-left dark:text-gray-400"> <i
                                    class="fas fa-brands fa-instagram"></i> coming soon </span></a>
                        <a href=""> <span
                                class="block text-xs open-sans lg:text-sm text-white  text-left dark:text-gray-400"> <i
                                    class="fas fa-brands fa-tiktok"></i> coming soon </span></a>
                    </div>
                    <div class="lg:col-span-2">
                        <span
                            class="block text-xs lg:text-sm open-sans text-white text-left font-extrabold lg:text-right  dark:text-gray-400">©
                            {{ \Carbon\Carbon::now()->format('Y') }} <a href="https://youtube.com/"
                                class="hover:underline">Posyandu Remaja Jetis</a>. All
                            Rights
                            Reserved.</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
<script>
    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Change the icons inside the button based on previous settings
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
            '(prefers-color-scheme: dark)').matches)) {
        themeToggleLightIcon.classList.remove('hidden');
    } else {
        themeToggleDarkIcon.classList.remove('hidden');
    }

    var themeToggleBtn = document.getElementById('theme-toggle');

    themeToggleBtn.addEventListener('click', function() {

        // toggle icons inside button
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        // if set via local storage previously
        if (localStorage.getItem('color-theme')) {
            if (localStorage.getItem('color-theme') === 'light') {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            }

            // if NOT set via local storage previously
        } else {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
        }

    });
</script>
<script>
    const btnClose = document.querySelector(".btn-close");
    const btnOpen = document.querySelector(".btn-open");
    const menu = document.querySelector(".menu");
    const layout = document.querySelector(".layout");

    btnOpen.addEventListener("click", () => {
        menu.classList.toggle("hidden");

    });

    btnClose.addEventListener("click", () => {
        menu.classList.toggle("hidden");

    });
</script>
@yield('footer-script')

</html>
