@extends('layouts.app')

@section('content')
<div class="cook-container">
    <!-- Student Feedback Reports -->
    <div class="main-card">
        <div class="card-header">
            <h5 class="card-title">Student Feedback Reports</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Meal Type</th>
                            <th>Menu Item</th>
                            <th>Rating</th>
                            <th>Feedback</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6" class="text-center">No feedback available</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Food Waste Reports -->
    <div class="main-card">
        <div class="card-header">
            <h5 class="card-title">Daily Food Waste Report</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Meal Type</th>
                            <th>Menu Item</th>
                            <th>Quantity Prepared</th>
                            <th>Quantity Served</th>
                            <th>Quantity Wasted</th>
                            <th>Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" class="text-center">No waste data available</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Kitchen Team Stock Reports -->
    <div class="main-card">
        <div class="card-header">
            <h5 class="card-title">Kitchen Team Stock Reports</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Ingredient</th>
                            <th>Current Stock</th>
                            <th>Minimum Stock</th>
                            <th>Status</th>
                            <th>Reported By</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" class="text-center">No stock reports available</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="{{ asset('css/cook.css') }}">
@endpush
@endsection
