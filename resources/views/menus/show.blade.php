@extends('layouts.app')

@section('title', 'Detail Menu')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4 text-center">Detail Menu</h1>
        <div class="bg-white shadow-md rounded-lg p-6 max-w-2xl mx-auto">
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Nama Menu:</h2>
                <p class="text-gray-700">{{ $menu->nama_menu }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Deskripsi:</h2>
                <p class="text-gray-700">{{ $menu->deskripsi }}</p>
            </div>
            <div class="mb-4">
                <h2 class="text-xl font-semibold mb-2">Harga:</h2>
                <p class="text-gray-700">Rp. {{ number_format($menu->harga, 0, ',', '.') }}</p>
            </div>
            <div class="flex justify-center">
                <a href="{{ route('menus.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Back to List</a>
            </div>
        </div>
    </div>
@endsection
