<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeaturedPostsController;
use App\Models\FeaturedPosts;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [App\Http\Controllers\HomeController::class, 'post'])->name('post');




Route::group(['middleware' => ['auth'], 'prefix' => 'admin/'], function () {
    //dashboard
    Route::get('dashboard', [AdminController::class, 'index'])->name("admin/dashboard");

    //User routes
    Route::get('user', [UserController::class, 'index'])->name("admin/user");
    Route::get('users', [UserController::class, 'users'])->name("admin/users");
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


    //PosCategoryRelation
    Route::get('/posts-categories-relations', [PostsCategoriesRelationController::class,'index'])->name('admin/posts-categories-relations');
    Route::get('/posts-categories-relations/deleted', [PostsCategoriesRelationController::class,'deleted'])->name('admin/posts-categories-relations/deleted');
    Route::get('/posts-categories-relations/{id}', [PostsCategoriesRelationController::class,'getOne'])->name('admin/posts-categories-relations/fetch');
    Route::delete('/posts-categories-relations/delete/{id}', [PostsCategoriesRelationController::class,'destroy'])->name('admin/posts-categories-relations/delete');
    Route::put('/posts-categories-relations/restore/{id}', [PostsCategoriesRelationController::class,'restore'])->name('admin/posts-categories-relations/restore');
    Route::post('/posts-categories-relations/store', [PostsCategoriesRelationController::class,'store'])->name('admin/posts-categories-relations/store');
    Route::post('/posts-categories-relations/{object}/edit', [PostsCategoriesRelationController::class,'edit'])->name('admin/posts-categories-relations/edit');

    //PosCategoryRelation
    Route::get('/featured', [FeaturedPostsController::class,'index'])->name('admin/featured');
    Route::get('/posts-featured/{id}', [FeaturedPostsController::class,'getOne'])->name('admin/posts-featured/fetch');
    Route::delete('/posts-featured/delete/{id}', [FeaturedPostsController::class,'destroy'])->name('admin/posts-featured/delete');
    Route::post('/posts-featured/store', [FeaturedPostsController::class,'store'])->name('admin/posts-featured/store');
    Route::post('/posts-featured/{object}/edit', [FeaturedPostsController::class,'edit'])->name('admin/posts-featured/edit');



});
