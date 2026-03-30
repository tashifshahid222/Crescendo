<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Crescendo</title>
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
            background: linear-gradient(135deg, var(--pale-blue) 0%, var(--light-blue) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        h1, h2, h3, h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }
        
        .register-card {
            background: var(--white);
            max-width: 950px;
            width: 100%;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(45, 74, 111, 0.15);
        }
        
        .register-image {
            background: linear-gradient(135deg, var(--dark-blue) 0%, var(--primary-blue) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem;
            position: relative;
            overflow: hidden;
        }
        
        .register-image::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('https://images.unsplash.com/photo-1469334031218-e382a71b716b?w=600&q=80') center/cover no-repeat;
            opacity: 0.1;
        }
        
        .register-image > div {
            position: relative;
            z-index: 2;
            text-align: center;
            color: var(--white);
        }
        
        .register-image-icon {
            width: 100px;
            height: 100px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2.5rem;
        }
        
        .register-image h2 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .register-image p {
            color: rgba(255,255,255,0.8);
            font-size: 0.95rem;
        }
        
        .register-form {
            padding: 3rem;
        }
        
        .brand-name {
            font-family: 'Poppins', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-blue);
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
        }
        
        .form-title {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--charcoal);
        }
        
        .form-subtitle {
            color: var(--gray);
            font-size: 0.9rem;
            margin-bottom: 2rem;
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
        
        .input-group-text {
            background: var(--light-gray);
            border: 1px solid var(--border-color);
            border-right: none;
            border-radius: 12px 0 0 12px;
            color: var(--gray);
        }
        
        .form-control.border-start-0 {
            border-left: none;
            border-radius: 0 12px 12px 0;
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--primary-blue), var(--soft-blue));
            border: none;
            border-radius: 50px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            box-shadow: 0 4px 15px rgba(74, 111, 165, 0.3);
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(74, 111, 165, 0.4);
        }
        
        .form-label {
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }
        
        .login-text {
            color: var(--gray);
            font-size: 0.9rem;
            text-align: center;
        }
        
        .login-link {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 600;
        }
        
        .login-link:hover {
            text-decoration: underline;
        }
        
        .back-link {
            color: var(--gray);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .back-link:hover {
            color: var(--primary-blue);
        }
        
        .alert {
            border-radius: 12px;
            border: none;
        }

        @media (max-width: 768px) {
            .register-image {
                padding: 2rem;
            }
            
            .register-form {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="register-card">
                    <div class="row g-0">
                        <div class="col-md-6 register-image">
                            <div>
                                <div class="register-image-icon">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                                <h2>Join Crescendo</h2>
                                <p>Create an account to start shopping</p>
                            </div>
                        </div>
                        <div class="col-md-6 register-form">
                            <a href="{{ route('home') }}" class="brand-name">Crescendo</a>
                            <h3 class="form-title">Create Account</h3>
                            <p class="form-subtitle">Fill in your details to get started</p>

                            @if($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0" style="font-size: 0.85rem;">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="mb-4">
                                    <label class="form-label">Full Name</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" name="name" class="form-control border-start-0" 
                                               placeholder="Your name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Email Address</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                        <input type="email" name="email" class="form-control border-start-0" 
                                               placeholder="your@email.com" value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control border-start-0" 
                                               placeholder="Create password" required>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-lock"></i>
                                        </span>
                                        <input type="password" name="password_confirmation" class="form-control border-start-0" 
                                               placeholder="Confirm password" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-register">
                                    Create Account
                                </button>

                                <p class="login-text mt-4">
                                    Already have an account? 
                                    <a href="{{ route('login') }}" class="login-link">Sign in</a>
                                </p>
                            </form>

                            <div class="text-center mt-4">
                                <a href="{{ route('home') }}" class="back-link">
                                    <i class="fas fa-arrow-left me-1"></i> Back to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
