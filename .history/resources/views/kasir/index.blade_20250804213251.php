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
    const selectedId = document.querySelector('.item-row:last-child select').value;
    const jumlahBaru = parseInt(document.querySelector('.item-row:last-child input').value);

    if (!selectedId || isNaN(jumlahBaru) || jumlahBaru <= 0) {
        alert("Pilih barang dan isi jumlah terlebih dahulu.");
        return;
    }

    const allSelects = document.querySelectorAll('.barang-select');
    let isDuplicate = false;

    allSelects.forEach((select, index) => {
        if (index < allSelects.length - 1 && select.value === selectedId) {
            const jumlahInput = document.querySelectorAll('.jumlah-input')[index];
            jumlahInput.value = parseInt(jumlahInput.value) + jumlahBaru;

            // Reset baris terakhir
            document.querySelector('.item-row:last-child select').value = '';
            document.querySelector('.item-row:last-child input').value = '';
            isDuplicate = true;
        }
    });

    if (!isDuplicate) {
        const itemList = document.getElementById('item-list');
        const newRow = document.querySelector('.item-row').cloneNode(true);
        newRow.querySelector('select').value = '';
        newRow.querySelector('input').value = '';
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
