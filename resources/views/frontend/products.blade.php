@extends('layouts.main')

@section('title', 'Products - Crescendo')

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

    .page-subtitle {
        font-size: 1.1rem;
        color: var(--gray);
    }

    .products-section {
        padding: 4rem 0;
    }

    .filter-sidebar {
        background: var(--white);
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        position: sticky;
        top: 100px;
        max-height: calc(100vh - 140px);
        overflow-y: auto;
    }

    .filter-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 1.25rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid var(--border-color);
    }

    .filter-group {
        margin-bottom: 1.5rem;
    }

    .filter-label {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 0.75rem;
        display: block;
    }

    .filter-option {
        display: flex;
        align-items: center;
        padding: 0.5rem 0;
        cursor: pointer;
        transition: color 0.2s ease;
        color: var(--gray);
        text-decoration: none;
    }

    .filter-option:hover {
        color: var(--primary-blue);
    }

    .filter-option input {
        margin-right: 0.75rem;
        accent-color: var(--primary-blue);
    }

    .filter-option span {
        font-size: 0.9rem;
        color: var(--gray);
    }

    .price-range {
        padding: 0.5rem 0;
    }

    .price-input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 0.9rem;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .product-card {
        background: var(--white);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.12);
    }

    .product-image {
        position: relative;
        aspect-ratio: 1;
        background: var(--light-gray);
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
    }

    .product-badges {
        position: absolute;
        top: 12px;
        left: 12px;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        z-index: 2;
    }

    .product-badge {
        background: var(--primary-blue);
        color: var(--white);
        font-size: 0.65rem;
        font-weight: 600;
        padding: 0.25rem 0.6rem;
        border-radius: 20px;
        text-transform: uppercase;
    }

    .product-badge.sale {
        background: #dc3545;
    }

    .product-card:hover .product-badge {
        opacity: 1;
    }

    .product-actions {
        position: absolute;
        top: 12px;
        right: 12px;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        opacity: 0;
        transform: translateX(10px);
        transition: all 0.3s ease;
    }

    .product-card:hover .product-actions {
        opacity: 1;
        transform: translateX(0);
    }

    .action-btn {
        width: 36px;
        height: 36px;
        background: var(--white);
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .action-btn:hover {
        background: var(--primary-blue);
        color: var(--white);
    }

    .product-info {
        padding: 1.25rem;
    }

    .product-category {
        font-size: 0.7rem;
        color: var(--gray);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.25rem;
    }

    .product-name {
        font-size: 1rem;
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 0.25rem;
    }

    .product-description {
        font-size: 0.85rem;
        color: var(--gray);
        line-height: 1.4;
        margin-bottom: 0.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .product-price-row {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .product-price {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-blue);
    }

    .product-price.old {
        font-size: 0.9rem;
        color: var(--gray);
        text-decoration: line-through;
    }

    .pagination-wrap {
        margin-top: 3rem;
        display: flex;
        justify-content: center;
    }

    .pagination-wrap nav {
        display: block !important;
    }

    .pagination-wrap nav > * {
        display: none !important;
    }

    .pagination-wrap nav .pagination {
        display: flex !important;
        gap: 0.25rem;
    }

    .pagination-wrap .page-link {
        min-width: 40px;
        text-align: center;
        border: none;
        color: var(--charcoal);
        padding: 0.75rem 1rem;
        margin: 0 0.25rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .pagination-wrap .page-link:hover {
        background: var(--light-blue);
        color: var(--primary-blue);
    }

    .pagination-wrap .page-item.active .page-link {
        background: var(--primary-blue);
        color: var(--white);
    }

    .pagination-wrap .page-item.disabled .page-link {
        background: transparent;
        color: var(--gray);
    }

    @media (max-width: 991px) {
        .filter-sidebar {
            margin-bottom: 2rem;
        }
    }

    @media (max-width: 767px) {
        .page-title {
            font-size: 1.75rem;
        }
        
        .page-subtitle {
            font-size: 0.9rem;
        }
        
        .filter-title {
            font-size: 1.1rem;
        }
        
        .filter-option {
            padding: 0.5rem 0;
            font-size: 0.9rem;
        }
        
        .product-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .product-info {
            padding: 0.75rem;
        }
        
        .product-name {
            font-size: 0.85rem;
        }
        
        .product-price {
            font-size: 0.95rem;
        }
        
        .product-description {
            font-size: 0.75rem;
        }
    }

    @media (max-width: 480px) {
        .product-grid {
            grid-template-columns: 1fr;
        }
        
        .product-card {
            border-radius: 12px;
        }
        
        .pagination-wrap a {
            padding: 0.5rem 0.75rem;
            font-size: 0.85rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title fade-up">Our Products</h1>
        <p class="page-subtitle fade-up">Discover our curated collection of modern fashion</p>
    </div>
</div>

<!-- Products Section -->
<section class="products-section">
    <div class="container">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="filter-sidebar fade-up">
                    <h4 class="filter-title">Filters</h4>
                    
                    <form method="GET" action="{{ route('products') }}">
                        <div class="filter-group">
                            <label class="filter-label">Search</label>
                            <div class="position-relative">
                                <input type="text" name="search" class="price-input" placeholder="Search products..." value="{{ request()->search }}">
                            </div>
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Categories</label>
                            <a href="{{ route('products') }}" class="filter-option" style="{{ !request()->category ? 'color: var(--primary-blue);' : '' }}">
                                <span>All Products</span>
                            </a>
                            @forelse($categories as $category)
                            <a href="{{ route('products', ['category' => $category->id]) }}" class="filter-option" style="{{ request()->category == $category->id ? 'color: var(--primary-blue);' : '' }}">
                                <span>{{ $category->name }}</span>
                            </a>
                            @empty
                            <span class="filter-option"><span>No categories</span></span>
                            @endforelse
                        </div>

                        <div class="filter-group">
                            <label class="filter-label">Price Range</label>
                            <div class="d-flex gap-2">
                                <input type="number" name="min_price" class="price-input" placeholder="Min" value="{{ request()->min_price }}">
                                <input type="number" name="max_price" class="price-input" placeholder="Max" value="{{ request()->max_price }}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" style="border-radius: 12px;">Apply Filters</button>
                        @if(request()->anyFilled(['category', 'min_price', 'max_price', 'search']))
                        <a href="{{ route('products') }}" class="btn btn-outline w-100 mt-2" style="border-radius: 12px; text-align: center;">Clear Filters</a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Products Grid -->
            <div class="col-lg-9">
                <div class="product-grid">
                    @forelse($products as $product)
                    <div class="product-card fade-up">
                        <a href="{{ route('product.detail', $product->slug) }}" style="text-decoration: none;">
                            <div class="product-image">
                                <div class="product-badges">
                                    @if($product->stock > 0)
                                    <span class="product-badge">In Stock</span>
                                    @else
                                    <span class="product-badge sale">Out of Stock</span>
                                    @endif
                                </div>
                                <div class="product-actions">
                                    <button class="action-btn" title="Quick View"><i class="far fa-eye"></i></button>
                                    <button class="action-btn" title="Add to Wishlist"><i class="far fa-heart"></i></button>
                                </div>
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                            </div>
                            <div class="product-info">
                                <div class="product-category">{{ $product->category->name ?? 'Uncategorized' }}</div>
                                <h4 class="product-name">{{ $product->name }}</h4>
                                @if($product->description)
                                <p class="product-description">{{ $product->description }}</p>
                                @endif
                                <div class="product-price-row">
                                    <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No products found.</p>
                        <a href="{{ route('products') }}" class="btn btn-primary mt-3">Clear Filters</a>
                    </div>
                    @endforelse
                </div>

                @if($products->count() > 0)
                <!-- Pagination -->
                <div class="pagination-wrap fade-up" style="all: initial; display: flex; justify-content: center; margin-top: 2rem;">
                    <div style="display: flex; gap: 0.25rem;">
                        @php
                            $currentPage = $products->currentPage();
                            $lastPage = $products->lastPage();
                            $start = max(1, $currentPage - 2);
                            $end = min($lastPage, $currentPage + 2);
                        @endphp
                        @for($i = $start; $i <= $end; $i++)
                        <a href="{{ $products->url($i) }}" 
                           style="font-family: 'Poppins', sans-serif; min-width: 40px; text-align: center; padding: 0.75rem 1rem; margin: 0 0.25rem; border-radius: 8px; font-weight: 500; text-decoration: none; color: {{ $i == $currentPage ? '#fff' : 'var(--charcoal)' }}; background: {{ $i == $currentPage ? 'var(--primary-blue)' : 'transparent' }}; transition: all 0.3s ease;"
                           class="{{ $i == $currentPage ? 'active' : '' }}">{{ $i }}</a>
                        @endfor
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
