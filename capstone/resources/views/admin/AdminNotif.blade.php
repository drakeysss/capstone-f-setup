<!-- resources/views/AdminNotif.blade.php -->

@extends('component.layout') <!-- Main layout -->

@section('title', 'Alerts and Notifications')

@section('content')
    @include('component.nav') <!-- Include navigation bar -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Alerts and Notifications</h5>
                        <button class="btn btn-primary">
                            <i class="fas fa-bell"></i> Mark All as Read
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">New User Registration</h6>
                                    <small class="text-muted">3 days ago</small>
                                </div>
                                <p class="mb-1">A new user has registered in the system.</p>
                            </div>
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">Profile Update</h6>
                                    <small class="text-muted">1 week ago</small>
                                </div>
                                <p class="mb-1">Your profile information has been updated.</p>
                            </div>
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">System Maintenance</h6>
                                    <small class="text-muted">2 weeks ago</small>
                                </div>
                                <p class="mb-1">System maintenance completed successfully.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
