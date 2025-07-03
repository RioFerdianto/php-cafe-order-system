<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Tampilkan form order
    public function create()
    {
        $menus = Menu::all();
        return view('orders.create', compact('menus'));
    }

    // Simpan order baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelanggan' => 'required|max:255',
            'kontak' => 'required|max:255',
            'menu_id' => 'required|exists:menus,id',
            'jumlah' => 'required|numeric|min:1',
            'catatan' => 'nullable|string'
        ]);

        Order::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'kontak' => $request->kontak,
            'menu_id' => $request->menu_id,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'status' => 'pending'
        ]);

        return redirect('/order/success')->with('order', $request->only(['nama_pelanggan', 'kontak']));
    }

    // Tampilkan halaman success
    public function success()
    {
        return view('orders.success');
    }
    // public function menu()
    // {
    //     return $this->belongsTo(Menu::class);
    // }

}
