@extends('layouts.admin')

@section('content')
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Notifications List</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Notifications List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header mt-4 ms-2">
                {{-- <a href="{{ route('administrator.server.create') }}" class="btn btn-success mb-3">Create server</a> --}}
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Problem</th>
                            <th>Status</th>
                            <th class="col-4 col-lg-2 col-md-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notification)
                        <tr>
                            <td>
                                {{ $notification->subject }}
                            </td>
                            <td>
                                {{ $notification->problem }}
                            </td>
                            <td>
                                @if(strtolower($notification->status) === 'unrespond') <span class="badge bg-danger">{{ $notification->status }}</span> @elseif($notification->status === 'doing') <span class="badge bg-info">{{ ucfirst($notification->status) }}</span> @else <span class="badge bg-success">{{ ucfirst($notification->status) }}</span> @endif
                            </td>
                            <td>
                                <a href="{{ route('administrator.server.edit', $notification->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('administrator.server.destroy', $notification->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection