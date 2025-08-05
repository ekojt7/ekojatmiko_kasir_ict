# EkoJatmiko_Kasir_ICT

Aplikasi Point of Sales (POS) sederhana berbasis Laravel 11. Aplikasi ini mencakup fitur untuk melakukan transaksi penjualan, mengelola daftar barang, serta menyediakan API untuk integrasi eksternal.

Database yang sudah ada isi ada di root folder dengan nama : ekojatmiko_kasir.sql

## 📦 Fitur Utama

### Web (GUI)
1. **Modul Kasir**  Contoh cara akses : http://127.0.0.1:8000/kasir
   - Tambah transaksi baru.
   - Tambah beberapa barang ke transaksi.
   - Jika barang sudah ada, jumlah otomatis ditambah.
   - Menampilkan total barang dan total harga.
   
2. **Modul Daftar Barang**  Contoh cara akses : http://127.0.0.1:8000/barangs
   - Tampilkan semua barang.
   - Tambah barang baru.
   - Validasi input (kode unik, nama, dan harga tidak kosong).

3. **Modul Daftar Transaksi**   Contoh cara akses : http://127.0.0.1:8000/transaksis
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
GET /api/barang/1

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

#### Tampilkan Semua List Data Barang
**Endpoint:**  
GET /api/barang

**Contoh Respon Sukses(JSON):**
```json
{
    "status": "success",
    "data": [
        {
            "id": 1,
            "kode_barang": "L00001",
            "nama_barang": "Lenovo ThinkPad T410",
            "harga": 2500000,
            "created_at": "2025-08-04T13:18:31.000000Z",
            "updated_at": "2025-08-04T13:18:31.000000Z"
        },
        {
            "id": 2,
            "kode_barang": "M00001",
            "nama_barang": "Mouse HP Blutooth",
            "harga": 82000,
            "created_at": "2025-08-04T13:19:06.000000Z",
            "updated_at": "2025-08-04T13:19:18.000000Z"
        },
        {
            "id": 4,
            "kode_barang": "K00001",
            "nama_barang": "HVS A3a",
            "harga": 1000,
            "created_at": "2025-08-04T13:32:08.000000Z",
            "updated_at": "2025-08-04T14:24:55.000000Z"
        },
        {
            "id": 6,
            "kode_barang": "K0001",
            "nama_barang": "Kabel USB Extension",
            "harga": 125000,
            "created_at": "2025-08-04T15:00:32.000000Z",
            "updated_at": "2025-08-04T15:00:32.000000Z"
        },
        {
            "id": 7,
            "kode_barang": "K0002",
            "nama_barang": "Kabel LAN",
            "harga": 25000,
            "created_at": "2025-08-04T15:03:09.000000Z",
            "updated_at": "2025-08-04T15:03:09.000000Z"
        }
    ]
}
```
