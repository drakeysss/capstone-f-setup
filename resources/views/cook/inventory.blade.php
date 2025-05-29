@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Stock Management</h4>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStockModal">
                        <i class="bi bi-plus"></i> Add Stock
                    </button>
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
                                    <th>Minimum Stock</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($inventory as $item)
                                <tr>
                                    <td>{{ $item->item_name }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->minimum_stock }}</td>
                                    <td>
                                        @if($item->quantity <= $item->minimum_stock)
                                            <span class="badge bg-danger">Low Stock</span>
                                        @else
                                            <span class="badge bg-success">In Stock</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editStockModal{{ $item->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteStockModal{{ $item->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center">No inventory items found</td>
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

<!-- Add Stock Modal -->
<div class="modal fade" id="addStockModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('cook.inventory.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" name="item_name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" class="form-control" name="unit" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Minimum Stock</label>
                        <input type="number" class="form-control" name="minimum_stock" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Expiry Date</label>
                        <input type="date" class="form-control" name="expiry_date">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Stock</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Stock Modals -->
@foreach($inventory as $item)
<div class="modal fade" id="editStockModal{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('cook.inventory.update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Item Name</label>
                        <input type="text" class="form-control" name="item_name" value="{{ $item->item_name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" name="category" value="{{ $item->category }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" value="{{ $item->quantity }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Unit</label>
                        <input type="text" class="form-control" name="unit" value="{{ $item->unit }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Minimum Stock</label>
                        <input type="number" class="form-control" name="minimum_stock" value="{{ $item->minimum_stock }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Expiry Date</label>
                        <input type="date" class="form-control" name="expiry_date" value="{{ $item->expiry_date }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Stock</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Stock Modal -->
<div class="modal fade" id="deleteStockModal{{ $item->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this stock item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('cook.inventory.delete', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<style>
.badge {
    padding: 0.5em 0.75em;
    font-size: 0.875em;
}
</style>
@endsection 