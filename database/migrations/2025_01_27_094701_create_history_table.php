<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history', function (Blueprint $table) {
            $table->id(); // ID auto increment
            $table->foreignId('task_id') // Foreign key dari tabel tasks
                ->constrained('tasks')
                ->onDelete('cascade');
            $table->timestamp('end_at')->nullable(); // Waktu saat tugas selesai
            $table->string('proof')->nullable(); // Kolom untuk menyimpan path bukti
        });
    }

    /**
     * Balikkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history');
    }
}
