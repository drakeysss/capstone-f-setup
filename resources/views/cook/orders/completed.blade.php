@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Completed Orders</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Items</th>
                                    <th>Completed At</th>
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
                                            <span class="badge bg-success">{{ $item->menu->name }} ({{ $item->quantity }})</span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>{{ $order->updated_at->format('M d, Y H:i') }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" onclick="viewOrder({{ $order->id }})">View Details</button>
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

@push('scripts')
<script>
function viewOrder(orderId) {
    window.location.href = `/cook/orders/${orderId}`;
}
</script>
@endpush
@endsection 