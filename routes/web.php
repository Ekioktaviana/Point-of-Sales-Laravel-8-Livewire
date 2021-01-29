<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Product;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Report;
use App\Http\Livewire\ReportTransaction;
use App\Http\Livewire\ReportProduct;

use App\Http\Controllers\ReporttransactionController;

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

Route::get('/export', [ReporttransactionController::class, 'export'])->name('export');
Route::get('/exportProduct', [ReportProduct::class, 'export'])->name('exportProduct');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/products', Product::class)->name('product');
    Route::get('/carts', Cart::class);
    Route::get('/report', Report::class);
    Route::get('/reportProduct', ReportProduct::class);
    Route::get('/reportTransaction', ReportTransaction::class);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/laporanTransaksi', [ReporttransactionController::class, 'laporan'] );
    Route::get('/detailLaporan/{id}',[ReporttransactionController::class, 'laporanTransaksi'])->name('detailLaporan');
});

