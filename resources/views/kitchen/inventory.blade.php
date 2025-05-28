@extends('layouts.app')

@section('content')
<div class="col-12 mb-4">
    <div class="card border-0 bg-primary text-white overflow-hidden">
        <div class="card-body p-4 position-relative" style="background-color: var(--secondary-color);">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="fw-bold mb-1">Inventory Management</h4>
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
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Items</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalIngredients }}</div>
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
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Low Stock Items</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $lowStockCount }}</div>
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
                        <div id="searchLogic" class="input-group me-2" style="width: 300px;">
                            <input type="text" class="form-control" placeholder="Search items...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <div class="dropdown" id="filterLogic">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
                                Filter
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" data-value="all" href="#">All Items</a></li>
                                <li><a class="dropdown-item" data-value="low" href="#">Low Stock</a></li>
                                <li><a class="dropdown-item" data-value="out" href="#">Out of Stock</a></li>
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
                                @foreach ($ingredients as $ingredient)
                                @php
                                if($ingredient->ingredient_quantity < 10) {
                                    $status='low stock' ;
                                    } elseif($ingredient->ingredient_quantity == 0) {
                                    $status = 'out of stock';
                                    } else {
                                    $status = 'in stock';
                                    }

                                    @endphp
                                    <tr class="searchable-item filterable-item" data-status="{{ $ingredient->data_status }}">
                                        <td>{{ $ingredient->ingredient_name }}</td>
                                        <td>{{ $ingredient->ingredient_category }}</td>
                                        <td>{{ $ingredient->ingredient_quantity }}</td>
                                        <td>{{ $ingredient->ingredient_price }}</td>
                                        <td>{{ $ingredient->updated_at->format('Y-m-d') }}</td>
                                        <td>
                                            @if($ingredient->ingredient_quantity < 10)
                                                <span class="badge bg-warning">Low Stock</span>
                                                @elseif($ingredient->ingredient_quantity == 0)
                                                <span class="badge bg-danger">Out of Stock</span>
                                                @else
                                                <span class="badge bg-success">In Stock</span>
                                                @endif
                                        <td>
                                            
                                            <a href="{{ route('kitchen.inventory.show', $ingredient->id) }}" class="btn btn-sm btn-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('kitchen.inventory.update', $ingredient->id) }}" class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="{{ route('kitchen.inventory.delete', $ingredient->id) }}" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                    @endforeach
                                    </tr>

                            </tbody>
                        </table>
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

    <script src="{{ asset('js/kitchen/inventoryLogic.js') }}"></script>

    @endsection