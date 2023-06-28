@extends('layouts.pic')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">Notifications</h2>
    </div>
    <div class="card-content">
        <div class="card-body">
            <!-- Table with outer spacing -->
            <div class="table-responsive">
                <table class="table table-lg">
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Pengirim</th>
                            <th>Domain</th>
                            <th>Problem</th>
                            <th>Status</th>
                            <th>Response</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notifications as $notification)
                        <tr>
                            <td class="text-bold-500">{{ $notification->subject }}</td>
                            <td>{{ $notification->user->name }}</td>
                            <td>{{ $notification->domain->name }}</td>
                            <td>{{ $notification->problem }}</td>
                            <td class="text-bold-500">@if(strtolower($notification->status) === 'unrespond') <span class="badge bg-danger">{{ $notification->status }}</span> @elseif($notification->status === 'doing') <span class="badge bg-info">{{ ucfirst($notification->status) }}</span> @else <span class="badge bg-success">{{ ucfirst($notification->status) }}</span> @endif</td>
                            <td>
                                <a href="{{ route('pic.response', ['id' => $notification->id]) }}" class="btn btn-warning">
                                    <i class="bi bi-chat-left-dots"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- <script>
    // Mengambil elemen tombol "Add Response"
    var addResponseButton = document.getElementById("add-response-button");

    // Mengambil elemen form response
    var responseForm = document.querySelector(".response-form");

    // Menambahkan event listener untuk saat tombol diklik
    addResponseButton.addEventListener("click", function() {
        // Menampilkan form response
        responseForm.style.display = "block";
    });
</script> --}}
@endsection