@extends('layouts.main')

@section('title', 'Shopping Cart - Crescendo')

@section('styles')
<style>
    .page-header {
        background: linear-gradient(135deg, var(--pale-blue) 0%, var(--light-blue) 100%);
        padding: 4rem 0;
        text-align: center;
    }

    .page-title {
        font-size: 3rem;
        font-weight: 700;
        color: var(--dark-blue);
        margin-bottom: 1rem;
    }

    .cart-section {
        padding: 5rem 0;
    }

    .cart-table {
        background: var(--white);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    }

    .cart-table-header {
        background: var(--light-gray);
        padding: 1rem 1.5rem;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr 40px;
        gap: 1rem;
        font-weight: 600;
        color: var(--charcoal);
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .cart-item {
        padding: 1.5rem;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr 40px;
        gap: 1rem;
        align-items: center;
        border-bottom: 1px solid var(--border-color);
    }

    @media (max-width: 767px) {
        .cart-table {
            border-radius: 12px;
        }

        .cart-table-header {
            display: none;
        }

        .cart-item {
            grid-template-columns: 1fr;
            gap: 0.75rem;
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            position: relative;
        }

        .cart-item > div:first-child {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .cart-product {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .cart-product-image {
            width: 120px;
            height: 120px;
            border-radius: 12px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .cart-product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cart-product-details {
            flex: 1;
        }

        .cart-product-name {
            font-size: 1rem;
            font-weight: 600;
            color: var(--charcoal);
            margin-bottom: 0.25rem;
        }

        .cart-product-price {
            color: var(--primary-blue);
            font-weight: 600;
        }

        .cart-item > div:nth-child(2),
        .cart-item > div:nth-child(3),
        .cart-item > div:nth-child(4) {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px dashed var(--border-color);
        }

        .cart-item > div:nth-child(2)::before {
            content: 'Price: ';
            color: var(--gray);
            font-size: 0.85rem;
        }

        .cart-item > div:nth-child(3)::before {
            content: 'Qty: ';
            color: var(--gray);
            font-size: 0.85rem;
        }

        .cart-item > div:nth-child(4) {
            border-bottom: none;
            font-weight: 600;
            color: var(--primary-blue);
        }

        .cart-item > div:nth-child(4)::before {
            content: 'Total: ';
            color: var(--gray);
            font-size: 0.85rem;
            font-weight: 500;
        }

        .cart-item > div:last-child {
            position: absolute;
            top: 1rem;
            right: 1rem;
        }
    }

    @media (max-width: 480px) {
        .cart-product-image {
            width: 120px;
            height: 120px;
        }

        .cart-item {
            padding: 1rem;
        }

        .cart-product-name {
            font-size: 1rem;
        }
    }

    .cart-item:last-child {
        border-bottom: none;
    }

    .cart-product {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .cart-product-image {
        width: 80px;
        height: 80px;
        border-radius: 12px;
        overflow: hidden;
        background: var(--light-gray);
    }

    .cart-product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cart-product-name {
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 0.25rem;
    }

    .cart-product-meta {
        font-size: 0.85rem;
        color: var(--gray);
    }

    .cart-price {
        font-weight: 600;
        color: var(--primary-blue);
    }

    .quantity-control {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .quantity-btn {
        width: 32px;
        height: 32px;
        border: 1px solid var(--border-color);
        background: var(--white);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .quantity-btn:hover {
        border-color: var(--primary-blue);
        color: var(--primary-blue);
    }

    .quantity-input {
        width: 50px;
        text-align: center;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 0.5rem;
        font-weight: 500;
    }

    .remove-btn {
        width: 32px;
        height: 32px;
        border: none;
        background: transparent;
        color: var(--gray);
        cursor: pointer;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .remove-btn:hover {
        background: #fee2e2;
        color: #e74c3c;
    }

    .cart-summary {
        background: var(--white);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    }

    .summary-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid var(--border-color);
    }

    .summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
        font-size: 0.95rem;
    }

    .summary-row.total {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid var(--border-color);
        font-weight: 600;
        font-size: 1.1rem;
    }

    .summary-label {
        color: var(--gray);
    }

    .summary-value {
        color: var(--charcoal);
    }

    .summary-value.total {
        color: var(--primary-blue);
    }

    .coupon-form {
        display: flex;
        gap: 0.5rem;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid var(--border-color);
    }

    .coupon-form input {
        flex: 1;
    }

    .continue-shopping {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-blue);
        text-decoration: none;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border: 2px solid var(--primary-blue);
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .continue-shopping:hover {
        background: var(--primary-blue);
        color: var(--white);
    }

    .empty-cart {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-cart-icon {
        width: 100px;
        height: 100px;
        background: var(--light-gray);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2.5rem;
        color: var(--gray);
    }

    .empty-cart-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 0.5rem;
    }

    .empty-cart-text {
        color: var(--gray);
        margin-bottom: 1.5rem;
    }

    @media (max-width: 991px) {
        .cart-table-header {
            display: none;
        }

        .cart-item {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .cart-product {
            flex-direction: column;
            align-items: flex-start;
        }

        .cart-summary {
            margin-top: 2rem;
        }
    }

    @media (max-width: 767px) {
        .page-title {
            font-size: 1.5rem;
        }

        .cart-item {
            padding: 1rem;
            border-radius: 12px;
        }

        .cart-product-image {
            width: 80px;
            height: 80px;
        }

        .cart-product-name {
            font-size: 1rem;
        }

        .cart-product-price {
            font-size: 1rem;
        }

        .qty-control {
            width: 100px;
        }

        .qty-input {
            width: 40px;
            font-size: 0.9rem;
        }

        .cart-summary {
            padding: 1.5rem;
            border-radius: 12px;
        }

        .summary-title {
            font-size: 1.25rem;
        }

        .continue-shopping {
            width: 100%;
            text-align: center;
            justify-content: center;
        }

        #update-cart-btn {
            width: 100%;
            margin-top: 1rem;
        }

        .cart-item-details {
            flex: 1;
            padding-left: 1rem;
        }

        .cart-item-actions {
            justify-content: flex-start;
            margin-top: 0.5rem;
        }
    }

    @media (max-width: 480px) {
        .page-header {
            padding: 2rem 0;
        }

        .page-title {
            font-size: 1.25rem;
        }

        .cart-product-image {
            width: 60px;
            height: 60px;
        }

        .cart-item {
            padding: 0.75rem;
        }

        .cart-summary {
            padding: 1rem;
        }

        .summary-row {
            font-size: 0.85rem;
        }

        .cart-summary .total-row {
            font-size: 1.25rem;
        }

        .checkout-btn {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    #update-cart-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title fade-up">Shopping Cart</h1>
        <p class="page-subtitle fade-up">{{ count(session('cart', [])) }} items in your cart</p>
    </div>
</div>

<!-- Cart Section -->
<section class="cart-section">
    <div class="container">
        @php
        $cart = session('cart', []);
        $total = 0;
        @endphp

        @if(count($cart) > 0)
        <div class="row g-4">
            <div class="col-12 col-md-8 col-lg-8 fade-up">
                <div class="cart-table">
                    <div class="cart-table-header">
                        <span>Product</span>
                        <span>Price</span>
                        <span>Quantity</span>
                        <span>Total</span>
                    </div>
                    @foreach($cart as $id => $item)
                    @php
                    $itemTotal = $item['price'] * $item['quantity'];
                    $total += $itemTotal;
                    @endphp
                    <div class="cart-item" data-product-id="{{ $id }}">
                        <div class="cart-product">
                            <div class="cart-product-image">
                                @php
                                $cartImage = $item['image'] ?? null;
                                $cartImageUrl = $cartImage ? (str_starts_with($cartImage, 'http') ? $cartImage : asset('storage/' . $cartImage)) : 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=200&q=80';
                                @endphp
                                <img src="{{ $cartImageUrl }}" alt="{{ $item['name'] }}">
                            </div>
                            <div>
                                <h4 class="cart-product-name">{{ $item['name'] }}</h4>
                                <span class="cart-product-meta">{{ $item['category'] ?? 'Product' }}</span>
                            </div>
                        </div>
                        <div class="cart-price">${{ number_format($item['price'], 2) }}</div>
                        <div class="quantity-control">
                            <button class="quantity-btn">-</button>
                            <input type="number" class="quantity-input" value="{{ $item['quantity'] }}" min="1">
                            <button class="quantity-btn">+</button>
                        </div>
                        <div class="cart-price">${{ number_format($itemTotal, 2) }}</div>
                        <button class="remove-btn"><i class="fas fa-times"></i></button>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('products') }}" class="continue-shopping">
                        <i class="fas fa-arrow-left"></i> Continue Shopping
                    </a>
                    <button type="button" id="update-cart-btn" class="btn btn-primary" style="border-radius: 12px;">
                        <i class="fas fa-sync-alt me-2"></i>Update Cart
                    </button>
                </div>
            </div>

            <div class="col-12 col-md-4 col-lg-4 fade-up">
                <div class="cart-summary">
                    <h3 class="summary-title">Order Summary</h3>
                    <div class="summary-row">
                        <span class="summary-label">Subtotal</span>
                        <span class="summary-value">${{ number_format($total, 2) }}</span>
                    </div>
                    <div class="summary-row">
                        <span class="summary-label">Shipping</span>
                        <span class="summary-value">Free</span>
                    </div>
                    <div class="summary-row total">
                        <span class="summary-label">Total</span>
                        <span class="summary-value total">${{ number_format($total, 2) }}</span>
                    </div>

                    <a href="{{ route('checkout') }}" class="btn btn-primary w-100" style="border-radius: 12px; margin-top: 1.5rem;">Proceed to Checkout</a>
                </div>
            </div>
        </div>
        @else
        <div class="empty-cart fade-up">
            <div class="empty-cart-icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <h3 class="empty-cart-title">Your cart is empty</h3>
            <p class="empty-cart-text">Looks like you haven't added any items to your cart yet.</p>
            <a href="{{ route('products') }}" class="btn btn-primary" style="border-radius: 50px;">Start Shopping</a>
        </div>
        @endif
    </div>
</section>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.quantity-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const input = this.parentElement.querySelector('.quantity-input');
            let value = parseInt(input.value);

            if (this.textContent === '+') {
                value++;
            } else if (this.textContent === '-' && value > 1) {
                value--;
            }

            input.value = value;
        });
    });

    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const productId = this.closest('.cart-item').dataset.productId;
            if (confirm('Remove this item?')) {
                fetch('/cart/remove/' + productId, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(() => location.reload());
            }
        });
    });

    document.getElementById('update-cart-btn').addEventListener('click', function() {
        const btn = this;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
        btn.disabled = true;

        const cartItems = document.querySelectorAll('.cart-item');
        let promises = [];

        cartItems.forEach(item => {
            const productId = item.dataset.productId;
            const quantity = item.querySelector('.quantity-input').value;

            promises.push(fetch('/cart/update/' + productId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    quantity: quantity
                })
            }));
        });

        Promise.all(promises).then(() => location.reload());
    });
</script>
@endsection