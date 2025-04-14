<div id="loading-spinner" class="hidden fixed inset-0 flex flex-col items-center justify-center bg-gray-900 bg-opacity-80 backdrop-blur-md z-[9999]">
    <!-- Spinner dengan Icon Papan Tugas -->
    <div class="relative w-16 h-16 mb-4">
        <div class="absolute inset-0 border-4 border-gray-300 border-t-blue-600 rounded-full animate-spin"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <svg class="w-10 h-10 text-blue-600 opacity-0 transition-opacity duration-500 ease-in-out drop-shadow-glow" id="task-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 2h6a1 1 0 011 1v2h3a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V6a1 1 0 011-1h3V3a1 1 0 011-1zM9 6h6"></path>
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16h6"></path>
            </svg>
        </div>
    </div>

    <!-- Efek Ketikan (Teks di bawah spinner) -->
    <p class="text-white text-xl font-semibold">
        <span id="typing-text"></span> <span class="animate-blink">|</span>
    </p>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const loadingSpinner = document.getElementById("loading-spinner");
        const taskIcon = document.getElementById("task-icon");
        const typingText = document.getElementById("typing-text");

        const tasks = ["Menyiapkan aplikasi...", "Mengambil daftar tugas...", "Menampilkan to-do list..."];
        let taskIndex = 0;
        let charIndex = 0;

        function typeText() {
            if (taskIndex < tasks.length) {
                if (charIndex < tasks[taskIndex].length) {
                    typingText.textContent += tasks[taskIndex][charIndex];
                    charIndex++;
                    setTimeout(typeText, 50);
                } else {
                    setTimeout(() => {
                        typingText.textContent = "";
                        charIndex = 0;
                        taskIndex++;
                        typeText();
                    }, 700);
                }
            }
        }

        //spinner akan muncul saat halaman mulai berpindah
        window.addEventListener("beforeunload", function () {
            loadingSpinner.classList.remove("hidden");
            taskIcon.classList.remove("opacity-0");
            typingText.textContent = "";
            taskIndex = 0;
            charIndex = 0;
            typeText();
        });

        //spinner akan hilang saat halaman selesai di load
        window.addEventListener("pageshow", function () {
            loadingSpinner.classList.add("hidden");
            taskIcon.classList.add("opacity-0");
            typingText.textContent = "";
        });
    });
</script>
