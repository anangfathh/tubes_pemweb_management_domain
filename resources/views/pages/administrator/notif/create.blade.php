@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Unit</h1>
        <form action="{{ route('administrator.notification.store', ['domain' => $domain->id]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="subject" class="form-label">Subjext</label>
                <input type="text" name="subject" id="subject" class="form-control">
            </div>
            <div class="mb-3">
                <label for="problem" class="form-label">Problem</label>
                <input type="text" name="problem" id="problem" class="form-control">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">status</label>
                <input type="text" name="status" id="status" class="form-control">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <input type="text" name="message" id="message" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
