@extends('layout.app')
@section('content')
    
    <main id="main-content" class="sm:ml-16 sm:mr-8 mt-24 px-6 transition-all duration-300 ease-in-out">
        <h2 class="text-2xl font-bold mb-4 text-gray-600 dark:text-white">History</h2>
        <div class="mx-auto my-8 bg-white border rounded-lg p-6">
            {{-- <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">History</h2>
                <a href="{{ route('dashboard') }}">
                    <button class="text-gray-500 hover:text-[#EB5A3C]">Kembali...</button>
                </a>
            </div> --}}
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">History</h2>
                <a href="{{ route('generate.achievement.pdf') }}" target="_blank">
                    <button 
                        class="border border-blue-500 bg-blue-100 text-blue-500 px-4 py-2 rounded-lg shadow hover:bg-blue-500 hover:text-white">
                        Export to PDF
                    </button>
                </a>
            </div>
            <!-- Tabel Data -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">#</th>
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Task Name</th>
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Subtask</th> 
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Start At</th>
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Deadline At</th>
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">End At</th>
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Status</th>
                            <th class="px-6 py-3 border-b text-left text-sm font-medium text-gray-600">Attachment</th> <!-- Kolom baru -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($histories as $index => $history)
                            <tr>
                                <td class="px-6 py-4 border-b text-sm text-gray-700">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 border-b text-sm text-gray-700">{{ $history->task->name }}</td>
                                <td class="px-6 py-4 border-b text-xl text-center text-gray-700">
                                    <button onclick="openModal({{ $history->task->id }})" class="text-gray-500 hover:text-gray-700">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </td>
                                <td class="px-6 py-4 border-b text-sm text-gray-700">{{ $history->task->created_at->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 border-b text-sm text-gray-700">{{ $history->task->deadline }}</td>
                                <td class="px-6 py-4 border-b text-sm text-gray-700">{{ \Carbon\Carbon::parse($history->end_at)->format('Y-m-d') }}</td>
                                <td class="px-6 py-4 border-b text-sm font-bold">
                                    <span class="px-3 py-1 border {{ $history->end_at <= $history->task->deadline ? 'border-green-500 bg-green-100 text-green-500' : 'border-red-500 bg-red-100 text-red-500' }} rounded-lg shadow">
                                        {{ $history->end_at <= $history->task->deadline ? 'Selesai Tepat Waktu' : 'Terlambat' }}
                                    </span>                                    
                                </td>
            
                                <!-- Kolom Bukti Selesai -->
                                <td class="px-6 py-4 border-b text-sm text-gray-700">
                                    @if($history->proof)
                                        <a href="{{ asset('storage/' . $history->proof) }}" target="_blank">
                                            <img src="{{ asset('storage/' . $history->proof) }}" alt="Bukti Selesai" class="w-24 h-24 object-cover rounded">
                                        </a>
                                    @else
                                        <span class="text-gray-500">Tidak Ada Lampiran</span>
                                    @endif
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-4 text-center text-gray-500">No history available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>            
        </div>
        <x-footerdashboard />
    </main>

    <x-modalsubtaskhistory />
@endsection