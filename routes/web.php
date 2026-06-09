<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
Route::get('/tasks/create', [TaskController::class, 'create'])->middleware('auth');
Route::get('/api/tasks', [TaskController::class, 'apiIndex']);
Route::post('/api/tasks', [TaskController::class, 'apiStore'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::put('/api/tasks/{task}', [TaskController::class, 'apiUpdate'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::delete('/api/tasks/{task}', [TaskController::class, 'apiDestroy'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/api/tasks/{task}', [TaskController::class, 'apiShow']);
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->middleware('auth');

Route::put('/tasks/{task}', [TaskController::class, 'update'])->middleware('auth');

Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->middleware('auth');
Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth');
Route::get('/tasks', [TaskController::class, 'index'])
    ->middleware('auth');

Route::redirect('/', '/login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
