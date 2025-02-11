@extends('layout.app')
@section('content')

  <main id="main-content" class="sm:ml-20 sm:mr-12 mt-24 px-6 transition-all duration-300 ease-in-out">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold text-gray-600 dark:text-white">Tasks</h2>
        <button
            onclick="openTaskModal()"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-500"
        >
            <i class="fa-solid fa-plus"></i>
            <span>Tambah Tugas</span>
        </button>
    </div>
    <div class="flex flex-col sm:flex-row gap-6">
        <div class="flex-1 bg-white border rounded-lg p-6 overflow-hidden">
            <!-- Task Filter -->
            <div class="w-full overflow-x-auto whitespace-nowrap">
                <div class="flex space-x-4 mb-4 border-b pb-2 flex-nowrap">
                    <button id="btn-all" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600" onclick="filterTasks('all', this)">All</button>
                    <button id="btn-high" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600" onclick="filterTasks('high', this)">High</button>
                    <button id="btn-medium" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600" onclick="filterTasks('medium', this)">Medium</button>
                    <button id="btn-normal" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600" onclick="filterTasks('normal', this)">Normal</button>
                </div>
            </div>
            
            <!-- Task List -->
            <div class="h-[60vh] pb-4 overflow-y-auto">
                <ul id="task-list" class="space-y-4">
                    @foreach ($tasks as $task)
                        <li class="flex items-center border rounded-2xl p-4 bg-white dark:bg-gray-800 shadow-md hover:shadow-lg transition duration-300 task-item"
                            data-priority="{{ $task->priority }}">
                            
                            <input type="radio" name="task" value="{{ $task->id }}" 
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
      <div id="task-detail" class="flex-1 bg-white border rounded-lg p-6 overflow-hidden">
        <div id="no-task-selected" class="text-gray-500 italic">
          Tidak ada task yang dipilih.
        </div>
        <div id="task-detail-content" class="hidden">
            <h3 class="text-lg font-bold mb-4 underline">Task Detail</h3>
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="text-sm font-semibold block">Task Name:</label>
                    <p id="task-name" class="text-base font-bold text-gray-800"></p>
                </div>
                <div>
                    <label class="text-sm font-semibold block">Status:</label>
                    <p id="task-status" class="text-base font-bold text-gray-800"></p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="text-sm font-semibold block">Start at:</label>
                    <input
                        id="task-start"
                        type="date"
                        class="border border-gray-300 shadow-md rounded-lg w-full p-2 text-sm"
                        disabled
                    />
                </div>
                <div>
                    <label class="text-sm font-semibold block">Deadline at:</label>
                    <input
                        id="task-deadline"
                        type="date"
                        class="border border-gray-300 shadow-md rounded-lg w-full p-2 text-sm"
                        disabled
                    />
                </div>
            </div>
        
            <!-- Subtasks List -->
            <h4 class="text-lg font-semibold">Subtasks</h4>
            <div class="mb-2 pb-4 max-h-[20vh] overflow-y-auto">
                <ul id="subtasks-list" class="space-y-4">
                    <!-- Subtasks will be loaded here -->
                </ul>
            

                <!-- Form Tambah Subtask -->
                <form onsubmit="addSubtask(event)" class="mt-4">
                    <div class="bg-white shadow-md rounded-2xl p-3 flex items-center border border-gray-300">
                        <input 
                            type="text" 
                            id="new-subtask-name" 
                            class="border-none flex-grow focus:outline-none" 
                            placeholder="Tambah subtask..."
                            required
                        />
                        <button 
                            type="submit" 
                            class="bg-blue-600 text-white px-4 py-2 rounded-lg ml-2 hover:bg-blue-500 flex items-center"
                        >
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </form>
            </div>
        
                <form id="complete-task-form" method="POST" action="{{ route('tasks.updateStatus', $task->id ?? '#') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <label for="proof-upload" class="text-sm font-semibold block">Upload Bukti:</label>
                    <input type="file" id="proof-upload" name="proof" accept="image/*,application/pdf" class="border border-gray-300 rounded-lg p-2 w-full text-sm mb-2" required />
            <div class="flex space-x-4">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg shadow hover:bg-green-600 disabled:opacity-50" id="complete-task-btn" disabled>
                        <i class="fa-solid fa-check"></i>
                    </button>
                </form>
                <a id="edit-task-link" href="#" class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow hover:bg-yellow-600">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <form id="delete-task-form" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button
                        type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600"
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
    document.getElementById('proof-upload').addEventListener('change', function() {
        document.getElementById('complete-task-btn').disabled = !this.files.length;
    });
  </script>

  <x-tambahtugas />
  <x-toast :message="session('success')" :visible="session()->has('success')" />
    
@endsection