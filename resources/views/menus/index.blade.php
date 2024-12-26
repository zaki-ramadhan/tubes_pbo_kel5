@extends('layouts.app')

@section('title', 'Menu List')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Menu List</h1>
        <div class="btn-wrapper flex justify-between items-center">
            <a href="{{ route('menus.create') }}" class="bg-blue-500 text-white px-4 py-2 flex items-center justify-center w-max rounded-md hover:bg-blue-600 mb-4 ">
                <span class="iconify" data-icon="mdi:plus" data-inline="false"></span>
                Tambah menu
            </a>
            <a href="{{ route('pesanans.create') }}" class="bg-teal-500 text-white px-4 py-2 rounded-md hover:bg-teal-600">Buat Pesanan</a>
        </div>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">No</th>
                    <th class="py-2 px-4 border-b text-left">Nama Menu</th>
                    <th class="py-2 px-4 border-b text-left">Deskripsi</th>
                    <th class="py-2 px-4 border-b text-left">Harga</th>
                    <th class="py-2 px-4 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $menu->nama_menu }}</td>
                        <td class="py-2 px-4 border-b line-clamp-1">{{ $menu->deskripsi }}</td>
                        <td class="py-2 px-4 border-b">Rp. {{ number_format($menu->harga, 0, ',', '.') }}</td>
                        <td class="py-3 px-4 border-b flex space-x-1">
                            <a href="{{ route('menus.show', $menu->id) }}" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                                <span class="iconify" data-icon="mdi-eye" data-inline="false"></span>
                            </a>
                            <a href="{{ route('menus.edit', $menu->id) }}" class="bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600">
                                <span class="iconify" data-icon="mdi-pencil" data-inline="false"></span>
                            </a>
                            <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white p-2 rounded hover:bg-red-600">
                                    <span class="iconify" data-icon="mdi-delete" data-inline="false"></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
