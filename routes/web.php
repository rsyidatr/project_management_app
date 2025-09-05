<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;
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

Route::get('/', function () {
    return redirect()->route('notes.index');
});

Route::get('/tailwind-test', function () {
    return view('tailwind-test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Notes routes
    Route::resource('notes', NoteController::class);
    Route::post('/notes/{note}/favorite', [NoteController::class, 'toggleFavorite'])->name('notes.favorite');
    Route::patch('/notes/{note}/archive', [NoteController::class, 'archive'])->name('notes.archive');
});

require __DIR__.'/auth.php';
