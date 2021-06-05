<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/usuarios', [\App\Http\Controllers\UsersController::class, 'index'])->name('users.index');

Route::get('/usuarios/crear', [\App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
Route::post('/usuarios/', [\App\Http\Controllers\UsersController::class, 'store'])->name('users.store');

Route::get('/usuarios/{user}/editar', [\App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
Route::put('/usuarios/{user}', [\App\Http\Controllers\UsersController::class, 'update'])->name('users.update');


Route::get('/habitaciones', [\App\Http\Controllers\RoomsController::class, 'index'])->name('rooms.index');
