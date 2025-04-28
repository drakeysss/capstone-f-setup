@extends('component.layout')

<link rel="stylesheet" href="{{ asset('css/layout.css') }}">

@section('title', 'Student Settings')

@section('content')

    @include('component.nav')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Student Settings</h5>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#editProfileModal">
                            <i class="fas fa-user-edit"></i> Edit Profile
                        </button>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('student.settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $student->full_name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $student->email }}" required>    

                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $student->phone }}" required>
                            </div>

                            <div class="preferences">
                                <h5>Preferences</h5>
                                <div class="form-check mb-2">
                                    
                                    <label class="form-check-label" for="meal_notifications">
                                        <input type="checkbox" class="form-check-input" id="meal_notifications" name="meal_notifications" {{ $student->meal_notifications ? 'checked' : '' }}>
                                        <span>Meal Reminders</span>
                                        <p>Get notified about the meal</p>
                                    </label>

                                    <label class="form-check-label" for="meal_notifications">
                                        <input type="checkbox" class="form-check-input" id="meal_notifications" name="meal_notifications" {{ $student->meal_notifications ? 'checked' : '' }}>
                                        <span>Alert for the meal changes</span>
                                        <p>Get notified if there's changes in meal</p>
                                    </label>
                                    <label class></label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
