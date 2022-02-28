<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProfileController;
// use App\Http\Controllers\DashboardPostController;


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

Route::get('/', [PostController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'show']);
Route::get('/posts/{post:slug}',[PostController::class, 'show']);

Route::get('/categories/{category:slug}', function(Category $category){
    return view('/', [
        'title' => "Post by Category : $category->name",
        'active' => 'categories',
        'posts' => $category->posts->load('category','author'),

    ]);
});

Route::get('/authors/{author:username}',function(User $author){
    return view('/', [
        'title' => "Post by Author : $author->name",
        'active' =>'posts',
        'posts' => $author->posts->load('category','author'),
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/signup', [SignupController::class, 'index'])->middleware('guest');
Route::post('/signup', [SignupController::class, 'store']);


Route::get('/dashboard/posts',function() {
    return view('dashboard.control_posts.index');
})->middleware('auth');


Route::get('dashboard/posts/checkSlug',[DashboardController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardController::class )
->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');


Route::resource('/dashboard', DashboardProfileController::class )
->middleware('auth');
