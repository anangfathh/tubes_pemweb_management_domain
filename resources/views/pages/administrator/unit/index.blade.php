
@extends('layouts.admin')

@section('content')
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Unit List</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Unit List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header mt-4 ms-2">
                <a href="{{ route('administrator.unit.create') }}" class="btn btn-success mb-3">Create Unit</a>
            </div>
            <div class="card-body">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Desc</th>
                            <th>Sub Domain</th>
                            <th class="col-4 col-lg-2 col-md-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $unit)
                        <tr>
                            <td>
                                {{ $unit->name }}
                            </td>
                            <td>
                                {{ $unit->desc }}
                            </td>
                            <td>
                                {{ $unit->higher_domain }}
                            </td>
                            <td>
                                <a href="{{ route('administrator.unit.edit', $unit->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('administrator.unit.destroy', $unit->id) }}" method="POST" class="d-inline">
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