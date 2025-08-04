@extends('layout')

@section('content')
<h2>Tambah Barang</h2>

<form action="{{ route('barangs.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="kode_barang" class="form-label">Kode Barang</label>
        <input type="text" class="form-control" name="kode_barang" value="{{ old('kode_barang') }}">
    </div>
    <div class="mb-3">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" value="{{ old('nama_barang') }}">
    </div>
    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" value="{{ old('harga') }}">
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
