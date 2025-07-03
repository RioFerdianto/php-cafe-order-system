<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu-img-thumb {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="mb-4">Kelola Menu</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="/menu/create" class="btn btn-primary mb-3">Tambah Menu Baru</a>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $index => $menu)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><img src="{{ asset('menu/'.$menu->gambar) }}" class="menu-img-thumb" alt="{{ $menu->nama }}"></td>
                        <td>{{ $menu->nama }}</td>
                        <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="/menu/{{ $menu->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                            <form action="/menu/{{ $menu->id }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
