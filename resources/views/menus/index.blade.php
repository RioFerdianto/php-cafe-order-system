<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .menu-card:hover {
            transform: translateY(-5px);
        }
        .menu-img {
            height: 200px;
            object-fit: cover;
        }
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://placehold.co/1920x1080');
            background-size: cover;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <div class="hero-section text-center">
        <h1>Menu Ngopi Iku</h1>
        <p class="lead">Nikmati berbagai pilihan minuman berkualitas</p>
    </div>

    <div class="container">
        <div class="row">
            @foreach($menus as $menu)
            <div class="col-md-4">
                <div class="card menu-card">
                    <img src="{{ asset('menu/'.$menu->gambar) }}" class="card-img-top menu-img" alt="{{ $menu->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $menu->nama }}</h5>
                        <p class="card-text text-muted">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                        <a href="/order?menu_id={{ $menu->id }}" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
