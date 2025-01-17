@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Hotel</h1>
    <form action="{{ route('hotels.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Hotel Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter hotel name" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Enter address" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="number" name="rating" id="rating" class="form-control" placeholder="Enter rating (1-5)" min="1" max="5" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </
