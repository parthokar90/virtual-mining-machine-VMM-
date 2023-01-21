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

Auth::routes();

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::resource('/vmm',App\Http\Controllers\admin\VirtualMachineController::class);
});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
|
*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/machine/details/{id}',[App\Http\Controllers\HomeController::class, 'machineDetails'])->name('machine_details');
    Route::post('/machine/invest/{id}',[App\Http\Controllers\HomeController::class, 'userInvest'])->name('machine_invest');
    Route::get('/machine/invest/history',[App\Http\Controllers\HomeController::class, 'investHistory'])->name('invest_history');
});

