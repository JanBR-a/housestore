<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Models\Reservation;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/property/add', [PropertyController::class, 'create'])->name('add-property');
Route::post('/property/add', [PropertyController::class, 'store'])->name('store-property');
Route::get('/property/{id}', [PropertyController::class, 'index']);
Route::get('/property/{id}/reservation', [PropertyController::class, 'reservation']);
Route::delete('/property/{id}/delete', [PropertyController::class, 'delete']);
Route::post('/property/{id}/comment', [PropertyController::class, 'addComment'])->name('property.addComment');

Route::get('/reservation/{id}', [Reservation::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
