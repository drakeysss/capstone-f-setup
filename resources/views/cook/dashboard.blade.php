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

    <!-- Main Content -->
    <div class="main-card">
        <div class="card-header">
            <h5 class="card-title">Recent Orders</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="ordersTable">
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

    <!-- Menu Overview -->
    <div class="main-card">
        <div class="card-header">
            <h5 class="card-title">Today's Menu ({{ $currentDay }}, {{ $weekType }})</h5>
        </div>
        <div class="card-body">
            <div class="menu-overview">
                <div class="row">
                    <div class="col-md-4">
                        <h4 style="color: #22bbea;">Breakfast</h4>
                        @foreach($weeklyMenu as $menu)
                            @if($menu->meal_type === 'Breakfast')
                                <p><strong>{{ strtoupper($menu->menu_item) }}</strong></p>
                                @php
                                    $ingredients = $menu->ingredients;
                                    $ingredientList = [];
                                    
                                    if (Str::startsWith($ingredients, '[')) {
                                        $ingredientList = json_decode($ingredients, true) ?? [];
                                    } else {
                                        $lines = explode("\n", $ingredients);
                                        foreach ($lines as $line) {
                                            $parts = explode(',', $line);
                                            foreach ($parts as $part) {
                                                $trimmed = trim($part);
                                                if (!empty($trimmed)) {
                                                    $ingredientList[] = $trimmed;
                                                }
                                            }
                                        }
                                    }
                                @endphp
                                <ul>
                                    @foreach($ingredientList as $ingredient)
                                        <li>{{ $ingredient }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <h4 style="color: #22bbea;">Lunch</h4>
                        @foreach($weeklyMenu as $menu)
                            @if($menu->meal_type === 'Lunch')
                                <p><strong>{{ strtoupper($menu->menu_item) }}</strong></p>
                                @php
                                    $ingredients = $menu->ingredients;
                                    $ingredientList = [];
                                    
                                    if (Str::startsWith($ingredients, '[')) {
                                        $ingredientList = json_decode($ingredients, true) ?? [];
                                    } else {
                                        $lines = explode("\n", $ingredients);
                                        foreach ($lines as $line) {
                                            $parts = explode(',', $line);
                                            foreach ($parts as $part) {
                                                $trimmed = trim($part);
                                                if (!empty($trimmed)) {
                                                    $ingredientList[] = $trimmed;
                                                }
                                            }
                                        }
                                    }
                                @endphp
                                <ul>
                                    @foreach($ingredientList as $ingredient)
                                        <li>{{ $ingredient }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <h4 style="color: #22bbea;">Dinner</h4>
                        @foreach($weeklyMenu as $menu)
                            @if($menu->meal_type === 'Dinner')
                                <p><strong>{{ strtoupper($menu->menu_item) }}</strong></p>
                                @php
                                    $ingredients = $menu->ingredients;
                                    $ingredientList = [];
                                    
                                    if (Str::startsWith($ingredients, '[')) {
                                        $ingredientList = json_decode($ingredients, true) ?? [];
                                    } else {
                                        $lines = explode("\n", $ingredients);
                                        foreach ($lines as $line) {
                                            $parts = explode(',', $line);
                                            foreach ($parts as $part) {
                                                $trimmed = trim($part);
                                                if (!empty($trimmed)) {
                                                    $ingredientList[] = $trimmed;
                                                }
                                            }
                                        }
                                    }
                                @endphp
                                <ul>
                                    @foreach($ingredientList as $ingredient)
                                        <li>{{ $ingredient }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/cook.css') }}">
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
    
    updateDateTime();
    setInterval(updateDateTime, 1000);
</script>
@endpush