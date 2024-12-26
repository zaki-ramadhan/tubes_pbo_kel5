<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_customer',
        'id_menu',
        'jumlah_menu',
        'total_harga',
        'metode_pengambilan',
        'metode_pembayaran',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'id_customer');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
