@extends('layouts.app')

@section('title', 'Customer List')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">Customer List</h1>
        <a href="{{ route('customers.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 mb-4 inline-block">Add Customer</a>
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Phone Number</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $customer->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $customer->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $customer->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $customer->notelp }}</td>
                        <td class="py-2 px-4 border-b flex space-x-2">
                            <a href="{{ route('customers.show', $customer->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600">View</a>
                            <a href="{{ route('customers.edit', $customer->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
