@extends('layouts.app')

@section('title', 'Beranda')

@push('styles')
<style>
    body {
        background:#fafafa;
        color:#333;
        font-family:'Poppins', sans-serif;
    }

    /* HERO */
    .hero {
        display:flex;
        flex-wrap:wrap;
        align-items:center;
        justify-content:center;
        padding:80px 20px;
        background:#F8F8F6;
        color:#004D3A;
        text-align:left;
    }
    .hero img {
        width:360px;
        border-radius:10px;
        margin:20px;
    }
    .hero-text {
        max-width:500px;
        margin:20px;
    }
    .hero-text h1 {
        font-size:2.8rem;
        font-weight:700;
        margin-bottom:15px;
        color:#004D3A;
    }
    .hero-text p {
        font-size:1.1rem;
        margin-bottom:20px;
        color:#5C6654;
    }
    .btn-primary {
        padding:10px 22px;
        background:#006644;
        color:#fff;
        text-decoration:none;
        border-radius:5px;
        font-weight:600;
    }
    .btn-primary:hover {
        background:#004D3A;
    }

    /* Tentang Kami */
    .section {
        padding:60px 20px;
        text-align:center;
    }
    .section h2 {
        font-size:2rem;
        color:#004D3A;
        margin-bottom:20px;
    }
    .section p {
        max-width:800px;
        margin:auto;
        font-size:1.1rem;
        line-height:1.7;
        color:#555;
    }

    /* Testimoni */
    .testimoni {
        display:grid;
        grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
        gap:20px;
        margin-top:30px;
    }
    .card {
        background:white;
        padding:20px;
        border-radius:10px;
        box-shadow:0 2px 8px rgba(0,0,0,0.05);
        text-align: center; /* Biar semua konten di tengah */
    }
    .card img {
        width:80px;
        height:80px;
        border-radius:50%;
        object-fit:cover;
        margin:0 auto 10px; /* Auto biar img center */
        display:block;
    }
</style>
@endpush

@section('content')
    <!-- Hero -->
    <section class="hero">
        <div class="hero-text">
            <h1>Kopi Premium, Rasa Istimewa</h1>
            <p>NgopiiKu menyajikan kopi pilihan dengan cita rasa terbaik khas Indonesia.</p>
            <a href="{{ url('/menu') }}" class="btn-primary">Lihat Menu</a>
        </div>
        <img src="{{ asset('menu_assets/hero-kopi.jpg') }}" alt="Kopi NgopiiKu">
    </section>

    <!-- Tentang Kami -->
    <section id="tentang" class="section">
        <h2>Tentang Kami</h2>
        <p>NgopiiKu lahir dari kecintaan pada kopi Indonesia. Sejak 2015, kami berkomitmen untuk memberikan rasa kopi terbaik dengan bahan pilihan yang diproses secara profesional.</p>
    </section>

    <!-- Testimoni -->
    <section class="section">
        <h2>Testimoni Pelanggan</h2>
        <div class="testimoni">
            <div class="card">
                <img src="{{ asset('menu_assets/testi1.jpg') }}" alt="Andi">
                <p>"Rasanya enak banget, bikin nagih!"</p>
                <strong>- Andi, Jakarta</strong>
            </div>
            <div class="card">
                <img src="{{ asset('menu_assets/testi2.jpg') }}" alt="Sinta">
                <p>"Pelayanan cepat, kopinya segar."</p>
                <strong>- Sinta, Bandung</strong>
            </div>
            <div class="card">
                <img src="{{ asset('menu_assets/testi3.jpg') }}" alt="Rudi">
                <p>"Kopi pagi saya selalu dari NgopiiKu."</p>
                <strong>- Rudi, Surabaya</strong>
            </div>
        </div>
    </section>
@endsection
