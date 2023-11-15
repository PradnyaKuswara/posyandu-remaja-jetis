@extends('layouts/application')

@section('title-page')
    Halaman Utama
@endsection

@section('content-section')
    <div class="p-6 md:p-0 max-w-screen-xl   pt-28 mx-auto lg:p-8 lg:py-14">
        <div class="grid lg:grid-cols-12 place-items-center gap-4">
            <div class="lg:mt-10  lg:col-span-7 animate__animated animate__fadeInDown">
                <h1
                    class="mb-4 text-7xl tiempos font-extrabold tracking-tight text-justify leading-none md:text-8xl xl:text-9xl dark:text-white">
                    {{ $konten[0]->konten }}</h1>
                <p
                    class="mb-6 pe-0 lg:pe-6 text-justify open-sans  text-black lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    {{ $konten[1]->konten }}
                </p>
                <div class="grid grid-cols-2 gap-2 md:flex">
                    <div class="col-span-1">
                        <a href="{{ url('informasi/#struktur') }}"
                            class="inline-flex open-sans items-center justify-center px-5 py-2 text-base font-medium text-center text-white rounded-lg bg-blue-950 hover:text-white focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900 animate__animated animate__bounce">
                            <i class="fas fa-reguler fa-sitemap mr-3"></i> Struktur Organisasi
                        </a>
                    </div>
                    <div class="col-span-1">
                        <a href="{{ url('informasi/#schedule') }}"
                            class="inline-flex open-sans items-center open-sans justify-center px-5 py-2   lg:mt-0  text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            <i class="fas fa-solid fa-calendar-days mr-3"></i> Jadwal Lokasi
                        </a>
                    </div>
                    <div class="col-span-1">
                        <a href="https://wa.me/+62895622357199" target="_blank"
                            class="inline-flex items-center justify-center px-5 py-2 lg:mt-0  text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            <i class="fas fa-reguler fa-phone mr-3 "></i>Contact Person 1
                        </a>
                    </div>
                    <div class="col-span-1">
                        <a href="https://wa.me/+6285801211676" target="_blank"
                            class="inline-flex items-center justify-center px-5 py-2  lg:mt-0  text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            <i class="fas fa-reguler fa-phone mr-3 "></i>Contact Person 2
                        </a>
                    </div>
                </div>




            </div>
            <div class="lg:py-16 mt-9 mx-auto lg:col-span-5 lg:flex animate__animated animate__fadeIn">
                <img class="rounded-lg drop-shadow-md" src="{{ asset('storage/images/' . $gambar[1]->path . '') }}" alt="mockup">
            </div>
        </div>
    </div>
    <div id="controls-carousel" class="relative mx-auto animate__animated animate__fadeInLeft" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-96 w-100 overflow-hidden rounded-lg lg:h-screen">
            <!-- Item 1 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item="active">
                <img src="{{ asset('storage/images/' . $gambar[2]->path . '') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="{{ asset('storage/images/' . $gambar[3]->path . '') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="{{ asset('storage/images/' . $gambar[4]->path . '') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <div class="hidden duration-1000 ease-in-out" data-carousel-item>
                <img src="{{ asset('storage/images/' . $gambar[5]->path . '') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
@endsection

@section('footer-script')
@endsection
