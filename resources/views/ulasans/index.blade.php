@extends('layouts.app')

@section('title', 'Ulasan List')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Ulasan List</h1>
        <a href="{{ route('ulasans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Add Ulasan</a>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-left">No</th>
                    <th class="py-2 px-4 border-b text-left">Pesan</th>
                    <th class="py-2 px-4 border-b text-left">Created At</th>
                    <th class="py-2 px-4 border-b text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ulasans as $ulasan)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b">{{ $ulasan->pesan }}</td>
                        <td class="py-2 px-4 border-b">{{ $ulasan->created_at }}</td>
                        <td class="py-2 px-4 border-b flex space-x-2">
                            {{-- <a href="{{ route('ulasans.show', $ulasan->id) }}" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                                <span class="iconify" data-icon="mdi-eye" data-inline="false"></span>
                            </a> --}}
                            <a href="{{ route('ulasans.edit', $ulasan->id) }}" class="bg-yellow-500 text-white p-2 rounded hover:bg-yellow-600">
                                <span class="iconify" data-icon="mdi-pencil" data-inline="false"></span>
                            </a>
                            <form action="{{ route('ulasans.destroy', $ulasan->id) }}" method="POST" class="inline-block">
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
