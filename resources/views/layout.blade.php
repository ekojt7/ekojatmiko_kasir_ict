<!DOCTYPE html>
<html>
<head>
    <title>POS Kasir ICT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
        }
        .sidebar a {
            color: #fff;
            padding: 12px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .active {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h4 class="text-white text-center py-3 border-bottom">MENU</h4>
            <a href="{{ url('/kasir') }}" class="{{ request()->is('kasir') ? 'active' : '' }}">Kasir</a>
            <a href="{{ route('barangs.index') }}" class="{{ request()->is('barangs*') ? 'active' : '' }}">Daftar Barang</a>
            <a href="{{ url('/transaksis') }}" class="{{ request()->is('transaksis*') ? 'active' : '' }}">Daftar Transaksi</a>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">POS Kasir ICT</span>
                </div>
            </nav>

            <!-- Page Content -->
            <div class="container-fluid py-4">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
