@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row">
        <!-- Statistics Cards -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Monthly Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $monthlyOrders ?? 24 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cart-check fs-1 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Spent</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">RM {{ $totalSpent ?? '150.00' }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-wallet2 fs-1 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Order Streak</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orderStreak ?? 5 }} Days</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-lightning-charge fs-1 text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Favorite Meal</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $favoriteMeal ?? 'Chicken Rice' }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-heart fs-1 text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order History -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Order History</h6>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
                            <i class="bi bi-filter me-2"></i>Filter
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">All Orders</a></li>
                            <li><a class="dropdown-item" href="#">This Week</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">Last Month</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Items</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#123</td>
                                    <td>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex align-items-center mb-1">
                                                <span class="badge bg-primary me-2">1x</span>
                                                <span>Chicken Rice</span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <span class="badge bg-primary me-2">1x</span>
                                                <span>Vegetable Soup</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>Today, 10:30 AM</td>
                                    <td>RM 12.50</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
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
        border-radius: 0.5rem;
    }
    
    .border-left-primary {
        border-left: 4px solid #4e73df !important;
    }
    
    .border-left-success {
        border-left: 4px solid #1cc88a !important;
    }
    
    .border-left-info {
        border-left: 4px solid #36b9cc !important;
    }
    
    .border-left-warning {
        border-left: 4px solid #f6c23e !important;
    }
    
    .text-gray-800 {
        color: #5a5c69 !important;
    }
    
    .table th {
        font-weight: 600;
        color: #6c757d;
    }
    
    .badge {
        font-weight: 500;
        padding: 0.5em 0.75em;
    }
</style>
@endpush
