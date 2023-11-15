@extends('layouts/application')

@section('title-page')
    Informasi Posyandu
@endsection

@section('content-section')
    <div class="mx-auto lg:mt-10 max-w-screen-xl p-0 pt-28 lg:p-8 lg:py-14">
        <h1
            class=" mb-4 text-5xl text-center tiempos font-extrabold tracking-tight leading-none lg:text-7xl dark:text-white animate__animated animate__fadeInDown">
            Apa saja yang diperiksa?</h1>
        <div class="grid lg:grid-cols-10">
            @forelse ($gambar_pengukuran as $item)
                <div class="mx-auto mt-10 place-self-center lg:col-span-2 lg:mr-2 ">
                    <div class="border-2 border-gray-300 rounded-lg p-5 ">
                        <img src="{{ asset('storage/images/' . $item->path . '') }}" alt="image componnet"
                            class="mx-auto w-48 h-48 rounded-lg shadow-inner animate__animated animate__headShake animate__repeat-2 animate__delay-2s">
                        <h1 class=" my-2 text-3xl lg:text-lg text-center open-sans font-extrabold dark:text-white">
                            {{ $item->judul_gambar }}</h1>
                        <h1 class="cursor-pointer open-sans text-blue-700 text-center underline text-sm my-2"
                            data-modal-target="modal{{ $item->id }}"data-modal-toggle="modal{{ $item->id }}">Lihat
                            selengkapnya</h1>
                    </div>
                </div>
                <div id="modal{{ $item->id }}" tabindex="-1"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                    {{ $item->judul_gambar }}
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="modal{{ $item->id }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 md:p-8 space-y-6">
                                <p class="text-base text-justify leading-relaxed text-gray-500 dark:text-gray-400">
                                    {{ $item->deskripsi }}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            @empty
                <div class="mx-auto mt-10 place-self-center lg:col-span-2 lg:mr-2 ">
                    <div class="border-2 border-gray-300 rounded-lg p-5 ">
                        {{-- <img src="{{ asset('image/' . $item->path . '') }}" alt="image componnet"
                            data-modal-target="modal1"data-modal-toggle="modal1"
                            class="w-48 h-48 rounded-lg shadow-inner animate__animated animate__headShake animate__repeat-3 animate__delay-2s"> --}}
                        <h1 class=" text-3xl lg:text-lg text-center open-sans font-extrabold dark:text-white">
                            Tidak ada konten</h1>
                    </div>

                </div>
            @endforelse
        </div>
        <h2
            class="mt-10 max-w-screen-md mx-auto text-justify p-3 lg:p-0 lg:text-center text-lg tiempos  italic text-gray-600 dark:text-white">
            {{ $konten[2]->konten }}</h2>

        <div id="schedule" class="p-6 md:p-0 lg:mt-28 mt-10 bg-white shadow-lg rounded-lg">
            <div class="flex flex-col lg:flex-row justify-between">
                <h1 class=" text-black tiempos font-extrabold text-3xl lg:text-5xl ">Pelaksanaan Posyandu Remaja
                </h1>
                <h1 class="text-black tiempos font-extrabold  text-3xl lg:text-5xl">
                    {{ \Carbon\Carbon::now()->format('Y') }}
                </h1>
            </div>

            <div class="grid mt-3 lg:mt-6 lg:grid-cols-2 gap-2">
                @forelse ($data as $item)
                    <div
                        class="{{ $data->count() > 1 ? 'lg:col-span-1' : 'lg:col-span-2' }} mx-2  mt-4  overflow-hidden shadow-lg border border-blue-950 bg-white lg:mt-3">
                        <div class="flex justify-between">
                            <span
                                class="open-sans bg-blue-950 me-10 rounded-e-lg text-white font-bold  text-3xl">{{ \Carbon\Carbon::parse($item->tanggal_terlaksana)->translatedformat('l d F') }}
                            </span>
                            <a href="https://wa.me/+62895622357199"
                                class="bg-blue-950 w-10 h-10 rounded-full hover:opacity-75">
                                <i class="text-white p-3 fa-solid fa-phone"></i>
                            </a>
                        </div>
                        <div class="p-5 lg:mx-4">
                            <h1 class="open-sans font-bold  text-lg"> <i class="fa mr-1 fa-regular fa-clock"></i>
                                {{ $item->jam_mulai }} -
                                {{ $item->jam_selesai }}
                                WIB
                            </h1>
                            <h1 class="open-sans font-bold  text-lg my-2"> <i class="fas fa-house"></i>
                                {{ $item->lokasi }}</h1>
                            <a href="{{ $item->link_gmaps }}" target="_blank" class="mt-2 ms-1 "><span
                                    class="open-sans font-bold text-blue-500 underline text-md mt-4"> <i
                                        class="fas text-lg mr-1 text-black fa-location-dot"></i>
                                    Klik untuk mengetahui lokasi!</span></a>
                        </div>
                    </div>
                @empty
                    <div class="lg:col-span-2 mt-4  overflow-hidden shadow-lg border border-blue-950 bg-white lg:mt-3">
                        {{-- <div class="flex justify-between">
                            <span
                                class="open-sans bg-blue-950 me-10 rounded-e-lg text-white font-bold  text-3xl">
                            </span>
                            <a href="https://wa.me/+62895622357199"
                                class="bg-blue-950 w-10 h-10 rounded-full hover:opacity-75">
                                <i class="text-white p-3 fa-solid fa-phone"></i>
                            </a>
                        </div> --}}
                        <div class="p-5 lg:mx-4">
                            <h1 class="open-sans font-bold  text-lg"> <i class="fa mr-1 fa-regular fa-clock"></i> Jadwal
                                bulan {{ \Carbon\Carbon::now()->translatedformat('F') }} ini belum ada
                            </h1>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        <div id="struktur" class="lg:mt-24 mt-10">
            <div>
                <h1 class="tiempos text-center text-4xl  lg:text-6xl">Struktur Organisasi Posyandu Remaja</h1>
            </div>
            <div class="mt-4">
                <img class="rounded-lg w-full h-full" src="{{ asset('storage/images/' . $gambar[6]->path . '') }}"
                    alt="">
            </div>
        </div>
    </div>
@endsection

@section('footer-script')
@endsection
