<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Tampilkan menu untuk pelanggan
    public function index()
    {
        $menus = Menu::all(); // ambil semua menu kopi
        return view('menus.index', compact('menus'));
    }

    
    // Tampilkan admin menu
    public function adminIndex()
    {
        $menus = Menu::all();
        return view('menus.admin', compact('menus')); // <--- INI YANG HARUS DIUBAH
    }


    // Tampilkan form create
    public function create()
    {
        return view('menus.create');
    }

    // Simpan menu baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // Simpan ke folder menu_assets
        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('menu_assets'), $imageName);

        // Simpan ke database
        Menu::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'gambar' => $imageName
        ]);

        return redirect('/admin/menu')->with('success', 'Menu berhasil ditambahkan!');
    }


    // Tampilkan form edit
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menus.edit', compact('menu'));
    }

    // Update menu
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $menu = Menu::findOrFail($id);
        
        if($request->hasFile('gambar')) {
            // Hapus gambar lama
            if($menu->gambar) {
                $oldImagePath = public_path('menu_assets/').$menu->gambar;
                if(file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan gambar baru ke menu_assets
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('menu_assets'), $imageName);
            $menu->gambar = $imageName;
        }

        $menu->nama = $request->nama;
        $menu->harga = $request->harga;
        $menu->save();

        return redirect('/admin/menu')->with('success', 'Menu berhasil diupdate!');
    }


    // Hapus menu
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);

        // Hapus gambar dari menu_assets
        $imagePath = public_path('menu_assets/').$menu->gambar;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Hapus data dari database
        $menu->delete();

        return redirect('/admin/menu')->with('success', 'Menu berhasil dihapus!');
    }

}