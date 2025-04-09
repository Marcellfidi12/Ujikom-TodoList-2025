<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SubtaskController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/about', function () {
    return view('landingpage.learnmore');
})->name('about');

Route::get('/features', function () {
    return view('landingpage.features');
})->name('features');

Route::get('/changelogs', function () {
    return view('landingpage.changelogs');
})->name('changelogs');

Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/reminder', [DashboardController::class, 'reminder'])->name('reminder');

    Route::get('/history', [HistoryController::class, 'index'])->name('history');

    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::get('/search-tasks', [TaskController::class, 'search'])->name('tasks.search');

    Route::get('/generate-achievement-pdf', [AchievementController::class, 'generatePDF'])->name('generate.achievement.pdf');
    
    Route::patch('/subtasks/{subtask}/status', [SubtaskController::class, 'updateStatus']);
    Route::post('/subtasks', [SubtaskController::class, 'store']);
    Route::delete('/subtasks/{subtask}', [SubtaskController::class, 'destroy']);

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::post('/account/update', [AccountController::class, 'update'])->name('account.update');

});

Route::middleware(['guest'])->group(function(){
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});


