@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-4">Analytics</h1>
        </div>
    </div>

    <!-- Revenue Chart -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Revenue Overview</h5>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Statistics -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Orders by Status</h5>
                </div>
                <div class="card-body">
                    <canvas id="orderStatusChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Popular Menu Items</h5>
                </div>
                <div class="card-body">
                    <canvas id="popularItemsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- User Activity -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">User Activity</h5>
                </div>
                <div class="card-body">
                    <canvas id="userActivityChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Revenue Chart
    new Chart(document.getElementById('revenueChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode($monthlyRevenue->pluck('month')) !!},
            datasets: [{
                label: 'Revenue',
                data: {!! json_encode($monthlyRevenue->pluck('revenue')) !!},
                borderColor: '#3498db',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + value.toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Revenue: $' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            }
        }
    });

    // Order Status Chart
    new Chart(document.getElementById('orderStatusChart'), {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($orderStats->pluck('status')) !!},
            datasets: [{
                data: {!! json_encode($orderStats->pluck('count')) !!},
                backgroundColor: ['#10b981', '#f59e0b', '#ef4444']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    // Popular Items Chart
    new Chart(document.getElementById('popularItemsChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($popularItems->pluck('name')) !!},
            datasets: [{
                label: 'Orders',
                data: {!! json_encode($popularItems->pluck('order_count')) !!},
                backgroundColor: '#3498db'
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // User Activity Chart
    new Chart(document.getElementById('userActivityChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode($userActivity->pluck('day')) !!},
            datasets: [{
                label: 'Active Users',
                data: {!! json_encode($userActivity->pluck('active_users')) !!},
                borderColor: '#10b981',
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
@endpush 