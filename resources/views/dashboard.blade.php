@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        <div class="bg-white shadow-md shadow-slate-200 rounded-lg px-6 py-12">
            <h2 class="text-xl font-semibold mb-4">Selamat datang, {{ Auth::user()->name }}!</h2>
            <p class="mb-4">Ini adalah dasbor Anda. Anda dapat mengelola akun dan pesanan Anda di sini.</p>
            <div class="flex space-x-4">
                <a href="{{ route('menus.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Pesan Menu</a>
                <a href="{{ route('ulasans.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Tinggalkan Ulasan</a>
                <a href="{{ route('pesanans.index') }}" class="bg-purple-500 text-white px-4 py-2 rounded-md hover:bg-purple-600">Lihat Pesanan</a>
            </div>
        </div>
    </div>
@endsection
