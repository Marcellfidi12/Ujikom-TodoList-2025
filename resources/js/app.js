import './bootstrap';

    function loadTaskDetail(taskId) {
    fetch(`/tasks/${taskId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('task-detail-content').classList.remove('hidden');
            document.getElementById('no-task-selected').classList.add('hidden');
            document.getElementById('task-name').textContent = data.name;
            document.getElementById('task-status').textContent = data.status ? 'Selesai' : 'Belum Selesai';
            document.getElementById('task-start').value = data.created_at.split('T')[0];
            document.getElementById('task-deadline').value = data.deadline;
            document.getElementById('task-detail-content').dataset.taskId = taskId;

            document.getElementById('complete-task-form').action = `/tasks/${data.id}/status`;
            document.getElementById('delete-task-form').action = `/tasks/${data.id}`;
            document.getElementById('edit-task-link').href = `/tasks/${data.id}/edit`;

            // Load Subtasks
            const subtaskList = document.getElementById('subtasks-list');
            subtaskList.innerHTML = '';

            data.subtasks.forEach(subtask => {
                const subtaskItem = document.createElement('li');
                subtaskItem.classList.add(
                    'flex', 'items-center', 'border', 'rounded-2xl', 'shadow-md', 
                    'hover:shadow-lg', 'transition', 'duration-300', 'p-4', 'bg-white'
                );

                subtaskItem.innerHTML = `
                    <label class="relative flex items-center cursor-pointer">
                        <input type="checkbox" ${subtask.status ? 'checked' : ''} 
                            onchange="updateSubtaskStatus(${subtask.id}, ${taskId}, event)" 
                            class="sr-only peer" />
                        <div class="w-6 h-6 flex items-center justify-center rounded-full border-2 
                                    ${subtask.status ? 'bg-blue-500 border-blue-500' : 'border-gray-400'} 
                                    peer-checked:bg-blue-500 peer-checked:border-blue-500 transition">
                            ${subtask.status ? '<i class="fa-solid fa-check text-white"></i>' : ''}
                        </div>
                    </label>
                    <span class="ml-3 ${subtask.status ? 'text-gray-400 line-through' : 'text-gray-700'}">
                        ${subtask.name}
                    </span>
                    <button class="ml-auto text-red-500" onclick="deleteSubtask(${subtask.id}, ${taskId})">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                `;

                subtaskList.appendChild(subtaskItem);
            });
        })
        .catch(error => console.error('Error loading task detail:', error));
    }

    function openTaskModal() {
        document.getElementById('task-modal').classList.remove('hidden');
    }

    function closeTaskModal() {
        document.getElementById('task-modal').classList.add('hidden');
    }

    function updateSubtaskStatus(subtaskId, taskId, event) {
        const status = event.target.checked;

        fetch(`/subtasks/${subtaskId}/status`, {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status })
        })
        .then(response => response.json())
        .then(data => {
            loadTaskDetail(taskId); // Reload task details to reflect updated subtask status
        })
        .catch(error => console.error('Error updating subtask status:', error));
    }

    function addSubtask(event) {
        event.preventDefault(); // Mencegah reload halaman

        const taskId = document.getElementById('task-detail-content').dataset.taskId;
        const subtaskName = document.getElementById('new-subtask-name').value.trim();

        if (!taskId || subtaskName === '') {
            alert("Pilih task terlebih dahulu dan isi nama subtask.");
            return;
        }

        fetch(`/subtasks`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ task_id: taskId, name: subtaskName })
        })
        .then(response => response.json())
        .then(data => {
            document.getElementById('new-subtask-name').value = ''; // Reset input
            loadTaskDetail(taskId); // Refresh subtask list
        })
        .catch(error => console.error('Error adding subtask:', error));
    }

    function deleteSubtask(subtaskId, taskId) {
        if (!confirm("Apakah Anda yakin ingin menghapus subtask ini?")) {
            return;
        }

        fetch(`/subtasks/${subtaskId}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Content-Type": "application/json",
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Gagal menghapus subtask.");
            }
            return response.json();
        })
        .then(data => {
            console.log("Subtask berhasil dihapus:", data);
            loadTaskDetail(taskId); // Perbarui daftar subtask setelah dihapus
        })
        .catch(error => console.error("Error deleting subtask:", error));
    }

    function filterTasks(filter, element) {
        const tasks = document.querySelectorAll('.task-item');

        tasks.forEach(task => {
            const taskPriority = task.dataset.priority; // Ambil nilai priority dari data-priority

            if (filter === 'all') {
                task.style.display = 'flex';
            } else if (taskPriority === filter) {
                task.style.display = 'flex';
            } else {
                task.style.display = 'none';
            }
        });

        // Reset semua tombol filter
        document.querySelectorAll('.border-b-2').forEach(btn => {
            btn.classList.remove('text-blue-600', 'border-blue-600', 'dark:text-blue-600', 'font-bold');
        });

        // Tambahkan gaya aktif pada tombol yang diklik
        element.classList.add('text-blue-600', 'border-blue-600', 'dark:text-blue-600', 'font-bold');
    }

window.loadTaskDetail = loadTaskDetail;
window.openTaskModal = openTaskModal;
window.closeTaskModal = closeTaskModal;
window.updateSubtaskStatus = updateSubtaskStatus;
window.addSubtask = addSubtask;
window.deleteSubtask = deleteSubtask;
window.filterTasks = filterTasks;