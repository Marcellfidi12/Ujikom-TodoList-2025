import './bootstrap';

    function loadTaskDetail(taskId) {
    fetch(`/tasks/${taskId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('task-detail-content').classList.remove('hidden');
            document.getElementById('no-task-selected').classList.add('hidden');
            document.getElementById('task-name').textContent = data.name;
            document.getElementById('task-id').textContent = '#' + data.id;
            document.getElementById('task-status').textContent = data.status ? 'Completed' : 'Incomplete';
            document.getElementById('task-start').textContent = data.created_at.split('T')[0];
            document.getElementById('task-deadline').textContent = data.deadline;
            // document.getElementById('task-priority').textContent = data.priority;
            document.getElementById('task-detail-content').dataset.taskId = taskId;

            // Menghitung sisa hari
            const start = new Date(data.created_at.split('T')[0]);
            const deadline = new Date(data.deadline);
            const today = new Date();
            const diffTime = deadline - today;
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            const remainingElement = document.getElementById('task-remaining');
            
            if (data.status) {
                remainingElement.textContent = "This task is closed";
            } else if (diffDays < 0) {
                remainingElement.textContent = "This task is late";
            } else {
                remainingElement.textContent = `${diffDays} days left`;
            }

            document.getElementById('complete-task-form').action = `/tasks/${data.id}/status`;
            document.getElementById('delete-task-form').action = `/tasks/${data.id}`;
            document.getElementById('edit-task-link').href = `/tasks/${data.id}/edit`;

            // Hilangkan tombol edit saat statusnya selesai
            const editTaskLink = document.getElementById('edit-task-link');
            if (data.status) {
                editTaskLink.style.display = 'none';
            } else {
                editTaskLink.style.display = 'inline-block';
            }

            //Menonaktifkan upload bukti saat statusnya selesai
            const uploadProof = document.getElementById('proof-upload');
            const completeTaskBtn = document.getElementById('complete-task-btn');
            if (data.status) {
                uploadProof.disabled = true;
                completeTaskBtn.disabled = true;
            } else {
                uploadProof.disabled = false;
                completeTaskBtn.disabled = false;
            }

            // Load Subtasks
            const subtaskList = document.getElementById('subtasks-list');
            subtaskList.innerHTML = '';

            // Menonaktifkan input dan tombol tambah subtask jika task selesai
            const subtaskInput = document.getElementById('new-subtask-name');
            const addSubtaskButton = subtaskInput.nextElementSibling; // Tombol submit di dalam form

            if (data.status) {
                subtaskInput.setAttribute('disabled', true);
                addSubtaskButton.classList.add('opacity-50', 'pointer-events-none');
            } else {
                subtaskInput.removeAttribute('disabled');
                addSubtaskButton.classList.remove('opacity-50', 'pointer-events-none');
            }

            data.subtasks.forEach(subtask => {
                const subtaskItem = document.createElement('li');
                subtaskItem.classList.add(
                    'flex', 'items-center', 'border', 'rounded-2xl', 'shadow-md', 
                    'hover:shadow-lg', 'transition', 'duration-300', 'p-4', 'bg-white'
                );

                // Jika task utama selesai, checkbox subtask dikunci (disabled)
                const isTaskCompleted = data.status ? 'disabled' : '';

                subtaskItem.innerHTML = `
                    <label class="relative flex items-center cursor-pointer ${data.status ? 'opacity-50 pointer-events-none' : ''}">
                        <input type="checkbox" ${subtask.status ? 'checked' : ''} ${isTaskCompleted}
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
                    <button class="ml-auto text-red-500 ${data.status ? 'opacity-50' : ''}" onclick="deleteSubtask(${subtask.id}, ${taskId})" ${isTaskCompleted}>
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
            showToast(`Status subtask diperbarui menjadi ${status ? 'selesai' : 'belum selesai'}.`, "success");
            loadTaskDetail(taskId); // Reload task details to reflect updated subtask status
        })
        .catch(error => {
            showToast("Terjadi kesalahan saat memperbarui status subtask.", "error");
            console.error('Error updating subtask status:', error);
        });
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
            showToast("Subtask berhasil ditambahkan.", "success");
            loadTaskDetail(taskId); // Refresh subtask list
        })
        .catch(error => {
            console.error('Error adding subtask:', error);
            showToast("Terjadi kesalahan saat menambahkan subtask.", "error");
        });
    }

    function deleteSubtask(subtaskId, taskId) {
        Swal.fire({
            title: "Konfirmasi Penghapusan",
            text: "Apakah Anda yakin ingin menghapus subtask ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (!result.isConfirmed) {
                return; // Batalkan penghapusan jika pengguna menekan "Batal"
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
                showToast("Subtask berhasil dihapus.", "success");
                loadTaskDetail(taskId); // Perbarui daftar subtask setelah dihapus
            })
            .catch(error => {
                showToast("Terjadi kesalahan saat menghapus subtask.", "error");
                console.error("Error deleting subtask:", error);
            });            
        });
    }

    function filterTasks(filter, element) {
        const tasks = document.querySelectorAll('.task-item');
    
        tasks.forEach(task => {
            const taskPriority = task.dataset.priority;
            const taskStatus = task.dataset.status; // Ambil status tugas (completed/pending)
    
            if (filter === 'all' && taskStatus === 'pending') {
                task.classList.remove('hidden');
            } else if (filter === 'completed' && taskStatus === 'completed') {
                task.classList.remove('hidden');
            } else if (filter !== 'completed' && taskPriority === filter && taskStatus === 'pending') {
                task.classList.remove('hidden');
            } else {
                task.classList.add('hidden');
            }
        });
    
        // Reset semua tombol filter
        document.querySelectorAll('.border-b-2').forEach(btn => {
            btn.classList.remove('text-blue-600', 'border-blue-600', 'dark:text-blue-600', 'font-bold');
            btn.classList.remove('text-green-600', 'border-green-600', 'dark:text-green-600'); // Untuk Completed
        });
    
        // Tambahkan gaya aktif pada tombol yang diklik
        if (filter === 'completed') {
            element.classList.add('text-green-600', 'border-green-600', 'dark:text-green-600', 'font-bold');
        } else {
            element.classList.add('text-blue-600', 'border-blue-600', 'dark:text-blue-600', 'font-bold');
        }

        // Cek apakah ada tugas yang masih terlihat setelah filter diterapkan
        checkEmptyTaskList();
    }

    //mengecek apakah ada tugas
    function checkEmptyTaskList() {
        let tasks = document.querySelectorAll('.task-item');
        let emptyMessage = document.getElementById('empty-message');
    
        // Cek apakah ada tugas yang masih terlihat (display !== 'none')
        let visibleTasks = Array.from(tasks).some(task => !task.classList.contains('hidden'));
    
        if (visibleTasks) {
            emptyMessage.classList.add('hidden');
        } else {
            emptyMessage.classList.remove('hidden');
        }
    }

    // Fungsi untuk menampilkan toast di js untuk fecth/json/ajax
    function showToast(message, type) {
        const toast = document.createElement("div");
        const iconColor = type === "success" ? "text-green-500 bg-green-100 dark:bg-green-800 dark:text-green-200" 
                        : "text-red-500 bg-red-100 dark:bg-red-800 dark:text-red-200";
        const iconSVG = type === "success" ? 
            `<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>`
            : `<path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 13a1.5 1.5 0 1 1 1.5-1.5A1.5 1.5 0 0 1 10 13Zm-1-8h2v5h-2V5Z"/>`;

        toast.className = "fixed bottom-12 sm:bottom-4 right-4 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg border border-gray-300 shadow-sm dark:text-gray-400 dark:border-gray-700 dark:bg-gray-800";
        toast.innerHTML = `
            <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 ${iconColor} rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    ${iconSVG}
                </svg>
            </div>
            <div class="ms-3 text-sm font-normal">${message}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" onclick="this.parentElement.remove()">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        `;

        document.body.appendChild(toast);

        // Toast akan hilang otomatis setelah 3 detik
        setTimeout(() => {
            toast.remove();
        }, 3000);
    }

    // Fungsi ini agar saat area tugas di tekan akan memicu method loadtaskdetail bedasarkan id tugas yang ada
    function selectTask(taskId) {
        document.getElementById('task-' + taskId).checked = true;
        loadTaskDetail(taskId);
    }
    
window.loadTaskDetail = loadTaskDetail;
window.openTaskModal = openTaskModal;
window.closeTaskModal = closeTaskModal;
window.updateSubtaskStatus = updateSubtaskStatus;
window.addSubtask = addSubtask;
window.deleteSubtask = deleteSubtask;
window.filterTasks = filterTasks;
window.showToast = showToast;
window.checkEmptyTaskList = checkEmptyTaskList;
window.selectTask = selectTask;