@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Pending Orders</h5>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addOrderModal">
                            Add New Order
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Items</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>
                                        <div class="order-items">
                                            @foreach($order->items as $item)
                                            <span class="badge bg-info">{{ $item->menu->name }} ({{ $item->quantity }})</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">{{ ucfirst($order->status) }}</span>
                                    </td>
                                    <td>{{ $order->created_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="viewOrder({{ $order->id }})">View</button>
                                        <button class="btn btn-sm btn-success" onclick="completeOrder({{ $order->id }})">Complete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Order Modal -->
<div class="modal fade" id="addOrderModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addOrderForm">
                    <div class="mb-3">
                        <label class="form-label">Menu Items</label>
                        <div id="orderItems">
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <select class="form-select menu-item" name="items[0][menu_id]" required>
                                        <option value="">Select Item</option>
                                        @foreach($menuItems as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input type="number" class="form-control" name="items[0][quantity]" placeholder="Qty" min="1" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-item">×</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary mt-2" id="addItem">Add Another Item</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="saveOrder()">Save Order</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
let itemCount = 1;

document.getElementById('addItem').addEventListener('click', function() {
    const template = document.querySelector('#orderItems .row').cloneNode(true);
    template.querySelector('.menu-item').name = `items[${itemCount}][menu_id]`;
    template.querySelector('input[type="number"]').name = `items[${itemCount}][quantity]`;
    template.querySelector('.remove-item').addEventListener('click', function() {
        template.remove();
    });
    document.getElementById('orderItems').appendChild(template);
    itemCount++;
});

document.querySelectorAll('.remove-item').forEach(button => {
    button.addEventListener('click', function() {
        this.closest('.row').remove();
    });
});

function saveOrder() {
    const form = document.getElementById('addOrderForm');
    const formData = new FormData(form);
    
    fetch('{{ route("cook.orders.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error saving order');
        }
    });
}

function viewOrder(orderId) {
    window.location.href = `/cook/orders/${orderId}`;
}

function completeOrder(orderId) {
    if (confirm('Are you sure you want to mark this order as completed?')) {
        fetch(`/cook/orders/${orderId}/complete`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error completing order');
            }
        });
    }
}
</script>
@endpush
@endsection 