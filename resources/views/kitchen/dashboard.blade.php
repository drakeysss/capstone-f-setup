@extends('layouts.app')

@section('content')
<div class="col-12 mb-4">
            <div class="card border-0 bg-primary text-white overflow-hidden">
                <div class="card-body p-4 position-relative" style="background-color: var(--secondary-color);">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="fw-bold mb-1" >Kitchen Dashboard</h4>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cup-hot display-4 opacity-25"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
        <!-- Overview Cards -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Today's Meals</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ count($dailyRecipes) }} Meals
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-calendar-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Low Stock Items</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                                
                        </div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-exclamation-triangle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

    <div class="row">
        <!-- Today's Schedule -->
        <div class="col-xl-6 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Today's Schedule</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Meal Type</th>
                                    <th>Meal Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dailyRecipes as $type => $meal)
                                    <tr>
                                        <td>{{ $type }}</td>
                                        <td>{{ $meal['name'] }}</td>
                                        <td>
                                            <span class="badge
    @if($meal['status'] == 'completed') bg-success
    @elseif($meal['status'] == 'pending') bg-warning
    @elseif($meal['status'] == 'in progress') bg-info
    @else bg-secondary
    @endif
                                            ">
                                                {{ ucfirst($meal['status']) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Alerts -->
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Alerts</h6>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Low Stock Alert</h6>
                                <small>3 mins ago</small>
                            </div>
                            <p class="mb-1">Rice stock is running low</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Equipment Maintenance</h6>
                                <small>1 hour ago</small>
                            </div>
                            <p class="mb-1">Oven #2 needs maintenance check</p>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Menu Update</h6>
                                <small>2 hours ago</small>
                            </div>
                            <p class="mb-1">New menu items added for next week</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
