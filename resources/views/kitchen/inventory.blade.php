@extends('layouts.app')

@section('content')
<div class="col-12 mb-4">
            <div class="card border-0 bg-primary text-white overflow-hidden">
                <div class="card-body p-4 position-relative" style="background-color: var(--secondary-color);">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="fw-bold mb-1" >Inventory Management</h4>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cup-hot display-4 opacity-25"></i>
                            <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addStockModal">
                <i class="bi bi-plus"></i> Add Stock
            </button>
               
        </div>
    </div>
        </div>
    </div>
</div>
    <div class="row">
        <!-- Stock Overview Cards -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-6">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Items</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-6">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Low Stock Items</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-exclamation-triangle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

     

    <div class="row">
        <!-- Inventory Table -->
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Current Inventory</h6>
                    <div class="d-flex align-items-center">
                        <div class="input-group me-2" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search items...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
                                Filter
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">All Items</a></li>
                                <li><a class="dropdown-item" href="#">Low Stock</a></li>
                                <li><a class="dropdown-item" href="#">Out of Stock</a></li>
                                <li><a class="dropdown-item" href="#">Expiring Soon</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Last Updated</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                foreach($inventoryItems as $item)
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->last_updated }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#orderSuppliesModal">
                                            Report to Admin
                                        </button>
                                        <button class="btn btn-danger btn-sm">
                                            
                                        </button>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Stock Modal -->
<div class="modal fade" id="addStockModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option>Grains</option>
                            <option>Meat</option>
                            <option>Vegetables</option>
                            <option>Fruits</option>
                            <option>Condiments</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" required>
                        </div>
                        <div class="col">
                            <label class="form-label">Unit</label>
                            <select class="form-select">
                                <option>kg</option>
                                <option>g</option>
                                <option>L</option>
                                <option>ml</option>
                                <option>pcs</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Expiry Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Order Supplies Modal -->
<div class="modal fade" id="orderSuppliesModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Supplies</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Supplier</label>
                        <select class="form-select">
                            <option>Supplier A</option>
                            <option>Supplier B</option>
                            <option>Supplier C</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Items</label>
                        <div id="orderItems">
                            <div class="input-group mb-2">
                                <select class="form-select">
                                    <option>Rice</option>
                                    <option>Chicken</option>
                                    <option>Vegetables</option>
                                </select>
                                <input type="number" class="form-control" placeholder="Quantity">
                                <button type="button" class="btn btn-outline-danger">
                                    <i class="bi bi-dash"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-plus"></i> Add Item
                        </button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Delivery Date</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea class="form-control"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Place Order</button>
            </div>
        </div>
    </div>
</div>
@endsection
