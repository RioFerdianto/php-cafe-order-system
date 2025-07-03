<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Pemesanan</h3>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="/order" method="POST">
                            @csrf
                            
                            @if(request('menu_id'))
                                @php $selectedMenu = App\Models\Menu::find(request('menu_id')); @endphp
                                <div class="mb-3">
                                    <label class="form-label">Menu yang Dipilih</label>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('menu/'.$selectedMenu->gambar) }}" class="img-thumbnail me-3" style="width: 80px; height: 80px; object-fit: cover;" alt="{{ $selectedMenu->nama }}">
                                        <div>
                                            <h5>{{ $selectedMenu->nama }}</h5>
                                            <p class="text-muted mb-0">Rp {{ number_format($selectedMenu->harga, 0, ',', '.') }}</p>
                                        </div>
                                    </div>
                                    <input type="hidden" name="menu_id" value="{{ $selectedMenu->id }}">
                                </div>
                            @else
                                <div class="mb-3">
                                    <label for="menu_id" class="form-label">Pilih Menu</label>
                                    <select class="form-select" id="menu_id" name="menu_id" required>
                                        <option value="">Pilih Menu</option>
                                        @foreach($menus as $menu)
                                            <option value="{{ $menu->id }}">{{ $menu->nama }} - Rp {{ number_format($menu->harga, 0, ',', '.') }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="nama_pelanggan" class="form-label">Nama Anda</label>
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required>
                            </div>

                            <div class="mb-3">
                                <label for="kontak" class="form-label">Nomor HP/WhatsApp</label>
                                <input type="text" class="form-control" id="kontak" name="kontak" required>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah Pesan</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="1" required>
                            </div>

                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan Tambahan (Opsional)</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
