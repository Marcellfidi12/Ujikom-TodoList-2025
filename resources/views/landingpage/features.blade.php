<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Features - To-Do List Ujikom Marcell XII RPL 2</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/fa4f06edc9.js" crossorigin="anonymous"></script>
</head>
<body class="w-screen h-screen bg-gradient-to-r from-white to-blue-200">
    <div>
        <x-navbarlandingpage />
        <!-- Features Section -->
        <section class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-40">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-800 md:text-5xl lg:text-6xl">Powerful Features to Boost Your Productivity</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48">Nikmati fitur canggih yang membantu Anda tetap terorganisir, produktif, dan efisien.</p>
            
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <i class="fas fa-tasks text-4xl text-blue-600"></i>
                    <h3 class="mt-4 text-2xl font-bold text-gray-800">Task Management</h3>
                    <p class="text-gray-500">Atur tugas dengan mudah dan kelola daftar kerja Anda secara efisien.</p>
                </div>
                
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <i class="fas fa-bell text-4xl text-blue-600"></i>
                    <h3 class="mt-4 text-2xl font-bold text-gray-800">Smart Reminders</h3>
                    <p class="text-gray-500">Dapatkan pengingat otomatis untuk memastikan Anda tidak melewatkan tugas penting.</p>
                </div>
                
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <i class="fas fa-sync-alt text-4xl text-blue-600"></i>
                    <h3 class="mt-4 text-2xl font-bold text-gray-800">Real-time Sync</h3>
                    <p class="text-gray-500">Sinkronisasi data Anda secara instan di berbagai perangkat.</p>
                </div>
                
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <i class="fas fa-users text-4xl text-blue-600"></i>
                    <h3 class="mt-4 text-2xl font-bold text-gray-800">Collaboration</h3>
                    <p class="text-gray-500">Bekerja sama dengan tim Anda dan berbagi tugas dengan mudah.</p>
                </div>
                
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <i class="fas fa-chart-line text-4xl text-blue-600"></i>
                    <h3 class="mt-4 text-2xl font-bold text-gray-800">Progress Tracking</h3>
                    <p class="text-gray-500">Pantau perkembangan tugas Anda dengan statistik yang jelas.</p>
                </div>
                
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <i class="fas fa-shield-alt text-4xl text-blue-600"></i>
                    <h3 class="mt-4 text-2xl font-bold text-gray-800">Data Security</h3>
                    <p class="text-gray-500">Keamanan tingkat tinggi untuk melindungi data dan informasi pribadi Anda.</p>
                </div>
            </div>
        </section>
        <x-footer />
    </div>
</body>
</html>
