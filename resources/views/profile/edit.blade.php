@extends('layouts.app')

@section('title', 'Profil Saya')

@push('styles')
<style>
    .profile-section {
        padding: 50px 20px;
    }
    .profile-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        max-width: 600px;
        margin: auto;
    }
    .profile-card h3 {
        color: #006644;
        font-weight: 600;
        margin-bottom: 20px;
    }
    .btn-save {
        background: #006644;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 6px;
    }
</style>
@endpush

@section('content')
<section class="profile-section">
    <div class="profile-card">
        <h3>Profil Saya</h3>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            {{-- Nama --}}
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control" required>
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" required>
            </div>

            {{-- Password Baru --}}
            <div class="mb-3">
                <label for="password" class="form-label">Password Baru</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
            </div>

            <button class="btn-save">Simpan Perubahan</button>
        </form>
        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Yakin mau hapus akun? Data tidak bisa dikembalikan!')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mt-3">Hapus Akun</button>
        </form>
    </div>
</section>
@endsection
