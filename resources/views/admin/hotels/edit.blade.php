@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Hotel</h1>
    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Hotel Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $hotel->name }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class
