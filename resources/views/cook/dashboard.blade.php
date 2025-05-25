@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-card">
                <div class="welcome-content">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                    <p class="text-muted" style="color: white;">Here's an overview of your kitchen operations</p>
                </div>
                <div class="current-time">
                    <i class="bi bi-clock"></i>
                    <span id="currentDateTime"></span>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <a href="{{ route('cook.purchase-orders.pending') }}" style="text-decoration: none;">
                <div class="stat-card pending">
                    <div class="stat-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $pendingOrders ?? 0 }}</h3>
                        <p>Pending Orders</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <a href="{{ route('cook.purchase-orders.completed') }}" style="text-decoration: none;">
                <div class="stat-card completed">
                    <div class="stat-icon">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $completedOrders ?? 0 }}</h3>
                        <p>Completed Orders</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <a href="{{ route('cook.inventory.low-stock') }}" style="text-decoration: none;">
                <div class="stat-card inventory">
                    <div class="stat-icon">
                        <i class="bi bi-box-seam"></i>
                    </div>
                    <div class="stat-info">
                        <h3>{{ $lowStockItems ?? 0 }}</h3>
                        <p>Low Stock Items</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Recent Orders -->
        <div class="col-12 mb-4">
            <div class="card main-card">
                <div class="card-header">
                    <h5 class="card-title">Recent Orders</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="ordersTable">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders ?? [] as $order)
                                    @foreach($order->items as $index => $item)
                                    <tr>
                                        @if($index === 0)
                                            <td rowspan="{{ count($order->items) }}">#{{ $order->id }}</td>
                                        @endif
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->unit }}</td>
                                        <td>₱{{ number_format($item->price, 2) }}</td>
                                        @if($index === 0)
                                            <td rowspan="{{ count($order->items) }}">
                                                <span class="status-badge {{ $order->status }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No orders found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Overview -->
        <div class="col-12 mb-4">
            <div class="card main-card">
                <div class="card-header">
                    <h5 class="card-title">Menu Overview</h5>
                    <a href="{{ route('cook.menu') }}" class="btn btn-view-all">View All</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="overview-stats">
                                <div class="stat">
                                    <span class="stat-value">{{ $activeMenuItems ?? 0 }}</span>
                                    <span class="stat-label">Active Items</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-value">{{ $totalMenuItems ?? 0 }}</span>
                                    <span class="stat-label">Total Items</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Meal Type</th>
                                            <th>Menu Item</th>
                                            <th>Ingredients</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($weeklyMenu ?? [] as $menu)
                                        <tr>
                                            <td>{{ ucfirst($menu->meal_type) }}</td>
                                            <td>{{ $menu->menu_item }}</td>
                                            <td>{{ $menu->ingredients }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No menu items for Week 1 & 3 Saturday</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* General Styles */
    .container-fluid {
        background-color: #f8f9fc;
    }

    /* Welcome Card */
    .welcome-card {
        background: #22bbea;
        color: white;
        padding: 1.5rem;
        border-radius: 1rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }

    .welcome-content h2 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .current-time {
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Stat Cards */
    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        transition: transform 0.2s;
        height: 100%;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .stat-info h3 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 600;
    }

    .stat-info p {
        margin: 0;
        color: #6c757d;
    }

    .pending .stat-icon {
        background-color: #f6c23e;
        color: white;
    }

    .completed .stat-icon {
        background-color: #1cc88a;
        color: white;
    }

    .inventory .stat-icon {
        background-color: #36b9cc;
        color: white;
    }

    /* Main Cards */
    .main-card {
        background: white;
        border-radius: 1rem;
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
        border: none;
    }

    .card-header {
        background: none;
        border-bottom: 1px solid #e3e6f0;
        padding: 1rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-title {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 600;
        color: #ff9933;
    }

    .card-actions {
        display: flex;
        gap: 0.5rem;
    }

    /* Overview Stats */
    .overview-stats {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        padding: 1rem;
        background: #f8f9fc;
        border-radius: 0.5rem;
        height: 100%;
    }

    .stat {
        text-align: center;
    }

    .stat-value {
        display: block;
        font-size: 2rem;
        font-weight: 600;
        color: #4e73df;
        margin-bottom: 0.25rem;
    }

    .stat-label {
        display: block;
        font-size: 0.875rem;
        color: #6c757d;
    }

    /* Order Items */
    .order-items {
        display: flex;
        flex-wrap: wrap;
        gap: 0.25rem;
    }

    .order-items .badge {
        font-size: 0.75rem;
        padding: 0.35rem 0.65rem;
    }

    /* Buttons */
    .btn-view-all {
        background: #22bbea;
        color: white;
        padding: 0.375rem 0.75rem;
        border-radius: 0.35rem;
        text-decoration: none;
    }

    .btn-view-all:hover {
        background: #ff9933;
        color: white;
    }

    .btn-filter {
        background: #f8f9fc;
        border: 1px solid #e3e6f0;
        color: #4e73df;
        padding: 0.375rem 0.75rem;
        border-radius: 0.35rem;
    }

    .btn-icon {
        background: none;
        border: none;
        color: #4e73df;
        padding: 0.25rem;
        margin: 0 0.25rem;
    }

    .btn-icon:hover {
        color: #ff9933;
    }

    /* Table Styles */
    .table {
        margin: 0;
    }

    .table th {
        font-weight: 600;
        color: #6c757d;
        border-top: none;
        font-size: 0.875rem;
    }

    .table td {
        vertical-align: middle;
        font-size: 0.875rem;
    }

    .order-details {
        padding: 0.5rem 0;
    }

    .order-item {
        padding: 0.5rem;
        margin-bottom: 0.5rem;
        background: #f8f9fc;
        border-radius: 0.35rem;
    }

    .order-item:last-child {
        margin-bottom: 0;
    }

    .item-name {
        font-weight: 600;
        color: #4e73df;
        margin-bottom: 0.25rem;
    }

    .item-details {
        display: flex;
        gap: 1rem;
        color: #6c757d;
        font-size: 0.875rem;
    }

    .item-details span {
        display: inline-flex;
        align-items: center;
    }

    .item-details .quantity {
        font-weight: 600;
        color: #1cc88a;
    }

    .item-details .unit {
        color: #858796;
    }

    .item-details .price {
        color: #4e73df;
        font-weight: 600;
    }

    /* Status Badges */
    .status-badge {
        padding: 0.35rem 0.65rem;
        border-radius: 0.35rem;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .status-badge.pending {
        background-color: #f6c23e;
        color: white;
    }

    .status-badge.completed {
        background-color: #1cc88a;
        color: white;
    }

    .status-badge.cancelled {
        background-color: #e74a3b;
        color: white;
    }

    .status-badge.warning {
        background-color: #f6c23e;
        color: white;
    }

    .status-badge.active {
        background-color: #1cc88a;
        color: white;
    }
</style>
@endpush

@push('scripts')
<script>
    // Real-time date and time display
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

    // Order filtering
    document.querySelectorAll('.dropdown-item[data-filter]').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const filter = this.dataset.filter;
            const rows = document.querySelectorAll('#ordersTable tbody tr');
            
            rows.forEach(row => {
                const status = row.querySelector('.status-badge').textContent.toLowerCase();
                row.style.display = filter === 'all' || status === filter ? '' : 'none';
            });
        });
    });

    // Order actions
    function viewOrder(orderId) {
        window.location.href = `/cook/orders/${orderId}`;
    }

    function viewPurchaseOrder(orderId) {
        window.location.href = `/cook/purchase-orders/${orderId}`;
    }

    function completeOrder(orderId) {
        if (confirm('Are you sure you want to mark this order as completed?')) {
            fetch(`/cook/orders/${orderId}/complete`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert('Failed to complete order. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        }
    }
</script>
@endpush