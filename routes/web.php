<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

// AUTHENTICATION
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/loginPost', [AuthController::class, 'loginPost'])->name('login.post');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/registerPost', [AuthController::class, 'registerPost'])->name('register.post');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// TO DO LIST (protegidas con sesión)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('/show/{id}', [TaskController::class, 'show'])->name('show');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::post('/store', [TaskController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [TaskController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [TaskController::class, 'destroy'])->name('destroy');
    Route::get('/completed-tasks', [TaskController::class, 'showCompletedTasks'])->name('completed.tasks');
    Route::put('/completed/{id}', [TaskController::class, 'completed'])->name('completed');
    Route::put('/no-completed/{id}', [TaskController::class, 'noCompleted'])->name('no.completed');
});


// Route::resource('/', [TaskController::class]);
