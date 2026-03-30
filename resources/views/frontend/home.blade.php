@extends('layouts.main')

@section('title', 'Crescendo - Premium Fashion')

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, var(--pale-blue) 0%, var(--light-blue) 100%);
        min-height: 85vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 80%;
        height: 150%;
        background: radial-gradient(circle, rgba(107, 140, 199, 0.15) 0%, transparent 70%);
        pointer-events: none;
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        color: var(--dark-blue);
    }

    .hero-subtitle {
        font-size: 1.1rem;
        color: var(--gray);
        margin-bottom: 2rem;
        max-width: 500px;
    }

    .hero-image {
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(45, 74, 111, 0.15);
        overflow: hidden;
    }

    .category-card {
        position: relative;
        border-radius: 16px;
        overflow: hidden;
        background: var(--white);
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
        height: 220px;
    }

    .category-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.12);
    }

    .category-card img {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.5s ease;
        display: block;
    }

    .category-card:hover img {
        transform: scale(1.1);
    }

    .category-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(45, 74, 111, 0.8) 0%, transparent 60%);
        display: flex;
        align-items: flex-end;
        padding: 1.5rem;
    }

    .category-title {
        color: var(--white);
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
    }

    .product-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        background: var(--white);
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

    .product-badge {
        position: absolute;
        top: 12px;
        left: 12px;
        background: var(--primary-blue);
        color: var(--white);
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.3rem 0.75rem;
        border-radius: 20px;
        text-transform: uppercase;
        z-index: 2;
    }

    .product-badge.out-of-stock {
        background: #dc3545;
    }

    .product-card:hover .product-badge {
        opacity: 1;
    }

    .product-info {
        padding: 1.25rem;
    }

    .product-category {
        font-size: 0.75rem;
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

    .product-price {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-blue);
    }

    .section-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--dark-blue);
        margin-bottom: 0.75rem;
    }

    .section-subtitle {
        font-size: 1rem;
        color: var(--gray);
    }

    .timer-section {
        background: linear-gradient(135deg, var(--dark-blue) 0%, var(--primary-blue) 100%);
        border-radius: 24px;
        padding: 3rem;
        text-align: center;
        color: var(--white);
    }

    .timer-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .timer-subtitle {
        font-size: 1rem;
        opacity: 0.9;
        margin-bottom: 2rem;
    }

    .timer-container {
        display: flex;
        justify-content: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }

    .timer-box {
        background: rgba(255,255,255,0.15);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        padding: 1.25rem 1.5rem;
        min-width: 100px;
    }

    .timer-number {
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1;
    }

    .timer-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        opacity: 0.8;
        margin-top: 0.5rem;
    }

    .review-card {
        background: var(--white);
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }

    .review-stars {
        color: #ffc107;
        margin-bottom: 0.75rem;
    }

    .review-text {
        font-size: 0.95rem;
        color: var(--gray);
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .reviewer-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .reviewer-avatar {
        object-fit: cover;
    }

    .reviewer-name {
        font-weight: 600;
        color: var(--charcoal);
        font-size: 0.9rem;
    }

    .reviewer-location {
        font-size: 0.8rem;
        color: var(--gray);
    }

    .cta-section {
        background: linear-gradient(135deg, var(--dark-blue) 0%, var(--primary-blue) 100%);
        border-radius: 24px;
        padding: 4rem;
        text-align: center;
        color: var(--white);
    }

    .cta-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .cta-text {
        font-size: 1.1rem;
        opacity: 0.9;
        margin-bottom: 2rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }

    .newsletter-card {
        background: var(--white);
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    }

    @media (max-width: 991px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-section {
            min-height: auto;
            padding: 4rem 0;
        }
    }

    @media (max-width: 576px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .section-title {
            font-size: 1.75rem;
        }

        .category-row {
            justify-content: center !important;
        }

        .category-row > div {
            width: 100% !important;
            max-width: 100% !important;
        }

        .category-card {
            height: 180px;
        }
        
        .cta-section {
            padding: 2rem;
        }
        
        .cta-title {
            font-size: 1.75rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <span class="badge bg-white text-primary mb-3 px-3 py-2 rounded-pill" style="font-size: 0.75rem; font-weight: 600;">NEW COLLECTION 2026</span>
                    <h1 class="hero-title">Elevate Your Everyday Style</h1>
                    <p class="hero-subtitle">Discover curated pieces that blend contemporary design with timeless elegance. Quality fashion for the modern minimalist.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('products') }}" class="btn btn-primary">Shop Now</a>
                        <a href="{{ route('about') }}" class="btn btn-outline">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?w=800&q=80" alt="Fashion Model" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="section-padding">
    <div class="container">
        <div class="section-header fade-up">
            <h2 class="section-title">Shop by Category</h2>
            <p class="section-subtitle">Explore our curated collections</p>
        </div>
        <div class="row g-4">
            @forelse($categories as $category)
            <div class="col-sm-6 col-lg-3 fade-up">
                <a href="{{ route('products', ['category' => $category->id]) }}" class="category-card w-100" style="text-decoration: none; display: block;">
                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}">
                    <div class="category-overlay">
                        <h3 class="category-title">{{ $category->name }}</h3>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-5 fade-up">
                <p class="text-muted" style="font-size: 1.1rem;">No categories available yet. Check back soon!</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="section-padding" style="background: var(--light-gray);">
    <div class="container">
        <div class="section-header fade-up">
            <h2 class="section-title">Featured Products</h2>
            <p class="section-subtitle">Handpicked favorites from our collection</p>
        </div>
        <div class="row g-4">
            @forelse($featuredProducts as $product)
            <div class="col-sm-6 col-lg-3 fade-up">
                <a href="{{ route('product.detail', $product->slug) }}" class="product-card" style="text-decoration: none; display: block;">
                    <div class="product-image">
                        @if($product->stock_status == 'out_of_stock')
                        <span class="product-badge out-of-stock">Out of Stock</span>
                        @else
                        <span class="product-badge">New</span>
                        @endif
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                    </div>
                    <div class="product-info">
                        <div class="product-category">{{ $product->category->name ?? 'Uncategorized' }}</div>
                        <h4 class="product-name">{{ $product->name }}</h4>
                        @if($product->description)
                        <p class="product-description">{{ $product->description }}</p>
                        @endif
                        <div class="product-price">${{ number_format($product->price, 2) }}</div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">No products available yet.</p>
            </div>
            @endforelse
        </div>
        <div class="text-center mt-5 fade-up">
            <a href="{{ route('products') }}" class="btn btn-outline">View All Products</a>
        </div>
    </div>
</section>

<!-- Timer Section -->
<section class="section-padding">
    <div class="container">
        <div class="timer-section fade-up">
            <h2 class="timer-title">Flash Sale Ends Soon!</h2>
            <p class="timer-subtitle">Get up to 50% off on selected items</p>
            <div class="timer-container">
                <div class="timer-box">
                    <div class="timer-number" id="days">00</div>
                    <div class="timer-label">Days</div>
                </div>
                <div class="timer-box">
                    <div class="timer-number" id="hours">00</div>
                    <div class="timer-label">Hours</div>
                </div>
                <div class="timer-box">
                    <div class="timer-number" id="minutes">00</div>
                    <div class="timer-label">Minutes</div>
                </div>
                <div class="timer-box">
                    <div class="timer-number" id="seconds">00</div>
                    <div class="timer-label">Seconds</div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(function() {
    const endDate = new Date();
    endDate.setDate(endDate.getDate() + 7);
    
    function updateTimer() {
        const now = new Date();
        const diff = endDate - now;
        
        if (diff <= 0) {
            document.getElementById('days').textContent = '00';
            document.getElementById('hours').textContent = '00';
            document.getElementById('minutes').textContent = '00';
            document.getElementById('seconds').textContent = '00';
            return;
        }
        
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);
        
        document.getElementById('days').textContent = String(days).padStart(2, '0');
        document.getElementById('hours').textContent = String(hours).padStart(2, '0');
        document.getElementById('minutes').textContent = String(minutes).padStart(2, '0');
        document.getElementById('seconds').textContent = String(seconds).padStart(2, '0');
    }
    
    updateTimer();
    setInterval(updateTimer, 1000);
})();
</script>

<!-- Customer Reviews Section -->
<section class="section-padding" style="background: var(--light-gray);">
    <div class="container">
        <div class="section-header fade-up">
            <h2 class="section-title">What Our Customers Say</h2>
            <p class="section-subtitle">Real feedback from happy shoppers</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 fade-up">
                <div class="review-card">
                    <div class="review-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="review-text">"Amazing quality! The fabric is so comfortable and the fit is perfect. Will definitely order again!"</p>
                    <div class="reviewer-info">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&q=80" alt="Sarah Johnson" class="reviewer-avatar" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <div class="reviewer-name">Sarah Johnson</div>
                            <div class="reviewer-location">New York, USA</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="review-card">
                    <div class="review-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="review-text">"Fast shipping and excellent customer service. The packaging was beautiful too. Highly recommend!"</p>
                    <div class="reviewer-info">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&q=80" alt="Michael Chen" class="reviewer-avatar" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <div class="reviewer-name">Michael Chen</div>
                            <div class="reviewer-location">Los Angeles, USA</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="review-card">
                    <div class="review-stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="review-text">"Love the style! Got so many compliments on my purchase. True to size and great quality."</p>
                    <div class="reviewer-info">
                        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&q=80" alt="Emma Williams" class="reviewer-avatar" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover;">
                        <div>
                            <div class="reviewer-name">Emma Williams</div>
                            <div class="reviewer-location">London, UK</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding">
    <div class="container">
        <div class="cta-section fade-up">
            <h2 class="cta-title">Join Our Community</h2>
            <p class="cta-text">Subscribe to our newsletter and be the first to know about new arrivals, exclusive offers, and style tips.</p>
            <form class="d-flex justify-content-center gap-2 flex-column flex-sm-row">
                <input type="email" class="form-control" placeholder="Enter your email" style="max-width: 300px; border-radius: 50px; padding: 0.75rem 1.5rem;">
                <button type="submit" class="btn btn-light" style="border-radius: 50px; padding: 0.75rem 2rem; font-weight: 600; color: var(--dark-blue);">Subscribe</button>
            </form>
        </div>
    </div>
</section>
@endsection
