@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">COOK DASHBOARD</h3>
                    <div class="text-end">
                        <div id="currentTime" class="h4 mb-0 text-primary"></div>
                        <div id="currentDate" class="text-muted"></div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Profile Settings -->
                        <div class="mb-5">
                            <h4 class="text-uppercase mb-4">Profile Settings</h4>
                            <div class="d-flex align-items-start mb-4">
                                <div class="me-4">
                                    <h5 class="mb-3">CHANGE PHOTO</h5>
                                    <div class="profile-photo-container">
                                        @if(Auth::user()->photo)
                                            <img src="{{ asset(Auth::user()->photo) }}" alt="Profile Photo" class="profile-photo">
                                        @else
                                            <div class="profile-photo-placeholder">
                                                <i class="bi bi-person-circle"></i>
                                            </div>
                                        @endif
                                        <input type="file" id="photo" name="photo" class="form-control" hidden>
                                        <button type="button" class="btn btn-outline-primary mt-2" onclick="document.getElementById('photo').click()">
                                            Change Photo
                                        </button>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="row">

                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label text-uppercase">EMAIL</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                        </div>
                                    </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="account_type" class="form-label text-uppercase">ACCOUNT TYPE</label>
                                            <input type="text" class="form-control" id="account_type" value="{{ Auth::user()->role }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Preferences -->
                        <div class="mb-5">
                            <h4 class="text-uppercase mb-4">NOTIFICATION PREFERENCES</h4>
                            
                            <div class="notification-setting mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">MEAL PLAN UPDATES</h5>
                                        <p class="text-muted mb-0">GET NOTIFIED WHEN THE MEAL SCHEDULE CHANGES</p>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="meal_plan_updates" name="meal_plan_updates" {{ $settings->meal_plan_updates ?? true ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>

                            <div class="notification-setting mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">LOW STOCK ALERTS</h5>
                                        <p class="text-muted mb-0">GET NOTIFIED WHEN INGREDIENTS ARE RUNNING LOW</p>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="low_stock_alerts" name="low_stock_alerts" {{ $settings->low_stock_alerts ?? true ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>

                            <div class="notification-setting mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">PURCHASE ORDER UPDATES</h5>
                                        <p class="text-muted mb-0">GET UPDATES WHEN AN ORDER IS PLACED OR APPROVED</p>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="purchase_order_updates" name="purchase_order_updates" {{ $settings->purchase_order_updates ?? true ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>

                            <div class="notification-setting mb-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">FOOD WASTE TRACKING ALERTS</h5>
                                        <p class="text-muted mb-0">GET NOTIFIED WHEN NEW WASTE REPORTS ARE LOGGED</p>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="waste_tracking_alerts" name="waste_tracking_alerts" {{ $settings->waste_tracking_alerts ?? true ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border: none;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }

    .card-header {
        background-color: #f8f9fc;
        border-bottom: 1px solid #e3e6f0;
    }

    .profile-photo-container {
        text-align: center;
    }

    .profile-photo, .profile-photo-placeholder {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-bottom: 1rem;
        object-fit: cover;
    }

    .profile-photo-placeholder {
        background: #f8f9fc;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: #d1d3e2;
    }

    .form-check-input {
        width: 3em;
        height: 1.5em;
        margin-top: 0;
    }

    .form-check-input:checked {
        background-color: #198754;
        border-color: #198754;
    }

    .notification-setting {
        padding: 1rem;
        border-radius: 0.5rem;
        background-color: #f8f9fc;
    }

    .notification-setting:hover {
        background-color: #eaecf4;
    }

    h5 {
        font-size: 1rem;
        font-weight: 600;
    }

    .text-muted {
        font-size: 0.875rem;
    }
</style>
@endpush

@push('scripts')
<script>
    function updateDateTime() {
        const now = new Date();

        // Update time
        const timeOptions = {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: true
        };
        document.getElementById('currentTime').textContent = now.toLocaleTimeString('en-US', timeOptions);

        // Update date
        const dateOptions = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        document.getElementById('currentDate').textContent = now.toLocaleDateString('en-US', dateOptions);
    }

    // Update immediately and every second
    updateDateTime();
    setInterval(updateDateTime, 1000);

    // Preview uploaded photo
    document.getElementById('photo').addEventListener('change', function(e) {
        if (e.target.files && e.target.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const photoContainer = document.querySelector('.profile-photo-container');
                const existingPhoto = photoContainer.querySelector('img');
                const placeholder = photoContainer.querySelector('.profile-photo-placeholder');
                
                if (existingPhoto) {
                    existingPhoto.src = e.target.result;
                } else if (placeholder) {
                    placeholder.remove();
                    const newPhoto = document.createElement('img');
                    newPhoto.src = e.target.result;
                    newPhoto.classList.add('profile-photo');
                    newPhoto.alt = 'Profile Photo';
                    photoContainer.insertBefore(newPhoto, photoContainer.firstChild);
                }
            }
            reader.readAsDataURL(e.target.files[0]);
        }
    });
</script>
@endpush
