@extends('layouts/dashboard')

@section('title-page')
    Halaman Edit Gambar
@endsection

@section('content')
    <div>
        <h1 class="sans text-xl text-extrabold">Edit Data Gambar</h1>
    </div>
    <div class="mt-4">
        <div class="bg-white shadow-lg p-5">
            <form action="{{ url('dashboard/update-gambar/' . Crypt::encrypt($data->id)) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid lg:grid-cols-2 mt-4 gap-4 ">
                    <div class="md:col-span-2 lg:mr-2">
                        <label for="tanggalTerlaksana"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar</label>
                        <input type="file" id="due_from" name="image" value="{{ $data->path }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full"
                            placeholder="Upload gambar disini">
                    </div>

                </div>
                <div class="mt-4 grid lg:grid-cols-2 gap-4">
                    <button type="submit"
                        class="border hover:opacity-75 lg:mr-2 text-white text-center rounded py-2 px-4 bg-blue-950  col-span-1">Edit</button>
                    <a href="{{ url('dashboard/gambar') }}"
                        class="border border-gray-300  hover:bg-gray-100 text-black text-center rounded py-2 px-4 col-span-1">Kembali</a>
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
