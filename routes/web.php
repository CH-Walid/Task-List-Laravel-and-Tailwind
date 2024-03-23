<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authentify']);
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

Route::middleware(['auth'])->group(function() {
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

  Route::get('/', function() {
    return redirect()->route('tasks.index');
  });
  
  Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
  Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
  
  Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
  Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
  Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
  Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
  
  Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
  Route::get('/tasks/{task}/confirm', [AuthController::class, 'confirm'])->name('auth.delete-confirm');
  Route::put('/tasks/{task}/toggle-complete', [TaskController::class, 'toggle_complete'])->name('tasks.toggle-complete');
});
