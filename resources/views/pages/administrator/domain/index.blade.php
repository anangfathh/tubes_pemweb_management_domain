@extends('layouts.admin')

@section('content')
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Domain List</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">domain List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header mt-4 ms-2">
                <a href="{{ route('administrator.domain.create') }}" class="btn btn-success mb-3">Create domain</a>
                <a href="{{ route('administrator.domain.export') }}" class="btn btn-info mb-3 ms-2">Export</a>
            </div>
            <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            Domain gagal terhapus, pastikan sudah tidak ada data yang berkaitan dengan Domain ini!!
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-light-success color-success alert-dismissible"><i class="bi bi-check-circle"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Jenis Aplikasi</th>
                            <th>Port</th>
                            <th>HTTP Status</th>
                            <th>Notify</th>
                            <th class="col-4 col-lg-2 col-md-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($domains as $domain)
                        <tr>
                            <td>
                                {{ $domain->name }}
                            </td>
                            <td>
                                {{ $domain->url }}
                            </td>
                            <td>
                                {{ $domain->jenis_aplikasi }}
                            </td>
                            <td>
                                {{ $domain->port }}
                            </td>
                            <td>
                                {{ $domain->http_status }}
                            </td>
                            <td>
                                <a href="{{ route('administrator.notification.create', $domain) }}" class="btn btn-warning"><i class="bi bi-bell"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('administrator.domain.show', $domain->id) }}" class="btn btn-success"><i class="bi bi-eye-fill"></i></i></a>
                                <a href="{{ route('administrator.domain.edit', $domain->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('administrator.domain.destroy', $domain->id) }}" method="POST" class="d-inline">
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
