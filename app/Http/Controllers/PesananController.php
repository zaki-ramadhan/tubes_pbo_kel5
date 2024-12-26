<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::where('id_customer', Auth::id())->get();
        return view('pesanans.index', compact('pesanans'));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('pesanans.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_menu' => 'required|exists:menus,id',
            'jumlah_menu' => 'required|integer',
            'metode_pengambilan' => 'required|string',
            'metode_pembayaran' => 'required|string',
        ]);

        $menu = Menu::findOrFail($request->id_menu);
        $total_harga = $menu->harga * $request->jumlah_menu;

        Pesanan::create([
            'id_customer' => Auth::id(),
            'id_menu' => $request->id_menu,
            'jumlah_menu' => $request->jumlah_menu,
            'total_harga' => $total_harga,
            'metode_pengambilan' => $request->metode_pengambilan,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('pesanans.index')->with('success', 'Pesanan created successfully.');
    }

    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        return view('pesanans.show', compact('pesanan'));
    }

    public function edit($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $menus = Menu::all();
        return view('pesanans.edit', compact('pesanan', 'menus'));
    }

    public function update(Request $request, $id)
    {
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

        return redirect()->route('pesanans.index')->with('success', 'Pesanan updated successfully.');
    }

    public function destroy($id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('pesanans.index')->with('success', 'Pesanan deleted successfully.');
    }
}
