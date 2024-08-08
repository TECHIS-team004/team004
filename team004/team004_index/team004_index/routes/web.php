<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

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

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* 商品登録画面 */
// 一覧画面の表示
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
// 商品の登録画面の表示
Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
// 商品の登録処理
Route::post('/products/store', [ProductsController::class, 'store'])->name('products.store');
// 商品の詳細
Route::get('/products/show/{id}', [ProductsController::class, 'show'])->name('products.show');
