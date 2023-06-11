@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Unit</h1>
        <form action="{{ route('administrator.unit.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection