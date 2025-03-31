<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .welcome-container {
            padding-top: 80px;
            padding-bottom: 80px;
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.9) !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 60px 40px;
            color: white;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }

        .feature-card {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #667eea;
        }

        .btn-auth {
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .btn-login {
            background: linear-gradient(135deg, #4a6cf7 0%, #2575fc 100%);
            color: white;
            border: none;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #3a5bd9 0%, #1a65e8 100%);
            color: white;
            box-shadow: 0 5px 15px rgba(37, 117, 252, 0.3);
        }

        .btn-register {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
            color: #333;
            border: none;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #ff8a8e 0%, #f9c0b4 100%);
            color: #333;
            box-shadow: 0 5px 15px rgba(255, 154, 158, 0.3);
        }

        .status-alert {
            position: fixed;
            top: 80px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            min-width: 300px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                <i class="fas fa-code me-2 text-primary"></i>{{ config('app.name', 'Laravel') }}
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="nav-link btn btn-sm btn-outline-primary ms-2">
                                    <i class="fas fa-tachometer-alt me-1"></i>Panou de control
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link btn btn-auth btn-login ms-2">
                                    <i class="fas fa-sign-in-alt me-1"></i>Autentificare
                                </a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link btn btn-auth btn-register ms-3">
                                        <i class="fas fa-user-plus me-1"></i>Înregistrare
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Status Alert -->
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show status-alert" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Main Content -->
    <div class="container welcome-container">
        <!-- Hero Section -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="hero-section text-center">
                    <h1 class="hero-title">Bine ai venit în aplicația noastră</h1>
                    <p class="hero-subtitle">O platformă modernă pentru gestionarea contului tău</p>

                    @guest
                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('login') }}" class="btn btn-auth btn-light btn-lg">
                                <i class="fas fa-sign-in-alt me-2"></i>Autentificare
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-auth btn-outline-light btn-lg">
                                    <i class="fas fa-user-plus me-2"></i>Înregistrare
                                </a>
                            @endif
                        </div>
                    @else
                        <a href="{{ url('/home') }}" class="btn btn-auth btn-light btn-lg">
                            <i class="fas fa-tachometer-alt me-2"></i>Accesează panoul de control
                        </a>
                    @endguest
                </div>
            </div>
        </div>

    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
