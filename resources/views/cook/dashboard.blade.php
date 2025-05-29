@extends('layouts.app')

@php use Illuminate\Support\Str; @endphp

@section('content')
<div class="cook-container">
    <!-- Welcome Section -->
    <div class="welcome-card">
        <div class="welcome-content">
            <h2>Welcome, {{ Auth::user()->name }}!</h2>
            <p>Here's an overview of your kitchen operations</p>
        </div>
        <div class="current-time">
            <i class="bi bi-clock"></i>
            <span id="currentDateTime"></span>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="stats-grid">
        <a href="{{ route('cook.purchase-orders.pending') }}" class="stat-card pending">
            <div class="stat-icon">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $pendingOrders ?? 0 }}</h3>
                <p>Pending Orders</p>
            </div>
        </a>

        <a href="{{ route('cook.purchase-orders.completed') }}" class="stat-card completed">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $completedOrders ?? 0 }}</h3>
                <p>Completed Orders</p>
            </div>
        </a>

        <a href="{{ route('cook.inventory.low-stock') }}" class="stat-card inventory">
            <div class="stat-icon">
                <i class="bi bi-box-seam"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $lowStockItems ?? 0 }}</h3>
                <p>Low Stock Items</p>
            </div>
        </a>
    </div>

    <!-- Today's Menu Section -->
    <div class="menu-section mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Today's Menu ({{ $currentDay }})</h5>
            </div>
            <div class="card-body">
                @if($todaysMenu->count() > 0)
                    <div class="row">
                        @foreach($todaysMenu as $menu)
                            <div class="col-md-4 mb-4">
                                <div class="menu-card">
                                    <div class="menu-card-header">
                                        <h6 class="mb-0">{{ ucfirst($menu->meal_type) }}</h6>
                                    </div>
                                    <div class="menu-card-body">
                                        <h5 class="menu-item">{{ $menu->menu }}</h5>
                                        @if($menu->ingredients)
                                            <div class="ingredients mt-3">
                                                <h6 class="text-muted mb-2">Ingredients:</h6>
                                                <ul class="list-unstyled">
                                                    @php
                                                        $ingredients = explode(',', $menu->ingredients);
                                                    @endphp
                                                    @foreach($ingredients as $ingredient)
                                                        @if(trim($ingredient))
                                                            <li><i class="bi bi-dot"></i> {{ trim($ingredient) }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted mb-0">No menu items scheduled for today.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/cook.css') }}">
<style>
    .menu-section .card {
        border: none;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }
    .menu-section .card-header {
        background-color: #fff;
        border-bottom: 1px solid #e3e6f0;
    }
    .menu-card {
        background: #fff;
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        height: 100%;
    }
    .menu-card-header {
        background: #f8f9fc;
        padding: 1rem;
        border-bottom: 1px solid #e3e6f0;
        border-radius: 0.5rem 0.5rem 0 0;
    }
    .menu-card-body {
        padding: 1rem;
    }
    .menu-item {
        color: #2e59d9;
        font-weight: 600;
    }
    .ingredients ul li {
        margin-bottom: 0.25rem;
        color: #5a5c69;
    }
    .ingredients ul li i {
        color: #2e59d9;
        margin-right: 0.5rem;
    }
</style>
@endpush

@push('scripts')
<script>
    function updateDateTime() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        };
        document.getElementById('currentDateTime').textContent = now.toLocaleDateString('en-US', options);
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>
@endpush