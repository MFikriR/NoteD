<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
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
