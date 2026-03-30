@extends('layouts.main')

@section('title', 'Contact Us - Crescendo')

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

    .contact-card {
        background: var(--white);
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        height: 100%;
        text-align: center;
    }

    .contact-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--light-blue), var(--pale-blue));
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.25rem;
        font-size: 1.5rem;
        color: var(--primary-blue);
    }

    .contact-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--charcoal);
        margin-bottom: 0.5rem;
    }

    .contact-text {
        font-size: 0.9rem;
        color: var(--gray);
        margin: 0;
        line-height: 1.6;
    }

    .form-card {
        background: var(--white);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    }

    .form-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dark-blue);
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-size: 0.9rem;
        font-weight: 500;
        color: var(--charcoal);
        margin-bottom: 0.5rem;
    }

    .form-control {
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 0.875rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: var(--light-gray);
    }

    .form-control:focus {
        border-color: var(--primary-blue);
        box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.1);
        background: var(--white);
    }

    textarea.form-control {
        resize: none;
    }

    .map-section {
        padding: 0 0 5rem;
    }

    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,0.06);
        height: 400px;
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 2.25rem;
        }

        .contact-section {
            padding: 3rem 0;
        }

        .contact-card {
            padding: 1.5rem;
            margin-bottom: 1rem;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            font-size: 1.25rem;
        }

        .contact-title {
            font-size: 1rem;
        }

        .contact-text {
            font-size: 0.85rem;
        }

        .form-card {
            padding: 1.5rem;
        }

        .form-title {
            font-size: 1.25rem;
        }
    }

    @media (max-width: 576px) {
        .page-title {
            font-size: 1.75rem;
        }

        .page-subtitle {
            font-size: 0.9rem;
        }

        .contact-section {
            padding: 2rem 0;
        }

        .row.g-4 {
            --bs-gutter-y: 1rem;
        }

        .form-card {
            padding: 1.25rem;
            border-radius: 16px;
        }

        .form-title {
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1 class="page-title fade-up">Contact Us</h1>
        <p class="page-subtitle fade-up">We'd love to hear from you</p>
    </div>
</div>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-md-4 fade-up">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h4 class="contact-title">Visit Us</h4>
                    <p class="contact-text">123 Fashion Street<br>New York, NY 10001<br>United States</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h4 class="contact-title">Call Us</h4>
                    <p class="contact-text">+1 (555) 123-4567<br>Mon - Fri: 9AM - 6PM<br>Sat: 10AM - 4PM</p>
                </div>
            </div>
            <div class="col-md-4 fade-up">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h4 class="contact-title">Email Us</h4>
                    <p class="contact-text">hello@modernshop.com<br>support@modernshop.com<br>We'll reply within 24hrs</p>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-6 fade-up">
                <div class="form-card">
                    <h3 class="form-title">Send us a Message</h3>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="John">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Doe">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="john@example.com">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control" placeholder="How can we help?">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" rows="5" placeholder="Your message here..."></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100" style="border-radius: 12px;">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 fade-up">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968482413!3d40.75889497932681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1633023222534!5m2!1sen!2sus" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
