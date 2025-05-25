@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Submit Waste Report</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('kitchen.waste-entry.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="meal_name" class="form-label">Meal Name</label>
                            <input type="text" class="form-control" id="meal_name" name="meal_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="meal_type" class="form-label">Meal Type</label>
                            <select class="form-select" id="meal_type" name="meal_type" required>
                                <option value="" disabled selected>Select meal type</option>
                                <option value="Breakfast">Breakfast</option>
                                <option value="Lunch">Lunch</option>
                                <option value="Dinner">Dinner</option>
                                <option value="Snack">Snack</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="reason_id" class="form-label">Waste Reason</label>
                            <select class="form-select" id="reason_id" name="reason_id" required>
                                <option value="" disabled selected>Select a reason</option>
                                @foreach($wasteReasons as $reason)
                                    <option value="{{ $reason->report_id }}">{{ $reason->report_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Waste Quantity (kg)</label>
                            <input type="number" step="0.01" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="waste_date" class="form-label">Waste Date</label>
                            <input type="date" class="form-control" id="waste_date" name="waste_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="notes" class="form-label">Additional Notes</label>
                            <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Any additional information about the waste..."></textarea>
                        </div>

                        <div class="mb-3 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary w-50 me-2">Submit Report</button>
                            <a href="{{ route('kitchen.reports') }}" class="btn btn-secondary w-50">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection