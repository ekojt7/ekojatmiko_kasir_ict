<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

Route::resource('barangs', BarangController::class);