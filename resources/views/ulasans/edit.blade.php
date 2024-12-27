@extends('layouts.app')

@section('title', 'Edit Ulasan')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Edit Ulasan</h1>
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('ulasans.update', $ulasan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="pesan" class="block text-sm font-medium text-gray-700">Pesan</label>
                <textarea id="pesan" name="pesan" rows="3" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>{{ $ulasan->pesan }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
@endsection
