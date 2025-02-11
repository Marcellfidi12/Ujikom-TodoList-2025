<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        Task::create([
            'name' => 'Contoh Task',
            'priority' => 'medium',
            'status' => false,
            'deadline' => now()->addDays(3),
        ]);
    }
}
