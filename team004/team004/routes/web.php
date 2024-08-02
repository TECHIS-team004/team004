<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemListController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

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


Route::get('/home', function () {
    return view('home');
});

Route::get('/logout', function () {
    // ログアウト処理をここに追加
    return redirect('/');
});

// ログイン関連のルート
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 認証が必要なルート
    Route::middleware(['auth'])->group(function () {
    Route::get('/item_list', [ItemListController::class, 'index'])->name('items.index');
    Route::get('/item_list/search', [ItemListController::class, 'search'])->name('items.search');
    });

// 管理者のみアクセス可能
    Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/item_register', [ItemListController::class, 'create'])->name('items.create');
    Route::get('/item_edit/{id}', [ItemListController::class, 'edit'])->name('items.edit');
    });
