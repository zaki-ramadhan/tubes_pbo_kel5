@extends('layouts.app')

@section('title', 'Pesanan List')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Pesanan List</h1>
        <a href="{{ route('pesanans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Buat Pesanan</a>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">No</th>
                    <th class="py-2 px-4 border-b text-left">Menu</th>
                    <th class="py-2 px-4 border-b text-left">Jumlah</th>
                    <th class="py-2 px-4 border-b text-left">Total Harga</th>
                    <th class="py-2 px-4 border-b text-left">Metode Pengambilan</th>
                    <th class="py-2 px-4 border-b text-left">Metode Pembayaran</th>
                    <th class="py-2 px-4 border-b text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanans as $pesanan)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $pesanan->menu->nama_menu }}</td>
                        <td class="py-2 px-4 border-b">{{ $pesanan->jumlah_menu }}</td>
                        <td class="py-2 px-4 border-b">Rp. {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                        <td class="py-2 px-4 border-b">{{ $pesanan->metode_pengambilan }}</td>
                        <td class="py-2 px-4 border-b">{{ $pesanan->metode_pembayaran }}</td>
                        <td class="py-2 px-4 border-b flex space-x-2">
                            <a href="{{ route('pesanans.show', $pesanan->id) }}" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                                <span class="iconify" data-icon="mdi-eye" data-inline="false"></span>
                            </a>
                            <a href="{{ route('pesanans.edit', $pesanan->id) }}" class="bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600">
                                <span class="iconify" data-icon="mdi-pencil" data-inline="false"></span>
                            </a>
                            <form action="{{ route('pesanans.destroy', $pesanan->id) }}" method="POST" class="inline-block">
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
