@extends('layouts.main')

@section('title', 'My Orders - ShopMax')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="mb-4">My Orders</h1>
        
        @if($orders->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            <span class="badge bg-{{ $order->status == 'delivered' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'warning') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderModal{{ $order->id }}">
                                View Details
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-shopping-bag fa-5x text-muted mb-4"></i>
            <h3>No orders yet</h3>
            <p class="text-muted">Start shopping to see your orders here.</p>
            <a href="{{ route('products') }}" class="btn btn-primary">Start Shopping</a>
        </div>
        @endif
    </div>
</section>

@foreach($orders as $order)
<div class="modal fade" id="orderModal{{ $order->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order #{{ $order->id }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6>Shipping Information</h6>
                        <p class="mb-0"><strong>Name:</strong> {{ $order->name }}</p>
                        <p class="mb-0"><strong>Email:</strong> {{ $order->email }}</p>
                        <p class="mb-0"><strong>Phone:</strong> {{ $order->phone }}</p>
                        <p class="mb-0"><strong>Address:</strong> {{ $order->address }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6>Order Status</h6>
                        <p class="mb-0"><strong>Status:</strong> 
                            <span class="badge bg-{{ $order->status == 'delivered' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'warning') }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </p>
                        <p class="mb-0"><strong>Date:</strong> {{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                </div>
                <h6>Order Items</h6>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total</th>
                            <th>${{ number_format($order->total_amount, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
