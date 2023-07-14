@extends('layouts.pic')

@section('content')
<div class="page-heading">
    <div class="card">
        <div class="card-header">
            <h3>Welcome, {{ Auth::user()->name }}</h3>
        </div>
        <div class="card-body">
            <h6>Welcome Back</h6>
        </div>
    </div>
</div> 
<div class="page-content"> 
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="ph ph-globe"></i>   
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Total Domain</h6>
                                    <h6 class="font-extrabold mb-0">{{ $domainCount }}</h6>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card"> 
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="ph ph-seal-check"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Active HTTP</h6>
                                    <h6 class="font-extrabold mb-0">{{ $httpStatusCount }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Following</h6>
                                    <h6 class="font-extrabold mb-0">80.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                     <h3 class="mb-2">Chart Domain Status</h3>
     <div class="container px-4 mb-5">
    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>

    </div> 
            </div>
            <div class="row">
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <h4>Recent Notifications</h4>
                </div>
                <div class="card-content pb-4">
                    @foreach($notifications as $notification)
                    <div class="recent-message d-flex px-4 py-3">
                        <div class="avatar avatar-lg">
                            <img src="{{ asset('images/faces/4.jpg')  }}">
                        </div>
                        <div class="name ms-4">
                            <h6 class="mb-1">{{ $notification->user->name }}</h6>
                            <h6 class="text-muted mb-0">{{ $notification->subject }}</h6>
                        </div>
                    </div>
                    @endforeach
                    <div class="px-4">
                        <a class='btn btn-block btn-xl btn-outline-primary font-bold mt-3' href="{{ route('pic.notif') }}">See All Notification</a>
                    </div>
                </div>
            </div> 
        </div>  
    </section>
</div>
@endsection

@section('script')
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}

@endsection