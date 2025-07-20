@extends('layouts.app')

@section('title', 'Login')

@push('styles')
<style>
    .login-section {
        min-height: calc(100vh - 70px); /* menyesuaikan tinggi karena ada navbar fixed */
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;

        /* Gunakan properti terpisah */
        background-image: url("{{ asset('menu_assets/bg-login.jpg') }}"); */
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        background-color: #0b3d27; fallback jika gambar gagal */
    }

    .login-section::before {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(
            rgba(0,0,0,0.45),
            rgba(0,0,0,0.35)
        );
        z-index: 1;
    }

    .login-card {
        position: relative;
        z-index: 2;
        background:rgb(255, 255, 255);
        border-radius: 18px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.25);
        padding: 2rem 2.5rem;
        max-width: 400px;
        width: 100%;
        text-align: center;
        backdrop-filter: blur(2px);
    }

    .login-card h2 {
        color: #006b3c;
        font-weight: 700;
        margin-bottom: 1.3rem;
    }

    .login-card .form-control {
        border-radius: 10px;
        padding: 11px 14px;
        font-size: 15px;
    }

    .login-card .btn-login {
        background: #006b3c;
        border: none;
        padding: 11px;
        border-radius: 10px;
        font-weight: 600;
        color: #fff;
        transition: .25s;
        letter-spacing: .5px;
    }

    .login-card .btn-login:hover {
        background: #005530;
    }

    .login-card a {
        color: #006b3c;
        font-weight: 500;
        text-decoration: none;
    }
    .login-card a:hover {
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<section class="login-section">
    <div class="login-card">
        <h2>Login NgopiiKu</h2>

        @if (session('status'))
            <div class="alert alert-success py-2 px-3">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input id="email"
                       type="email"
                       name="email"
                       value="{{ old('email') }}"
                       required
                       autofocus
                       autocomplete="username"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input id="password"
                       type="password"
                       name="password"
                       required
                       autocomplete="current-password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Remember --}}
            <div class="form-check text-start mb-3">
                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                <label class="form-check-label" for="remember_me">Ingat Saya</label>
            </div>

            <button type="submit" class="btn btn-login w-100">Login</button>

            <div class="mt-3">
                <p class="mb-0" style="font-size: .9rem;">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar disini</a>
                </p>
            </div>
        </form>
    </div>
</section>
@endsection