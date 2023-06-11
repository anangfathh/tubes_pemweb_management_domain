@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Domain List</h1>
        <a href="{{ route('administrator.domain.create') }}" class="btn btn-primary mb-3">Create New Domain</a>
        
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>URL</th>
                    <th>Description</th>
                    <th>Jenis Aplikasi</th>
                    <th>Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($domains as $domain)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $domain->url }}</td>
                    <td>{{ $domain->desc }}</td>
                    <td>{{ $domain->jenis_aplikasi }}</td>
                    <td><a href="{{ route('administrator.domain.show', $domain) }}" class="btn btn-sm btn-success">Show</a></td>
                    <td>
                        <a href="{{ route('administrator.notification.create', $domain) }}" class="btn btn-sm btn-primary">Notify</a>
                        <form action="{{ route('administrator.domain.destroy', $domain) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this domain?')">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
