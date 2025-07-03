<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Tampilkan semua order
    public function index()
    {
        $orders = Order::with('menu')->orderBy('created_at', 'desc')->get();
        return view('admin.orders', compact('orders'));
    }

    // Update status order
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Status order berhasil diupdate!');
    }
}
