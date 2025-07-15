<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NgopiiKu - Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Header/Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">NgopiiKu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/tentang') }}">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/kontak') }}">Kontak</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('/profile') }}">Profil</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="nav-link btn btn-link text-white" type="submit">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    <!-- Hero Section -->
    <div class="container text-center my-5">
        <h1 class="display-5 fw-bold text-success">Selamat Datang di NgopiiKu</h1>
        <p class="lead">Nikmati racikan kopi terbaik khas Indonesia</p>
    </div>

    <!-- Daftar Menu Kopi -->
    <div class="container">
        <div class="row">
            @forelse($menus as $menu)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        {{-- Tambahkan gambar jika tersedia --}}
                        <img src="{{ asset('menu_assets/' . $menu->gambar) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $menu->nama }}">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $menu->nama }}</h5>
                            <p class="card-text">Harga: Rp{{ number_format($menu->harga) }}</p>
                            <a href="{{ auth()->check() ? url('/order') : route('login') }}" class="btn btn-success w-100">
                                Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">Belum ada menu kopi tersedia.</p>
            @endforelse
        </div>
    </div>

    <footer class="text-center mt-5 py-4 bg-light border-top">
        <small>NgopiiKu &copy; {{ date('Y') }} | Semua hak dilindungi</small>
    </footer>

</body>
</html>
