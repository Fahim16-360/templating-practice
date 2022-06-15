<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDasboardController;
use App\Http\Controllers\BookController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/dashboard',[AdminDasboardController::class,'index'])->middleware(['auth'])->name('admin.dashboard');
Route::get('/admin/book/create',[BookController::class,'create'])->name('book.create');
Route::post('/admin/book/store',[BookController::class,'store'])->name('book.store');
Route::get('/admin/book/index',[BookController::class,'index'])->name('book.index');
Route::get('/admin/book/edit/{id}',[BookController::class,'edit'])->name('book.edit');
Route::put('/admin/book/update/{id}',[BookController::class,'update'])->name('book.update');
Route::delete('/admin/book/delete/{id}',[BookController::class,'destroy'])->name('book.delete');
Route::get('/test',[\App\Http\Controllers\TestController::class,'relationshipTest']);

require __DIR__.'/auth.php';
