<!-- Modal -->
<div id="termsModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden p-4 sm:p-6">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-lg">
        <h2 class="text-xl font-bold mb-4">Syarat dan Ketentuan</h2>
        <div class="max-h-[400px] overflow-y-auto">
        <p class="text-gray-700">
            Ini adalah syarat dan ketentuan untuk aplikasi To-Do List yang dibuat oleh Marcell Fia Dinata dari SMK Mahardhika Batujajar.
            Dengan menggunakan aplikasi ini, Anda setuju untuk tidak menyalahgunakan layanan dan mengikuti aturan yang berlaku.
        </p>
        <ul class="list-disc pl-5 text-gray-700">
            <li>Pengguna harus menggunakan aplikasi ini sesuai dengan hukum dan peraturan yang berlaku.</li>
            <li>Data yang dimasukkan harus akurat dan tidak mengandung informasi palsu atau menyesatkan.</li>
            <li>Pihak pengembang tidak bertanggung jawab atas kehilangan data akibat kelalaian pengguna.</li>
            <li>Pengguna dilarang menyebarkan konten berbahaya atau ilegal melalui aplikasi ini.</li>
            <li>Pihak pengembang berhak melakukan perubahan terhadap syarat dan ketentuan tanpa pemberitahuan sebelumnya.</li>
        </ul>
        </div>
        <div class="mt-4 flex justify-end">
            <button onclick="closeModal()" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-500">Saya Mengerti</button>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('termsModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('termsModal').classList.add('hidden');
    }
</script>