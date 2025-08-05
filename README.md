# EkoJatmiko_Kasir_ICT

Aplikasi Point of Sales (POS) sederhana berbasis Laravel. Aplikasi ini mencakup fitur untuk melakukan transaksi penjualan, mengelola daftar barang, serta menyediakan API untuk integrasi eksternal.

## 📦 Fitur Utama

### Web (GUI)
1. **Modul Kasir**  
   - Tambah transaksi baru.
   - Tambah beberapa barang ke transaksi.
   - Jika barang sudah ada, jumlah otomatis ditambah.
   - Menampilkan total barang dan total harga.
   
2. **Modul Daftar Barang**  
   - Tampilkan semua barang.
   - Tambah barang baru.
   - Validasi input (kode unik, nama, dan harga tidak kosong).

3. **Modul Daftar Transaksi**  
   - Tampilkan riwayat transaksi.
   - Detail transaksi menampilkan item dan total harga.

### API
Semua endpoint menggunakan format JSON.

#### ➕ Tambah Barang
**Endpoint:**  
`POST /api/barang/tambah`

**Contoh Input Body (JSON):**
```json
{
  "kode_barang": "M0008",
  "nama_barang": "Mouse Wireless",
  "harga": 55000
}
```

#### Cek Barang Berdasarkan ID
**Endpoint:**  
`GET /api/barang/1

**Contoh Respon Sukses(JSON):**
```json
{
    "data": {
        "id": 1,
        "kode_barang": "L00001",
        "nama_barang": "Lenovo ThinkPad T410",
        "harga": 2500000,
        "created_at": "2025-08-04T13:18:31.000000Z",
        "updated_at": "2025-08-04T13:18:31.000000Z"
    }
}
```
