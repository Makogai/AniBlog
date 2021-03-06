<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnimeController;


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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/add', [AnimeController::class, 'create'])->name('add');
Route::get('/add', function () {
    return view('add');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/anime/{anime:slug}',[App\Http\Controllers\AnimeController::class, 'show'])->name('anime.show');
Route::get('/command', function () {
	
	/* php artisan migrate */
    \Artisan::call('migrate:fresh --force');
    dd("Done");
});