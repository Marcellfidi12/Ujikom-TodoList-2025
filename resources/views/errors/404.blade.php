<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 | M CODE (Todo App) Ujikom Marcell XII RPL 2</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/fa4f06edc9.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="w-screen bg-gradient-to-r from-white to-blue-200 overflow-x-hidden">
    <div class="relative min-h-screen flex flex-col">
        <x-navbarlandingpage />

        <div class="flex flex-col items-center justify-center flex-grow px-4">
            <div class="text-center w-full max-w-md" data-aos="fade-up">
                <img src="{{ asset('assets/image/404icon.png') }}" alt="404 Illustration" class="w-40 sm:w-48 md:w-56 mx-auto mb-3">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-blue-600">404</h1>
                <p class="text-sm sm:text-base md:text-lg text-gray-700 mt-2">Oops! Halaman yang Anda cari tidak ditemukan.</p>
                <p class="text-xs sm:text-sm md:text-base text-gray-500 mt-1">Mungkin tugas Anda belum selesai, ayo kembali bekerja!</p>
                <a href="{{ route('dashboard') }}" class="mt-5 inline-block px-4 sm:px-5 py-2 sm:py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-300 text-sm sm:text-base">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
                </a>
            </div>
        </div>

        <x-footer />
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
