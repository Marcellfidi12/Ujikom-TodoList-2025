<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>M CODE (Todo App) Ujikom Marcell XII RPL 2</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/fa4f06edc9.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .mask-gradient {
            mask-image: linear-gradient(to left, rgba(0,0,0,1), rgba(0,0,0,0));
            -webkit-mask-image: linear-gradient(to left, rgba(0,0,0,1), rgba(0,0,0,0));
        }
        body, html {
            overflow-x: hidden;
        }
    </style>
</head>
<body class="w-screen bg-gradient-to-r from-white to-blue-200 overflow-x-hidden">
    <div class="relative min-h-screen flex flex-col overflow-hidden">
        <x-navbarlandingpage />

        <section class="relative flex flex-col lg:flex-row items-center justify-between w-full px-6 md:px-12 lg:px-24 mx-auto max-w-screen-xl text-center lg:text-left pt-24 md:pt-24 lg:pt-32">
            <div class="lg:w-1/2 space-y-6" data-aos="fade-right">
                <h1 class="text-3xl md:text-5xl font-extrabold text-gray-800 leading-tight">
                    <span class="text-red-500">Organize</span> Your Day, Achieve <span class="text-blue-600">More</span>
                </h1>
                <p class="text-lg text-gray-600 lg:text-xl">
                    Permudah hidupmu dengan aplikasi to-do list kami. Atur tugas, tetapkan prioritas, dan tetap produktif dengan sinkronisasi waktu nyata dan pengingat cerdas.
                </p>
                <div class="flex flex-col md:flex-row mt-6 space-y-4 md:space-y-0 md:space-x-4">
                    <a href="{{ route('login') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-white rounded-lg bg-blue-600 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300">
                        Get started
                        <svg class="w-4 h-4 ml-2 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                    <a href="{{ route('home') }}" class="inline-flex justify-center hover:text-gray-900 items-center py-3 px-5 text-base font-medium text-blue-600 rounded-lg border border-blue-600 hover:bg-gray-100 focus:ring-4 focus:ring-gray-300">
                        Back Home
                    </a>  
                </div>
            </div>

            <div class="lg:w-1/2 mt-10 lg:mt-0 flex justify-center lg:justify-end" data-aos="fade-up">
                <img src="{{ asset('assets/image/bg3.png') }}" alt="To-Do List Illustration" class="w-full max-w-md md:max-w-lg lg:max-w-xl object-cover mask-gradient">
            </div>
        </section>

        <section class="relative flex flex-col lg:flex-row items-center justify-between w-full px-6 md:px-12 lg:px-24 mx-auto max-w-screen-xl text-center lg:text-left py-24 md:py-24 lg:py-32">
            <div class="lg:w-1/2 mt-10 lg:mt-0 flex justify-center lg:justify-start" data-aos="fade-right">
                <img src="{{ asset('assets/image/logo.png') }}" alt="Logo M-Code (Todo App)" class="w-full max-w-md md:max-w-lg lg:max-w-xl object-cover">
            </div>
            
            <div class="lg:w-1/2 space-y-6" data-aos="fade-left">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 leading-tight">
                    About Our App
                </h2>
                <p class="text-lg text-gray-600 lg:text-xl">
                    M-CODE (Todo App) adalah aplikasi to-do list yang saya buat untuk memenuhi tugas uji kompentensi keahlian tahun 2025 jurusan rekayasa perangkat lunak yang saya lakukan di smk mahardhika batujajar,meskipun hanya sebatas aplikasi yang dibuat untuk tugas sekolah saya membuat aplikasi ini dengan effort dan usaha.
                </p>
                <p class="text-lg text-gray-600 lg:text-xl">
                    Agar dapat mendapatkan hasil yang terbaik bahkan dapat membantu pengguna yang memakai aplikasi, Aplikasi Todo List ini dirancang untuk meningkatkan produktivitas, aplikasi yang menawarkan antarmuka yang intuitif, ringan, dan mudah digunakan untuk semua kalangan.
                </p>
            </div>
        </section>

        <x-footer />
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
