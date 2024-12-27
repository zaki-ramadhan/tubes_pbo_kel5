<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::where('user_id', Auth::id())->get();
        return view('ulasans.index', compact('ulasans'));
    }

    public function create()
    {
        return view('ulasans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesan' => 'required',
        ]);

        Ulasan::create([
            'user_id' => Auth::id(),
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('ulasans.index')->with('success', 'Ulasan created successfully.');
    }

    public function show($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        return view('ulasans.show', compact('ulasan'));
    }

    public function edit($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        return view('ulasans.edit', compact('ulasan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required',
        ]);

        $ulasan = Ulasan::findOrFail($id);
        $ulasan->update([
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('ulasans.index')->with('success', 'Ulasan updated successfully.');
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('ulasans.index')->with('success', 'Ulasan deleted successfully.');
    }
}