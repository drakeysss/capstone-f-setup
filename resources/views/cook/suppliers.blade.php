@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Purchase Order</h4>
        </div>
        <div class="card-body">
            <form id="purchaseOrderForm" action="{{ route('cook.suppliers.purchase-order') }}" method="POST">
                @csrf
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
                                    <input type="text" class="form-control description" name="items[0][description]" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control quantity" name="items[0][quantity]" min="1" required>
                                </td>
                                <td>
                                    <select class="form-control unit" name="items[0][unit]" required>
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
                                    <input type="number" class="form-control unit-price" name="items[0][unit_price]" min="0" step="0.01" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control cost" readonly>
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
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Unit</th>
                            <th>Unit Price</th>
                            <th>Cost</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    // Initialize DataTables
    $('#savedOrdersTable').DataTable({
        responsive: true,
        order: [[5, 'desc']]
    });

    // Function to calculate cost
    function calculateCost(row) {
        const quantity = parseFloat($(row).find('.quantity').val()) || 0;
        const unitPrice = parseFloat($(row).find('.unit-price').val()) || 0;
        const cost = quantity * unitPrice;
        $(row).find('.cost').val(cost.toFixed(2));
        updateTotalCost();
    }

    // Function to update total cost
    function updateTotalCost() {
        let total = 0;
        $('.cost').each(function() {
            total += parseFloat($(this).val()) || 0;
        });
        $('#totalCost').text(total.toFixed(2));
    }

    // Handle quantity and unit price changes
    $(document).on('input', '.quantity, .unit-price', function() {
        calculateCost($(this).closest('tr'));
    });

    // Add new row
    $('#addRow').click(function() {
        const newRow = $('#purchaseOrderTable tbody tr:first').clone();
        const rowCount = $('#purchaseOrderTable tbody tr').length;
        
        newRow.find('input').val('');
        newRow.find('select').val('');
        newRow.find('input').each(function() {
            const name = $(this).attr('name');
            if (name) {
                $(this).attr('name', name.replace(/\[\d+\]/, `[${rowCount}]`));
            }
        });
        
        $('#purchaseOrderTable tbody').append(newRow);
    });

    // Remove row
    $(document).on('click', '.remove-row', function() {
        const row = $(this).closest('tr');
        if ($('#purchaseOrderTable tbody tr').length > 1) {
            row.remove();
            updateTotalCost();
        } else {
            Swal.fire({
                title: 'Cannot Remove',
                text: 'At least one item must remain in the order.',
                icon: 'warning'
            });
        }
    });

    // Form submission
    $('#purchaseOrderForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = [];
        let isValid = true;
        
        $('#purchaseOrderTable tbody tr').each(function() {
            const row = $(this);
            const item = {
                description: row.find('.description').val(),
                quantity: row.find('.quantity').val(),
                unit: row.find('.unit').val(),
                unit_price: row.find('.unit-price').val(),
                cost: row.find('.cost').val()
            };

            if (!item.description || !item.quantity || !item.unit || !item.unit_price) {
                isValid = false;
                row.addClass('table-danger');
            } else {
                row.removeClass('table-danger');
                formData.push(item);
            }
        });

        if (!isValid) {
            Swal.fire({
                title: 'Validation Error',
                text: 'Please fill in all required fields.',
                icon: 'error'
            });
            return;
        }

        // Submit the form
        this.submit();
    });
});
</script>
@endpush
@endsection