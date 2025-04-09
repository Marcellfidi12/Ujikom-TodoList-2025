<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\TaskReminderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\User;

class SendTaskReminders extends Command
{
    protected $signature = 'tasks:send-reminders'; // Perintah untuk dijalankan di scheduler
    protected $description = 'Kirim email pengingat tugas kepada pengguna setiap hari';

    public function handle()
    {
        $currentDate = Carbon::now();
        $sevenDaysLater = $currentDate->copy()->addDays(7);

        // Ambil semua pengguna
        $users = User::all();

        foreach ($users as $user) {
            $reminders = Task::where('status', false)
                ->where('user_id', $user->id)
                ->whereBetween('deadline', [$currentDate, $sevenDaysLater])
                ->orderBy('deadline', 'asc')
                ->take(2)
                ->get();

            if ($reminders->count() > 0) {
                Mail::to($user->email)->send(new TaskReminderMail($reminders));
            }
        }

        $this->info('Email pengingat tugas berhasil dikirim.');
    }
}
