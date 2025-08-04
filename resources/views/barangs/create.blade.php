@extends('layout')

@section('content')
<h2>Tambah Barang</h2>
<form action="{{ route('barangs.store') }}" method="POST">
    @csrf
    <label>Kode Barang: <input type="text" name="kode_barang" value="{{ old('kode_barang') }}"></label><br>
    <label>Nama Barang: <input type="text" name="nama_barang" value="{{ old('nama_barang') }}"></label><br>
    <label>Harga: <input type="number" name="harga" value="{{ old('harga') }}"></label><br>
    <button type="submit">Simpan</button>
</form>
<a href="{{ route('barangs.index') }}">Kembali</a>
@endsection
