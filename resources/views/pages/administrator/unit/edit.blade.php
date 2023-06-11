@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Unit</h1>
        <form action="{{ route('administrator.unit.update', $unit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $unit->name }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection