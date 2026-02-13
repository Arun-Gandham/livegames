<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ValentineController;
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
})->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Valentine answer update (AJAX)
Route::post('/valentine/answer/{id}', [App\Http\Controllers\ValentineController::class, 'answer'])->name('valentine.answer');
Route::get('/valentine/show/{id}', [App\Http\Controllers\ValentineController::class, 'showMessage'])->name('valentine.show');
Route::get('/valentine/show', [App\Http\Controllers\ValentineController::class, 'showMessageDefault'])->name('valentine.show.default');

// User question history page
Route::middleware(['auth'])->get('/history', [App\Http\Controllers\HistoryController::class, 'index'])->name('history');
// Soft delete question
Route::middleware(['auth'])->delete('/questions/{id}', [App\Http\Controllers\QuestionDeleteController::class, 'destroy'])->name('questions.destroy');
Route::middleware(['auth'])->get('/questions/{id}', [App\Http\Controllers\ValentineController::class, 'showMessage'])->name('questions.show');
// Edit Valentine message (only if unanswered)
Route::get('/valentine/edit/{id}', [App\Http\Controllers\ValentineController::class, 'edit'])->name('valentine.edit');
Route::post('/valentine/update/{id}', [App\Http\Controllers\ValentineController::class, 'update'])->name('valentine.update');

// Valentine theme question page
Route::middleware('auth')->post('/valentine-question/create', [ValentineController::class, 'create'])->name('valentine.question.create');
// Custom Valentine message form
Route::middleware('auth')->get('/valentine/custom/create', [App\Http\Controllers\ValentineController::class, 'customForm'])->name('valentine.custom.form');
Route::middleware('auth')->post('/valentine/custom/create', [App\Http\Controllers\ValentineController::class, 'customMessageCreate'])->name('valentine.custom.create');


Route::middleware('auth')->post('/questions', function () {
    // This is a placeholder. You should use a controller for real logic.
    return redirect()->route('valentine.question.create')->with('success', 'Question sent!');
})->name('questions.store');

// Static Valentine show page (handled above with showMessage)
// Route::get('/valentine/{id}',  [ValentineController::class, 'show'])->name('valentine.show');
// Route::get('/history',  [ValentineController::class, 'show'])->name('valentine.show');

// Contact Us page
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Privacy Policy page
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

// My Love Journey page
Route::get('/love-journey', function () {
    return view('love_journey');
})->name('love.journey');

require __DIR__.'/auth.php';
