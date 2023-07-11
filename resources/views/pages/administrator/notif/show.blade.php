@extends('layouts.admin')


@section('content')
   <div class="divider">
        <div class="divider-text">Message</div>
    </div>
    <div class="card border mb-3">
    <div class="card-header">
        <strong>
            {{ $notification->user->name }}   
        </strong> 
    </div>
    <div class="card-body">
        {{-- <h5 class="card-title">Special title treatment</h5> --}}
        <p class="card-text">{{ $notification->message }}</p>
        {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
    </div>
    </div>
    <div class="divider">
        <div class="divider-text">Response</div>
    </div>
    @foreach($notification->response as $response)
    <div class="card border mb-3">
        <div class="card-header">
            <strong>
                Target Selesai :  
            </strong> 
                <p>
                    {{ $response->target_date }}
                </p>  
        </div>
        <div class="card-body mb-3">
            <strong>
                Target Perbaikan :
            </strong>
            {{-- <h5 class="card-title">Special title treatment</h5> --}}
            <p class="card-text">{{ $response->message }}</p>
            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
        </div>
    </div>
    @endforeach
@endsection