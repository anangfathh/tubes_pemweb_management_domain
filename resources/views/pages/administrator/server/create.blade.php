@extends('layouts.admin')

@section('content')

    <h1>Create Unit</h1>
    <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('administrator.server.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="name">Name</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                        placeholder="Input with icon left" name="name" id="name">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                <label for="name">Ip Address</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                        placeholder="Input with icon left" name="ip_address" id="ip_address">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                <label for="processor">Processor</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                        placeholder="Input with icon left" name="processor" id="processor">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                <label for="jumlah_core">Jumlah Core</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                        placeholder="Input with icon left" name="jumlah_core" id="jumlah_core">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                <label for="ram">Ram</label>
                                                <div class="position-relative">
                                                    <input type="number" class="form-control"
                                                        placeholder="Input with icon left" name="ram" id="ram">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="jenis" class="form-label">Jenis</label>
                                                    {{-- <input type="text" name="problem" id="problem" class="form-control"> --}}
                                                    <div class="form-group">
                                                        <select class="choices form-select" name="jenis" id="jenis">
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
                                                <div>
                                                    <label for="status" class="form-label">Unit</label>
                                                    {{-- <input type="text" name="problem" id="problem" class="form-control"> --}}
                                                    <div class="form-group">
                                                        <select class="choices form-select" name="unit_id" id="unit_id">
                                                            @foreach ($units as $unit)
                                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        <div class="col-12">
                                        </div>
                                        <div class="col-12 d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection