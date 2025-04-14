<!-- Modal -->
<div id="taskModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center bg-gray-900 bg-opacity-50 p-4 sm:p-6">
    <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-bold">Task Details</h2>
            <span id="modalTaskStatus" class="px-3 py-1 text-white text-sm font-semibold rounded-lg bg-red-500">
                Belum Selesai
            </span>
        </div>

        <!-- Task Name & ID -->
        <p class="mt-4 text-gray-600">Task Name:</p>
        <div class="flex items-center">
            <p id="modalTaskName" class="text-2xl font-bold"></p>
            <span id="modalTaskId" class="ml-2 text-gray-500 text-lg font-semibold"></span>
        </div>

        <!-- Priority -->
        <div class="mt-2 flex items-center">
            <p class="text-gray-600">Priority:</p>
            <span id="modalTaskPriority" class="ml-2 px-2 py-1 text-white text-sm font-semibold rounded-lg"></span>
        </div>

        <!-- Start & Deadline -->
        <div class="mt-4 flex justify-between gap-4">
            <div class="w-1/2 p-4 border border-blue-500 bg-blue-100 rounded-lg flex flex-col items-center">
                <i class="fas fa-calendar-alt text-blue-500 text-2xl"></i>
                <p class="text-blue-700">Start at</p>
                <p class="text-lg text-blue-700" id="modalTaskStart"></p>
            </div>
            <div class="w-1/2 p-4 border border-red-500 bg-red-100 rounded-lg flex flex-col items-center">
                <i class="fas fa-calendar-day text-red-500 text-2xl"></i>
                <p class="text-red-700">Deadline at</p>
                <p class="text-lg text-red-700" id="modalTaskDeadline"></p>
            </div>            
        </div>

        <!-- Close Button -->
        <button id="closeModal" class="border border-gray-500 bg-gray-100 text-gray-500 px-4 py-2 rounded-lg shadow hover:bg-gray-500 hover:text-white mt-4 w-full">
            Tutup
        </button>
    </div>
</div>