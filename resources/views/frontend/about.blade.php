@extends('layouts.main')

@section('title', 'About Us - Crescendo')

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
        text-align: center;
    }

    .page-subtitle {
        font-size: 1.1rem;
        color: var(--gray);
        text-align: center;
    }

    .story-section {
        padding: 5rem 0;
    }

    .story-image {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(45, 74, 111, 0.15);
    }

    .story-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: var(--dark-blue);
        margin-bottom: 1.5rem;
    }

    .story-text {
        font-size: 1rem;
        color: var(--gray);
        line-height: 1.8;
        margin-bottom: 1rem;
    }

    .values-section {
        padding: 5rem 0;
        background: var(--light-gray);
    }

    .value-card {
        background: var(--white);
        border-radius: 16px;
        padding: 2rem;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
        height: 100%;
    }

    .value-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    }

    .value-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--light-blue), var(--pale-blue));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem;
        font-size: 1.75rem;
        color: var(--primary-blue);
    }

    .value-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 0.75rem;
    }

    .value-text {
        font-size: 0.95rem;
        color: var(--gray);
        margin: 0;
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

    .stats-section {
        padding: 4rem 0;
        background: linear-gradient(135deg, var(--dark-blue) 0%, var(--primary-blue) 100%);
    }

    .stat-item {
        text-align: center;
        color: var(--white);
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 1rem;
        opacity: 0.9;
    }

    .team-section {
        padding: 5rem 0;
    }

    .team-card {
        background: var(--white);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
    }

    .team-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.12);
    }

    .team-image {
        aspect-ratio: 1;
        background: var(--light-gray);
        overflow: hidden;
    }

    .team-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .team-card:hover .team-image img {
        transform: scale(1.1);
    }

    .team-info {
        padding: 1.5rem;
        text-align: center;
    }

    .team-name {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 0.25rem;
    }

    .team-role {
        font-size: 0.85rem;
        color: var(--primary-blue);
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2.25rem;
        }
        
        .story-title {
            font-size: 1.75rem;
        }
        
        .stat-number {
            font-size: 2.25rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title fade-up">About Us</h1>
        <p class="page-subtitle fade-up">Learn our story and meet the team behind Crescendo</p>
    </div>
</div>

<!-- Story Section -->
<section class="story-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 fade-up">
                <div class="story-image">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=700&q=80" alt="Our Story" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 fade-up">
                <h2 class="story-title">Our Story</h2>
                <p class="story-text">
                    Founded in 2020, Crescendo began with a simple vision: to make quality fashion accessible to everyone. We believe that great style shouldn't come at the expense of comfort or sustainability.
                </p>
                <p class="story-text">
                    Our team of designers and stylists work tirelessly to curate collections that blend contemporary trends with timeless elegance. Each piece is carefully selected to ensure it meets our high standards of quality and design.
                </p>
                <p class="story-text">
                    Today, we serve customers worldwide, offering a seamless shopping experience both online and through our retail locations. We're proud to be part of your everyday style journey.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="values-section">
    <div class="container">
            <div class="section-header fade-up">
            <h2 class="section-title">Our Values</h2>
            <p class="section-subtitle">What drives us forward</p>
        </div>
        <div class="row g-4 justify-content-center">
        <div class="row g-4">
            <div class="col-md-4 fade-up">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h4 class="value-title">Quality First</h4>
                    <p class="value-text">We never compromise on quality. Every product is crafted with attention to detail and premium materials.</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4 class="value-title">Sustainability</h4>
                    <p class="value-text">We're committed to sustainable practices, from sourcing eco-friendly materials to reducing our carbon footprint.</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h4 class="value-title">Customer Focus</h4>
                    <p class="value-text">Your satisfaction is our priority. We're dedicated to providing exceptional service and support.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-6 col-md-3 fade-up">
                <div class="stat-item">
                    <div class="stat-number">50K+</div>
                    <div class="stat-label">Happy Customers</div>
                </div>
            </div>
            <div class="col-6 col-md-3 fade-up">
                <div class="stat-item">
                    <div class="stat-number">1000+</div>
                    <div class="stat-label">Products</div>
                </div>
            </div>
            <div class="col-6 col-md-3 fade-up">
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Countries Served</div>
                </div>
            </div>
            <div class="col-6 col-md-3 fade-up">
                <div class="stat-item">
                    <div class="stat-number">4.9</div>
                    <div class="stat-label">Customer Rating</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="team-section">
    <div class="container">
        <div class="section-header fade-up">
            <h2 class="section-title">Meet Our Team</h2>
            <p class="section-subtitle">The people behind the brand</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-sm-6 col-lg-3 fade-up">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&q=80" alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">James Wilson</h4>
                        <span class="team-role">CEO & Founder</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 fade-up">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&q=80" alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Sarah Chen</h4>
                        <span class="team-role">Creative Director</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 fade-up">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&q=80" alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Michael Park</h4>
                        <span class="team-role">Head of Design</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 fade-up">
                <div class="team-card">
                    <div class="team-image">
                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&q=80" alt="Team Member">
                    </div>
                    <div class="team-info">
                        <h4 class="team-name">Emma Davis</h4>
                        <span class="team-role">Marketing Lead</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
