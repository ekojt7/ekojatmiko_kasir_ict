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
                <select name="barang_id[]" class="form-control barang-select" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->kode_barang }} - {{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="number" name="jumlah[]" class="form-control jumlah-input" placeholder="Jumlah" min="1" required>
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
        const selectedBarangId = prompt("Masukkan ID Barang:");
        const jumlahTambah = parseInt(prompt("Masukkan Jumlah:"), 10);
        if (!selectedBarangId || isNaN(jumlahTambah) || jumlahTambah <= 0) {
            alert("ID Barang atau jumlah tidak valid.");
            return;
        }

        const itemRows = document.querySelectorAll('.item-row');
        let found = false;

        itemRows.forEach(row => {
            const select = row.querySelector('.barang-select');
            const inputJumlah = row.querySelector('.jumlah-input');

            if (select.value === selectedBarangId) {
                // Jika barang sudah ada, tambahkan jumlah
                inputJumlah.value = parseInt(inputJumlah.value || 0) + jumlahTambah;
                found = true;
            }
        });

        if (!found) {
            // Jika belum ada, tambahkan baris baru
            const itemList = document.getElementById('item-list');
            const newRow = document.querySelector('.item-row').cloneNode(true);
            const select = newRow.querySelector('.barang-select');
            const inputJumlah = newRow.querySelector('.jumlah-input');

            // Set nilai ID dan jumlah
            select.value = selectedBarangId;
            inputJumlah.value = jumlahTambah;

            itemList.appendChild(newRow);
        }
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
