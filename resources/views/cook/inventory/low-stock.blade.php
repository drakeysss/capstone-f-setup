@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Low Stock Items</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Current Stock</th>
                                    <th>Minimum Stock</th>
                                    <th>Last Updated</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lowStockItems as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <span class="badge bg-danger">{{ $item->quantity }}</span>
                                    </td>
                                    <td>{{ $item->minimum_stock }}</td>
                                    <td>{{ $item->updated_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        @if($item->quantity <= 0)
                                            <span class="badge bg-danger">Out of Stock</span>
                                        @else
                                            <span class="badge bg-warning">Low Stock</span>
                                        @endif
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
@endsection 