@extends('layouts.admin')

@section('content')
    <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
        <h1>Notify Domain</h1>
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
                        <option value="square">Hacked</option>
                        <option value="rectangle">Bug</option>
                        <option value="rombo">Other</option>
                        <option value="romboid">Romboid</option>
                        <option value="trapeze">Trapeze</option>
                        <option value="traible">Triangle</option>
                        <option value="polygon">Polygon</option>
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
        

@endsection
