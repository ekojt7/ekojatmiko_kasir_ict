@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Transaksi</h2>
    <p><strong>Tanggal:</strong> {{ $transaksi->tanggal }}</p>
    <p><strong>Total Barang:</strong> {{ $transaksi->total_barang }}</p>
    <p><strong>Total Harga:</strong> Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>

    <h4 class="mt-4">Rincian Produk</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->details as $detail)
            <tr>
                <td>{{ $detail->produk->nama }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>Rp{{ number_format($detail->harga_satuan, 0, ',', '.') }}</td>
                <td>Rp{{ number_format($detail->subtotal, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
