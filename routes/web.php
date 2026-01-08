<?php

use App\Http\Controllers\BookController as ControllersBookController;
use App\Http\Controllers\DashboardController as ControllersDashboardController;
use App\Http\Controllers\LoanController as ControllersLoanController;
use App\Http\Controllers\ProfileController;
use App\Models\Controllers\DashboardController;
use App\Models\Controllers\BookController;
use App\Models\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [ControllersDashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/books', [ControllersBookController::class, 'index'])
        ->name('books.index');

    Route::get('/books/{book}', [ControllersBookController::class, 'show'])
        ->name('books.show');

    Route::post('/loans', [ControllersLoanController::class, 'store'])
        ->name('loans.store');

    Route::get('/loans', [ControllersLoanController::class, 'index'])
        ->name('loans.index');

    Route::post('/loans/{id}/return', [ControllersLoanController::class, 'returnBook'])
        ->name('loans.return');
});
