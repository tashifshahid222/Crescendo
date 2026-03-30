@extends('layouts.main')

@section('title', 'Checkout - ShopMax')

@section('content')
<style>
    .checkout-page {
        background: var(--light-gray);
        min-height: 100vh;
        padding: 60px 0;
    }

    .checkout-card,
    .summary-card {
        border: none;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        background: var(--white);
        transition: all 0.3s ease;
    }

    .checkout-card:hover,
    .summary-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(74, 111, 165, 0.15);
    }

    .checkout-header {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        color: var(--white);
        padding: 20px 25px;
        border-radius: 18px 18px 0 0;
        font-weight: 600;
    }

    .summary-header {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        color: var(--white);
        padding: 20px 25px;
        border-radius: 18px 18px 0 0;
        font-weight: 600;
    }

    .form-control {
        border: 2px solid var(--border-color);
        border-radius: 12px;
        padding: 12px 15px;
        transition: all 0.3s ease;
        background: var(--white);
    }

    .form-control:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.15);
        background: var(--white);
    }

    .form-label {
        font-weight: 600;
        color: var(--charcoal);
    }

    .place-order-btn {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        border: none;
        border-radius: 50px;
        padding: 14px 30px;
        font-weight: 700;
        font-size: 1rem;
        color: var(--white);
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(74, 111, 165, 0.35);
    }

    .place-order-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(74, 111, 165, 0.45);
        color: var(--white);
    }

    .summary-card .d-flex {
        font-size: 0.95rem;
        border-bottom: 1px dashed var(--border-color);
        padding-bottom: 10px;
        margin-bottom: 10px;
    }

    .summary-card strong {
        color: var(--charcoal);
    }

    .summary-card span {
        font-weight: 600;
    }

    .summary-card .fw-bold {
        color: var(--primary-blue);
    }

    .summary-card a {
        color: var(--gray);
        transition: all 0.3s ease;
    }

    .summary-card a:hover {
        color: var(--primary-blue) !important;
    }

    .card-body {
        padding: 30px;
    }
</style>

<section class="checkout-page">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--primary-blue);">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cart') }}" class="text-decoration-none" style="color: var(--primary-blue);">Cart</a></li>
                        <li class="breadcrumb-item active" style="color: var(--gray);">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>

        <h2 class="mb-4" style="font-weight: 700; color: var(--charcoal);">
            <i class="fas fa-credit-card me-2" style="color: var(--primary-blue);"></i>Checkout
        </h2>

        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="checkout-card">
                    <div class="checkout-header">
                        <h4 class="mb-0"><i class="fas fa-shipping-fast me-2"></i>Shipping Information</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('checkout.place') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name ?? '' }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email ?? '' }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Shipping Address</label>
                                <textarea name="address" rows="3" class="form-control" placeholder="Enter your shipping address" required></textarea>
                            </div>
                            <button type="submit" class="btn place-order-btn text-white">
                                <i class="fas fa-check-circle me-2"></i>Place Order
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="summary-card">
                    <div class="summary-header">
                        <h5 class="mb-0"><i class="fas fa-receipt me-2"></i>Order Summary</h5>
                    </div>
                    <div class="card-body">
                        @php $cart = session('cart', []); $subtotal = 0; @endphp
                        @foreach($cart as $item)
                        <div class="d-flex justify-content-between mb-3 pb-3" style="border-bottom: 1px dashed var(--border-color);">
                            <div>
                                <strong>{{ $item['name'] }}</strong>
                                <br>
                                <small class="text-muted">Qty: {{ $item['quantity'] }}</small>
                            </div>
                            <span class="fw-bold">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </div>
                        @php $subtotal += $item['price'] * $item['quantity']; @endphp
                        @endforeach

                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span class="fw-bold">${{ number_format($subtotal, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted"><i class="fas fa-shipping-fast me-1"></i>Shipping</span>
                            <span class="text-success fw-bold">FREE</span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold" style="font-size: 1.2rem;">Total</span>
                            <span class="fw-bold" style="font-size: 1.5rem; color: var(--primary-blue);">${{ number_format($subtotal, 2) }}</span>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('cart') }}" class="text-decoration-none" style="color: var(--gray);">
                                <i class="fas fa-arrow-left me-1"></i> Back to Cart
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
