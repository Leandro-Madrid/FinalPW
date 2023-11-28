<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BackofficeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::middleware('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


///////////////////////////////////////////////////

Route::get('/', [ProductController::class, 'index'])->name('web.index');
Route::get('product/{id}', [ProductController::class, 'show'])->name('web.show')->middleware('auth');

Route::get('/adm', [BackofficeController::class, 'index'])->name('backoffice.index');
Route::get('adm/create', [BackofficeController::class, 'create'])->name('backoffice.create');
Route::post('adm/store', [BackofficeController::class, 'store'])->name('backoffice.store');
Route::get('adm/{id}/edit', [BackofficeController::class, 'edit'])->name('backoffice.edit');
Route::put('adm/{id}/update', [BackofficeController::class, 'update'])->name('backoffice.update');
Route::delete('adm/{id}/delete', [BackofficeController::class, 'destroy'])->name('backoffice.destroy');