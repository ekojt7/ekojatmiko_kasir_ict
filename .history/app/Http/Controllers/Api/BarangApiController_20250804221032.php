<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Validation\ValidationException;

class BarangApiController extends Controller
{

    //List Semua Barang via API
    public function index()
    {
        $barangs = Barang::all();
        return response()->json([
            'status' => 'success',
            'data' => $barangs
        ]);
    }

    // Tambah Barang via API
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang|max:20',
            'nama_barang' => 'required|string|max:100',
            'harga' => 'required|integer|min:0',
        ]);

        $barang = Barang::create($validated);

        return response()->json([
            'message' => 'Barang berhasil ditambahkan',
            'data' => $barang
        ], 201);
    }

    // Cek Data Barang via API by ID
    public function show($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return response()->json([
                'message' => 'Barang tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'data' => $barang
        ], 200);
    }
}
