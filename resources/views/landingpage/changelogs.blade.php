<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Changelogs - M CODE (Todo App) Ujikom Marcell XII RPL 2</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/fa4f06edc9.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="w-screen min-h-screen bg-gradient-to-r from-white to-blue-200 overflow-x-hidden">
    <div class="relative flex flex-col min-h-screen">
        <x-navbarlandingpage />
        
        <!-- Changelog Section -->
        <section class="px-6 md:px-12 lg:px-24 mx-auto max-w-screen-xl py-24 md:py-24 lg:py-32">
            <h1 class="mb-6 text-3xl md:text-5xl font-extrabold tracking-tight leading-tight text-gray-800 text-center">Changelogs</h1>
            <p class="mb-10 text-lg font-normal text-gray-500 lg:text-xl sm:px-8 lg:px-32 text-center">Lihat perubahan dan pembaruan terbaru pada aplikasi M-CODE (Todo App) kami.</p>
            
            <div class="max-w-3xl mx-auto space-y-8">
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.8.0 - 2025-04-20</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Pengecekan dan Finalisasi Aplikasi.</li>
                        <li>Penambahan Alert Pada Tombol Selesai (Tugas).</li>
                    </ul>
                </div>

                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.7.0 - 2025-03-25</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Perbaikan Interface Halaman Dashboard.</li>
                        <li>Penambahan Fitur Export to Pdf (History).</li>
                        <li>Penambahan Halaman 404 Not Found</li>
                    </ul>
                </div>

                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.6.0 - 2025-02-12</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Penambahan fitur pencarian task.</li>
                        <li>Pengubahan fitur ganti password.</li>
                    </ul>
                </div>

                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.5.0 - 2025-02-06</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Penambahan halaman riwayat tugas.</li>
                        <li>Pengubahan atribut prioritas ada tugas.</li>
                        <li>Penambahan tema pada dashboard.</li>
                    </ul>
                </div>

                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.4.0 - 2025-02-04</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Penambahan fitur subtask.</li>
                        <li>Penyesuaian filter task di halaman dashboard.</li>
                        <li>Menampilkan task bedasarkan akun yang dimasuki.</li>
                    </ul>
                </div>

                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.3.0 - 2025-01-30</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Penyesuaian responsive tampilan.</li>
                        <li>Penambahan halaman dashboard.</li>
                        <li>Penambahan popup pengingat tugas.</li>
                    </ul>
                </div>

                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.2.0 - 2025-01-28</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Peningkatan sistem pengingat otomatis.</li>
                        <li>Perbaikan bug pada tampilan UI.</li>
                    </ul>
                </div>
                
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.1.0 - 2025-01-27</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Menambahkan fitur pelacakan progres.</li>
                        <li>Optimasi performa aplikasi.</li>
                    </ul>
                </div>
                
                <div class="p-6 bg-white rounded-xl shadow-md hover:shadow-lg transition" data-aos="fade-up">
                    <h3 class="text-2xl font-bold text-gray-800">Version 1.0.0 - 2025-01-25</h3>
                    <ul class="list-disc list-inside text-gray-500 mt-2">
                        <li>Peluncuran awal aplikasi (UKK Paket 2 - Marcell Fia Dinata XII RPL 2).</li>
                        <li>Fitur manajemen tugas dan sinkronisasi real-time.</li>
                    </ul>
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
