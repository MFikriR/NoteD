<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Catatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            @if($background = \App\Models\Setting::where('key', 'dashboard_background')->first())
                background: url('{{ asset('storage/' . $background->value) }}') no-repeat center center fixed;
                background-size: cover;
            @else
                background: url("https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhNBdEQclaDpdc14GSFbviCnwIFwGODtRrOzlJgqJ-B8gS5QSaNvklHQzdGDdNzfRvt1zQ7DzhBWWIM3Q7NFdR3mp8b8La2k6GzogKU8mS7CUo0jV8Spzvmt_w8kHstTUOfu2x6xWC5JQgk/s1600/Slider-2-Menara_Pandang-BanjarmasinTourism.jpg") no-repeat center center fixed;
                background-size: cover;
            @endif
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .note-card {
            border: 1px solid #dddddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            background-color:  #ffffff;
        }
        .note-card h5 {
            color: #333333;
        }
        .note-card p {
            color: #555555;
        }
        .navbar {
            margin-bottom: 20px;
        }
        #mySidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        #mySidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }
        #mySidebar a:hover {
            color: #f1f1f1;
        }
        #mySidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        #main {
            transition: margin-left 0.5s;
            padding: 16px;
        }
        .navbar-toggler-icon {
            background-color: #fff;
        }
        input.form-control {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        textarea.form-control {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1, h3, h4 {
            color: white;
            -webkit-text-stroke-color: #111;
            -webkit-text-stroke-width: 1px;
            text-shadow: -1px 1px 0 #000,
            1px 1px 0 #000,
            1px 1px 0 #000,
            -1px 1px 0 #000;
        }
        label {
            background-color: white;
            padding: 10px;
            border-radius: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="{{ route('dashboard.index') }}">Home</a>
        <a href="{{ route('profile.show') }}">Profil</a>
        <a href="{{ route('calender') }}">Kalender</a>
        <a href="{{ route('quests.index') }}">Quest</a>
        <a href="{{ route('notes.index') }}">List Catatan</a>
        <a href="{{ route('tasks.index') }}">List Tugas</a>
        <a href="{{ route('settings.index') }}">Setting</a>
    </div>

    <div id="main">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <span class="navbar-toggler-icon" onclick="openNav()"></span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard.index') }}">Home</a>
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
            <div class="row mb-3">
                <div class="col">
                    <h1>Selamat Datang, {{ Auth::user()->name }}</h1>
                    <h3>Ini adalah halaman Dashboard Catatan</h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <h4>Daftar Catatan</h4>
                    @foreach($notes as $note)
                        <div class="note-card p-3">
                            <h5>{{ $note->title }}</h5>
                            <p>{{ Str::limit($note->content, 100) }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h4>Tambah Catatan Baru</h4>
                    <form method="post" action="{{ route('notes.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" maxlength="50" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Isi Catatan</label>
                            <textarea class="form-control" id="content" name="content" rows="4" maxlength="500" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Catatan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
