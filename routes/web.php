<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin/'], function () {
    //dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name("admin/dashboard");

    //User routes
    Route::get('user', [UserController::class, 'index'])->name("admin/user");
    Route::post('user/{object}/edit', [UserController::class, 'edit'])->name("user/edit");
    Route::post('user/store', [UserController::class, 'store'])->name("user/store");
    Route::get('user/{id}', [UserController::class, 'getOne'])->name("admin/user/fetch");
    Route::post('user/updateImage/{id}', [UserController::class, 'updateImage'])->name('admin/user/updateImage');

    //Post routes
    Route::get('posts', [PostController::class, 'index'])->name('admin/posts');
    Route::post('posts/{object}/edit', [PostController::class, 'edit'])->name('admin/posts/edit');
    Route::post('posts/store', [PostController::class, 'store'])->name('admin/posts/store');
    Route::get('posts/deleted/', [PostController::class, 'deleted'])->name('admin/posts/deleted');
    Route::get('posts/{id}', [PostController::class, 'getOne'])->name('admin/posts/fetch');
    Route::put('posts/restore/{id}', [PostController::class, 'restore'])->name('admin/posts/restore');
    Route::delete('posts/delete/{id}', [PostController::class, 'delete'])->name('admin/posts/delete');

    //Category routes
    Route::get('category', [CategoryController::class, 'index'])->name('admin/category');
    Route::post('category/{object}/edit', [CategoryController::class, 'edit'])->name('admin/category/edit');
    Route::post('category/store', [CategoryController::class, 'store'])->name('admin/category/store');
    Route::get('category/deleted', [CategoryController::class, 'deleted'])->name('admin/category/deleted');
    Route::get('category/{id}', [CategoryController::class, 'getOne'])->name('admin/category/fetch');
    Route::delete('category/delete/{id}', [CategoryController::class, 'delete'])->name('admin/category/delete');
    Route::put('category/restore/{id}', [CategoryController::class, 'restore'])->name('admin/category/restore');


});
