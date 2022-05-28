<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StampController;
use App\Http\Controllers\DateController;

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
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/stamp', [StampController::class, 'index'])->name('stamp.index');
Route::post('/attendance_start', [StampController::class, 'attendance_start'])->name('stamp.attendance_start');
Route::post('/attendance_end', [StampController::class, 'attendance_end'])->name('stamp.attendance_end');
Route::post('/rest_start', [StampController::class, 'rest_start'])->name('stamp.rest_start');
Route::post('/rest_end', [StampController::class, 'rest_end'])->name('stamp.rest_end');

Route::get('/date', [DateController::class, 'index'])->name('date.index');
