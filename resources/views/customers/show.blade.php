@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Customer Details</h1>
        <p><strong>Name:</strong> {{ $customer->name }}</p>
        <p><strong>Email:</strong> {{ $customer->email }}</p>
        <p><strong>Phone Number:</strong> {{ $customer->notelp }}</p>
    </div>
@endsection
