@extends('layouts.app')

@section('title', 'Edit Pesanan')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Pesanan</h1>
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('pesanans.update', $pesanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="id_menu" class="block text-sm font-medium text-gray-700">Menu</label>
                <select id="id_menu" name="id_menu" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}" {{ $pesanan->id_menu == $menu->id ? 'selected' : '' }}>{{ $menu->nama_menu }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="jumlah_menu" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" id="jumlah_menu" name="jumlah_menu" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" value="{{ $pesanan->jumlah_menu }}" required>
            </div>
            <div class="mb-4">
                <label for="metode_pengambilan" class="block text-sm font-medium text-gray-700">Metode Pengambilan</label>
                <select id="metode_pengambilan" name="metode_pengambilan" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    <option value="ambil langsung" {{ $pesanan->metode_pengambilan == 'ambil langsung' ? 'selected' : '' }}>Ambil Langsung</option>
                    <option value="antar" {{ $pesanan->metode_pengambilan == 'antar' ? 'selected' : '' }}>Antar</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
                <select id="metode_pembayaran" name="metode_pembayaran" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
                    <option value="tunai" {{ $pesanan->metode_pembayaran == 'tunai' ? 'selected' : '' }}>Tunai</option>
                    <option value="transfer" {{ $pesanan->metode_pembayaran == 'transfer' ? 'selected' : '' }}>Transfer</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
@endsection
