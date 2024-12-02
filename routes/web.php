<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\CheckAuth;
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

Route::get('/', [PostController::class, 'index'])->name('index');
//danh sách
Route::get('/posts', [PostController::class, 'list'])->name('list');
//chi tiết
Route::get('/detail/{id}', [PostController::class, 'show'])->name('detail');
//sp theo danh mục
Route::get('/about/{id}', [PostController::class, 'about'])->name('about');
//tim kiem
Route::get('/search', [PostController::class, 'search'])->name('search');
//loc sp
Route::get('/filter', [PostController::class, 'index'])->name('filter');
//gio hang
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/place-order', [CartController::class, 'placeOrderSession'])->name('cart.placeOrderSession');
Route::get('/orders', [CartController::class, 'showOrders'])->name('orders.show');
Route::get('/orders/{id}', [CartController::class, 'showOrderDetails'])->name('orders.details');
//don hang
Route::post('/cart/place-order-session', [CartController::class, 'placeOrderSession'])->name('cart.placeOrderSession');
Route::get('/orders', [CartController::class, 'showOrders'])->name('orders.show');
Route::get('/orders/{id}', [CartController::class, 'showOrderDetails'])->name('orders.details');

//admin
Route::middleware(['auth', CheckAuth::class])->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('admin.home');
    Route::get('/cate/list', [CategoryController::class, 'listCate'])->name('cate.list');
    Route::get('/cate/create', [CategoryController::class, 'create'])->name('cate.create');
    Route::post('/cate/create', [CategoryController::class, 'store'])->name('cate.store');
    Route::delete('/cate/delete/{id}', [CategoryController::class, 'destroy'])->name('cate.destroy');
    Route::get('/cate/edit/{id}', [CategoryController::class, 'edit'])->name('cate.edit');
    Route::put('/cate/edit/{id}', [CategoryController::class, 'update'])->name('cate.update');
    //post
    Route::get('/posts/list', [AdminPostController::class, 'listPost'])->name('posts.list');
    Route::get('/posts/create', [AdminPostController::class, 'create'])->name('posts.create');
    Route::post('/posts/create', [AdminPostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/delete/{id}', [AdminPostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/edit/{id}', [AdminPostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/edit/{id}', [AdminPostController::class, 'update'])->name('posts.update');
    Route::get('/posts/detail/{id}', [AdminPostController::class, 'detail'])->name('posts.detail');
    //user
    Route::get('/users/list', [UserController::class, 'listCate'])->name('users.list');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');
});


Route::get('/changePass', [UserController::class, 'formChange'])->name('formChange');
Route::put('/changePass', [UserController::class, 'updatePassword'])->name('updatePassword');

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'postLogin']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
