@extends('layouts.app')

@section('content')
<style>
/* General Card Enhancements */
.card {
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Header Styling */
.card-header {
    background: #007bff;
    color: white;
    font-weight: bold;
    font-size: 1.2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* List Group Item */
.list-group-item {
    border: none;
    border-bottom: 1px solid #eee;
    padding: 15px 10px;
    background-color: #f9f9f9;
    transition: background-color 0.3s;
}
.list-group-item:hover {
    background-color: #eef6ff;
}

/* Alert Types */
.list-group-item .fw-bold {
    font-size: 1rem;
}
.text-danger i {
    color: #dc3545;
}
.text-primary i {
    color: #007bff;
}
.text-success i {
    color: #28a745;
}

/* Action Buttons */
.btn {
    transition: 0.2s ease-in-out;
}
.btn:hover {
    transform: scale(1.03);
}

/* Toggle Switch Styling */
.form-check-input:checked {
    background-color: #28a745;
    border-color: #28a745;
}
.form-check-label {
    margin-left: 10px;
    font-weight: 500;
    color: #fff;
}
</style>

<!-- Include Bootstrap Icons (optional) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header">
                    <span>Alerts & Notifications</span>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="notifToggle" checked>
                        <label class="form-check-label" for="notifToggle">Meal Plan Updates</label>
                    </div>
                </div>

                <div class="card-body">
                    {{-- Notification Items --}}
                    <div class="list-group mb-3">
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold text-danger">
                                    <i class="bi bi-exclamation-circle-fill"></i> Ingredient Alert
                                </div>
                                Today's meal contains [ingredient]. Make sure it's safe for you.
                            </div>
                            <small class="text-muted">2 mins ago</small>
                        </div>

                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold text-primary">
                                    <i class="bi bi-calendar-event"></i> Schedule Update
                                </div>
                                Meal schedule updated! Check the new weekly plan.
                            </div>
                            <small class="text-muted">1 hour ago</small>
                        </div>

                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold text-success">
                                    <i class="bi bi-chat-dots"></i> Feedback
                                </div>
                                How was your meal today? Share your thoughts!
                            </div>
                            <small class="text-muted">Yesterday</small>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="d-flex justify-content-end gap-2">
                        <button class="btn btn-outline-secondary btn-sm">Mark all as read</button>
                        <button class="btn btn-outline-danger btn-sm">Clear all</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
