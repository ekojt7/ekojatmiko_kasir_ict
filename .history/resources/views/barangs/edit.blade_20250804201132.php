@extends('layout')

@section('content')
<h2>Edit Barang</h2>
<form action="{{ route('barangs.update', $barang->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Kode Barang: <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}"></label><br>
    <label>Nama Barang: <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}"></label><br>
    <label>Harga: <input type="number" name="harga" value="{{ old('harga', $barang->harga) }}"></label><br>
    <button type="submit">Update</button>
</form>
<a href="{{ route('barangs.index') }}">Kembali</a>
@endsection
