<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // ID auto increment
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->boolean('status')->default(false); // Status (0: belum selesai, 1: selesai)
            $table->enum('priority', ['high', 'medium', 'normal'])->default('normal'); // Ubah tipe menjadi ENUM
            $table->date('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
