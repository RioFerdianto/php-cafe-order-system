@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Data Menu Admin</h1>
        <a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">+ Tambah Menu</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($menus as $menu)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $menu->nama }}</td> <!-- pastikan field-nya 'nama' bukan 'nama_menu' -->
                        <td>Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                        <td>
                            @if ($menu->gambar)
                                <img src="{{ asset('menu_assets/' . $menu->gambar) }}" width="80" alt="{{ $menu->nama }}">
                            @else
                                Tidak ada gambar
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('menu.edit', $menu->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">Belum ada data menu</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
