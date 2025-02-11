<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List Ujikom Marcell XII RPL 2</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/fa4f06edc9.js" crossorigin="anonymous"></script>
</head>
<body class="w-screen h-screen bg-gradient-to-r from-white to-blue-200">
    <div>
        <x-navbarlandingpage />
        <!-- section 1 -->
        <section class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-40">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-800 md:text-5xl lg:text-6xl">Organize Your Day, Achieve More</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48">Permudah hidupmu dengan aplikasi to-do list kami. Atur tugas, tetapkan prioritas, dan tetap produktif dengan sinkronisasi waktu nyata dan pengingat cerdas.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-400 focus:ring-4 focus:ring-blue-400 dark:focus:ring-blue-600">
                    Get started
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
                <a href="#" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 sm:ms-4 text-base font-medium text-center text-blue-600 rounded-lg border border-blue-600 hover:bg-gray-100 focus:ring-4 focus:ring-gray-400">
                    Learn more
                </a>  
            </div>
        </section>
        <x-footer />
    </div>
</body>
</html>