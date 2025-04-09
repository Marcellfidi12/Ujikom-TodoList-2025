<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Features - M CODE (Todo App) Ujikom Marcell XII RPL 2</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/fa4f06edc9.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="w-screen min-h-screen bg-gradient-to-r from-white to-blue-200 overflow-x-hidden">
    <div class="relative flex flex-col min-h-screen">
        <x-navbarlandingpage />
        
        <!-- Features Section -->
        <section class="px-6 md:px-12 lg:px-24 mx-auto max-w-screen-xl text-center py-24 md:py-24 lg:py-32">
            <h1 class="mb-6 text-3xl md:text-5xl font-extrabold tracking-tight leading-tight text-gray-800">Powerful Features to Boost Your Productivity</h1>
            <p class="mb-10 text-lg font-normal text-gray-500 lg:text-xl sm:px-8 lg:px-32">Nikmati fitur canggih yang membantu Anda tetap terorganisir, produktif, dan efisien.</p>
            
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="zoom-in">
                    <i class="fas fa-tasks text-5xl text-blue-600"></i>
                    <h3 class="mt-5 text-2xl font-bold text-gray-800">Task Management</h3>
                    <p class="text-gray-500">Atur tugas dengan mudah dan kelola daftar kerja Anda secara efisien.</p>
                </div>
                
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="zoom-in">
                    <i class="fas fa-bell text-5xl text-blue-600"></i>
                    <h3 class="mt-5 text-2xl font-bold text-gray-800">Smart Reminders</h3>
                    <p class="text-gray-500">Dapatkan pengingat otomatis untuk memastikan Anda tidak melewatkan tugas penting.</p>
                </div>
                
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="zoom-in">
                    <i class="fas fa-sync-alt text-5xl text-blue-600"></i>
                    <h3 class="mt-5 text-2xl font-bold text-gray-800">Real-time Sync</h3>
                    <p class="text-gray-500">Sinkronisasi data Anda secara instan di berbagai perangkat.</p>
                </div>
                
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="zoom-in">
                    <i class="fas fa-laptop text-5xl text-blue-600"></i>
                    <h3 class="mt-5 text-2xl font-bold text-gray-800">Responsive</h3>
                    <p class="text-gray-500">Akses dengan mudah di perangkat mana saja.</p>
                </div>
                
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="zoom-in">
                    <i class="fas fa-chart-line text-5xl text-blue-600"></i>
                    <h3 class="mt-5 text-2xl font-bold text-gray-800">Progress Tracking</h3>
                    <p class="text-gray-500">Pantau perkembangan tugas Anda dengan statistik yang jelas.</p>
                </div>
                
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="zoom-in">
                    <i class="fas fa-shield-alt text-5xl text-blue-600"></i>
                    <h3 class="mt-5 text-2xl font-bold text-gray-800">Data Security</h3>
                    <p class="text-gray-500">Keamanan tingkat tinggi untuk melindungi data dan informasi pribadi Anda.</p>
                </div>
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
