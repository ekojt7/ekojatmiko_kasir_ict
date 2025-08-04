<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::orderBy('tanggal', 'desc')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('details.produk')->findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }
}
