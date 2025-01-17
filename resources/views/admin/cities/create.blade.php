@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create City</h1>
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">City Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter city name" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
