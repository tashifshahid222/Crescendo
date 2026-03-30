@extends('layouts.main')

@section('title', 'Order Success - ShopMax')

@section('styles')
<style>
    .btn-order {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-order-primary {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        color: var(--white);
        border: none;
        box-shadow: 0 4px 15px rgba(74, 111, 165, 0.35);
    }

    .btn-order-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(74, 111, 165, 0.45);
        color: var(--white);
    }

    .btn-order-outline {
        color: var(--primary-blue);
        border: 2px solid var(--primary-blue);
    }

    .btn-order-outline:hover {
        background: var(--primary-blue);
        color: var(--white);
    }
</style>
@endsection

@section('content')
<section class="py-5">
    <div class="container text-center">
        <div class="mb-4">
            <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
        </div>
        <h1 class="mb-3">Thank You!</h1>
        @if(isset($order))
        <p class="lead">Your Order Number: <strong>#{{ str_pad($order->id, 4, '0', STR_PAD_LEFT) }}</strong></p>
        <p class="lead text-muted">Your order has been placed successfully.</p>
        <p class="text-muted"><strong>Total Amount:</strong> ${{ number_format($order->total_amount, 2) }}</p>
        @else
        <p class="lead text-muted">Your order has been placed successfully.</p>
        @endif
        <p class="text-muted">We will send you an email confirmation shortly.</p>
        
        <div class="mt-4">
            @auth
            <a href="{{ route('my-orders') }}" class="btn btn-order btn-order-primary">View My Orders</a>
            @else
            <a href="{{ route('cart') }}" class="btn btn-order btn-order-primary">View My Orders</a>
            @endauth
            <a href="{{ route('products') }}" class="btn btn-order btn-order-outline ms-2">Continue Shopping</a>
        </div>
    </div>
</section>
@endsection
