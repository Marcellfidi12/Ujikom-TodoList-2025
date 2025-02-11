@extends('layout.app')
@section('content')

    <main id="main-content" class="sm:ml-20 sm:mr-12 mt-24 px-6 transition-all duration-300 ease-in-out">
        <h2 class="text-2xl font-bold mb-4 text-gray-600 dark:text-white">To-do List</h2>
        <div class="mx-auto my-8 bg-white border rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Task</h2>
            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')
        
                <!-- Nama Tugas -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Task Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ $task->name }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#EB5A3C] focus:border-[#EB5A3C]"
                        required
                    />
                </div>
        
                <!-- Status -->
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select
                        id="status"
                        name="status"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#EB5A3C] focus:border-[#EB5A3C]"
                    >
                        <option value="0" {{ !$task->status ? 'selected' : '' }}>Belum Selesai</option>
                        <option value="1" {{ $task->status ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
        
                <!-- Prioritas -->
                <div class="mb-4">
                    <label for="priority" class="block text-sm font-medium text-gray-700">Priority</label>
                    <select
                        id="priority"
                        name="priority"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#EB5A3C] focus:border-[#EB5A3C]"
                    >
                        <option value="normal" {{ $task->priority === 'normal' ? 'selected' : '' }}>Normal</option>
                        <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ $task->priority === 'high' ? 'selected' : '' }}>High</option>
                    </select>
                </div>
        
                <!-- Deadline -->
                <div class="mb-4">
                    <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                    <input
                        type="date"
                        id="deadline"
                        name="deadline"
                        value="{{ $task->deadline }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-[#EB5A3C] focus:border-[#EB5A3C]"
                        required
                    />
                </div>
        
                <!-- Tombol Submit -->
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow hover:bg-blue-500"
                    >
                        Update Task
                    </button>
                </div>
            </form>
        </div>
        <x-footerdashboard />
    </main>

@endsection