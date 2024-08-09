<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemListController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
Route::get('/', function() {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// 認証が必要なルート
Route::middleware(['auth'])->group(function () {
    Route::get('/item_list', [ItemListController::class, 'index'])->name('items.index');
    Route::get('/item_list/search', [ItemListController::class, 'search'])->name('items.search');
});

// 管理者のみアクセス可能
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/item_register', [ItemListController::class, 'create'])->name('items.create');
    Route::post('/item_register', [ItemListController::class, 'store'])->name('items.create');
    Route::get('/item_edit/{id}', [ItemListController::class, 'edit'])->name('items.edit');
    Route::post('/item_edit/{id}', [ItemListController::class, 'update'])->name('items.edit');
    Route::get('/item_delete/{id}', [ItemListController::class, 'delete'])->name('items.delete');
});
