<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $menus = [
            [
                'nama_menu' => 'Nasi Kotak Ayam Bakar',
                'deskripsi' => 'Nasi kotak lengkap dengan ayam bakar, lalapan, dan sambal terasi.',
                'harga' => 35000,
            ],
            [
                'nama_menu' => 'Nasi Kotak Rendang',
                'deskripsi' => 'Nasi kotak lengkap dengan rendang sapi, sayur nangka, dan sambal ijo.',
                'harga' => 40000,
            ],
            [
                'nama_menu' => 'Paket Makan Siang Ayam Goreng',
                'deskripsi' => 'Paket makan siang dengan ayam goreng, tumis sayur, dan sambal terasi.',
                'harga' => 30000,
            ],
            [
                'nama_menu' => 'Paket Makan Siang Ikan Bakar',
                'deskripsi' => 'Paket makan siang dengan ikan bakar, sambal matah, dan sayur asem.',
                'harga' => 35000,
            ],
            [
                'nama_menu' => 'Snack Box',
                'deskripsi' => 'Snack box dengan beragam kue tradisional dan air mineral.',
                'harga' => 15000,
            ],
            [
                'nama_menu' => 'Paket Makan Malam Sate Ayam',
                'deskripsi' => 'Paket makan malam dengan sate ayam, lontong, dan sambal kacang.',
                'harga' => 40000,
            ],
            [
                'nama_menu' => 'Paket Makan Malam Bebek Goreng',
                'deskripsi' => 'Paket makan malam dengan bebek goreng, sambal mangga, dan lalapan.',
                'harga' => 45000,
            ],
            [
                'nama_menu' => 'Nasi Tumpeng Mini',
                'deskripsi' => 'Nasi tumpeng mini dengan aneka lauk pauk tradisional.',
                'harga' => 50000,
            ],
            [
                'nama_menu' => 'Paket Catering Harian',
                'deskripsi' => 'Paket catering harian dengan menu berganti setiap hari.',
                'harga' => 100000,
            ],
            [
                'nama_menu' => 'Paket Buffet Pernikahan',
                'deskripsi' => 'Paket buffet untuk acara pernikahan dengan berbagai pilihan menu.',
                'harga' => 200000,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
