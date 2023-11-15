<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>404 Error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="icon" href="{{ asset('image/GOFIT.png') }}" type="image/icon type"> --}}

    {{-- bootstrap  --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/b1f0352e54.js" crossorigin="anonymous"></script>
    <!-- Animate -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    {{-- css --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

</head>

<body class="h-full">
    <div
        class="w-full h-screen flex flex-col lg:flex-row items-center justify-center space-y-16 lg:space-y-0 space-x-8 2xl:space-x-0">
        <div class="w-full lg:w-1/2 flex flex-col items-center justify-center lg:px-2 xl:px-0 text-center">
            <p class="text-7xl md:text-8xl lg:text-9xl font-bold tracking-wider text-gray-300">400</p>
            <p class="text-4xl md:text-5xl lg:text-6xl font-bold tracking-wider text-gray-300 mt-2">Page Not Found</p>
            <p class="text-lg md:text-xl lg:text-2xl text-gray-500 my-12">Whoops, The page you're looking for doesn't
                exist.
            </p>
            <a href="{{ url('/') }}"
                class="rounded-md bg-orange-300 px-3.5 py-2.5 text-sm font-semibold text-black shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go
                back home</a>
        </div>
        <div class="w-1/2 lg:h-full flex lg:items-end justify-center p-4">
            <img src="{{ asset('image/404-logo.png') }}" alt="">
        </div>
    </div>
</body>

</html>
