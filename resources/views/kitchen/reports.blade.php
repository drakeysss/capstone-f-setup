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
                        <button class="btn btn-outline-primary btn-sm">Day</button>
                        <button class="btn btn-primary btn-sm">Week</button>
                        <button class="btn btn-outline-primary btn-sm">Month</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="monthlyOverviewChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Key Metrics</h6>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <h4 class="small font-weight-bold">Inventory Turnover <span class="float-end">75%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h4 class="small font-weight-bold">Food Cost Ratio <span class="float-end">60%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-warning" style="width: 60%"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h4 class="small font-weight-bold">Menu Item Performance <span class="float-end">85%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-success" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Inventory Analysis -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Inventory Analysis</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Items</th>
                                    <th>Value</th>
                                    <th>Usage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Grains</td>
                                    <td>15</td>
                                    <td>₱25,000</td>
                                    <td>
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-success" style="width: 75%"></div>
                                        </div>
                                    </td>
                                </tr>
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
<script src="{{ asset('js/kitchen/reports.js') }}"></script>

@endpush
@endsection
