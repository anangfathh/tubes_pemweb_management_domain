@extends('layouts.admin')


@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                {{-- <h3>Report</h3> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Report</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">


    
        @if(Auth::user()->is_admin === 1)
        <div class="row">
            <div class="col-4">
                <div class="card me-2">
                    <div class="card-header text-center">
                        <h3>Jumlah Unit</h3>
                    </div>
                    <div class="card-body text-center">
                        <h3>
                            {{ \App\Models\Unit::all()->count() }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card me-2">
                    <div class="card-header text-center">
                        <h3>Active Domain</h3>
                    </div>
                    <div class="card-body text-center">
                        <h3>
                            {{ \App\Models\Domain::where('http_status', 'aktif')->count() }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Inactive Domain</h3>
                    </div> 
                    <div class="card-body text-center">
                        <h3>
                            {{ \App\Models\Domain::where('http_status', '!=', 'aktif')->count() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>


        
        @endif
        @foreach ($units as $unit)
        <div class="card">
                    <div class="card-header">
                        <h5 class="align-item-center">{{ $unit->name }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <p>Jumlah Domaint Active</p>
                            </div>
                            <div class="col-6"> 
                                                                <p>                                                {{ \App\Models\Domain::where('http_status', 'aktif')
                                            ->whereHas('server', function ($query) use ($unit) {
                                                $query->where('unit_id', $unit->id);
                                            })->count() }}
                            </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Jumlah Domain Non Active</p>
                        </div>
                        <div class="col-6">
                            <p>                                                {{ \App\Models\Domain::where('http_status', 'nonaktif')
                                            ->whereHas('server', function ($query) use ($unit) {
                                                $query->where('unit_id', $unit->id);
                                            })->count() }}
                            </p>
                        </div>    
                    </div>    
                </div>                
            </div>
            @endforeach
        </section>
        </div>
        @endsection