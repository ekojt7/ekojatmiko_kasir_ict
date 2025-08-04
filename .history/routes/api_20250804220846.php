<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BarangApiController;

Route::post('/barang/tambah', [BarangApiController::class, 'store']);
Route::get('/barang/{id}', [BarangApiController::class, 'show']);
