
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Units</h1>
        <a href="{{ route('administrator.unit.create') }}" class="btn btn-primary mb-3">Create Unit</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($units as $unit)
                    <tr>
                        <td>{{ $unit->name }}</td>
                        <td>
                            <a href="{{ route('administrator.unit.edit', $unit->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('administrator.unit.destroy', $unit->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection