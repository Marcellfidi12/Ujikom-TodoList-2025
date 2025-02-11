<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Changelogs - To-Do List Ujikom Marcell XII RPL 2</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/fa4f06edc9.js" crossorigin="anonymous"></script>
</head>
<body class="w-screen h-screen bg-gradient-to-r from-white to-blue-200">
    <div>
        <x-navbarlandingpage />
        <!-- Changelog Section -->
        <section class="px-4 mx-auto max-w-screen-xl py-24 lg:py-40">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-800 md:text-5xl lg:text-6xl text-center">Changelogs</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 text-center">Lihat perubahan dan pembaruan terbaru pada aplikasi To-Do List kami.</p>
            
            <div class="max-w-3xl mx-auto space-y-8">
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.2.0 - 2024-01-28</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Peningkatan sistem pengingat otomatis.</li>
                        <li>Perbaikan bug pada tampilan UI.</li>
                    </ul>
                </div>
                
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.1.0 - 2024-01-27</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Menambahkan fitur pelacakan progres.</li>
                        <li>Optimasi performa aplikasi.</li>
                    </ul>
                </div>
                
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.0.0 - 2025-01-25</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Peluncuran awal aplikasi(UKK Paket 2 - Marcell Fia Dinata XII RPL 2).</li>
                        <li>Fitur manajemen tugas dan sinkronisasi real-time.</li>
                    </ul>
                </div>
            </div>
        </section>
        <x-footer />
    </div>
</body>
</html>
