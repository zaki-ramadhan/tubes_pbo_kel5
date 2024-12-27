<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;

class PesananController extends Controller
{
    // public function index()
    // {
    //     try {
    //         $pesanans = Pesanan::where('id_customer', Auth::id())->get();
    //         return response()->json($pesanans);
    //     } catch (Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

        public function index(Request $request)
    {
        try {
            $request->validate([
                'id_customer' => 'required|integer|exists:users,id' // Validasi id_customer
            ]);

            $id_customer = $request->input('id_customer'); // Ambil id_customer dari request
            $pesanans = Pesanan::where('id_customer', $id_customer)->get();
            return response()->json($pesanans);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function store(Request $request)
{
    try {
        $request->validate([
            'id_menu' => 'required|exists:menus,id',
            'jumlah_menu' => 'required|integer',
            'metode_pengambilan' => 'required|string',
            'metode_pembayaran' => 'required|string',
            'id_customer' => 'required|integer|exists:users,id' // Validasi id_customer
        ]);

        $menu = Menu::findOrFail($request->id_menu);
        $total_harga = $menu->harga * $request->jumlah_menu;

        $pesanan = Pesanan::create([
            'id_customer' => $request->id_customer,  // Ambil id_customer dari request
            'id_menu' => $request->id_menu,
            'jumlah_menu' => $request->jumlah_menu,
            'total_harga' => $total_harga,
            'metode_pengambilan' => $request->metode_pengambilan,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return response()->json($pesanan, 201);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    public function show($id)
    {
        try {
            $pesanan = Pesanan::findOrFail($id);
            return response()->json($pesanan);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'id_menu' => 'required|exists:menus,id',
                'jumlah_menu' => 'required|integer',
                'metode_pengambilan' => 'required|string',
                'metode_pembayaran' => 'required|string',
            ]);

            $pesanan = Pesanan::findOrFail($id);
            $menu = Menu::findOrFail($request->id_menu);
            $total_harga = $menu->harga * $request->jumlah_menu;

            $pesanan->update([
                'id_menu' => $request->id_menu,
                'jumlah_menu' => $request->jumlah_menu,
                'total_harga' => $total_harga,
                'metode_pengambilan' => $request->metode_pengambilan,
                'metode_pembayaran' => $request->metode_pembayaran,
            ]);

            return response()->json($pesanan);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $pesanan = Pesanan::findOrFail($id);
            $pesanan->delete();

            return response()->json(null, 204);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
