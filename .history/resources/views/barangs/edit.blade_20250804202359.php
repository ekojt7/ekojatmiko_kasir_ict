@extends('layout')

@section('content')
<h2>Edit Barang</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('barangs.update', $barang->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="kode_barang" class="form-label">Kode Barang</label>
        <input type="text" class="form-control" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}" required>
    </div>

    <div class="mb-3">
        <label for="nama_barang" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}" required>
    </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" value="{{ old('harga', $barang->harga) }}" min="0" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
