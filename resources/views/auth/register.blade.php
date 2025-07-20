@extends('layouts.app')

@section('title', 'Register')

@push('styles')
<style>
    .register-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url('{{ asset('menu_assets/bg-login.jpg') }}') no-repeat center center;
        background-size: cover;
        position: relative;
    }

    .register-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }

    .register-card {
        position: relative;
        z-index: 2;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        padding: 2rem 2.5rem;
        max-width: 450px;
        width: 100%;
        text-align: center;
    }

    .register-card h2 {
        color: #006b3c;
        font-weight: bold;
        margin-bottom: 1.5rem;
    }

    .register-card .form-control {
        border-radius: 8px;
        padding: 10px 12px;
        font-size: 15px;
    }

    .register-card .btn-register {
        background: #006b3c;
        border: none;
        padding: 10px;
        border-radius: 8px;
        font-weight: 600;
        color: #fff;
        transition: 0.3s;
    }

    .register-card .btn-register:hover {
        background: #005d35;
    }

    .register-card a {
        color: #006b3c;
        text-decoration: none;
    }

    .register-card a:hover {
        text-decoration: underline;
    }
</style>
@endpush

@section('content')
<section class="register-section">
    <div class="register-card">
        <h2>Buat Akun NgopiiKu</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nama --}}
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}"
                       required autofocus autocomplete="name"
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       required autocomplete="username"
                       class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <input id="password" type="password" name="password" required
                       autocomplete="new-password"
                       class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-3 text-start">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       autocomplete="new-password" class="form-control">
            </div>

            {{-- Tombol Register --}}
            <button type="submit" class="btn btn-register w-100">Daftar</button>

            <div class="mt-3">
                <p>Sudah punya akun?
                    <a href="{{ route('login') }}">Login disini</a>
                </p>
            </div>
        </form>
    </div>
</section>
@endsection
