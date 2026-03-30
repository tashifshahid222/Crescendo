@extends('layouts.main')

@section('title', $product->name . ' - ShopMax')

@section('styles')
<style>
    .product-detail-section {
        background: var(--light-gray);
        padding: 3rem 0 5rem;
    }

    .breadcrumb-item a {
        color: var(--primary-blue);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s;
    }
    .breadcrumb-item a:hover { color: var(--dark-blue); }
    .breadcrumb-item.active { color: var(--gray); }
    .breadcrumb-item + .breadcrumb-item::before { color: var(--gray); }

    .product-img-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        background: var(--white);
        position: relative;
    }

    .product-img-card img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        transition: transform 0.5s ease;
        display: block;
    }

    .product-img-card:hover img {
        transform: scale(1.05);
    }

    .product-img-badge {
        position: absolute;
        top: 18px;
        left: 18px;
        background: var(--primary-blue);
        color: var(--white);
        font-size: 0.75rem;
        font-weight: 700;
        padding: 5px 14px;
        border-radius: 20px;
        letter-spacing: 0.5px;
        box-shadow: 0 2px 8px rgba(102,126,234,0.3);
    }

    /* Product Info */
    .product-info-wrapper {
        padding: 0.5rem 0 0 1rem;
    }

    .product-category-link {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--primary-blue);
        text-decoration: none;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        transition: color 0.2s;
    }
    .product-category-link:hover { color: var(--dark-blue); }

    .product-title {
        font-size: 2rem;
        font-weight: 800;
        color: var(--charcoal);
        line-height: 1.2;
        margin: 0.4rem 0 1rem;
    }

    .product-price-tag {
        font-size: 2.4rem;
        font-weight: 800;
        background: linear-gradient(135deg, var(--primary-blue), var(--soft-blue));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
    }

    /* Stock Badge */
    .stock-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.82rem;
        font-weight: 600;
        padding: 6px 14px;
        border-radius: 20px;
    }
    .stock-badge.in-stock {
        background: rgba(16,185,129,0.1);
        color: #10b981;
        border: 1px solid rgba(16,185,129,0.25);
    }
    .stock-badge.out-of-stock {
        background: rgba(239,68,68,0.1);
        color: #ef4444;
        border: 1px solid rgba(239,68,68,0.2);
    }

    /* Divider */
    .product-divider {
        border: none;
        border-top: 1px solid var(--border-color);
        margin: 1.5rem 0;
    }

    /* Description */
    .product-description {
        color: var(--gray);
        font-size: 0.97rem;
        line-height: 1.75;
    }

    /* Quantity Input */
    .qty-wrapper {
        display: flex;
        align-items: center;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        overflow: hidden;
        width: fit-content;
        background: var(--white);
        transition: border-color 0.2s;
    }
    .qty-wrapper:focus-within {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(102,126,234,0.12);
    }
    .qty-btn {
        background: none;
        border: none;
        width: 40px;
        height: 44px;
        font-size: 1.1rem;
        color: var(--gray);
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
        display: flex; align-items: center; justify-content: center;
    }
    .qty-btn:hover { background: var(--light-gray); color: var(--primary-blue); }
    .qty-input {
        border: none;
        width: 52px;
        height: 44px;
        text-align: center;
        font-weight: 700;
        font-size: 1rem;
        color: var(--charcoal);
        outline: none;
        background: transparent;
    }
    .qty-input::-webkit-inner-spin-button,
    .qty-input::-webkit-outer-spin-button { -webkit-appearance: none; }

    /* Add to Cart Button */
    .btn-add-cart {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        color: var(--white);
        border: none;
        border-radius: 14px;
        padding: 13px 32px;
        font-weight: 700;
        font-size: 1rem;
        transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
        box-shadow: 0 4px 15px rgba(74,111,165,0.35);
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }
    .btn-add-cart:hover {
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 12px 30px rgba(74,111,165,0.5);
        color: var(--white);
        background: linear-gradient(135deg, var(--dark-blue), #3d5a80);
    }
    .btn-add-cart:active { transform: translateY(-1px) scale(1); }

    /* Wishlist / Share Buttons */
    .btn-action {
        border: 2px solid var(--border-color);
        background: var(--white);
        color: var(--gray);
        border-radius: 12px;
        padding: 11px 20px;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.25s;
        display: inline-flex;
        align-items: center;
        gap: 7px;
    }
    .btn-action:hover {
        border-color: var(--primary-blue);
        color: var(--primary-blue);
        background: rgba(102,126,234,0.06);
        transform: translateY(-2px);
    }

    /* Out of Stock Alert */
    .out-of-stock-alert {
        background: rgba(251,191,36,0.1);
        border: 1px solid rgba(251,191,36,0.3);
        color: #f59e0b;
        border-radius: 12px;
        padding: 14px 18px;
        font-weight: 500;
        font-size: 0.93rem;
    }

    /* Feature Pills */
    .feature-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }
    .feature-pill {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--light-gray);
        color: var(--gray);
        border-radius: 20px;
        padding: 5px 14px;
        font-size: 0.8rem;
        font-weight: 600;
    }
    .feature-pill i { color: var(--primary-blue); font-size: 0.75rem; }

    /* Related Products */
    .related-section {
        margin-top: 4rem;
    }

    .related-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--charcoal);
        position: relative;
        padding-bottom: 12px;
        margin-bottom: 2rem;
    }
    .related-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        border-radius: 2px;
    }

    .related-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 2px 12px rgba(0,0,0,0.07);
        transition: all 0.35s cubic-bezier(0.4,0,0.2,1);
        background: var(--white);
    }
    .related-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 32px rgba(37,99,235,0.13);
    }
    .related-card .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .related-card:hover .card-img-top {
        transform: scale(1.06);
    }
    .related-card .card-body {
        padding: 1.1rem 1.2rem 1.3rem;
    }
    .related-card h6 {
        font-weight: 700;
        color: var(--charcoal);
        margin-bottom: 4px;
        font-size: 0.95rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .related-price {
        font-size: 1rem;
        font-weight: 700;
        color: var(--primary-blue);
        margin-bottom: 10px;
        display: block;
    }
    .btn-related-view {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        color: var(--white);
        border: none;
        border-radius: 10px;
        padding: 7px 0;
        font-size: 0.85rem;
        font-weight: 600;
        width: 100%;
        transition: all 0.25s;
        display: block;
        text-align: center;
        text-decoration: none;
    }
    .btn-related-view:hover {
        opacity: 0.88;
        color: var(--white);
        transform: translateY(-1px);
    }

    /* Animate in */
    .fade-in-up {
        animation: fadeInUp 0.6s cubic-bezier(0.22,1,0.36,1) both;
    }
    .fade-in-up-delay {
        animation: fadeInUp 0.6s cubic-bezier(0.22,1,0.36,1) 0.15s both;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(28px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section('content')
<section class="product-detail-section">
    <div class="container">

        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home me-1"></i>Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>

        <!-- Main Product Row -->
        <div class="row g-5 align-items-start">

            <!-- Product Image -->
            <div class="col-lg-6 fade-in-up">
                <div class="product-img-card">
                    @if($product->stock > 0)
                        <span class="product-img-badge"><i class="fas fa-check-circle me-1"></i> In Stock</span>
                    @else
                        <span class="product-img-badge" style="background: linear-gradient(135deg,#ef4444,#b91c1c);"><i class="fas fa-times-circle me-1"></i> Out of Stock</span>
                    @endif
                    <img src="{{ $product->image_url }}"
                         alt="{{ $product->name }}">
                </div>
            </div>

            <!-- Product Details -->
            <div class="col-lg-6 fade-in-up-delay">
                <div class="product-info-wrapper">

                    <!-- Category -->
                    <a href="{{ route('products', ['category' => $product->category->id]) }}" class="product-category-link">
                        <i class="fas fa-tag me-1"></i>{{ $product->category->name }}
                    </a>

                    <!-- Title -->
                    <h1 class="product-title">{{ $product->name }}</h1>

                    @if($product->description)
                    <p class="product-desc" style="color: var(--gray); font-size: 1rem; line-height: 1.6; margin-bottom: 1rem;">{{ $product->description }}</p>
                    @endif

                    <!-- Price -->
                    <div class="mb-3">
                        <span class="product-price-tag">${{ number_format($product->price, 2) }}</span>
                    </div>

                    <!-- Stock Status -->
                    <div class="mb-3">
                        @if($product->stock > 0)
                            <span class="stock-badge in-stock">
                                <i class="fas fa-circle" style="font-size:0.5rem;"></i>
                                In Stock &mdash; {{ $product->stock }} available
                            </span>
                        @else
                            <span class="stock-badge out-of-stock">
                                <i class="fas fa-circle" style="font-size:0.5rem;"></i>
                                Out of Stock
                            </span>
                        @endif
                    </div>

                    <hr class="product-divider">

                    <!-- Feature Pills -->
                    <div class="feature-pills mb-4">
                        <span class="feature-pill"><i class="fas fa-shield-alt"></i> Secure Payment</span>
                        <span class="feature-pill"><i class="fas fa-undo"></i> 30-Day Returns</span>
                        <span class="feature-pill"><i class="fas fa-shipping-fast"></i> Fast Delivery</span>
                    </div>

                    <hr class="product-divider">

                    <!-- Add to Cart / Out of Stock -->
                    @if($product->stock > 0)
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="d-flex align-items-center gap-3 flex-wrap mb-4">
                            <div>
                                <label class="form-label fw-600 text-secondary small mb-1">Quantity</label>
                                <div class="qty-wrapper">
                                    <button type="button" class="qty-btn" id="qty-minus"><i class="fas fa-minus"></i></button>
                                    <input type="number" name="quantity" id="qty-input" class="qty-input" value="1" min="1" max="{{ $product->stock }}">
                                    <button type="button" class="qty-btn" id="qty-plus"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div style="align-self: flex-end;">
                                <button type="submit" class="btn-add-cart">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </form>
                    @else
                    <div class="out-of-stock-alert mb-4">
                        <i class="fas fa-exclamation-triangle me-2 text-warning"></i>
                        This product is currently out of stock. Check back soon!
                    </div>
                    @endif

                    <!-- Wishlist & Share -->
                    <div class="d-flex gap-2 flex-wrap">
                        <button class="btn-action"><i class="fas fa-heart"></i> Wishlist</button>
                        <button class="btn-action"><i class="fas fa-share-alt"></i> Share</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
        <div class="related-section">
            <h3 class="related-title">Related Products</h3>
            <div class="row g-4">
                @foreach($relatedProducts as $related)
                <div class="col-6 col-md-3">
                    <div class="related-card card h-100">
                        <div style="overflow:hidden;">
                            <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://placehold.co/300x250' }}"
                                 alt="{{ $related->name }}" class="card-img-top">
                        </div>
                        <div class="card-body">
                            <h6 title="{{ $related->name }}">{{ $related->name }}</h6>
                            @if($related->description)
                            <p style="font-size: 0.8rem; color: var(--gray); margin-bottom: 0.5rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $related->description }}</p>
                            @endif
                            <span class="related-price">${{ number_format($related->price, 2) }}</span>
                            <a href="{{ route('product.detail', $related->slug) }}" class="btn-related-view">View Product</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

    </div>
</section>
@endsection

@section('scripts')
<script>
    // Quantity +/- buttons
    const input = document.getElementById('qty-input');
    const max = parseInt(input?.max) || 99;

    document.getElementById('qty-minus')?.addEventListener('click', () => {
        if (parseInt(input.value) > 1) input.value = parseInt(input.value) - 1;
    });

    document.getElementById('qty-plus')?.addEventListener('click', () => {
        if (parseInt(input.value) < max) input.value = parseInt(input.value) + 1;
    });
</script>
@endsection