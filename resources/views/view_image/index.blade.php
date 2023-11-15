@extends('layouts/dashboard')

@section('title-page')
    Halaman Image
@endsection

@section('content')
    <div>
        <h1 class="sans text-xl text-extrabold">Table Image</h1>
    </div>

    {{-- <div class="mt-4 relative overflow-x-auto shadow-lg sm:rounded-lg">
        <div class="pb-4 bg-white dark:bg-gray-900">
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative mt-1 p-5 flex justify-between">
                <div class="flex items-center">
                    <form action="{{ url('dashboard/search-jadwal') }}" method="get" class="flex items-center">
                        <button type="submit"> <i class="fas fa-search"></i></button>
                        <input type="search" id="table-search" name="search"
                            class="block ml-4 p-2  text-sm text-gray-900 border border-gray-300 rounded-lg w-96 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                            placeholder="Search for items">
                    </form>


                </div>
                <div class="">
                    <a href="{{ url('dashboard/tambah-jadwal') }}"
                        class="float-right py-2 px-3 bg-blue-950 text-white hover:opacity-75  text-base font-medium text-center border border-gray-300 rounded-lg  focus:ring-4 focus:ring-gray-100">
                        Tambah Data
                    </a>
                </div>
            </div>

        </div> --}}
    <div class="mt-4 relative overflow-x-auto shadow-lg sm:rounded-lg">

        <table class="mt-4 w-full  text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="border-b text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 border-r">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3 border-r">
                        Nama Gambar
                    </th>
                    <th scope="col" class="px-6 py-3 border-r">
                        Path
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="">Action</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4 border-r">
                            {{ $item->id }}
                        </td>
                        <td class="px-6 py-4 border-r">
                            {{ $item->nama_gambar }}
                        </td>
                        <td class="px-6 py-4 border-r">
                            {{ $item->path }}
                        </td>
                        <td class="px-6 py-4 flex ">
                            <a href="{{ url('dashboard/edit-gambar/' . Crypt::encrypt($item->id)) }}"
                                class="font-medium text-green-600 mr-2">
                                <i class="fas fa-pencil"></i>
                            </a>
                            {{-- <form onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini ?');"
                            action="{{ url('dashboard/delete-jadwal/' . $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600  hover:underline"><i
                                    class="fas fa-trash"></i></button>
                        </form> --}}
                        </td>
                    </tr>
                @empty
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            Data Gambar Tidak Ditemukan
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
        <div class="mt-2 ">
            {{ $data->links('pagination::tailwind') }}
        </div>
    </div>
    </div>
@endsection
