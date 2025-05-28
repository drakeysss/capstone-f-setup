@extends('layouts.app')

@push('styles')
<style>
.full-page-form {
    width: 100%;
    max-width: 900px;
    min-height: 100vh;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    padding: 0;
    margin: 40px auto 0 auto;
    display: flex;
    flex-direction: column;
}
.form-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 32px 32px 0 32px;
}
.form-body {
    width: 100%;
    padding: 0 32px 32px 32px;
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

@section('content')
<div class="full-page-form">
    <div class="form-header">
            <h2 class="h3 mb-0 text-gray-800">New Purchase Order</h2>
            <a href="{{ route('cook.purchase-orders.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>
    <div class="form-body">
        <form id="purchaseOrderForm" action="{{ route('cook.purchase-orders.store') }}" method="POST" style="width:100%;">
            @csrf
            <div class="row mb-4" style="margin-left:0;">
                <div class="col-md-6" style="padding-left:0;">
                    <div class="form-group">
                        <label for="order_date">Order Date</label>
                        <input type="datetime-local" class="form-control" id="order_date" name="order_date" required>
                    </div>
                </div>
            </div>
            <div class="table-responsive" style="margin-left:0;">
                <table class="table table-bordered mb-0" id="itemsTable" style="width:100%;margin-bottom:0;">
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
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="items[0][name]" required>
                            </td>
                            <td>
                                <input type="number" class="form-control quantity" name="items[0][quantity]" min="1" step="0.01" required>
                            </td>
                            <td>
                                <select class="form-control unit" name="items[0][unit]" required>
                                    <option value="kilograms">Kilograms</option>
                                    <option value="pieces">Pieces</option>
                                    <option value="liter">Liter</option>
                                    <option value="grams">Grams</option>
                                    <option value="packs">Packs</option>
                                    <option value="gallons">Gallons</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control price" name="items[0][price]" min="0" step="0.01" required>
                            </td>
                            <td>
                                <input type="text" class="form-control total" readonly>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm remove-row">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mb-4" style="margin-left:0;">
                <div class="col-md-6" style="padding-left:0;">
                    <button type="button" class="btn btn-success" id="addRow">
                        <i class="fas fa-plus"></i> Add Item
                    </button>
                </div>
                <div class="col-md-6 text-end">
                    <h5>Total Cost: <span id="totalCost">0.00</span></h5>
                </div>
            </div>
            <div class="mt-4" style="margin-left:0;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Purchase Order
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const itemsTable = document.getElementById('itemsTable');
        const addRowBtn = document.getElementById('addRow');
        const form = document.getElementById('purchaseOrderForm');
        let rowCount = 1;
        const now = new Date();
        now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
        document.getElementById('order_date').value = now.toISOString().slice(0, 16);
        addRowBtn.addEventListener('click', function() {
            const tbody = itemsTable.querySelector('tbody');
            const newRow = tbody.rows[0].cloneNode(true);
            newRow.querySelectorAll('input, select').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    input.setAttribute('name', name.replace('[0]', `[${rowCount}]`));
                }
            });
            newRow.querySelectorAll('input').forEach(input => {
                if (input.type !== 'hidden') {
                    input.value = '';
                }
            });
            addRowEventListeners(newRow);
            tbody.appendChild(newRow);
            rowCount++;
        });
        addRowEventListeners(itemsTable.querySelector('tbody tr'));
        itemsTable.addEventListener('click', function(e) {
            if (e.target.closest('.remove-row')) {
                const tbody = itemsTable.querySelector('tbody');
                if (tbody.rows.length > 1) {
                    e.target.closest('tr').remove();
                    calculateTotal();
                }
            }
        });
        function calculateRowTotal(row) {
            const quantity = parseFloat(row.querySelector('.quantity').value) || 0;
            const price = parseFloat(row.querySelector('.price').value) || 0;
            const total = quantity * price;
            row.querySelector('.total').value = total.toFixed(2);
            calculateTotal();
        }
        function calculateTotal() {
            const totals = Array.from(itemsTable.querySelectorAll('.total'))
                .map(input => parseFloat(input.value) || 0);
            const total = totals.reduce((sum, value) => sum + value, 0);
            document.getElementById('totalCost').textContent = total.toFixed(2);
        }
        function addRowEventListeners(row) {
            row.querySelectorAll('.quantity, .price').forEach(input => {
                input.addEventListener('input', () => calculateRowTotal(row));
            });
        }
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            if (!form.checkValidity()) {
                e.stopPropagation();
                form.classList.add('was-validated');
                return;
            }
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
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        order_date: document.getElementById('order_date').value,
                        items: items
                    })
                });
                const data = await response.json();
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    alert(data.message || 'Failed to save purchase order. Please try again.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while saving the purchase order. Please try again.');
            }
        });
    });
</script>
@endpush 