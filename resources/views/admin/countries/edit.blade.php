@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Country</h1>
    <form action="{{ route('countries.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Country Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $country->name }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
