@extends('layouts.admin')

@section('content')
<div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
        
        <h1>Domain Details</h1>

        <h3>Domain Information</h3>
        <p><strong>Domain Name:</strong> {{ $domain->name }}</p>
        <p><strong>Domain URL:</strong> {{ $domain->url }}</p>
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
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
@endsection