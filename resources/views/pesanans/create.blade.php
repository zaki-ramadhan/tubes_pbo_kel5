@extends('layouts.app')

@section('title', 'Add New Pesanan')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Buat Pesanan</h1>
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('pesanans.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="id_menu" class="block text-sm font-medium text-gray-700">Menu</label>
                <select id="id_menu" name="id_menu" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->nama_menu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="jumlah_menu" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" id="jumlah_menu" name="jumlah_menu" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>
            <div class="mb-4">
                <label for="metode_pengambilan" class="block text-sm font-medium text-gray-700">Metode Pengambilan</label>
                <select id="metode_pengambilan" name="metode_pengambilan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    <option value="ambil langsung">Ambil Langsung</option>
                    <option value="antar">Antar</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select id="metode_pembayaran" name="metode_pembayaran" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    <option value="tunai">Tunai</option>
                    <option value="transfer">Transfer</option>
                </select>
            </div>
            <div class="btn-wrapper">
                <button type="button" class="bg-slate-500 text-white px-4 py-2 rounded hover:bg-slate-600" onclick="window.history.back()">Kembali</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>
@endsection
