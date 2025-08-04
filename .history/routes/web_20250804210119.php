<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TransaksiController;


Route::resource('barangs', BarangController::class);
Route::get('/kasir', [KasirController::class, 'index'])->name('kasir.index');
Route::post('/kasir', [KasirController::class, 'store'])->name('kasir.store');
Route::get('/transaksis', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksis/{id}', [TransaksiController::class, 'show'])->name('transaksi.show');
