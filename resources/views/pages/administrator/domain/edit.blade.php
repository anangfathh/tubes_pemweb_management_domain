@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Edit Domain</h1>
        <form action="{{ route('administrator.domain.update', $domain) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" name="url" id="url" class="form-control" value="{{ $domain->url }}" required>
            </div>
            <div class="form-group">
                <label for="url">desc</label>
                <input type="text" name="desc" id="desc" class="form-control" value="{{ $domain->desc }}" required>
            </div>
            <div class="form-group">
                <label for="url">Jenis Aplikasi</label>
                <input type="text" name="jenis_aplikasi" id="jenis_aplikasi" class="form-control" value="{{ $domain->jenis_aplikasi }}" required>
            </div>
                        <div class="form-group">
                <label for="url">Port</label>
                <input type="text" name="port" id="port" class="form-control" value="{{ $domain->port }}" required>
            </div>
                 <div class="form-group">
                <label for="http_status">HTTP Status</label>
                <select name="http_status" id="http_status" class="form-control" required>
                    <option value="aktif">Aktif</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="server_id">Server</label>
                <select name="server_id" id="server_id" class="form-control" required>
                    @foreach ($servers as $server)
                        <option value="{{ $server->id }}">{{ $server->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">PIC</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
                                                            <h4 class="mt-0 header-title">Upload Ganbar baru (jika ada)</h4>
                                                {{-- <p class="text-muted mb-4 font-13">
                                                    Maks 3 image
                                                </p> --}}
                                                <input type="file" id="input-file-now-custom-3" class="dropify"
                                                    data-height="500" name="images[]" multiple required />
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection