@extends('layout')

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
                <th class="text-end">Jumlah</th>
                <th class="text-end">Harga Satuan</th>
                <th class="text-end">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi->details as $detail)
            <tr>
                <td>{{ $detail->produk->nama_barang }}</td>
                <td class="text-end">{{ $detail->jumlah }}</td>
                <td class="text-end">Rp{{ number_format($detail->harga, 0, ',', '.') }}</td>
                <td class="text-end">Rp{{ number_format($detail->harga * $detail->jumlah , 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="text-end">Total</th>
                <th class="text-end">{{ $transaksi->total_barang }}</th>
                <th></th>
                <th class="text-end">Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>

    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
