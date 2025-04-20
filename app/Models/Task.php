<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    // protected $fillable = ['user_id', 'name', 'description', 'status', 'priority', 'deadline'];
    // //                          ↑ tambahkan 'description' di sini
    protected $fillable = ['user_id','name', 'status', 'priority', 'deadline'];

    // Relasi one-to-many dengan History
    public function histories()
    {
        return $this->hasMany(History::class, 'task_id');
    }

    // Relasi ke Subtask
    public function subtasks()
    {
        return $this->hasMany(Subtask::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

