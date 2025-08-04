@extends('layout')

@section('content')
<h2>Transaksi Kasir</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('kasir.store') }}">
    @csrf
    <div id="item-list">
        <div class="row mb-2 item-row">
            <div class="col-md-5">
                <select name="barang_id[]" class="form-control" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->kode_barang }} - {{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" min="1" required>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-item">Hapus</button>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-secondary mb-3" id="tambah-item">+ Tambah Barang</button>
    <br>
    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
</form>

<script>
    document.getElementById('tambah-item').addEventListener('click', function () {
        let itemList = document.getElementById('item-list');
        let newRow = document.querySelector('.item-row').cloneNode(true);
        newRow.querySelectorAll('input, select').forEach(el => el.value = '');
        itemList.appendChild(newRow);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-item')) {
            const rows = document.querySelectorAll('.item-row');
            if (rows.length > 1) {
                e.target.closest('.item-row').remove();
            }
        }
    });
</script>
@endsection
