@extends('layouts.app')




@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Reports & Analytics</h1>
        <div>

        
            <button class="btn btn-sm btn-primary shadow-sm">
            <a href="{{ route('kitchen.reportsForm') }}" class="text-white text-decoration-none">
                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
            </a>
            </button>

            

        </div>
    </div>

    <div class="row">
        <!-- Monthly Overview -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Monthly Overview</h6>
                    <div class="btn-group">
                        <button class="btn btn-outline-primary btn-sm" id="btnDay">Day</button>
                        <button class="btn btn-primary btn-sm" id="btnWeek">Week</button>
                        <button class="btn btn-outline-primary btn-sm" id="btnMonth">Month</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="monthlyOverviewChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reasons for Wastes</h6>
                </div>
                <div class="card-body">
                    @foreach($wasteReasons as $reason)
                    <div class="mb-4">
                        <h4 class="small font-weight-bold">
                            {{ $reason->report_name }}
                            <span class="float-end">{{ $reason->percentage }}%</span>
                        </h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" style="width: {{ $reason->percentage }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-8">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Top 5 Food Wastes</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Cost</th>
                                    <th>Usage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topWastes as $waste)
                                <tr>
                                    <td>{{ $waste->category }}</td>
                                    <td>{{ $waste->quantity }}</td>
                                    <td>₱{{ number_format($waste->cost, 2) }}</td>
                                    <td>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-success" style="width: {{ $waste->usage_percentage }}%"></div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                                <tr>
                                    <td>Meat</td>
                                    <td>20</td>
                                    <td>₱45,000</td>
                                    <td>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-info" style="width: 65%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Vegetables</td>
                                    <td>25</td>
                                    <td>₱15,000</td>
                                    <td>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-warning" style="width: 85%"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Recipes -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Popular Recipes</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Recipe</th>
                                    <th>Servings</th>
                                    <th>Rating</th>
                                    <th>Trend</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('monthlyOverviewChart');
    if (!ctx) {
        console.error('Chart canvas not found');
        return;
    }

    const chartData = {
        day: {
            labels: ['Breakfast', 'Lunch', 'Dinner'],
            datasets: [
                {
                    label: 'Meals Served',
                    data: [30, 50, 40],
                    borderColor: 'rgba(78, 115, 223, 1)',
                    backgroundColor: 'rgba(78, 115, 223, 0.2)',
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Food Waste',
                    data: [5, 8, 6],
                    borderColor: 'rgba(231, 74, 59, 1)',
                    backgroundColor: 'rgba(231, 74, 59, 0.2)',
                    tension: 0.3,
                    fill: true
                }
            ]
        },
        week: {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [
                {
                    label: 'Meals Served',
                    data: [120, 150, 130, 170, 200, 180, 160],
                    borderColor: 'rgba(78, 115, 223, 1)',
                    backgroundColor: 'rgba(78, 115, 223, 0.2)',
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Food Waste',
                    data: [20, 25, 22, 30, 28, 26, 24],
                    borderColor: 'rgba(231, 74, 59, 1)',
                    backgroundColor: 'rgba(231, 74, 59, 0.2)',
                    tension: 0.3,
                    fill: true
                }
            ]
        },
        month: {
            labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
            datasets: [
                {
                    label: 'Meals Served',
                    data: [400, 450, 500, 550],
                    borderColor: 'rgba(78, 115, 223, 1)',
                    backgroundColor: 'rgba(78, 115, 223, 0.2)',
                    tension: 0.3,
                    fill: true
                },
                {
                    label: 'Food Waste',
                    data: [60, 55, 70, 65],
                    borderColor: 'rgba(231, 74, 59, 1)',
                    backgroundColor: 'rgba(231, 74, 59, 0.2)',
                    tension: 0.3,
                    fill: true
                }
            ]
        }
    };

    const chartConfig = {
        type: 'line',
        data: {
            labels: chartData.month.labels,
            datasets: chartData.month.datasets
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                },
                tooltip: {
                    enabled: true,
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    callbacks: {
                        title: function(tooltipItems) {
                            return tooltipItems[0].label;
                        },
                        label: function(tooltipItem) {
                            const datasetLabel = tooltipItem.dataset.label;
                            return datasetLabel + ': ' + tooltipItem.raw;
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    }
                },
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(234, 236, 244, 1)',
                        zeroLineColor: 'rgba(234, 236, 244, 1)'
                    }
                }
            }
        }
    };

    let myChart = null;
    try {
        myChart = new Chart(ctx, chartConfig);
    } catch (error) {
        console.error('Error initializing chart:', error);
        return;
    }

    function updateChart(period) {
        if (!myChart) return;
        myChart.data.labels = chartData[period].labels;
        myChart.data.datasets = chartData[period].datasets;
        myChart.update();
    }

    const btnDay = document.getElementById('btnDay');
    const btnWeek = document.getElementById('btnWeek');
    const btnMonth = document.getElementById('btnMonth');

    if (btnDay) btnDay.addEventListener('click', () => updateChart('day'));
    if (btnWeek) btnWeek.addEventListener('click', () => updateChart('week'));
    if (btnMonth) btnMonth.addEventListener('click', () => updateChart('month'));
});
</script>
<script src="{{ asset('js/kitchen/reports.js') }}"></script>

@endpush
@endsection
