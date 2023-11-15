@extends('layouts/application2')

@section('content-section')
    <div class="w-full ">
        <div class="grid lg:grid-cols-12">
            <div class="bg-white shadow-lg rounded-lg px-10 pt-8 pb-10 lg:col-span-6">
                <h1 class="text-6xl font-sans font-extrabold">Portal Admin</h1>
                <h3 class="text-xl font-sans">Silahkan masukkan detail anda</h3>
                <form action="{{ url('login-process') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Email
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-4/5 lg:w-10/12 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="email" type="text" name="email" placeholder="Email" autocomplete="off">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Password
                        </label>
                        <input type="password"
                            class="shadow appearance-none border  rounded w-3/5 md:w-full  lg:w-10/12 py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            id="password" name="password" type="password" placeholder="******************">
                        <span class="border shadow border-gray-500 rounded py-2 px-3" id="basic-addon1" onclick=""><i
                                class="fa fa-eye-slash" onclick="change(this);myFunction(); "></i></span>
                        {{-- <p class="text-red-500 text-xs italic">Please choose a password.</p> --}}
                    </div>
                    <div class="mb-6">
                        <button
                            class="bg-blue-950 hover:opacity-75 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline"
                            type="submit">
                            Masuk
                        </button>
                        <a href="{{ url('/') }}"
                            class="inline-flex items-center justify-center py-2 px-4 mt-3 lg:mt-0  text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                            Halaman Utama
                        </a>
                    </div>
                    <div class="mb-6 ">
                        <a class="text-right font-bold text-sm text-blue-500 hover:text-blue-800"
                            href="{{ url('password/reset') }}">
                            Lupa password?
                        </a>
                    </div>
                </form>
            </div>
            <div class=" lg:col-span-6 lg:flex animate__animated animate__fadeIn">
                <img class="rounded-lg lg:rounded-e-full  drop-shadow-lg"
                    src="{{ asset('storage/images/' . $gambar[0]->path . '') }}" alt="mockup">
            </div>
        </div>
        <span class="block mt-4 text-sm text-gray-500 sm:text-center dark:text-gray-400">©
            {{ \Carbon\Carbon::now()->format('Y') }}
            <a href="https://youtube.com/" class="hover:underline">Posyandu Remaja
                Jetis</a>.
            All Rights
            Reserved.</span>

    </div>
@endsection
@section('footer-script')
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
                // x.classList.toggle("fa-thumbs-down");
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("re-password");
            if (x.type === "password") {
                x.type = "text";
                // x.classList.toggle("fa-thumbs-down");
            } else {
                x.type = "password";
            }
        }

        function change(x) {
            x.classList.toggle("fa-eye");
        }

        function change2(x) {
            x.classList.toggle("fa-eye");
        }
    </script>
@endsection
