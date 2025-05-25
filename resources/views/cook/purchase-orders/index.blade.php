@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Purchase Orders</h5>
                    <a href="{{ route('cook.purchase-orders.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Purchase Order
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Purchase ID</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($purchaseOrders as $order)
                                <tr>
                                    <td>#{{ $order->id }}</td>
                                    <td>{{ $order->order_date->format('M d, Y h:i A') }}</td>
                                    <td>
                                        <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : 'success' }}">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-info view-order" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#orderModal"
                                                data-order-id="{{ $order->id }}"
                                                data-order-date="{{ $order->order_date->format('M d, Y h:i A') }}"
                                                data-order-status="{{ $order->status }}">
                                            <i class="fas fa-eye"></i> View
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger delete-order" 
                                                data-order-id="{{ $order->id }}">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No purchase orders found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Details Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Purchase Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Order ID:</strong> <span id="modalOrderId"></span></p>
                        <p><strong>Date:</strong> <span id="modalOrderDate"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Status:</strong> 
                            <select class="form-select form-select-sm d-inline-block w-auto" id="modalOrderStatusSelect" style="display: none;">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            <span id="modalOrderStatus"></span>
                        </p>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody id="modalOrderItems">
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end"><strong>Total Cost:</strong></td>
                                <td id="modalOrderTotal"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="updateStatusBtn" style="display: none;">
                    <i class="fas fa-save"></i> Update Status
                </button>
                <button type="button" class="btn btn-primary edit-order" id="editOrderBtn">
                    <i class="fas fa-edit"></i> Edit
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
.badge {
    font-size: 0.875rem;
    padding: 0.5em 0.75em;
}
.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const orderModal = document.getElementById('orderModal');
    let currentOrderId = null;
    
    // Handle view button clicks
    document.querySelectorAll('.view-order').forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.dataset.orderId;
            currentOrderId = orderId;
            const orderDate = this.dataset.orderDate;
            const orderStatus = this.dataset.orderStatus;
            
            // Update modal header info
            document.getElementById('modalOrderId').textContent = '#' + orderId;
            document.getElementById('modalOrderDate').textContent = orderDate;
            
            // Handle status display and selection
            const statusSpan = document.getElementById('modalOrderStatus');
            const statusSelect = document.getElementById('modalOrderStatusSelect');
            const updateStatusBtn = document.getElementById('updateStatusBtn');
            
            statusSpan.textContent = orderStatus.charAt(0).toUpperCase() + orderStatus.slice(1);
            statusSelect.value = orderStatus;
            
            // Show status selection and update button
            statusSpan.style.display = 'none';
            statusSelect.style.display = 'inline-block';
            updateStatusBtn.style.display = 'inline-block';
            
            // Show loading state
            const itemsContainer = document.getElementById('modalOrderItems');
            itemsContainer.innerHTML = '<tr><td colspan="5" class="text-center">Loading...</td></tr>';
            
            // Fetch order details
            fetch(`/cook/purchase-orders/${orderId}`, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    const order = data.order;
                    itemsContainer.innerHTML = '';
                    
                    let totalCost = 0;
                    
                    if (order.items && order.items.length > 0) {
                        order.items.forEach(item => {
                            const itemTotal = parseFloat(item.quantity) * parseFloat(item.price);
                            totalCost += itemTotal;
                            
                            itemsContainer.innerHTML += `
                                <tr>
                                    <td>${item.name}</td>
                                    <td>${parseFloat(item.quantity).toFixed(2)}</td>
                                    <td>${item.unit}</td>
                                    <td>₱${parseFloat(item.price).toFixed(2)}</td>
                                    <td>₱${itemTotal.toFixed(2)}</td>
                                </tr>
                            `;
                        });
                    } else {
                        itemsContainer.innerHTML = '<tr><td colspan="5" class="text-center">No items found</td></tr>';
                    }
                    
                    document.getElementById('modalOrderTotal').textContent = '₱' + totalCost.toFixed(2);

                    // Show/hide edit button based on order status
                    const editBtn = document.getElementById('editOrderBtn');
                    if (order.status === 'pending') {
                        editBtn.style.display = 'inline-block';
                    } else {
                        editBtn.style.display = 'none';
                    }
                } else {
                    throw new Error(data.message || 'Failed to load order details');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                itemsContainer.innerHTML = '<tr><td colspan="5" class="text-center text-danger">Failed to load order details: ' + error.message + '</td></tr>';
            });
        });
    });

    // Handle status update
    document.getElementById('updateStatusBtn').addEventListener('click', function() {
        if (!currentOrderId) return;

        const newStatus = document.getElementById('modalOrderStatusSelect').value;
        
        fetch(`/cook/purchase-orders/${currentOrderId}/status`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ status: newStatus })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the status display
                document.getElementById('modalOrderStatus').textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
                
                // Hide the select and update button, show the status text
                document.getElementById('modalOrderStatusSelect').style.display = 'none';
                document.getElementById('updateStatusBtn').style.display = 'none';
                document.getElementById('modalOrderStatus').style.display = 'inline';
                
                // Update the status in the table row
                const statusBadge = document.querySelector(`[data-order-id="${currentOrderId}"]`).closest('tr').querySelector('.badge');
                statusBadge.className = `badge bg-${newStatus === 'pending' ? 'warning' : newStatus === 'completed' ? 'success' : 'danger'}`;
                statusBadge.textContent = newStatus.charAt(0).toUpperCase() + newStatus.slice(1);
                
                // Show success message
                alert('Status updated successfully');
            } else {
                alert(data.message || 'Failed to update status');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating the status');
        });
    });

    // Handle edit button click
    document.getElementById('editOrderBtn').addEventListener('click', function() {
        if (currentOrderId) {
            window.location.href = `/cook/purchase-orders/${currentOrderId}/edit`;
        }
    });

    // Handle delete button clicks
    document.querySelectorAll('.delete-order').forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.dataset.orderId;
            
            if (confirm('Are you sure you want to delete this purchase order?')) {
                fetch(`/cook/purchase-orders/${orderId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.reload();
                    } else {
                        alert(data.message || 'Failed to delete purchase order');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the purchase order');
                });
            }
        });
    });
});
</script>
@endpush
@endsection 