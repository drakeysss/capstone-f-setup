@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-0 text-gray-800">Edit Purchase Order #{{ $purchaseOrder->id }}</h2>
        <a href="{{ route('cook.purchase-orders.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Back to List
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form id="purchaseOrderForm" action="{{ route('cook.purchase-orders.update', $purchaseOrder) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order_date">Order Date</label>
                            <input type="datetime-local" class="form-control" id="order_date" name="order_date" 
                                   value="{{ $purchaseOrder->order_date->format('Y-m-d\TH:i') }}" required>
                        </div>
                    </div>
                </div>

                <div class="table-responsive mb-4">
                    <table class="table table-bordered" id="itemsTable">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Total</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchaseOrder->items as $index => $item)
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="items[{{ $index }}][name]" 
                                           value="{{ $item->name }}" required>
                                </td>
                                <td>
                                    <input type="number" class="form-control quantity" name="items[{{ $index }}][quantity]" 
                                           value="{{ $item->quantity }}" min="1" step="0.01" required>
                                </td>
                                <td>
                                    <select class="form-control unit" name="items[{{ $index }}][unit]" required>
                                        <option value="kilograms" {{ $item->unit === 'kilograms' ? 'selected' : '' }}>Kilograms</option>
                                        <option value="pieces" {{ $item->unit === 'pieces' ? 'selected' : '' }}>Pieces</option>
                                        <option value="liter" {{ $item->unit === 'liter' ? 'selected' : '' }}>Liter</option>
                                        <option value="grams" {{ $item->unit === 'grams' ? 'selected' : '' }}>Grams</option>
                                        <option value="packs" {{ $item->unit === 'packs' ? 'selected' : '' }}>Packs</option>
                                        <option value="gallons" {{ $item->unit === 'gallons' ? 'selected' : '' }}>Gallons</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="number" class="form-control price" name="items[{{ $index }}][price]" 
                                           value="{{ $item->price }}" min="0" step="0.01" required>
                                </td>
                                <td>
                                    <input type="text" class="form-control total" readonly 
                                           value="{{ number_format($item->quantity * $item->price, 2) }}">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm remove-row">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6">
                                    <button type="button" class="btn btn-success btn-sm" id="addRow">
                                        <i class="bi bi-plus-lg"></i> Add Item
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-6 offset-md-6">
                        <div class="form-group">
                            <label for="total_cost">Total Cost</label>
                            <input type="text" class="form-control" id="total_cost" name="total_cost" 
                                   value="{{ number_format($purchaseOrder->total_cost, 2) }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="text-right mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Update Purchase Order
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .form-control:read-only {
        background-color: #f8f9fc;
    }

    .table th {
        background-color: #f8f9fc;
        font-weight: 600;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const itemsTable = document.getElementById('itemsTable');
    const addRowBtn = document.getElementById('addRow');
    const form = document.getElementById('purchaseOrderForm');
    let rowCount = {{ count($purchaseOrder->items) }};

    // Add new row
    addRowBtn.addEventListener('click', function() {
        const tbody = itemsTable.querySelector('tbody');
        const newRow = tbody.rows[0].cloneNode(true);
        
        // Update input names
        newRow.querySelectorAll('input, select').forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                input.setAttribute('name', name.replace(/\[\d+\]/, `[${rowCount}]`));
            }
        });

        // Clear values
        newRow.querySelectorAll('input').forEach(input => {
            if (input.type !== 'hidden') {
                input.value = '';
            }
        });

        // Reset select to first option
        newRow.querySelectorAll('select').forEach(select => {
            select.selectedIndex = 0;
        });

        // Add event listeners
        addRowEventListeners(newRow);
        tbody.appendChild(newRow);
        rowCount++;
    });

    // Add event listeners to initial rows
    itemsTable.querySelectorAll('tbody tr').forEach(addRowEventListeners);

    // Remove row
    itemsTable.addEventListener('click', function(e) {
        if (e.target.closest('.remove-row')) {
            const tbody = itemsTable.querySelector('tbody');
            if (tbody.rows.length > 1) {
                e.target.closest('tr').remove();
                calculateTotal();
            }
        }
    });

    // Calculate row total
    function calculateRowTotal(row) {
        const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
        const price = parseFloat(row.querySelector('.price').value) || 0;
        const total = quantity * price;
        row.querySelector('.total').value = total.toFixed(2);
        calculateTotal();
    }

    // Calculate total cost
    function calculateTotal() {
        let total = 0;
        itemsTable.querySelectorAll('tbody tr').forEach(row => {
            const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
            const price = parseFloat(row.querySelector('.price').value) || 0;
            total += quantity * price;
        });
        document.getElementById('total_cost').value = total.toFixed(2);
    }

    // Add event listeners to row inputs
    function addRowEventListeners(row) {
        row.querySelectorAll('.quantity, .price').forEach(input => {
            input.addEventListener('input', () => calculateRowTotal(row));
        });
    }

    // Form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        // Validate form
        if (!form.checkValidity()) {
            e.stopPropagation();
            form.classList.add('was-validated');
            return;
        }

        // Get all items
        const items = [];
        itemsTable.querySelectorAll('tbody tr').forEach(row => {
            const name = row.querySelector('[name$="[name]"]').value;
            const quantity = parseFloat(row.querySelector('[name$="[quantity]"]').value);
            const unit = row.querySelector('[name$="[unit]"]').value;
            const price = parseFloat(row.querySelector('[name$="[price]"]').value);

            if (name && quantity && unit && price) {
                items.push({ name, quantity, unit, price });
            }
        });

        if (items.length === 0) {
            alert('Please add at least one item to the purchase order.');
            return;
        }

        try {
            const response = await fetch(form.action, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    order_date: document.getElementById('order_date').value,
                    items: items,
                    total_cost: parseFloat(document.getElementById('total_cost').value)
                })
            });

            const data = await response.json();

            if (data.success) {
                window.location.href = '{{ route('cook.purchase-orders.index') }}';
            } else {
                alert(data.message || 'Failed to update purchase order. Please try again.');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while updating the purchase order. Please try again.');
        }
    });
});
</script>
@endpush 