@extends('layout')

@section('content')
<h2>Daftar Barang</h2>
<a href="{{ route('barangs.create') }}">Tambah Barang</a>
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($barangs as $barang)
            <tr>
                <td>{{ $barang->kode_barang }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ number_format($barang->harga) }}</td>
                <td>
                    <a href="{{ route('barangs.edit', $barang->id) }}">Edit</a>
                    <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
