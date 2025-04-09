<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // Menampilkan daftar tugas
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('home.task', compact('tasks'));
    }

    // TaskController.php
    public function show($id)
    {
        $task = Task::with('subtasks')->findOrFail($id);
        return response()->json($task);
    }

    // Menambahkan tugas baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|in:high,medium,normal',
            'deadline' => 'required|date',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'priority' => $request->priority,
            'deadline' => $request->deadline,
            'status' => false,
        ]);

        return redirect()->back()->with('success', 'Tugas berhasil ditambahkan!');
    }

    // Mengubah status tugas (selesai/belum selesai)
    public function updateStatus(Request $request, Task $task)
    {
        // Hanya validasi jika ingin menyelesaikan tugas(opsional)
        if (!$task->status) {
            $request->validate([
                'proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);
    
            // Menyimpan file hanya jika ada file yang diunggah
            if ($request->hasFile('proof')) {
                $path = $request->file('proof')->store('proofs', 'public'); // Simpan di storage
            }
        }
    
        $task->status = !$task->status;
        $task->save();
    
        // Jika status selesai, simpan history dan proof(jika ada)
        if ($task->status) {
            $existingHistory = History::where('task_id', $task->id)->first();
    
            // Jika history belum ada, buat yang baru
            if (!$existingHistory) {
                // Menyimpan history dengan proof jika ada
                History::create([
                    'task_id' => $task->id,
                    'end_at' => Carbon::now(),
                    'proof' => $path ?? null,
                ]);
            }
        }
    
        return redirect()->back()->with('success', 'Status tugas diperbarui!');
    }
    
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back()->with('success', 'Tugas berhasil dihapus!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('home.ubahtugas', compact('task'));
    }

    // Memperbarui data tugas
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'status' => 'required|boolean',
            'priority' => 'required|in:high,medium,normal',
            'deadline' => 'required|date',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'name' => $request->name,
            // 'status' => $request->status,
            'priority' => $request->priority,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui!');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $userId = Auth::id();

        // Mencari tugas berdasarkan nama
        $tasks = Task::where('user_id', $userId)
        ->where('name', 'LIKE', "%{$query}%")
        ->orderBy('created_at', 'desc')
        ->get(['id', 'name']);

        return response()->json($tasks);
    }

}
