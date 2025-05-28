@extends('layouts.app')

@section('content')
<div class="col-12 mb-4">
    <div class="card border-0 bg-primary text-white overflow-hidden">
        <div class="card-body p-4 position-relative" style="background-color: var(--secondary-color);">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="fw-bold mb-1">Ingredient Details</h4>
                </div>
                <div class="col-auto">
                    <button class="btn btn-secondary">
                        <i class="bi bi-arrow-left">
                            <a href="{{ route('kitchen.inventory.index') }}">Back to Inventory</a>
                        </i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-body">
                <h5 class="fw-bold">{{ $ingredient->ingredient_name }}</h5>
                <p><strong>Category:</strong> {{ $ingredient->ingredient_category }}</p>
                <p><strong>Quantity:</strong> {{ $ingredient->ingredient_quantity }} {{ $ingredient->ingredient_unit }}</p>
                <p><strong>Price:</strong> ${{ $ingredient->ingredient_price }}</p>
                <p><strong>Last Updated:</strong> {{ $ingredient->updated_at->format('Y-m-d') }}</p>
                <p><strong>Status:</strong> 
                    @if($ingredient->ingredient_quantity < 10)
                        <span class="badge bg-warning">Low Stock</span>
                    @elseif($ingredient->ingredient_quantity == 0)
                        <span class="badge bg-danger">Out of Stock</span>
                    @else
                        <span class="badge bg-success">In Stock</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
