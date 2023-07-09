@extends('layouts.admin')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Domain Details</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('administrator.domain.index') }}">Domain List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Domain Details</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> 
        <div class="card">
            <div class="card-header">
                <h5>Domain Information</h5>
            </div>
            <div class="card-body">
                <table class="table table-hover p-3">
                    <tr>
                        <td class="col-2">
                            <p><strong>Domain Name</strong> </p>
                        </td>
                        <td class="col-1"> 
                            <p> : </p>
                        </td>
                        <td>
                            <p>{{ $domain->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-2">
                            <p><strong>Unit </strong> </p>
                        </td>
                        <td class="col-1"> 
                            <p> : </p>
                        </td>
                        <td>
                            <p>{{ $domain->unit->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-2">
                            <p><strong>Domain URL </strong> </p>
                        </td>
                        <td class="col-1"> 
                            <p> : </p>
                        </td>
                        <td>
                            <p>{{ $domain->url }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-2">
                            <p><strong>Domain Description </strong></p>
                        </td>
                        <td class="col-1"> 
                            <p> : </p>
                        </td>
                        <td>
                            <p>{{ $domain->desc }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-2">
                            <p><strong> Server Name </strong> </p>
                        </td>
                        <td class="col-1"> 
                            <p> : </p>
                        </td>
                        <td>
                            <p>{{ $domain->server->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-2">
                            <p><strong> PIC </strong> </p>
                        </td>
                        <td class="col-1"> 
                            <p> : </p>
                        </td>
                        <td>
                            <p>{{ $domain->user->name }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-2">
                            <p><strong> No HP PIC </strong> </p>
                        </td>
                        <td class="col-1"> 
                            <p> : </p>
                        </td>
                        <td>
                            <p>{{ $domain->user->phone_number }}</p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- Display other domain information as needed -->
        
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Domain Gallery</h5>
                        </div>
                        <div class="card-body">
                            <div class="row gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        @if ($domainImages->count() > 0)
                        <div class="row">
                            @foreach ($domainImages as $image)
                            <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-0 mb-md-0 mb-2">
                                <a href="#">
                                    <img class="img-fluid h-100 active" src="{{ asset('storage/' . $image->url) }}" data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                </a>
                            </div>
                            @if($loop->iteration % 4 === 0)
                            <div class="row mt-2 mt-md-4 gallery" data-bs-toggle="modal" data-bs-target="#galleryModal">
                                @endif
                                @endforeach
                            </div>
                            @else
                            <p>No domain images found.</p>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <h3>Add Domain Image</h3>
    <form action="{{ route('administrator.domain.uploadImage', $domain->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary mb-5">Upload</button>
    </form>
</div>
    @endsection