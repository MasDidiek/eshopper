<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;


use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hello', function () {
//     return "Hello world";
// });



Route::get('/', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'do_login'])->name('do_login');
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('register_do', [RegisterController::class, 'do_register'])->name('register_do');
Route::get('/success_register', [RegisterController::class, 'success_register']);


Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
Route::post('/addToCart', [CartController::class, 'addToCartPost']);
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CartController::class, 'submitCheckout']);
Route::get('/success_checkout', [CartController::class, 'successCheckout']);
Route::get('/myhistory', [MemberController::class, 'myhistory']);
Route::get('/detail_pembelian/{id}', [MemberController::class, 'detailPembelian']);



Route::get('/product', [ProductController::class, 'index'])->middleware('auth');
Route::get('/product_detail/{id}', [ProductController::class, 'view'])->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth');

Route::get('barang', [BarangController::class, 'index'])->name('barang');
// Route::get('add_barang/{id_category}', [BarangController::class, 'add_category'])->name('home');
// Route::post('save_category', [BarangController::class, 'store'])->name('insert_categori');
