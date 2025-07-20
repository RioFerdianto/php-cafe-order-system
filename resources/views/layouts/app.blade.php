<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NgopiiKu - @yield('title')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --ngopi-green: rgba(0,102,68,1);  /* Hijau utama */
            --ngopi-bg: #fafafa;
        }
        body {
            background: var(--ngopi-bg);
            color: #333;
            font-family: system-ui, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }
        .navbar-ngopi {
            background: var(--ngopi-green);
        }
        .navbar-ngopi .navbar-brand,
        .navbar-ngopi .nav-link {
            color: #fff !important;
            font-weight: 500;
        }
        .navbar-ngopi .nav-link:hover,
        .navbar-ngopi .nav-link:focus {
            color: #e3f6eb !important;
            text-decoration: underline;
        }
        footer.ngopi-footer {
            background: var(--ngopi-green);
            color: #fff;
            padding: 16px 0;
            margin-top: 64px;
            font-size: .95rem;
        }
        .dropdown-menu a {
            color: #333 !important;
        }
        .dropdown-menu a:hover {
            background: #e3f6eb !important;
        }
    </style>

    @stack('styles')
</head>
<body>
@php
    // True jika berada di /menu (atau /menu/xxx)
    $onMenuPage = request()->is('menu') || request()->is('menu/*');
@endphp

<nav class="navbar navbar-expand-lg navbar-ngopi fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">NgopiiKu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#ngopiNav" aria-controls="ngopiNav"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter:invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="ngopiNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                {{-- Selalu tampil --}}
                <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->is('menu') ? 'active' : '' }}" href="{{ url('/menu') }}">Menu</a></li>

                {{-- Hanya tampil jika BUKAN di /menu --}}
                @unless($onMenuPage)
                    <li class="nav-item"><a class="nav-link" href="{{ url('/#tentang-kami') }}">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/#kontak') }}">Kontak</a></li>
                @endunless

                @auth
                    <li class="nav-item"><a class="nav-link {{ request()->is('order') ? 'active' : '' }}" href="{{ url('/order') }}">Pesanan</a></li>

                    {{-- Dropdown User --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                           role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{-- Inline SVG ikon user --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5Z"/>
                                <path d="M2 22c1.4-4.2 5-7 10-7s8.6 2.8 10 7"/>
                            </svg>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">Profil Saya</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

{{-- Spacer untuk navbar fixed --}}
<div style="height:70px;"></div>

<main>
    @yield('content')
</main>

<footer class="ngopi-footer text-center">
    <div class="container">
        <p class="mb-1">© {{ date('Y') }} NgopiiKu. Semua Hak Dilindungi.</p>
        @unless($onMenuPage)
            <p id="kontak" class="mb-0">Email: info@ngopiiku.com | WhatsApp: +62 812-3456-7890</p>
        @endunless
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
