<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\ServiceContainerController;


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


Route::get('/samples/index', [SampleController::class, 'index'])->name('samples.index');
Route::get('samples/create', [SampleController::class, 'create'])->name('samples.create');
Route::post('samples/store', [SampleController::class, 'store'])->name('samples.store');

// 課題用
Route::get('texts/index', [TextController::class, 'index'])->name('texts.index');
Route::get('texts/create', [TextController::class, 'create'])->name('texts.create');
Route::post('texts/store', [TextController::class, 'store'])->name('texts.store');

// サンプル用
Route::resource('photos', PhotoController::class);


// 0511課題
Route::get('texts/{id}', [TextController::class, 'show'])->name('texts.show');
Route::get('texts/{id}/edit', [TextController::class, 'edit'])->name('texts.edit');
Route::post('texts/{id}', [TextController::class, 'update'])->name('texts.update');
Route::post('texts/{id}/delete', [TextController::class, 'delete'])->name('texts.delete');

// 0513課題
Route::middleware(['auth'])->group(function () {
    Route::get('lectures/index', [LectureController::class, 'index'])->name('lectures.index');
    Route::post('lectures/index', [LectureController::class, 'store'])->name('lectures.store');
    Route::get('lectures/edit', [LectureController::class, 'edit'])->name('lectures.edit');
});



Route::get('servicecontainertest/index', [ServiceContainerController::class, 'index'])->name('servicecontainer.index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
