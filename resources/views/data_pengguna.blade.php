<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
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


    <div class="container mt-3">
        <div class="row">
            <div class="col-md-10">
                <h1>Tabel Data Pengguna</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Email</th>
                            <th scope="col">Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $n= 1;
                        @endphp
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{ $n }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->nim }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ($user->is_admin)== 1 ? "Admin" : "Mahasiswa" }}</td>
                        </tr>
                        @php
                            $n++;
                        @endphp
                        @endforeach

                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
