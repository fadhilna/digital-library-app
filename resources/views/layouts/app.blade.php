<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .sidebar {
            min-height: calc(100vh - 56px);
            background-color: #343a40;
        }
        .sidebar .nav-link {
            color: #fff;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .sidebar .nav-link.active {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/dashboard">
                <i class="fas fa-book"></i> Digital Library
            </a>
            <div class="navbar-nav ms-auto">
                @auth
                    <span class="navbar-text me-3">
                        <i class="fas fa-user"></i> {{ auth()->user()->nama_lengkap }} 
                        <span class="badge bg-secondary">{{ auth()->user()->role }}</span>
                    </span>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            @auth
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse bg-dark">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        
                        @if(auth()->user()->role == 'admin' || auth()->user()->role == 'petugas')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('buku*') ? 'active' : '' }}" href="/buku">
                                <i class="fas fa-book"></i> Manajemen Buku
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}" href="/laporan">
                                <i class="fas fa-chart-bar"></i> Laporan
                            </a>
                        </li>
                        @endif

                        @if(auth()->user()->role == 'peminjam')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('peminjaman*') ? 'active' : '' }}" href="/peminjaman">
                                <i class="fas fa-exchange-alt"></i> Peminjaman
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>
            @endauth

            <!-- Main content -->
            <main class="@auth col-md-9 ms-sm-auto col-lg-10 px-md-4 @else col-12 @endauth mt-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>