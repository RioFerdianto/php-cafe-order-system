@extends('layouts.app')

@section('title', 'Menu')

@section('content')
    {{-- Hero Menu --}}
    <section class="py-5 text-center" style="background:#f0f3f0;">
        <div class="container">
            <h1 class="fw-bold text-success display-5 mb-3">Menu NgopiiKu</h1>
            <p class="lead text-muted">Nikmati berbagai pilihan kopi terbaik dari kami</p>
        </div>
    </section>

    {{-- Grid Menu --}}
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4">
                @forelse ($menus as $menu)
                    <div class="col-12 col-md-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset('menu_assets/' . $menu->gambar) }}"
                                 alt="{{ $menu->nama }}"
                                 class="card-img-top"
                                 style="height:200px;object-fit:cover;">
                            <div class="card-body d-flex flex-column text-center">
                                <h5 class="card-title fw-bold">{{ $menu->nama }}</h5>
                                <p class="text-success fw-semibold mb-4">
                                    Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                </p>
                                <a href="{{ auth()->check() ? route('order.create') : route('login') }}"
                                   class="btn btn-success mt-auto">
                                    Pesan Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">Belum ada menu tersedia.</p>
                    </div>
                @endforelse
            </div>
            
        </div>
    </section>
@endsection
