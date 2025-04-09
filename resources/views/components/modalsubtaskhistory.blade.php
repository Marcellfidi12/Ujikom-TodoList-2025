<!-- Modal Subtask -->
<div id="subtask-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center p-4 sm:p-6">
    <div class="bg-white p-6 rounded-lg w-full max-w-lg sm:max-w-md shadow-lg border">
        <h2 class="text-xl font-bold mb-4">Subtasks <span id="subtask-count" class="text-sm text-gray-600"></span></h2>
        <ul id="subtask-list" class="list-none space-y-2 max-h-[200px] overflow-y-auto"></ul>
        <button onclick="closeModal()" class="border border-gray-500 bg-gray-100 text-gray-500 px-4 py-2 rounded-lg shadow hover:bg-gray-500 hover:text-white mt-4 w-full">Tutup</button>
    </div>
</div>

<script>
    function openModal(taskId) {
        fetch(`/tasks/${taskId}`)
            .then(response => response.json())
            .then(data => {
                const list = document.getElementById('subtask-list');
                const countDisplay = document.getElementById('subtask-count');
                list.innerHTML = '';
                let completedCount = 0;
                
                if (data.subtasks.length === 0) {
                    list.innerHTML = '<li class="text-gray-500">Subtask kosong</li>';
                    countDisplay.textContent = '';
                } else {
                    data.subtasks.forEach(subtask => {
                        if (subtask.status) completedCount++;
                        list.innerHTML += `
                            <li class="flex items-center border rounded-2xl shadow-md p-4 bg-white">
                                <span class="ml-3 ${subtask.status ? 'text-gray-400 line-through' : 'text-gray-700'}">
                                    ${subtask.name}
                                </span>
                                <span class="ml-auto px-3 py-1 text-sm border 
                                    ${subtask.status ? 'border-green-500 bg-green-100 text-green-500' : 'border-red-500 bg-red-100 text-red-500'} 
                                    rounded-lg shadow">
                                    ${subtask.status ? 'Selesai' : 'Belum Selesai'}
                                </span>
                            </li>`;
                    });
                    countDisplay.textContent = `(${completedCount}/${data.subtasks.length})`;
                }
                document.getElementById('subtask-modal').classList.remove('hidden');
            });
    }

    function closeModal() {
        document.getElementById('subtask-modal').classList.add('hidden');
    }
</script>