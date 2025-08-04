<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $fillable = ['id_transaksi', 'id_barang', 'harga', 'jumlah'];

    public function produk()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
