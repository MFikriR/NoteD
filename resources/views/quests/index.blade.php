<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Quest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background: url("https://get.wallhere.com/photo/trees-landscape-lake-water-nature-reflection-grass-plants-photography-wilderness-pond-swamp-wetland-tree-meadow-reservoir-2559x1571-px-marsh-habitat-natural-environment-ecosystem-body-of-water-grass-family-bog-630640.jpg");
            background-size: cover;
            box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.7);
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .quest-card {
            border: 1px solid #dddddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .quest-card h5 {
            color: #333333;
        }
        .quest-card p {
            color: #555555;
        }
        .navbar {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <span class="navbar-toggler-icon"></span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" href="{{ route('dashboard.index') }}">Home</a>
                        <a class="nav-link" href="{{ route('tasks.index') }}">Daftar Tugas</a>
                        <a class="nav-link active" aria-current="page" href="{{ route('quests.index') }}">Daftar Quest</a>
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
        
        <h1 class="mt-4">Daftar Quest</h1>
        <ul class="list-group">
            @foreach($quests as $quest)
                <li class="list-group-item quest-card">
                    <h5>{{ $quest->name }}</h5>
                    <p>{{ $quest->description }}</p>
                    <p><strong>EXP:</strong> {{ $quest->exp }}</p>
                    <p><strong>Status:</strong> {{ $quest->status }}</p>
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
