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
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card pending">
                <div class="stat-icon">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $pendingOrders ?? 0 }}</h3>
                    <p>Pending Orders</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card completed">
                <div class="stat-icon">
                    <i class="bi bi-check-circle"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $completedOrders ?? 0 }}</h3>
                    <p>Completed Orders</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card inventory">
                <div class="stat-icon">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $lowStockItems ?? 0 }}</h3>
                    <p>Low Stock Items</p>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="stat-card menu">
                <div class="stat-icon">
                    <i class="bi bi-menu-button-wide"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $activeMenuItems ?? 0 }}</h3>
                    <p>Active Menu Items</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Recent Orders -->
        <div class="col-xl-6 mb-4">
            <div class="card main-card h-100">
                <div class="card-header">
                    <h5 class="card-title">Recent Orders</h5>
                    <div class="card-actions">
                        <div class="dropdown">
                            <button class="btn btn-filter" type="button" data-bs-toggle="dropdown">
                                <i class="bi bi-filter"></i> Filter
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#" data-filter="all">All Orders</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="pending">Pending</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="completed">Completed</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="cancelled">Cancelled</a></li>
                            </ul>
                        </div>
                        <a href="{{ route('cook.orders') }}" class="btn btn-view-all">View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="ordersTable">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Items</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentOrders ?? [] as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>
                                        <div class="order-items">
                                            @foreach($order->items->take(2) as $item)
                                            <span class="badge bg-primary me-1">{{ $item->quantity }}x {{ $item->name }}</span>
                                            @endforeach
                                            @if($order->items->count() > 2)
                                            <span class="badge bg-secondary">+{{ $order->items->count() - 2 }} more</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $order->status }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="btn btn-icon" onclick="viewOrder({{ $order->id }})">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            @if($order->status === 'pending')
                                            <button class="btn btn-icon" onclick="completeOrder({{ $order->id }})">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No orders found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Overview -->
        <div class="col-xl-6 mb-4">
            <div class="card main-card h-100">
                <div class="card-header">
                    <h5 class="card-title">Menu Overview</h5>
                    <a href="{{ route('cook.menu') }}" class="btn btn-view-all">View All</a>
                </div>
                <div class="card-body">
                    <div class="row h-100">
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
                                            <th>Item Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($menuItems->take(3) ?? [] as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>₱{{ number_format($item->price, 2) }}</td>
                                            <td>
                                                <span class="status-badge {{ $item->status }}">
                                                    {{ ucfirst($item->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No menu items</td>
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

        <!-- Inventory Overview -->
        <div class="col-xl-6 mb-4">
            <div class="card main-card h-100">
                <div class="card-header">
                    <h5 class="card-title">Inventory Overview</h5>
                    <a href="{{ route('cook.inventory') }}" class="btn btn-view-all">View All</a>
                </div>
                <div class="card-body">
                    <div class="row h-100">
                        <div class="col-md-4">
                            <div class="overview-stats">
                                <div class="stat">
                                    <span class="stat-value">{{ $lowStockItems ?? 0 }}</span>
                                    <span class="stat-label">Low Stock</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-value">{{ $totalItems ?? 0 }}</span>
                                    <span class="stat-label">Total Items</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Item Name</th>
                                            <th>Quantity</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($lowStockItemsList->take(3) ?? [] as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>
                                                <span class="status-badge warning">
                                                    Low Stock
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No low stock items</td>
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

        <!-- Suppliers Overview -->
        <div class="col-xl-6 mb-4">
            <div class="card main-card h-100">
                <div class="card-header">
                    <h5 class="card-title">Suppliers Overview</h5>
                    <a href="{{ route('cook.suppliers.index') }}" class="btn btn-view-all">View All</a>
                </div>
                <div class="card-body">
                    <div class="row h-100">
                        <div class="col-md-4">
                            <div class="overview-stats">
                                <div class="stat">
                                    <span class="stat-value">{{ $activeSuppliers ?? 0 }}</span>
                                    <span class="stat-label">Active Suppliers</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-value">{{ $pendingOrders ?? 0 }}</span>
                                    <span class="stat-label">Pending Orders</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Supplier Name</th>
                                            <th>Status</th>
                                            <th>Last Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentSuppliers->take(3) ?? [] as $supplier)
                                        <tr>
                                            <td>{{ $supplier->name }}</td>
                                            <td>
                                                <span class="status-badge {{ $supplier->status }}">
                                                    {{ ucfirst($supplier->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $supplier->last_order_date ? $supplier->last_order_date->format('M d') : 'N/A' }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No recent suppliers</td>
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

    .menu .stat-icon {
        background-color: #4e73df;
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
        // Implement view order functionality
        console.log('Viewing order:', orderId);
    }

    function completeOrder(orderId) {
        // Implement complete order functionality
        if (confirm('Are you sure you want to mark this order as completed?')) {
            console.log('Completing order:', orderId);
        }
    }
</script>
@endpush