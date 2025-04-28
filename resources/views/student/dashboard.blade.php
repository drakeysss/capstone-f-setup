@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row">
        <!-- Welcome Card -->
        <!-- Welcome Card -->
        <div class="col-12 mb-4">
            <div class="card border-0 bg-primary text-white overflow-hidden">
                <div class="card-body p-4 position-relative">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="fw-bold mb-1">Welcome back, {{ Auth::user()->name }}!</h4>
                            <p class="mb-0 opacity-75">Here's your meal planning overview</p>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cup-hot display-4 opacity-25"></i>
                        </div>
                    </div>
                </div>
                <div class="position-absolute top-0 end-0 p-4">
                    <div class="d-flex gap-2">
                        <a href="{{ route('student.menu') }}" class="btn btn-sm btn-light">View Menu</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0">
                            <div class="stats-circle bg-success-subtle">
                                <i class="bi bi-wallet2 text-success"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0 text-muted small text-uppercase">Monthly Savings</h6>
                        </div>
                    </div>
                    <h4 class="mb-0 fw-bold">$215</h4>
                    <div class="mt-2 small text-success">
                        <i class="bi bi-arrow-up me-1"></i>
                        <span>12% from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Menu Items Available</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-journal-text text-gray-300 h1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Notifications</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-bell text-gray-300 h1"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Today's Menu -->
        <div class="col-12 col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold">Today's Menu Highlights</h6>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Chicken Rice</h6>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Vegetable Curry</h6>
                            </div>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Fish & Chips</h6>
                               
                            </div>
                           
                        </a>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('student.menu') }}" class="btn btn-success btn-sm w-100">View Full Menu</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('styles')
<style>
    .border-left-primary {
        border-left: 4px solid var(--primary-color) !important;
    }
    .border-left-success {
        border-left: 4px solid var(--success-color) !important;
    }
    .border-left-info {
        border-left: 4px solid var(--info-color) !important;
    }
    .border-left-warning {
        border-left: 4px solid var(--warning-color) !important;
    }
    .text-gray-300 {
        color: #dddfeb !important;
    }
    .text-gray-800 {
        color: #5a5c69 !important;
    }
</style>
@endpush
