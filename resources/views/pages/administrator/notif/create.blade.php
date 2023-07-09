@extends('layouts.admin')

@section('content')
<div class="page-heading">
        <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Notify Domain</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('administrator.domain.index') }}">Domain List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Notify Domain</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">

            <form action="{{ route('administrator.notification.store', ['domain' => $domain->id]) }}" method="POST">
                @csrf
                <div class="mb-3 mt-4">
                    <h5>Target Domain : {{ $domain->name }}</h5>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subjext</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="problem" class="form-label">Problem</label>
                    {{-- <input type="text" name="problem" id="problem" class="form-control"> --}}
                    <div class="form-group">
                        <select class="choices form-select" name="problem" id="problem">
                            <option value="Hacked">Hacked</option>
                            <option value="Bug">Bug</option>
                            <option value="Update">Update</option>
                            <option value="Expired">Expired</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
                {{-- <div class="mb-3">
                    <label for="status" class="form-label">status</label>
                    <input type="text" name="status" id="status" class="form-control">
                </div> --}}
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="5"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary mb-5"><i class="bi bi-send-fill me-2"></i>  Send</button>
            </form>
        </div>
        </div>
        
        
    </div>
        @endsection
        