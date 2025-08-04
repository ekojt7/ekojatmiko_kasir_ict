@extends('layout')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Transaksi</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Total Barang</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $t)
            <tr>
                <td>{{ $t->tanggal }}</td>
                <td>{{ $t->total_barang }}</td>
                <td>Rp{{ number_format($t->total_harga, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-info btn-sm">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
