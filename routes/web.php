<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\juegoscontroller;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\bladeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('juegos', [juegoscontroller::class, 'index']);
Route::get('juegos', [juegoscontroller::class, 'index'])->name('juegos.index');

Route::get('juego/{id}', [juegoscontroller::class, 'show'])->name('juegos.show');
Route::get('juegos/create', [juegoscontroller::class, 'create']);
Route::post('/juegos', [DashboardController::class, 'store'])->name('juegos.store');
//crear routas para las cateorias 


Route::get('models/all', [ModelController::class, 'all']);

Route::post('/cart/add/{id}', [CartController::class, 'add'])->middleware('auth')->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->middleware('auth')->name('cart.show');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->middleware('auth')->name('cart.remove');



Route::get('juegos/{id}/edit', [DashboardController::class, 'edit'])->name('juegos.edit');
Route::put('juegos/{id}', [DashboardController::class, 'update'])->name('juegos.update');
Route::delete('/juegos/{id}', [DashboardController::class, 'destroy'])->name('juegos.destroy');



Route::post('juegos', [DashboardController::class, 'store'])->name('juegos.store');
Route::delete('juegos/{id}', [juegoscontroller::class, 'destroy'])->name('juegos.destroy');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// falta crear las relaciones belongsto , hasone ,hasmany beltomany

Route::get('/Auth/check', [AuthController::class, 'check'] );
Route::get('/Auth/user', [AuthController::class, 'user'] );
Route::get('/Auth/id', [AuthController::class, 'id'] );
Route::get('/Auth/logout', [AuthController::class, 'logout'] );
Route::get('/Auth/login', [AuthController::class, 'login'] );

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
