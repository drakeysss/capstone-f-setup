@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                    <h5 class="mb-0 text-primary">
                        <i class="bi bi-clock-history me-2"></i>Order History
                    </h5>
                    <div class="d-flex gap-2">
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
                                <i class="bi bi-filter me-2"></i>Filter
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" data-filter="all">All Orders</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="delivered">Delivered</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="completed">Completed</a></li>
                                <li><a class="dropdown-item" href="#" data-filter="cancelled">Cancelled</a></li>
                            </ul>
                        </div>
                        <button class="btn btn-outline-success" id="exportBtn">
                            <i class="bi bi-download me-2"></i>Export
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Order History Table -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="orderHistoryTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#123</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold">Today</span>
                                            <small class="text-muted">10:30 AM</small>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex align-items-center mb-1">
                                                <span class="badge bg-primary me-2">1x</span>
                                                <span>Chicken Rice</span>
                                            </li>
                                            <li class="d-flex align-items-center">
                                                <span class="badge bg-primary me-2">1x</span>
                                                <span>Vegetable Soup</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="fw-bold">$12.00</td>
                                    <td>
                                        <span class="badge bg-success">Delivered</span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="reorder(123)">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#122</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <span class="fw-bold">Yesterday</span>
                                            <small class="text-muted">1:30 PM</small>
                                        </div>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex align-items-center">
                                                <span class="badge bg-primary me-2">2x</span>
                                                <span>Fish & Chips</span>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="fw-bold">$16.00</td>
                                    <td>
                                        <span class="badge bg-secondary">Completed</span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderDetailsModal">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-success" onclick="reorder(122)">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <nav class="mt-4">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Order Details Modal -->
<div class="modal fade" id="orderDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-receipt me-2"></i>Order Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Order Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Order ID:</span>
                                        <span class="fw-bold">#123</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Date:</span>
                                        <span class="fw-bold">April 27, 2025 10:30 AM</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Status:</span>
                                        <span class="badge bg-success">Delivered</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Payment Method:</span>
                                        <span class="fw-bold">Credit Card</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Delivery Information</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column gap-2">
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Delivery Time:</span>
                                        <span class="fw-bold">10:45 AM</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Location:</span>
                                        <span class="fw-bold">Room 301</span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-muted">Notes:</span>
                                        <span class="fw-bold">Please deliver to Room 301</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Order Items</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Chicken Rice</td>
                                        <td>1</td>
                                        <td>$8.00</td>
                                        <td>$8.00</td>
                                    </tr>
                                    <tr>
                                        <td>Vegetable Soup</td>
                                        <td>1</td>
                                        <td>$4.00</td>
                                        <td>$4.00</td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                        <td><strong>$12.00</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" onclick="reorder(123)">
                    <i class="bi bi-arrow-repeat me-2"></i>Reorder
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border: none;
        border-radius: 0.5rem;
    }
    
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,.125);
    }
    
    .table th {
        font-weight: 600;
        color: #6c757d;
    }
    
    .badge {
        font-weight: 500;
        padding: 0.5em 0.75em;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
    }
    
    .pagination {
        margin-bottom: 0;
    }
    
    .page-link {
        border: none;
        padding: 0.5rem 0.75rem;
    }
    
    .page-item.active .page-link {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    
    .dropdown-menu {
        border: none;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    
    .dropdown-item:active {
        background-color: #4e73df;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Filter functionality
        const filterDropdown = document.getElementById('filterDropdown');
        const orderTable = document.getElementById('orderHistoryTable');
        
        if (filterDropdown) {
            filterDropdown.addEventListener('click', function(e) {
                e.preventDefault();
            });
            
            document.querySelectorAll('.dropdown-item[data-filter]').forEach(item => {
                item.addEventListener('click', function() {
                    const filter = this.getAttribute('data-filter');
                    filterOrders(filter);
                });
            });
        }
        
        // Export functionality
        const exportBtn = document.getElementById('exportBtn');
        if (exportBtn) {
            exportBtn.addEventListener('click', function() {
                exportOrders();
            });
        }
    });
    
    function filterOrders(filter) {
        // Implement filtering logic here
        console.log('Filtering orders by:', filter);
    }
    
    function exportOrders() {
        // Implement export logic here
        console.log('Exporting orders...');
    }
    
    function reorder(orderId) {
        // Implement reorder logic here
        console.log('Reordering order:', orderId);
    }
</script>
@endpush
