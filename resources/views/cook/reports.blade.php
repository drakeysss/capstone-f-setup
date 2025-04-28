@extends('layouts.app')

@section('sidebar')
    @include('cook.dashboard')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Reports & Analytics</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Daily Meals Served</h5>
                                    <p class="card-text display-4">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Pending Orders</h5>
                                    <p class="card-text display-4">0</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Stock Items</h5>
                                    <p class="card-text display-4">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Consumption Trends</h4>
                            <div class="chart-container" style="height: 300px;">
                                <p class="text-center text-muted">Chart will be displayed here</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
