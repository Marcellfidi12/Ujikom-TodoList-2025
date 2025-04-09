<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Menampilkan dashboard dengan summary data.
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        // Tanggal hari ini
        $currentDate = Carbon::now();
        $sevenDaysLater = $currentDate->copy()->addDays(7);

        // Ambil tasks yang mendekati deadline (7 hari atau kurang)
        $reminders = Task::where('status', false) 
            ->where('user_id', Auth::id())
            ->whereBetween('deadline', [$currentDate, $sevenDaysLater])
            ->orderBy('deadline', 'asc')
            ->take(2)
            ->get();

        // Hitung jumlah tasks
        $completedTasks = Task::where('status', true)->where('user_id', Auth::id())->count(); 
        $pendingTasks = Task::where('status', false)->where('deadline', '>=', $currentDate)->where('user_id', Auth::id())->count(); 
        $overdueTasks = Task::where('status', false)->where('deadline', '<', $currentDate)->where('user_id', Auth::id())->count(); 

        return view('home.dashboard', compact('completedTasks', 'pendingTasks', 'overdueTasks', 'reminders', 'tasks'));
    }

    public function reminder()
    {
        // Tanggal hari ini
        $currentDate = Carbon::now();
        $sevenDaysLater = $currentDate->copy()->addDays(7);

        // Ambil tasks yang mendekati deadline (7 hari atau kurang)
        $reminders = Task::where('status', false)
            ->where('user_id', Auth::id()) 
            ->whereBetween('deadline', [$currentDate, $sevenDaysLater])
            ->get();

        return view('home.reminder', compact('reminders'));
    }
}
