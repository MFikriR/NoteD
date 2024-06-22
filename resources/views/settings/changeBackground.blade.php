<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Background</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            padding: 20px; /* Padding untuk memisahkan konten dari tepi */
            transition: margin-left 0.5s; /* Transisi untuk efek membuka/tutup sidebar */
        }
        h2 {
            margin-bottom: 30px;
            color: #343a40;
        }
        .form-control {
            border-radius: 0.25rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        /* Sidebar styles */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px; /* Sidebar disembunyikan di luar layar kiri saat tertutup */
            background-color: #111;
            padding-top: 20px;
            transition: left 0.5s; /* Transisi untuk efek membuka/tutup sidebar */
            overflow-y: auto;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        .sidebar a:hover {
            color: #f1f1f1;
        }
        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        #main {
            margin-left: 0; /* Set margin-left ke 0 untuk tampilan awal */
            transition: margin-left 0.5s; /* Transisi untuk efek membuka/tutup sidebar */
            padding: 16px;
        }
        .navbar-toggler-icon {
            background-color: #fff;
            transition: transform 0.3s; /* Transisi untuk animasi ikon */
        }
        .navbar-toggler-icon.opened {
            transform: rotate(-90deg); /* Mengubah ikon menjadi 'X' */
        }
        .navbar-toggler-icon.closed {
            transform: rotate(0deg); /* Mengubah ikon kembali menjadi garis */
        }
        .navbar-nav .nav-link {
            color: #000;
            margin-right: 10px;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
        .user {
            color: #000;
            margin-right: 10px;
        }
        .logout {
            margin-left: 10px;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .active {
            color: white !important;
            background-color: #343a40 !important;
        }
    </style>
</head>
<body>
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{ route('dashboard.index') }}">Home</a>
    <a href="{{ route('profile.show') }}">Profil</a>
    <a href="{{ route('calender') }}">Kalender</a>
    <a href="#">Quest</a>
    <a href="{{ route('notes.index') }}">List Catatan</a>
    <a href="{{ route('tasks.index') }}">List Tugas</a>
    <a href="{{ route('settings.index') }}" class="active">Setting</a>
</div>

<div id="main">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span id="navbarTogglerIcon" class="navbar-toggler-icon closed" onclick="toggleNav()"></span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    @can('admin')
                    <a class="nav-link" href="{{ route('dashboard.showDataPengguna') }}">Data Pengguna</a>
                    @endcan
                </div>
            </div>
            <div class="text-end d-flex align-items-center">
                <div class="user me-3">
                    Halo, {{ Auth::user()->name }}
                </div>
                <div class="logout">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Ganti Background</h2>
        <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            <div class="form-group mb-3">
                <label for="key" class="form-label">Key:</label>
                <input type="text" class="form-control" id="key" name="key" value="dashboard_background" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="value" class="form-label">Value:</label>
                <input type="file" class="form-control" id="value" name="value">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Pengaturan</button>
        </form>
    </div>
</div>

<script>
    let sidebarOpen = false;

    function toggleNav() {
        if (sidebarOpen) {
            closeNav();
        } else {
            openNav();
        }
    }

    function openNav() {
        document.getElementById("mySidebar").style.left = "0";
        document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("navbarTogglerIcon").classList.remove('closed');
        document.getElementById("navbarTogglerIcon").classList.add('opened');
        sidebarOpen = true;
    }

    function closeNav() {
        document.getElementById("mySidebar").style.left = "-250px";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById("navbarTogglerIcon").classList.remove('opened');
        document.getElementById("navbarTogglerIcon").classList.add('closed');
        sidebarOpen = false;
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
