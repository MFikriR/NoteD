<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\CalenderNoteController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

// Rute Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

// Rute Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

// Rute Login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Rute Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout')->middleware('auth');

// Rute Dashboard dan Note (dengan middleware auth)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
});

// Rute khusus admin untuk Data Pengguna
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/data-pengguna', [DashboardController::class, 'showDataPengguna'])->name('dashboard.showDataPengguna');
});

Route::get('/calender', function () {
    return view('calender');
})->name('calender');

Route::get('/calender/notes', [CalenderNoteController::class, 'index']);
Route::post('/calender/notes', [CalenderNoteController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});


Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::get('/settings/change-background', [SettingController::class, 'changeBackground'])->name('settings.changeBackground');
Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
Route::delete('/settings/{id}', [SettingController::class, 'destroy'])->name('settings.destroy');
Route::get('/settings/{id}/edit', [SettingController::class, 'edit'])->name('settings.edit');
Route::put('/settings/{id}', [SettingController::class, 'update'])->name('settings.update');
Route::get('/settings/brightness', [SettingController::class, 'brightness'])->name('settings.brightness');