<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    public $timestamps = false; // Nonaktifkan timestamp otomatis

    protected $table = 'history'; // Sesuaikan dengan nama tabel di database

    protected $fillable = ['task_id', 'end_at', 'proof'];

    // Relasi ke Task
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
