@extends('layout')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Daftar Barang</h2>
    <a href="{{ route('barangs.create') }}" class="btn btn-primary">Tambah Barang</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th style="width: 120px;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $barang)
        <tr>
            <td>{{ $barang->kode_barang }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ number_format($barang->harga) }}</td>
            <td>
                <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
