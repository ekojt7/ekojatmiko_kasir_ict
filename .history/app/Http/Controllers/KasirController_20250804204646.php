<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class KasirController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('kasir.index', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id.*' => 'required|exists:barangs,id',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        $total_barang = 0;
        $total_harga = 0;

        foreach ($request->barang_id as $index => $id_barang) {
            $barang = Barang::find($id_barang);
            $jumlah = $request->jumlah[$index];
            $harga = $barang->harga;
            $total_barang += $jumlah;
            $total_harga += $jumlah * $harga;
        }

        $transaksi = Transaksi::create([
            'tanggal' => Carbon::now(),
            'total_barang' => $total_barang,
            'total_harga' => $total_harga,
        ]);

        foreach ($request->barang_id as $index => $id_barang) {
            $barang = Barang::find($id_barang);
            $jumlah = $request->jumlah[$index];
            $harga = $barang->harga;

            DetailTransaksi::create([
                'id_transaksi' => $transaksi->id,
                'id_barang' => $id_barang,
                'harga' => $harga,
                'jumlah' => $jumlah,
            ]);
        }

        return redirect()->route('kasir.index')->with('success', 'Transaksi berhasil disimpan!');
    }
}
