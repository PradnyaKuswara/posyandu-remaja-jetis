@extends('layouts/dashboard')

@section('title-page')
    Halaman Tambah Jadwal
@endsection

@section('content')
    <div>
        <h1 class="sans text-xl text-extrabold">Tambah Data Jadwal</h1>
    </div>
    <div class="mt-4">
        <div class="bg-white shadow-lg p-5">
            <form action="{{ url('dashboard/tambah-jadwal-process') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid lg:grid-cols-2 mt-4 gap-4">
                    <div class="col-span-1 ">
                        <label for="tanggalTerlaksana"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Terlaksana</label>
                        <input type="date" id="due_from" name="tanggal_terlaksana" value=""
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="yyyy/mm/dd">
                    </div>
                    <div class="md:col-span-1">
                        <label for="jamMulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam
                            Mulai</label>
                        <input type="time" value="" name="jam_mulai" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Waktu mulai kegiatan cek rutin">
                    </div>
                    <div class="md:col-span-1 mt-4">
                        <label for="jamSelesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam
                            Selesai</label>
                        <input type="time" value="" name="jam_selesai" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Waktu mulai kegiatan cek rutin">
                    </div>
                    <div class="md:col-span-1 mt-4">
                        <label for="lokasi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi</label>
                        <input type="text" name="lokasi" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Tempat pelaksanaan cek rutin" autocomplete="off">
                    </div>
                    <div class="md:col-span-1 mt-4">
                        <label for="gmaps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link
                            Gmaps</label>
                        <input type="text" name="link_gmaps" aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Titik Lokasi Google Maps" autocomplete="off">
                    </div>
                </div>
                <div class="mt-4 grid lg:grid-cols-2 gap-4">
                    <button type="submit"
                        class="border hover:opacity-75  text-white text-center rounded py-2 px-4 bg-blue-950  md:col-span-1">Tambah</button>
                    <a href="{{ url('dashboard/jadwal') }}"
                        class="border border-gray-300  hover:bg-gray-100 text-black text-center rounded py-2 px-4 md:col-span-1">Kembali</a>
                </div>

                {{-- <p id="helper-text-explanation" class="mt-2 text-sm text-gray-500 dark:text-gray-400">We’ll never share your
                details. Read our <a href="#"
                    class="font-medium text-blue-600 hover:underline dark:text-blue-500">Privacy Policy</a>.</p> --}}

            </form>
        </div>
    </div>
@endsection

@section('footer-script')
@endsection
