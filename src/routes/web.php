<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;

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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [WeightController::class, 'calendar'])->name('user.calendar');
    Route::post('/', [WeightController::class, 'register'])->name('user.calendar.register');
});