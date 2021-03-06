<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TextController;

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

Route::get('/samples/index', [SampleController::class, 'index'])->name('samples.index');
Route::get('samples/create', [SampleController::class, 'create'])->name('samples.create');
Route::post('samples/store', [SampleController::class, 'store'])->name('samples.store');

// 課題用
Route::get('text/index', [TextController::class, 'index'])->name('text.index');
Route::get('text/create', [TextController::class, 'create'])->name('text.create');
Route::post('text/store', [TextController::class, 'store'])->name('text.store');

// サンプル用
Route::resource('photos', PhotoController::class);
