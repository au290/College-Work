<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Auth Demo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- GSAP Animation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
        .hero-gradient {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: white;
            border-radius: 1rem;
            overflow: hidden;
            position: relative;
        }
        .hero-gradient::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, rgba(255,255,255,0) 60%);
            transform: rotate(30deg);
        }
        .feature-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }
        .card:hover .feature-icon {
            transform: scale(1.1);
        }
        .animated-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            z-index: 0;
        }
        .cta-section {
            background: linear-gradient(135deg, #8f94fb, #4e54c8);
            border-radius: 1rem;
            overflow: hidden;
            position: relative;
            color: white;
        }
        .cta-section::before,
        .cta-section::after {
            content: "";
            position: absolute;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }
        .cta-section::before {
            width: 200px;
            height: 200px;
            top: -100px;
            right: -100px;
        }
        .cta-section::after {
            width: 150px;
            height: 150px;
            bottom: -75px;
            left: -75px;
        }
        /* Navigation link hover and active indicator */
        .navbar-nav .nav-link {
            position: relative;
            padding-bottom: 0.5rem;
        }
        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background-color: #fff;
            transition: width 0.3s ease;
        }
        .navbar-nav .nav-link:hover::after,
        .navbar-nav .nav-link.active::after {
            width: 100%;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold" href="/">
                    <i class="bi bi-book me-2"></i>My Book Manager
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <?php if (session()->get('isLogged')): ?>
                            <li class="nav-item">
                                <a class="nav-link<?php if(uri_string() == 'dashboard') echo ' active'; ?>" href="/dashboard">
                                    <i class="bi bi-speedometer2 me-1"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/logout">
                                    <i class="bi bi-box-arrow-right me-1"></i>Logout
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link<?php if(uri_string() == 'login') echo ' active'; ?>" href="/login">
                                    <i class="bi bi-box-arrow-in-right me-1"></i>Login
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
