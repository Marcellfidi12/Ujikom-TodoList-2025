@if($reminders->isNotEmpty())
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let popup = document.getElementById("info-popup");
        let closeBtn = document.getElementById("close-modal");

        if (popup && closeBtn) {
            popup.classList.remove("hidden");

            closeBtn.addEventListener("click", function () {
                popup.classList.add("hidden");
            });
        }
    });
</script>
@endif

<div id="info-popup" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50 {{ $reminders->isEmpty() ? 'hidden' : '' }}">
    <div class="relative w-full max-w-sm sm:max-w-lg p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800 m-4">
        <div class="mb-4 text-sm font-light text-gray-500 dark:text-gray-400">
            <h3 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">Reminder Alert</h3>
            <p>Anda memiliki pengingat tugas yang akan selesai dalam 7 hari yang memerlukan perhatian Anda. Harap tinjau semuanya.</p>
        </div>
        <div class="flex flex-col sm:flex-row sm:justify-between gap-4">
            <a href="{{ route('reminder')}}" class="text-primary-600 dark:text-white font-medium hover:underline">View Reminders</a>
            <button id="close-modal" type="button" class="py-2 px-4 w-full sm:w-auto text-sm font-medium text-gray-500 bg-gray-100 rounded-lg border border-gray-500 hover:bg-gray-500 hover:text-white dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Close</button>
        </div>
    </div>
</div>
