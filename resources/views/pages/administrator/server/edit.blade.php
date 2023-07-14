
@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Server Update</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('administrator.server.index') }}">Server List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Domain Update</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
        <form action="{{ route('administrator.server.update', $server) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="form-group has-icon-left">
                    <label for="name">Name</label>
                    <div class="position-relative">
                        <input type="text" class="form-control"
                            placeholder="Input with icon left" name="name" id="name" value="{{ $server->name }}">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <label for="name">Ip Address</label>
                    <div class="position-relative">
                        <input type="text" class="form-control"
                            placeholder="Input with icon left" name="ip_address" id="ip_address" value="{{ $server->ip_address }}">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <label for="processor">Processor</label>
                    <div class="position-relative">
                        <input type="text" class="form-control"
                            placeholder="Input with icon left" name="processor" id="processor" value="{{ $server->processor }}">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <label for="jumlah_core">Jumlah Core</label>
                    <div class="position-relative">
                        <input type="text" class="form-control"
                            placeholder="Input with icon left" name="jumlah_core" id="jumlah_core" value="{{ $server->jumlah_core }}">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <label for="ram">Ram</label>
                    <div class="position-relative">
                        <input type="number" class="form-control"
                            placeholder="Input with icon left" name="ram" id="ram" value="{{ $server->ram }}">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div>
                        <label for="jenis" class="form-label">Jenis</label>
                        {{-- <input type="text" name="problem" id="problem" class="form-control"> --}}
                        <div class="form-group">
                            <select class="choices form-select" name="jenis" id="jenis" aria-valuenow="{{ $server->jenis }}">
                                <option value="fisik">Fisik</option>
                                <option value="virtual">Virtual</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label for="status" class="form-label">Status</label>
                        {{-- <input type="text" name="problem" id="problem" class="form-control"> --}}
                        <div class="form-group">
                            <select class="choices form-select" name="status" id="status">
                                <option value="aktif">Aktif</option>
                                <option value="non-aktif">Nonaktif</option>
                                <option value="suspend">Suspend</option>
                            </select>
                        </div>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary mb-5">Update</button>
        </form>

        </div>
    </div> 
</div>
    
 @endsection

