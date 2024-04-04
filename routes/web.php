<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RichiestaController;
use App\Http\Controllers\ProvinciasController;
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

Route::get('/', [RichiestaController::class, 'create'])->name('welcome');
Route::post('/store', [RichiestaController::class, 'store'])->name('store');
Route::get('/', [ProvinciasController::class, 'index'])->name('index'); // Cambiato il percorso
Route::get('/comuni', [ProvinciasController::class, 'getByProvince'])->name('comuni.getByProvince');

Route::middleware(['auth', 'verified'])->group(function () { // Gruppo middleware per le route protette
    
    Route::get('/dashboard', [RichiestaController::class, 'index'])->name('dashboard'); // Spostato all'interno del gruppo middleware
    Route::get('/dashboard/{id}', [RichiestaController::class, 'show'])->name('richieste.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';

