@extends('layout')

@section('content')
<h2>Transaksi Kasir</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('kasir.store') }}">
    @csrf

    <div class="row mb-3">
        <div class="col-md-6">
            <label for="select-barang">Pilih Barang</label>
            <select id="select-barang" class="form-control">
                <option value="">-- Pilih Barang --</option>
                @foreach($barangs as $barang)
                    <option value="{{ $barang->id }}" data-nama="{{ $barang->nama_barang }}" data-kode="{{ $barang->kode_barang }}">
                        {{ $barang->kode_barang }} - {{ $barang->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" class="form-control" min="1" placeholder="Jumlah">
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="button" class="btn btn-secondary" id="btn-tambah">+ Tambah Barang</button>
        </div>
    </div>

    <table class="table table-bordered" id="tabel-transaksi">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Detail barang akan ditambahkan di sini -->
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
</form>

<script>
document.getElementById('btn-tambah').addEventListener('click', function () {
    const select = document.getElementById('select-barang');
    const jumlahInput = document.getElementById('jumlah');
    const barangId = select.value;
    const jumlah = parseInt(jumlahInput.value);

    if (!barangId || isNaN(jumlah) || jumlah <= 0) {
        alert('Pilih barang dan masukkan jumlah.');
        return;
    }

    const nama = select.options[select.selectedIndex].getAttribute('data-nama');
    const kode = select.options[select.selectedIndex].getAttribute('data-kode');

    // Cek apakah barang sudah ada di tabel
    const existingRow = document.querySelector(`#tabel-transaksi tbody tr[data-id='${barangId}']`);
    if (existingRow) {
        const existingJumlahInput = existingRow.querySelector('.jumlah-input');
        existingJumlahInput.value = parseInt(existingJumlahInput.value) + jumlah;
    } else {
        const row = document.createElement('tr');
        row.setAttribute('data-id', barangId);
        row.innerHTML = `
            <td>${kode}<input type="hidden" name="barang_id[]" value="${barangId}"></td>
            <td>${nama}</td>
            <td><input type="number" name="jumlah[]" class="form-control jumlah-input" value="${jumlah}" min="1" required></td>
            <td><button type="button" class="btn btn-danger btn-sm btn-hapus">Hapus</button></td>
        `;
        document.querySelector('#tabel-transaksi tbody').appendChild(row);
    }

    // Reset input
    select.value = '';
    jumlahInput.value = '';
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('btn-hapus')) {
        e.target.closest('tr').remove();
    }
});
</script>
@endsection
