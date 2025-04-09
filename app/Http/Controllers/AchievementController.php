<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\History;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AchievementController extends Controller
{
    public function generatePDF()
    {
        // Ambil hanya history yang berasal dari task yang dibuat oleh user yang sedang login
        $histories = History::whereHas('task', function ($query) {
            $query->where('user_id', Auth::id());
        })->with(['task.user'])->get();

        // Menghitung total tugas selesai dari task yang dibuat oleh user yang sedang login
        $totalTasks = $histories->count();

        // Menghitung tugas terlambat berdasarkan deadline dari task yang dibuat user
        $totalLate = $histories->filter(function ($history) {
            return $history->end_at > $history->task->deadline;
        })->count();

        // Menghitung tugas yang selesai tepat waktu
        $totalOnTime = $totalTasks - $totalLate;

        // Menghitung jumlah tugas yang diselesaikan oleh setiap user hanya dari task yang dibuat oleh user login
        $userRankings = History::join('tasks', 'history.task_id', '=', 'tasks.id')
            ->join('users', 'tasks.user_id', '=', 'users.id')
            ->selectRaw('users.id as user_id, users.name as user_name, COUNT(history.id) as total_completed')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_completed')
            ->get();

        // Menambahkan peringkat berdasarkan urutan jumlah tugas yang diselesaikan
        $rank = 1;
        foreach ($userRankings as $rankedUser) {
            $rankedUser->rank = $rank++;
        }

        $data = [
            'histories' => $histories,
            'totalTasks' => $totalTasks,
            'totalLate' => $totalLate,
            'totalOnTime' => $totalOnTime,
            'userRankings' => $userRankings,
        ];

        // Generate PDF dengan blade view 'pdf.achievement'
        $pdf = Pdf::loadView('pdf.achievement', $data);
        return $pdf->download('achievement.pdf');
    }
}
