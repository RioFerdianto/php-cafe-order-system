<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'kontak',
        'menu_id',
        'jumlah',
        'status',
        'catatan'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
