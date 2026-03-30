@extends('backend.layout')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card bg-primary text-white h-100">
            <div class="card-body d-flex align-items-center">
                <div class="stat-icon bg-white text-primary me-3">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['users'] }}</h3>
                    <small>Total Users</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card bg-success text-white h-100">
            <div class="card-body d-flex align-items-center">
                <div class="stat-icon bg-white text-success me-3">
                    <i class="fas fa-box"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['products'] }}</h3>
                    <small>Total Products</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card bg-warning text-white h-100">
            <div class="card-body d-flex align-items-center">
                <div class="stat-icon bg-white text-warning me-3">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div>
                    <h3 class="mb-0">{{ $stats['orders'] }}</h3>
                    <small>Total Orders</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card stat-card bg-info text-white h-100">
            <div class="card-body d-flex align-items-center">
                <div class="stat-icon bg-white text-info me-3">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div>
                    <h3 class="mb-0">${{ number_format($stats['revenue'], 2) }}</h3>
                    <small>Total Revenue</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-md-8">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Recent Orders</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</td>
                                <td>{{ $order->name }}</td>
                                <td>${{ number_format($order->total_amount, 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $order->status == 'delivered' ? 'success' : ($order->status == 'cancelled' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>
                                <td>{{ $order->created_at->format('M d, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h5 class="mb-0">Quick Stats</h5>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <span>Categories</span>
                    <span class="fw-bold">{{ $stats['categories'] }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span>Pending Orders</span>
                    <span class="fw-bold text-warning">{{ $stats['pendingOrders'] }}</span>
                </div>
                <hr>
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-primary">Manage Categories</a>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-success">Manage Products</a>
                    <a href="{{ route('admin.orders') }}" class="btn btn-outline-warning">View Orders</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
