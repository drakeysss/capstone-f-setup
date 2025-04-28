@extends('component.layout') <!-- Main layout -->
@section('title', 'Supplier Management')

@section('content')
    @include('component.nav') <!-- Include navigation bar -->

    <!-- Include the CSS file -->
    <link rel="stylesheet" href="{{ asset('css/supplierManagement.css') }}">

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Purchase Order</h4>
            </div>
            <div class="card-body">
                <form id="purchaseOrderForm">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="purchaseOrderTable">
                            <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Unit Price</th>
                                    <th>Cost</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control description" placeholder="Enter description" required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control quantity" min="1" placeholder="Enter quantity" required pattern="[0-9]*" inputmode="numeric" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                                    </td>
                                    <td>
                                        <select class="form-control unit" required>
                                            <option value="">Select Unit</option>
                                            <option value="kg">Kilograms (kg)</option>
                                            <option value="packs">Packs</option>
                                            <option value="gallons">Gallons</option>
                                            <option value="trays">Trays</option>
                                            <option value="g">Grams (g)</option>
                                            <option value="pcs">Pieces (pcs)</option>
                                            <option value="l">Liter (l)</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control unit-price" min="0" step="0.01" placeholder="Enter unit price" required>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control cost" placeholder="0.00" readonly>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm remove-row">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-success" id="addRow">
                                <i class="fas fa-plus"></i> Add Item
                            </button>
                        </div>
                        <div class="col-md-6 text-right">
                            <h5>Total Cost: <span id="totalCost">0.00</span></h5>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Purchase Order
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Saved Purchase Orders Table -->
        <div class="card mt-4">
            <div class="card-header">
                <h4>Saved Purchase Orders</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="savedOrdersTable">
                        <thead>
                            <tr>
                                <th style="width: 25%;">Description</th>
                                <th style="width: 10%;">Quantity</th>
                                <th style="width: 15%;">Unit</th>
                                <th style="width: 15%;">Unit Price</th>
                                <th style="width: 15%;">Cost</th>
                                <th style="width: 20%;">Date</th>
                                <th style="width: 20%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/supplierManagement.js') }}"></script>
@endsection