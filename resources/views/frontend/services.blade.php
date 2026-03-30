@extends('layouts.main')

@section('title', 'Services - Crescendo')

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

    .services-section {
        padding: 5rem 0;
    }

    .service-card {
        background: var(--white);
        border-radius: 20px;
        padding: 2.5rem;
        text-align: center;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
        height: 100%;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(0,0,0,0.12);
    }

    .service-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--light-blue), var(--pale-blue));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: var(--primary-blue);
    }

    .service-title {
        font-size: 1.35rem;
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 1rem;
    }

    .service-text {
        font-size: 0.95rem;
        color: var(--gray);
        line-height: 1.7;
        margin: 0;
    }

    .policy-section {
        padding: 5rem 0;
        background: var(--light-gray);
    }

    .policy-card {
        background: var(--white);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        transition: all 0.3s ease;
    }

    .policy-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    }

    .policy-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, var(--primary-blue), var(--soft-blue));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
        font-size: 1.25rem;
        color: var(--white);
    }

    .policy-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 0.5rem;
    }

    .policy-text {
        font-size: 0.9rem;
        color: var(--gray);
        margin: 0;
        line-height: 1.6;
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

    .faq-section {
        padding: 5rem 0;
    }

    .accordion-item {
        border: none;
        border-radius: 12px !important;
        margin-bottom: 1rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        overflow: hidden;
    }

    .accordion-button {
        background: var(--white);
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 1rem;
        color: var(--charcoal);
        padding: 1.25rem 1.5rem;
        border-radius: 12px !important;
        box-shadow: none !important;
    }

    .accordion-button:not(.collapsed) {
        background: var(--light-blue);
        color: var(--primary-blue);
    }

    .accordion-button::after {
        filter: invert(0.5);
    }

    .accordion-body {
        background: var(--white);
        color: var(--gray);
        font-size: 0.95rem;
        line-height: 1.7;
        padding: 1.25rem 1.5rem;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2.25rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title fade-up">Our Services</h1>
        <p class="page-subtitle fade-up">Committed to providing you with the best shopping experience</p>
    </div>
</div>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4 fade-up">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <h3 class="service-title">Free Shipping</h3>
                    <p class="service-text">Enjoy complimentary shipping on all orders over $100. We deliver worldwide with trusted shipping partners to ensure your items arrive safely and on time.</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-undo"></i>
                    </div>
                    <h3 class="service-title">Easy Returns</h3>
                    <p class="service-text">Not satisfied? Return any item within 30 days of purchase for a full refund. Our hassle-free return process makes shopping risk-free.</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="service-title">24/7 Support</h3>
                    <p class="service-text">Our dedicated support team is available around the clock to assist you with any questions or concerns. Reach out via chat, email, or phone.</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3 class="service-title">Gift Wrapping</h3>
                    <p class="service-text">Make your gifts extra special with our premium gift wrapping service. Available at checkout for a small additional fee.</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h3 class="service-title">Student Discount</h3>
                    <p class="service-text">Students save 15% on all orders with a valid student ID. Verification is quick and easy at checkout.</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3 class="service-title">Click & Collect</h3>
                    <p class="service-text">Order online and pick up at your nearest store location. Same-day pickup available for in-stock items.</p>
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
                    <div class="stat-label">Orders Shipped</div>
                </div>
            </div>
            <div class="col-6 col-md-3 fade-up">
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">On-Time Delivery</div>
                </div>
            </div>
            <div class="col-6 col-md-3 fade-up">
                <div class="stat-item">
                    <div class="stat-number">30</div>
                    <div class="stat-label">Day Returns</div>
                </div>
            </div>
            <div class="col-6 col-md-3 fade-up">
                <div class="stat-item">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Customer Support</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Policies Section -->
<section class="policy-section">
    <div class="container">
        <div class="section-header fade-up">
            <h2 class="section-title">Our Policies</h2>
            <p class="section-subtitle">Everything you need to know</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 fade-up">
                <div class="policy-card">
                    <div class="policy-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h4 class="policy-title">Shipping Policy</h4>
                    <p class="policy-text">Free standard shipping on orders over $100. Express shipping available for an additional fee. Delivery times vary by location - standard shipping takes 5-7 business days, express takes 2-3 business days.</p>
                </div>
            </div>
            <div class="col-lg-6 fade-up">
                <div class="policy-card">
                    <div class="policy-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h4 class="policy-title">Return Policy</h4>
                    <p class="policy-text">Return unworn items with tags attached within 30 days for a full refund. Sale items can be returned for store credit. Refunds are processed within 5-7 business days after receipt.</p>
                </div>
            </div>
            <div class="col-lg-6 fade-up">
                <div class="policy-card">
                    <div class="policy-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h4 class="policy-title">Privacy Policy</h4>
                    <p class="policy-text">Your privacy is important to us. We never share your personal information with third parties. All data is encrypted and securely stored in compliance with GDPR regulations.</p>
                </div>
            </div>
            <div class="col-lg-6 fade-up">
                <div class="policy-card">
                    <div class="policy-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h4 class="policy-title">Payment Policy</h4>
                    <p class="policy-text">We accept all major credit cards, PayPal, and Apple Pay. All transactions are secure and encrypted. Payment is processed at the time of purchase.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section">
    <div class="container">
        <div class="section-header fade-up">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Quick answers to common questions</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item fade-up">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How do I track my order?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Once your order ships, you'll receive an email with tracking information. You can also track your order by logging into your account and visiting the "My Orders" section.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item fade-up">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                What is your return process?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                To initiate a return, log into your account, go to "My Orders," and select the order containing the item you wish to return. Print the prepaid shipping label and drop off the package at any authorized drop-off location.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item fade-up">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Do you ship internationally?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! We ship to over 50 countries worldwide. International shipping rates and delivery times vary by location. You'll see the available options and costs at checkout.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item fade-up">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                How do I contact customer support?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can reach our support team via live chat (available 24/7), email at support@modershop.com, or call us at 1-800-MODERN. We're happy to help!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
