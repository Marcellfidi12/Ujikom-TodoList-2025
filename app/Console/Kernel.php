<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Tentukan jadwal perintah Artisan.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('tasks:send-reminders')->everyMinute()->withoutOverlapping();
    }

    /**
     * Daftarkan command di console.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
