<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'nama_barang' => 'required|string',
            'harga' => 'required|integer|min:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $barang = Barang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
        ]);

        return response()->json([
            'success' => true,
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
