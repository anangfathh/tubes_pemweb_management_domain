@extends('layouts.admin')

@section('content')
        <h1>Edit Unit</h1>
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('administrator.unit.update', $unit->id) }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="name">Name</label>
                                                <div class="position-relative mb-3">
                                                    <input type="text" class="form-control"
                                                        placeholder="Unit Name" name="name" id="name" value="{{ $unit->name }}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-house-door"></i>
                                                    </div>
                                                </div>
                                                <label for="desc">Description</label>
                                                <div class="position-relative mb-3">
                                                    <input class="form-control"
                                                    placeholder="Unit Description" name="desc" id="desc" value="{{ $unit->desc }}"></input>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-journal"></i>
                                                    </div>
                                                </div>
                                                <label for="higher_domain">Sub Domain</label>
                                                <div class="position-relative mb-3">
                                                    <input type="text" class="form-control"
                                                        placeholder="Unit Sub Domain" name="higher_domain" id="higher_domain" value="{{ $unit->higer_domain }}">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-globe"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                        <div class="col-12">
                                        </div>
                                        <div class="col-12 d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

@endsection
