<?php

use App\Http\Controllers\contactanosController;
use App\Http\Controllers\tareaController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('tareas',tareaController::class)->middleware('auth');
Route::post('contactanos',[contactanosController::class,'store'])->name('contactanos.store')->middleware('auth');
Route::get('contactanos',[contactanosController::class,'index'])->name('contactanos.index')->middleware('auth');
Route::put('finalizar ${tarea}',[tareaController::class,'finalizar'])->name('finalizar')->middleware('auth');
require __DIR__.'/auth.php';
