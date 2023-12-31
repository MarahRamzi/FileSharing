<?php

use App\Http\Controllers\FileController;
use GuzzleHttp\Middleware;
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

Route::get('/', function () {
    return view('welcome')->name('welcome');
});


Route::get('files/create', [FileController::class , 'create'])->name('files.create');
Route::post('files/{file}', [FileController::class , 'store'])->name('files.store');
Route::get('files/{file}/download',[FileController::class , 'downloadFile'])->name('files.download')->middleware('signed');
;