@extends('layouts.pic')


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
        <div class="card-footer">
                <a class="btn @if($response->status == 'doing')btn-secondary @else btn-success @endif" href="{{ route('pic.response.status', ['id' => $response->id]) }}">
                    <i class="bi bi-check-square-fill"></i>
                </a>
        </div>
    </div>
    @endforeach

    <div class="d-flex mb-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-arrow-up-right-square-fill"></i> <span class="ms-3">Add New Response</span>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                                        <div class="response-form">
                                            <form action="{{ route('pic.response.send', ['id' => $notification->id]) }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="target_date">Target Date</label>
                                                    <br>
                                                    <input type="date" name="target_date" id="target_date" required class="mb-3">
                                                    <br>
                                                    <label for="message" class="form-label">Target</label>
                                                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </form>
                                    </div>
            </div>
        </div>
        </div>
        <form action="{{ route('pic.notif.fixed', ['id' => $notification->id]) }}">
            <button class="btn btn-success ms-3">
                Fixed
            </button>
        </form>
    </div>
@endsection