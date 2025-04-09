@extends('layout.app')
@section('content')

  <main id="main-content" class="sm:ml-16 sm:mr-8 mt-24 px-6 transition-all duration-300 ease-in-out">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-600 dark:text-white">My Tasks</h2>
        <button
            onclick="openTaskModal()"
            class="border border-blue-500 bg-blue-100 text-blue-500 px-4 py-2 ml-2 rounded-lg shadow hover:bg-blue-500 hover:text-white"
        >
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Tugas</span>
        </button>

    </div>
    <div class="flex flex-col sm:flex-row gap-6">
        <div class="flex-1 bg-white dark:bg-gray-800 border rounded-lg p-6 overflow-hidden">
            <!-- Task Filter -->
            <div class="w-full overflow-x-auto whitespace-nowrap">
                <div class="flex space-x-4 mb-4 border-b pb-2 flex-nowrap">
                    <button id="btn-all" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600 dark:text-white" onclick="filterTasks('all', this)">All</button>
                    <button id="btn-high" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600 dark:text-white" onclick="filterTasks('high', this)">High</button>
                    <button id="btn-medium" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600 dark:text-white" onclick="filterTasks('medium', this)">Medium</button>
                    <button id="btn-normal" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600 dark:text-white" onclick="filterTasks('normal', this)">Normal</button>
                    <button id="btn-completed" class="px-4 py-2 border-b-2 border-transparent hover:border-green-600 dark:text-white" onclick="filterTasks('completed', this)">Completed</button>
                </div>
            </div>
            
            <!-- Task List -->
            <div class="h-[80vh] pb-4 overflow-y-auto">
                    <div id="empty-message" class="hidden h-full flex flex-col items-center justify-center italic text-gray-500">
                        <i class="fa-solid fa-inbox text-6xl text-gray-300 mb-4"></i>
                        <span class="text-lg font-semibold">Tidak ada tugas terbaru disini</span>
                    </div>
                    <ul id="task-list" class="space-y-4">
                        @foreach ($tasks as $task)
                            <li onclick="selectTask({{ $task->id }})" class="flex items-center border rounded-2xl p-4 bg-white dark:bg-gray-800 shadow-md hover:shadow-lg transition duration-300 task-item {{ $task->status ? 'hidden' : '' }}"
                                data-priority="{{ $task->priority }}" data-status="{{ $task->status ? 'completed' : 'pending' }}">
                                
                                <input type="radio" name="task" value="{{ $task->id }}" id="task-{{ $task->id }}"
                                    class="w-5 h-5 text-blue-500 focus:ring-2 focus:ring-blue-300"
                                    onchange="loadTaskDetail({{ $task->id }})" />
                                
                                <span class="ml-3 text-lg font-medium 
                                    {{ $task->status ? 'text-gray-400 line-through' : 'text-gray-700 dark:text-gray-200' }}">
                                    {{ $task->name }}
                                </span>

                                <span class="ml-auto px-3 py-1 border rounded-full text-xs font-semibold uppercase
                                    {{ $task->priority === 'high' ? 'border-red-500 text-red-500 bg-red-100 dark:bg-red-900' : '' }}
                                    {{ $task->priority === 'medium' ? 'border-yellow-500 text-yellow-500 bg-yellow-100 dark:bg-yellow-900' : '' }}
                                    {{ $task->priority === 'normal' ? 'border-gray-500 text-gray-500 bg-gray-100 dark:bg-gray-900' : '' }}">
                                    {{ ucfirst($task->priority) }}
                                </span>
                            </li>           
                        @endforeach
                    </ul>
            </div>       
        </div>
    
      <!-- Card Kanan -->
      <div id="task-detail" class="flex-1 bg-white dark:bg-gray-800 border rounded-lg p-6 overflow-hidden">
        <div id="no-task-selected" class="text-gray-500 italic flex flex-col items-center justify-center h-full">
            <i class="fa-solid fa-clipboard-list text-6xl text-gray-300 mb-4"></i>
            <p class="text-lg font-semibold text-gray-500">Tidak ada tugas yang dipilih.</p>
        </div>
        <div id="task-detail-content" class="hidden">
            
            <div class="mb-2">
                <div class="flex items-center justify-between">
                    <h2 id="task-name" class="text-2xl font-bold text-gray-900"></h2>
                    <p id="task-id" class="text-lg text-gray-500"></p>
                </div>
            </div>

            <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                <p id="task-remaining"></p>
                <span>|</span>
                <p id="task-status"></p>
            </div>            

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex flex-col items-center justify-center border border-blue-500 bg-blue-100 rounded-lg shadow-md p-4">
                    <i class="fa-solid fa-calendar-days text-blue-500 text-2xl mb-2"></i>
                    <p class="text-blue-700 text-sm">Start at</p>
                    <p id="task-start" class="text-blue-700 text-sm">-</p>
                </div>
                <div class="flex flex-col items-center justify-center border border-red-500 bg-red-100 rounded-lg shadow-md p-4">
                    <i class="fa-solid fa-calendar-day text-red-500 text-2xl mb-2"></i>
                    <p class="text-red-700 text-sm">Deadline at</p>
                    <p id="task-deadline" class="text-red-700 text-sm">-</p>
                </div>
            </div>
            
        
            <!-- Subtasks List -->
            <h4 class="text-lg font-medium mb-2">Subtasks</h4>
            <div class="mb-2 p-2 h-[20vh] overflow-y-auto border border-gray-300 rounded-md bg-gray-100">
                <ul id="subtasks-list" class="space-y-4">
                    <!-- Subtasks will be loaded here -->
                </ul>
            </div>

                <!-- Form Tambah Subtask -->
                <form onsubmit="addSubtask(event)" class="my-4">
                    <div class="bg-white shadow-md rounded-2xl p-3 flex items-center border border-gray-300">
                        <input 
                            type="text" 
                            id="new-subtask-name" 
                            class="border-none flex-grow focus:outline-none" 
                            placeholder="Tambah subtugas..."
                            required
                        />
                        <button 
                            type="submit" 
                            class="border border-blue-500 bg-blue-100 rounded-lg shadow-md hover:text-white text-blue-500 px-4 py-2 ml-2 hover:bg-blue-500 flex items-center"
                        >
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </form>
        
                <form id="complete-task-form" method="POST" action="{{ route('tasks.updateStatus', $task->id ?? '#') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <label for="proof-upload" class="text-sm font-medium block mb-2">Attachments (Optional):</label>
                    <input type="file" id="proof-upload" name="proof" accept="image/*,application/pdf" class="border border-gray-300 rounded-lg p-2 w-full text-sm mb-2"/>
            <div class="flex space-x-4">
                    <button type="submit" class="border border-green-500 bg-green-100 rounded-lg shadow-md hover:text-white text-green-500 px-4 py-2 hover:bg-green-600 disabled:opacity-50" id="complete-task-btn">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </form>
                <a id="edit-task-link" href="#" class="border border-yellow-500 bg-yellow-100 rounded-lg shadow-md hover:text-white text-yellow-500 px-4 py-2 hover:bg-yellow-600">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <form id="delete-task-form" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button
                        type="button"
                        id="delete-task-button"
                        class="border border-red-500 bg-red-100 rounded-lg shadow-md hover:text-white text-red-500 px-4 py-2 hover:bg-red-600"
                    >
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>                
            </div>
        </div>        
      </div>
    </div>
    <x-footerdashboard />
  </main>

  <script>
    //mengecek tugas saat pertama kali memuat halaman
    window.addEventListener("load", () => {
        checkEmptyTaskList();
    });
    
    //mengecek jika ada tugas yang diupload akan menonaktifkan disable pada id proof-upload
    // document.getElementById('proof-upload').addEventListener('change', function() {
    //     document.getElementById('complete-task-btn').disabled = !this.files.length;
    // });

    document.getElementById('delete-task-button').addEventListener('click', function () {
        const taskStatusElement = document.getElementById('task-status');
        const taskStatus = taskStatusElement ? taskStatusElement.textContent.trim() : '';

        let warningText = "Apakah Anda yakin ingin menghapus tugas ini?";
        if (taskStatus === 'Selesai') {
            warningText = "Tugas ini telah selesai. Jika dihapus, riwayatnya juga akan ikut terhapus. Apakah Anda yakin?";
        }

        Swal.fire({
            title: "Konfirmasi Penghapusan",
            text: warningText,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-task-form').submit();
            }
        });
    });
  </script>

  <x-tambahtugas />
    
@endsection