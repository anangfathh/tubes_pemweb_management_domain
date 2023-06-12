@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Subject</th>
                <th>Problem</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $notification)          
            <tr>
                <td>{{ $notification->subject }}</td>
                <td>{{ $notification->problem }}</td>
                <td>{{ $notification->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection