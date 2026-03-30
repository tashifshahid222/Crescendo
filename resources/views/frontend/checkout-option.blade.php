@extends('layouts.main')

@section('title', 'Checkout Options - Crescendo')

@section('styles')
<style>
    .checkout-option-page {
        background: var(--light-gray);
        min-height: 100vh;
        padding: 60px 0;
    }

    .option-card {
        border: none;
        border-radius: 20px;
        background: var(--white);
        padding: 3rem;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        cursor: pointer;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .option-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(74, 111, 165, 0.2);
    }

    .option-icon {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
    }

    .option-card.guest .option-icon {
        background: linear-gradient(135deg, #e3f2fd, #bbdefb);
        color: #1976d2;
    }

    .option-card.login .option-icon {
        background: linear-gradient(135deg, #f3e5f5, #e1bee7);
        color: #7b1fa2;
    }

    .option-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--charcoal);
        margin-bottom: 0.75rem;
    }

    .option-description {
        color: var(--gray);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .option-link {
        text-decoration: none;
        display: block;
        height: 100%;
    }

    .breadcrumb {
        background: transparent;
        padding: 0;
    }

    .breadcrumb-item a {
        color: var(--primary-blue);
        text-decoration: none;
    }

    .breadcrumb-item.active {
        color: var(--gray);
    }

    @media (max-width: 768px) {
        .option-card {
            padding: 2rem;
        }

        .option-icon {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }

        .option-title {
            font-size: 1.25rem;
        }
    }
</style>
@endsection

@section('content')
<section class="checkout-option-page">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('cart') }}">Cart</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>

        <h2 class="mb-4" style="font-weight: 700; color: var(--charcoal);">
            <i class="fas fa-shopping-cart me-2" style="color: var(--primary-blue);"></i>How would you like to checkout?
        </h2>

        <div class="row g-4">
            <div class="col-md-6">
                <a href="{{ route('guest-checkout') }}" class="option-link">
                    <div class="option-card guest">
                        <div class="option-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3 class="option-title">Checkout as Guest</h3>
                        <p class="option-description">
                            Continue without creating an account. You'll provide your shipping details during checkout.
                        </p>
                        <span class="btn btn-outline-primary mt-3" style="border-radius: 50px;">
                            Continue as Guest <i class="fas fa-arrow-right ms-2"></i>
                        </span>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <a href="{{ route('login') }}" class="option-link">
                    <div class="option-card login">
                        <div class="option-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <h3 class="option-title">Login / Register</h3>
                        <p class="option-description">
                            Sign in to your existing account or create a new one for a faster checkout experience and order tracking.
                        </p>
                        <span class="btn btn-outline-primary mt-3" style="border-radius: 50px;">
                            Login or Register <i class="fas fa-arrow-right ms-2"></i>
                        </span>
                    </div>
                </a>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('cart') }}" class="text-decoration-none" style="color: var(--gray);">
                <i class="fas fa-arrow-left me-1"></i> Back to Cart
            </a>
        </div>
    </div>
</section>
@endsection
