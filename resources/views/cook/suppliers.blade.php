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
                    <h3>Supplier Management</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="supplier">Select Supplier</label>
                            <select class="form-control" id="supplier">
                                <option value="">Choose a supplier</option>
                                <!-- Supplier options here -->
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Products data here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
