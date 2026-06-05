<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Crescendo')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #4A6FA5;
            --soft-blue: #6B8CC7;
            --light-blue: #E8EEF5;
            --pale-blue: #F5F8FC;
            --dark-blue: #2D4A6F;
            --charcoal: #2C3E50;
            --white: #FFFFFF;
            --light-gray: #F8FAFC;
            --gray: #94A3B8;
            --border-color: #E2E8F0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Poppins', sans-serif;
            background-color: var(--white);
            color: var(--charcoal);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.6;
        }

        main {
            flex: 1;
        }

        /* Typography */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            letter-spacing: -0.02em;
        }

        /* Modern Navbar */
        .navbar {
            background: var(--white) !important;
            padding: 1rem 0;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-blue) !important;
            letter-spacing: -0.02em;
        }

        .nav-link {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--charcoal) !important;
            padding: 0.5rem 1rem !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-blue) !important;
        }

        /* Modern Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-blue), var(--soft-blue));
            border: none;
            color: var(--white);
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(74, 111, 165, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--dark-blue), var(--primary-blue));
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(74, 111, 165, 0.4);
            color: var(--white);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary-blue);
            color: var(--primary-blue);
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: var(--primary-blue);
            color: var(--white);
            transform: translateY(-2px);
        }

        /* Cart Button */
        .cart-btn {
            position: relative;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            color: var(--charcoal);
            text-decoration: none;
            border-radius: 50%;
            background: var(--light-gray);
        }

        .cart-btn:hover {
            background: var(--light-blue);
            color: var(--primary-blue);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--primary-blue);
            color: var(--white);
            font-size: 0.65rem;
            font-weight: 600;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        }

        /* Form Controls */
        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: var(--light-gray);
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 3px rgba(74, 111, 165, 0.1);
            background: var(--white);
        }

        /* Footer */
        footer {
            background: var(--charcoal);
            color: var(--white);
            padding: 4rem 0 2rem;
            margin-top: auto;
        }

        footer h5 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--white);
        }

        footer a {
            color: var(--gray);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
            display: block;
            padding: 0.3rem 0;
        }

        footer a:hover {
            color: var(--white);
        }

        footer p {
            font-size: 0.9rem;
            color: var(--gray);
            line-height: 1.8;
        }

        .footer-brand {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--white) !important;
            margin-bottom: 1rem;
            display: block;
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
            margin-top: 1.5rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--primary-blue);
            transform: translateY(-3px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 3rem;
            padding-top: 1.5rem;
            text-align: center;
            font-size: 0.85rem;
            color: var(--gray);
        }

        /* Dropdown */
        .dropdown-menu {
            border: none;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            border-radius: 12px;
            padding: 0.5rem;
        }

        .dropdown-item {
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.6rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: var(--light-blue);
            color: var(--primary-blue);
        }

        /* Section Padding */
        .section-padding {
            padding: 5rem 0;
        }

        /* Fade Animation */
        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    @yield('styles')
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Crescendo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="border: none;">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('products') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <a href="{{ route('cart') }}" class="cart-btn">
                        <i class="fas fa-shopping-bag"></i>
                        @php $cartCount = count(session('cart', [])); @endphp
                        @if($cartCount > 0)
                        <span class="cart-count">{{ $cartCount }}</span>
                        @endif
                    </a>
                @auth
                <div class="dropdown">
                    <button class="btn cart-btn" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" style="right: -50px;">
                        @if(auth()->user()->role === 'admin')
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        @else
                        <li><a class="dropdown-item" href="{{ route('my-orders') }}">My Orders</a></li>
                        @endif
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <a href="{{ route('login') }}" class="nav-link" style="padding: 0.5rem 0.75rem !important;">Login</a>
                <a href="{{ route('register') }}" class="btn-primary" style="text-decoration: none; display: inline-block; padding: 0.6rem 1.25rem; font-size: 0.85rem;">Register</a>
                @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <span class="footer-brand">Crescendo</span>
                    <p>Your destination for modern minimalist fashion. Quality pieces designed for the contemporary lifestyle.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                    <h5>Shop</h5>
                    <a href="{{ route('products') }}">All Products</a>
                    <a href="{{ route('home') }}">New Arrivals</a>
                    <a href="{{ route('home') }}">Best Sellers</a>
                    <a href="{{ route('home') }}">Sale</a>
                </div>
                <div class="col-6 col-lg-2 mb-4 mb-lg-0">
                    <h5>Support</h5>
                    <a href="{{ route('contact') }}">Contact Us</a>
                    <a href="{{ route('services') }}">Shipping</a>
                    <a href="{{ route('services') }}">Returns</a>
                    <a href="{{ route('services') }}">FAQ</a>
                </div>
                <div class="col-lg-4">
                    <h5>Stay Connected</h5>
                    <p>Subscribe to our newsletter for exclusive offers and updates.</p>
                    <form class="d-flex gap-2">
                        <input type="email" class="form-control" placeholder="Enter your email">
                        <button type="submit" class="btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="footer-bottom">
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Fade up animation
        const fadeElements = document.querySelectorAll('.fade-up');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });
        fadeElements.forEach(el => observer.observe(el));
    </script>
    @yield('scripts')
</body>

</html>
