<?php

use App\Http\Controllers\ProfileController;
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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Valentine theme question page
Route::get('/valentine-question', function () {
    return view('themes.valentine');
})->name('valentine.question.create');
Route::post('/questions', function () {
    // This is a placeholder. You should use a controller for real logic.
    return redirect()->route('valentine.question.create')->with('success', 'Question sent!');
})->name('questions.store');

// Static Valentine show page
Route::get('/valentine-show', function () {
    return view('themes.valentine_show');
})->name('valentine.show');
// Static Valentine show page
Route::get('/valentine-show', function () {
    return view('themes.valentine_show');
})->name('valentine.show');
require __DIR__.'/auth.php';
