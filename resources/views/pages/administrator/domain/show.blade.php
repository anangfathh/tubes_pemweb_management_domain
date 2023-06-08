@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Domain Details</h1>

        <h3>Domain Information</h3>
        <p><strong>Domain Name:</strong> {{ $domain->name }}</p>
        <p><strong>Domain URL:</strong> {{ $domain->url }}</p>
        <!-- Display other domain information as needed -->

        <h3>Domain Images</h3>
        @if ($domainImages->count() > 0)
            <div class="row">
                @foreach ($domainImages as $image)
                    <div class="col-6">
                        <img src="{{ asset('storage/' . $image->url) }}" alt="Domain Image" class="w-50">
                    </div>
                @endforeach
            </div>
        @else
            <p>No domain images found.</p>
        @endif
        <h3>Add Domain Image</h3>
        <form action="{{ route('administrator.domain.uploadImage', $domain->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
@endsection