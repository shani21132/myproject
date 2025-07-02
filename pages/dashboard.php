<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoSolutions | User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.css">
    <style>
        :root {
            --primary-green: #0b8c7b;
            --secondary-green: #16a085;
            --light-green: #1abc9c;
            --dark-blue: #0a192f;
            --medium-blue: #1a4b8c;
            --light-blue: #64ffda;
            --accent: #64ffda;
            --text-light: #ccd6f6;
            --text-dark: #0a192f;
            --gradient-start: #0a192f;
            --gradient-mid: #0b8c7b;
            --gradient-end: #1abc9c;
            --sidebar-width: 280px;
            --header-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: var(--text-light);
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Dashboard Layout */
        .dashboard-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: rgba(10, 25, 47, 0.95);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(100, 255, 218, 0.1);
            padding: 20px 0;
            transition: all 0.4s ease;
            z-index: 100;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(100, 255, 218, 0.1);
            margin-bottom: 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            color: var(--light-blue);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            padding: 10px 0;
        }

        .logo i {
            color: var(--light-green);
            margin-right: 10px;
            transition: all 0.5s ease;
        }

        .user-profile {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            background: rgba(100, 255, 218, 0.1);
            border-radius: 10px;
            margin-top: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .user-profile:hover {
            background: rgba(100, 255, 218, 0.2);
            transform: translateX(5px);
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--light-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-blue);
            font-weight: bold;
            font-size: 20px;
            margin-right: 15px;
        }

        .user-info h3 {
            font-size: 18px;
            margin-bottom: 5px;
            color: var(--light-blue);
        }

        .user-info p {
            font-size: 14px;
            opacity: 0.8;
        }

        .nav-links {
            padding: 0 15px;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 8px;
            color: var(--text-light);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(100, 255, 218, 0.1);
            color: var(--light-blue);
        }

        .nav-link i {
            width: 30px;
            font-size: 18px;
            margin-right: 10px;
            color: var(--light-green);
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.4s ease;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(100, 255, 218, 0.1);
        }

        .page-title {
            font-size: 2rem;
            background: linear-gradient(to right, var(--light-blue), var(--light-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            display: inline-block;
        }

        .page-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, var(--light-green), var(--light-blue));
            border-radius: 2px;
        }

        /* Dashboard Cards */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            transition: all 0.4s ease;
            border: 1px solid rgba(100, 255, 218, 0.2);
            transform: translateY(0);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .dashboard-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(100, 255, 218, 0.2);
            border-color: var(--light-blue);
        }

        .card-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2.5rem;
            color: rgba(100, 255, 218, 0.2);
            z-index: 1;
        }

        .card-content {
            position: relative;
            z-index: 2;
        }

        .card-title {
            font-size: 1.2rem;
            color: var(--light-blue);
            margin-bottom: 15px;
        }

        .card-value {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(to right, var(--light-blue), var(--light-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .card-info {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Profile Page */
        .profile-container {
            display: flex;
            gap: 30px;
            margin-top: 20px;
        }

        .profile-card {
            flex: 1;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            border: 1px solid rgba(100, 255, 218, 0.2);
        }

        .profile-header {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: var(--light-blue);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--dark-blue);
            font-weight: bold;
            font-size: 40px;
            margin-right: 20px;
        }

        .profile-info h2 {
            font-size: 24px;
            margin-bottom: 5px;
            color: var(--light-blue);
        }

        .profile-info p {
            opacity: 0.8;
            margin-bottom: 10px;
        }

        .profile-stats {
            display: flex;
            gap: 20px;
            margin-top: 15px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--light-blue);
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .profile-form .form-group {
            margin-bottom: 20px;
        }

        .profile-form label {
            display: block;
            margin-bottom: 8px;
            color: var(--light-blue);
        }

        .profile-form input, .profile-form select, .profile-form textarea {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(100, 255, 218, 0.2);
            color: var(--text-light);
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .profile-form input:focus, .profile-form select:focus, .profile-form textarea:focus {
            outline: none;
            border-color: var(--light-blue);
            box-shadow: 0 0 10px rgba(100, 255, 218, 0.4);
        }

        .btn {
            background: linear-gradient(45deg, var(--light-green), var(--light-blue));
            color: var(--text-dark);
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(26, 188, 156, 0.4);
            transition: all 0.3s ease;
            display: inline-block;
            border: 2px solid transparent;
            cursor: pointer;
            font-size: 16px;
            border: none;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(100, 255, 218, 0.8);
            border-color: var(--light-blue);
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid var(--light-green);
            color: var(--text-light);
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-secondary:hover {
            background: rgba(26, 188, 156, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(26, 188, 156, 0.2);
        }

        /* Pickup Request Page */
        .pickup-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .price-info {
            background: rgba(100, 255, 218, 0.1);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 30px;
            text-align: center;
            border: 1px solid var(--light-blue);
        }

        .price-info h3 {
            color: var(--light-blue);
            margin-bottom: 10px;
        }

        .price-value {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--light-blue), var(--light-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-col {
            flex: 1;
        }

        /* Payment Page */
        .payment-methods {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .payment-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(100, 255, 218, 0.2);
            position: relative;
            transition: all 0.3s ease;
        }

        .payment-card:hover {
            transform: translateY(-5px);
            border-color: var(--light-blue);
            box-shadow: 0 10px 25px rgba(100, 255, 218, 0.2);
        }

        .payment-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .card-type {
            font-size: 24px;
            color: var(--light-blue);
        }

        .card-default {
            background: var(--light-green);
            color: var(--text-dark);
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .card-number {
            font-size: 18px;
            letter-spacing: 2px;
            margin-bottom: 20px;
            font-family: monospace;
        }

        .card-details {
            display: flex;
            justify-content: space-between;
        }

        .card-detail {
            font-size: 14px;
        }

        .card-detail-label {
            opacity: 0.8;
            font-size: 12px;
            margin-bottom: 3px;
        }

        /* Waste Analysis Page */
        .chart-container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            border: 1px solid rgba(100, 255, 218, 0.2);
            margin-bottom: 30px;
            height: 400px;
            position: relative;
        }

        .chart-title {
            color: var(--light-blue);
            margin-bottom: 20px;
            font-size: 1.3rem;
        }

        /* Login Modal */
        .login-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 25, 47, 0.95);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 2000;
            opacity: 0;
            pointer-events: none;
            transition: all 0.4s ease;
        }

        .login-modal.active {
            opacity: 1;
            pointer-events: all;
        }

        .login-form {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px;
            width: 90%;
            max-width: 500px;
            border: 1px solid rgba(100, 255, 218, 0.2);
            position: relative;
            transform: translateY(30px);
            transition: all 0.4s ease;
        }

        .login-modal.active .login-form {
            transform: translateY(0);
        }

        .login-form h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            background: linear-gradient(to right, var(--light-blue), var(--light-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: var(--light-blue);
        }

        .form-group input {
            width: 100%;
            padding: 14px 20px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(100, 255, 218, 0.2);
            color: var(--text-light);
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--light-blue);
            box-shadow: 0 0 10px rgba(100, 255, 218, 0.4);
        }

        .login-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 24px;
            color: var(--light-blue);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            color: var(--accent);
            transform: rotate(90deg);
        }

        /* Animations */
        .floating {
            animation: floating 8s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        .pulse {
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* Scroll Animations */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Activity Items */
        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(100, 255, 218, 0.1);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(100, 255, 218, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 20px;
            color: var(--light-blue);
        }

        .activity-content {
            flex: 1;
        }

        .activity-content h3 {
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: var(--light-blue);
        }

        .activity-content p {
            font-size: 0.9rem;
            opacity: 0.8;
            margin-bottom: 8px;
        }

        .activity-status {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .completed {
            background: rgba(26, 188, 156, 0.2);
            color: var(--light-green);
        }

        .pending {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }

        .scheduled {
            background: rgba(0, 123, 255, 0.2);
            color: #007bff;
        }

        /* Payment Items */
        .payment-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid rgba(100, 255, 218, 0.1);
        }

        .payment-info {
            flex: 1;
        }

        .payment-amount {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--light-blue);
            margin-bottom: 5px;
        }

        .payment-date, .payment-type {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Add Payment Form */
        .add-payment-form {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 25px;
            margin-top: 30px;
            border: 1px dashed rgba(100, 255, 218, 0.3);
        }

        /* Mobile Responsiveness */
        .menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--light-blue);
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            background: rgba(10, 25, 47, 0.8);
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }

        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            
            .menu-toggle {
                display: flex;
            }
        }

        @media (max-width: 768px) {
            .profile-container {
                flex-direction: column;
            }
            
            .form-row {
                flex-direction: column;
                gap: 10px;
            }
            
            .dashboard-cards {
                grid-template-columns: 1fr;
            }
            
            .login-form {
                padding: 30px 20px;
            }
            
            .login-actions {
                flex-direction: column;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Login Modal -->
    <div class="login-modal" id="loginModal">
        <div class="login-form">
            <span class="close-modal" id="closeModal"><i class="fas fa-times"></i></span>
            <h2>Welcome to EcoSolutions</h2>
            <form id="loginForm">
                <div class="form-group">
                    <label for="loginEmail">Email Address</label>
                    <input type="email" id="loginEmail" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" placeholder="Enter your password" required>
                </div>
                <div class="login-actions">
                    <button type="submit" class="btn pulse">Sign In</button>
                    <button type="button" class="btn-secondary" id="demoLogin">Demo Login</button>
                </div>
            </form>
        </div>
    </div>

    <div class="dashboard-container">
        <!-- Mobile Menu Toggle -->
        <div class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </div>
        
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <i class="fas fa-leaf"></i> EcoDashboard
                </div>
                
                <div class="user-profile">
                    <div class="user-avatar" id="userAvatar">JD</div>
                    <div class="user-info">
                        <h3 id="userName">John Doe</h3>
                        <p id="userRole">Premium Member</p>
                    </div>
                </div>
            </div>
            
            <div class="nav-links">
                <div class="nav-item">
                    <a href="#" class="nav-link active" data-page="dashboard">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link" data-page="profile">
                        <i class="fas fa-user"></i>
                        <span>My Profile</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link" data-page="pickup">
                        <i class="fas fa-truck-loading"></i>
                        <span>Pickup Request</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link" data-page="payment">
                        <i class="fas fa-credit-card"></i>
                        <span>Payment Methods</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link" data-page="analysis">
                        <i class="fas fa-chart-bar"></i>
                        <span>Waste Analysis</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a href="#" class="nav-link" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <!-- Dashboard Page -->
            <div class="page active" id="dashboard-page">
                <div class="page-header">
                    <h1 class="page-title">Dashboard</h1>
                    <div class="header-actions">
                        <button class="btn pulse" id="newPickupBtn"><i class="fas fa-plus"></i> New Request</button>
                    </div>
                </div>
                
                <div class="dashboard-cards">
                    <div class="dashboard-card floating animate-on-scroll">
                        <i class="fas fa-recycle card-icon"></i>
                        <div class="card-content">
                            <h3 class="card-title">Total Pickups</h3>
                            <div class="card-value" id="totalPickups">0</div>
                            <p class="card-info">Completed waste pickups</p>
                        </div>
                    </div>
                    
                    <div class="dashboard-card floating animate-on-scroll" style="animation-delay: 0.2s;">
                        <i class="fas fa-weight card-icon"></i>
                        <div class="card-content">
                            <h3 class="card-title">Total Waste</h3>
                            <div class="card-value" id="totalWaste">0 kg</div>
                            <p class="card-info">Recycled waste</p>
                        </div>
                    </div>
                    
                    <div class="dashboard-card floating animate-on-scroll" style="animation-delay: 0.4s;">
                        <i class="fas fa-coins card-icon"></i>
                        <div class="card-content">
                            <h3 class="card-title">Total Earnings</h3>
                            <div class="card-value" id="totalEarnings">₹0</div>
                            <p class="card-info">From waste recycling</p>
                        </div>
                    </div>
                </div>
                
                <div class="page-header">
                    <h2 class="page-title">Recent Activity</h2>
                </div>
                
                <div class="activity-list" id="recentActivities">
                    <!-- Activities will be dynamically added here -->
                </div>
            </div>
            
            <!-- Profile Page -->
            <div class="page" id="profile-page">
                <div class="page-header">
                    <h1 class="page-title">My Profile</h1>
                </div>
                
                <div class="profile-container">
                    <div class="profile-card animate-on-scroll">
                        <div class="profile-header">
                            <div class="profile-avatar" id="profileAvatar">JD</div>
                            <div class="profile-info">
                                <h2 id="profileName">John Doe</h2>
                                <p id="profileEmail">john.doe@example.com</p>
                                <p id="profilePhone">+1 (555) 123-4567</p>
                                
                                <div class="profile-stats">
                                    <div class="stat-item">
                                        <div class="stat-value" id="profilePickups">0</div>
                                        <div class="stat-label">Pickups</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-value" id="profileWaste">0 kg</div>
                                        <div class="stat-label">Waste</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-value" id="profileEarnings">₹0</div>
                                        <div class="stat-label">Earned</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-actions">
                            <button class="btn" id="editProfileBtn"><i class="fas fa-edit"></i> Edit Profile</button>
                        </div>
                    </div>
                    
                    <div class="profile-card animate-on-scroll" style="animation-delay: 0.2s;">
                        <h2 class="card-title">Account Settings</h2>
                        
                        <form class="profile-form" id="profileForm">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" id="fullName" value="John Doe">
                            </div>
                            
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" value="john.doe@example.com">
                            </div>
                            
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" value="+1 (555) 123-4567">
                            </div>
                            
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" rows="3">123 Green Street, Eco City, EC 12345</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Change Password</label>
                                <input type="password" id="password" placeholder="Enter new password">
                            </div>
                            
                            <button type="submit" class="btn">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Pickup Request Page -->
            <div class="page" id="pickup-page">
                <div class="page-header">
                    <h1 class="page-title">Pickup Request</h1>
                </div>
                
                <div class="pickup-container">
                    <div class="price-info animate-on-scroll">
                        <h3>Current Rate</h3>
                        <div class="price-value">₹100 / kg</div>
                        <p>We pay premium rates for your recyclable waste</p>
                    </div>
                    
                    <div class="dashboard-card animate-on-scroll">
                        <h2 class="card-title">Schedule a Pickup</h2>
                        <p>Fill out the form below to schedule a waste pickup</p>
                        
                        <form class="profile-form" id="pickupForm">
                            <div class="form-row">
                                <div class="form-col">
                                    <div class="form-group">
                                        <label for="pickupDate">Pickup Date</label>
                                        <input type="date" id="pickupDate" required>
                                    </div>
                                </div>
                                <div class="form-col">
                                    <div class="form-group">
                                        <label for="pickupTime">Pickup Time</label>
                                        <input type="time" id="pickupTime" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="wasteType">Waste Type</label>
                                <select id="wasteType" required>
                                    <option value="">Select waste type</option>
                                    <option value="plastic">Plastic</option>
                                    <option value="paper">Paper</option>
                                    <option value="metal">Metal</option>
                                    <option value="organic">Organic</option>
                                    <option value="e-waste">E-Waste</option>
                                    <option value="glass">Glass</option>
                                    <option value="textile">Textile</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="wasteWeight">Estimated Weight (kg)</label>
                                <input type="number" id="wasteWeight" min="1" max="100" placeholder="Enter weight in kg" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="pickupAddress">Pickup Address</label>
                                <textarea id="pickupAddress" rows="3" required>123 Green Street, Eco City, EC 12345</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="specialInstructions">Special Instructions</label>
                                <textarea id="specialInstructions" rows="2" placeholder="Any special instructions for our team"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <div class="price-calc">
                                    <h3>Estimated Payment: ₹<span id="estimatedPayment">0</span></h3>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn pulse"><i class="fas fa-truck"></i> Schedule Pickup</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Payment Methods Page -->
            <div class="page" id="payment-page">
                <div class="page-header">
                    <h1 class="page-title">Payment Methods</h1>
                    <div class="header-actions">
                        <button class="btn" id="addPaymentBtn"><i class="fas fa-plus"></i> Add Payment</button>
                    </div>
                </div>
                
                <div class="payment-methods" id="paymentMethods">
                    <!-- Payment methods will be dynamically added here -->
                </div>
                
                <div class="add-payment-form" id="addPaymentForm" style="display: none;">
                    <h2 class="card-title">Add New Payment Method</h2>
                    <form id="paymentForm">
                        <div class="form-group">
                            <label for="cardName">Cardholder Name</label>
                            <input type="text" id="cardName" placeholder="Enter name on card" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="cardNumber">Card Number</label>
                            <input type="text" id="cardNumber" placeholder="Enter card number" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="expiryDate">Expiry Date</label>
                                    <input type="text" id="expiryDate" placeholder="MM/YY" required>
                                </div>
                            </div>
                            <div class="form-col">
                                <div class="form-group">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" placeholder="CVV" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="cardType">Card Type</label>
                            <select id="cardType" required>
                                <option value="">Select card type</option>
                                <option value="visa">Visa</option>
                                <option value="mastercard">MasterCard</option>
                                <option value="amex">American Express</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn">Add Payment Method</button>
                    </form>
                </div>
                
                <div class="dashboard-card animate-on-scroll">
                    <h2 class="card-title">Payment History</h2>
                    
                    <div class="payment-history" id="paymentHistory">
                        <!-- Payment history will be dynamically added here -->
                    </div>
                </div>
            </div>
            
            <!-- Waste Analysis Page -->
            <div class="page" id="analysis-page">
                <div class="page-header">
                    <h1 class="page-title">Waste Analysis</h1>
                </div>
                
                <div class="dashboard-cards">
                    <div class="dashboard-card animate-on-scroll">
                        <h3 class="chart-title">Waste Composition</h3>
                        <div class="chart-container">
                            <canvas id="wasteCompositionChart"></canvas>
                        </div>
                    </div>
                    
                    <div class="dashboard-card animate-on-scroll" style="animation-delay: 0.2s;">
                        <h3 class="chart-title">Monthly Waste Trends</h3>
                        <div class="chart-container">
                            <canvas id="wasteTrendsChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="dashboard-card animate-on-scroll" style="animation-delay: 0.4s;">
                    <h3 class="chart-title">Earnings by Waste Type</h3>
                    <div class="chart-container">
                        <canvas id="earningsChart"></canvas>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        // User data management
        let userData = {
            name: "John Doe",
            email: "john.doe@example.com",
            phone: "+1 (555) 123-4567",
            address: "123 Green Street, Eco City, EC 12345",
            avatarInitials: "JD",
            pickups: [
                {
                    id: 20231025,
                    type: "Plastic",
                    weight: 15,
                    scheduledDate: "2023-10-28",
                    scheduledTime: "10:00",
                    status: "Completed",
                    payment: 1500
                },
                {
                    id: 20231018,
                    type: "Organic",
                    weight: 8,
                    scheduledDate: "2023-10-20",
                    scheduledTime: "14:00",
                    status: "Completed",
                    payment: 800
                },
                {
                    id: 20231030,
                    type: "E-Waste",
                    weight: 5,
                    scheduledDate: "2023-11-02",
                    scheduledTime: "11:30",
                    status: "Scheduled",
                    payment: 500
                }
            ],
            payments: [
                {
                    id: 1,
                    type: "Visa",
                    last4: "4512",
                    expiry: "09/2025",
                    default: true
                },
                {
                    id: 2,
                    type: "MasterCard",
                    last4: "7821",
                    expiry: "03/2024",
                    default: false
                }
            ],
            paymentHistory: [
                {
                    id: 1,
                    amount: 1500,
                    date: "Oct 28, 2023",
                    type: "Plastic Waste",
                    status: "Completed"
                },
                {
                    id: 2,
                    amount: 800,
                    date: "Oct 20, 2023",
                    type: "Organic Waste",
                    status: "Completed"
                },
                {
                    id: 3,
                    amount: 500,
                    date: "Oct 12, 2023",
                    type: "E-Waste",
                    status: "Completed"
                }
            ]
        };

        // DOM Elements
        const loginModal = document.getElementById('loginModal');
        const closeModal = document.getElementById('closeModal');
        const loginForm = document.getElementById('loginForm');
        const demoLogin = document.getElementById('demoLogin');
        const logoutBtn = document.getElementById('logoutBtn');
        const userName = document.getElementById('userName');
        const userAvatar = document.getElementById('userAvatar');
        const profileName = document.getElementById('profileName');
        const profileEmail = document.getElementById('profileEmail');
        const profilePhone = document.getElementById('profilePhone');
        const profileAvatar = document.getElementById('profileAvatar');
        const profileForm = document.getElementById('profileForm');
        const pickupForm = document.getElementById('pickupForm');
        const wasteWeightInput = document.getElementById('wasteWeight');
        const estimatedPayment = document.getElementById('estimatedPayment');
        const newPickupBtn = document.getElementById('newPickupBtn');
        const addPaymentBtn = document.getElementById('addPaymentBtn');
        const addPaymentForm = document.getElementById('addPaymentForm');
        const paymentForm = document.getElementById('paymentForm');
        const paymentMethods = document.getElementById('paymentMethods');
        const paymentHistory = document.getElementById('paymentHistory');
        const recentActivities = document.getElementById('recentActivities');
        const totalPickups = document.getElementById('totalPickups');
        const totalWaste = document.getElementById('totalWaste');
        const totalEarnings = document.getElementById('totalEarnings');
        const profilePickups = document.getElementById('profilePickups');
        const profileWaste = document.getElementById('profileWaste');
        const profileEarnings = document.getElementById('profileEarnings');

        // Initialize the dashboard
        function initDashboard() {
            updateUserProfile();
            updatePickupStats();
            updatePaymentMethods();
            updatePaymentHistory();
            updateRecentActivities();
            initCharts();
            setupEventListeners();
            setupScrollAnimations();
        }

        // Update user profile information
        function updateUserProfile() {
            userName.textContent = userData.name;
            userAvatar.textContent = userData.avatarInitials;
            profileName.textContent = userData.name;
            profileEmail.textContent = userData.email;
            profilePhone.textContent = userData.phone;
            profileAvatar.textContent = userData.avatarInitials;
            
            // Update profile form values
            document.getElementById('fullName').value = userData.name;
            document.getElementById('email').value = userData.email;
            document.getElementById('phone').value = userData.phone;
            document.getElementById('address').value = userData.address;
        }

        // Update pickup statistics
        function updatePickupStats() {
            const totalPickupCount = userData.pickups.length;
            const totalWasteKg = userData.pickups.reduce((sum, pickup) => sum + pickup.weight, 0);
            const totalEarningsRs = userData.pickups.reduce((sum, pickup) => sum + pickup.payment, 0);
            
            totalPickups.textContent = totalPickupCount;
            totalWaste.textContent = `${totalWasteKg} kg`;
            totalEarnings.textContent = `₹${totalEarningsRs.toLocaleString()}`;
            
            profilePickups.textContent = totalPickupCount;
            profileWaste.textContent = `${totalWasteKg} kg`;
            profileEarnings.textContent = `₹${totalEarningsRs.toLocaleString()}`;
        }

        // Update payment methods
        function updatePaymentMethods() {
            paymentMethods.innerHTML = '';
            
            userData.payments.forEach(payment => {
                const paymentCard = document.createElement('div');
                paymentCard.className = 'payment-card floating animate-on-scroll';
                paymentCard.innerHTML = `
                    <div class="payment-card-header">
                        <div class="card-type">
                            <i class="fab ${payment.type === 'Visa' ? 'fa-cc-visa' : 'fa-cc-mastercard'}"></i>
                        </div>
                        ${payment.default ? '<div class="card-default">DEFAULT</div>' : ''}
                    </div>
                    <div class="card-number">**** **** **** ${payment.last4}</div>
                    <div class="card-details">
                        <div class="card-detail">
                            <div class="card-detail-label">Card Holder</div>
                            <div>${userData.name}</div>
                        </div>
                        <div class="card-detail">
                            <div class="card-detail-label">Expires</div>
                            <div>${payment.expiry}</div>
                        </div>
                    </div>
                `;
                paymentMethods.appendChild(paymentCard);
            });
        }

        // Update payment history
        function updatePaymentHistory() {
            paymentHistory.innerHTML = '';
            
            userData.paymentHistory.forEach(payment => {
                const paymentItem = document.createElement('div');
                paymentItem.className = 'payment-item';
                paymentItem.innerHTML = `
                    <div class="payment-info">
                        <div class="payment-amount">₹${payment.amount}</div>
                        <div class="payment-date">${payment.date}</div>
                        <div class="payment-type">${payment.type}</div>
                    </div>
                    <div class="payment-status ${payment.status.toLowerCase()}">${payment.status}</div>
                `;
                paymentHistory.appendChild(paymentItem);
            });
        }

        // Update recent activities
        function updateRecentActivities() {
            recentActivities.innerHTML = '';
            
            // Show only the last 3 activities
            const recentPickups = [...userData.pickups].reverse().slice(0, 3);
            
            recentPickups.forEach(pickup => {
                const activityItem = document.createElement('div');
                activityItem.className = 'dashboard-card animate-on-scroll';
                
                const formattedDate = new Date(pickup.scheduledDate).toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });
                
                activityItem.innerHTML = `
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-truck"></i>
                        </div>
                        <div class="activity-content">
                            <h3>Pickup Request #${pickup.id}</h3>
                            <p>${pickup.type} waste · ${pickup.weight} kg · Scheduled for ${formattedDate}</p>
                            <div class="activity-status ${pickup.status.toLowerCase()}">${pickup.status}</div>
                        </div>
                    </div>
                `;
                
                recentActivities.appendChild(activityItem);
            });
        }

        // Initialize charts
        function initCharts() {
            // Waste Composition Chart
            const compositionCtx = document.getElementById('wasteCompositionChart').getContext('2d');
            const compositionChart = new Chart(compositionCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Plastic', 'Paper', 'Organic', 'Metal', 'E-Waste', 'Glass'],
                    datasets: [{
                        data: [35, 20, 15, 12, 10, 8],
                        backgroundColor: [
                            '#1abc9c', '#16a085', '#0b8c7b', 
                            '#1a4b8c', '#0a192f', '#64ffda'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right',
                            labels: {
                                color: '#ccd6f6',
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
            
            // Waste Trends Chart
            const trendsCtx = document.getElementById('wasteTrendsChart').getContext('2d');
            const trendsChart = new Chart(trendsCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
                    datasets: [{
                        label: 'Waste (kg)',
                        data: [12, 15, 10, 14, 16, 20, 18, 22, 25, 18],
                        borderColor: '#64ffda',
                        backgroundColor: 'rgba(100, 255, 218, 0.1)',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#64ffda',
                        pointRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#ccd6f6'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#ccd6f6'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ccd6f6',
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
            
            // Earnings Chart
            const earningsCtx = document.getElementById('earningsChart').getContext('2d');
            const earningsChart = new Chart(earningsCtx, {
                type: 'bar',
                data: {
                    labels: ['Plastic', 'Paper', 'Organic', 'Metal', 'E-Waste'],
                    datasets: [{
                        label: 'Earnings (₹)',
                        data: [5300, 3200, 1800, 2100, 1800],
                        backgroundColor: '#1abc9c',
                        borderColor: '#16a085',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#ccd6f6'
                            }
                        },
                        x: {
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            },
                            ticks: {
                                color: '#ccd6f6'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: '#ccd6f6',
                                font: {
                                    size: 12
                                }
                            }
                        }
                    }
                }
            });
        }

        // Setup event listeners
        function setupEventListeners() {
            // Mobile menu toggle
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');
            
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });

            // Navigation between pages
            const navLinks = document.querySelectorAll('.nav-link');
            const pages = document.querySelectorAll('.page');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Get target page
                    const targetPage = this.getAttribute('data-page');
                    
                    // Update active nav link
                    navLinks.forEach(link => link.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Show target page
                    pages.forEach(page => page.classList.remove('active'));
                    document.getElementById(`${targetPage}-page`).classList.add('active');
                    
                    // Close sidebar on mobile
                    sidebar.classList.remove('active');
                });
            });

            // Calculate estimated payment for pickup
            wasteWeightInput.addEventListener('input', function() {
                const weight = this.value;
                if (weight) {
                    estimatedPayment.textContent = (weight * 100).toLocaleString();
                } else {
                    estimatedPayment.textContent = '0';
                }
            });

            // Login form submission
            loginForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = document.getElementById('loginEmail').value;
                const password = document.getElementById('loginPassword').value;
                
                // In a real app, you would authenticate with a server
                // For demo purposes, we'll just update the user email
                userData.email = email;
                updateUserProfile();
                loginModal.classList.remove('active');
            });

            // Demo login
            demoLogin.addEventListener('click', function() {
                document.getElementById('loginEmail').value = 'demo@ecosolutions.com';
                document.getElementById('loginPassword').value = 'demopassword';
                userData.email = 'demo@ecosolutions.com';
                updateUserProfile();
                loginModal.classList.remove('active');
            });

            // Close modal
            closeModal.addEventListener('click', function() {
                loginModal.classList.remove('active');
            });

            // Logout
            logoutBtn.addEventListener('click', function(e) {
                e.preventDefault();
                loginModal.classList.add('active');
            });

            // Profile form submission
            profileForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Update user data
                userData.name = document.getElementById('fullName').value;
                userData.email = document.getElementById('email').value;
                userData.phone = document.getElementById('phone').value;
                userData.address = document.getElementById('address').value;
                userData.avatarInitials = getInitials(userData.name);
                
                // Update UI
                updateUserProfile();
                
                alert('Profile updated successfully!');
            });

            // Pickup form submission
            pickupForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Create new pickup
                const newPickup = {
                    id: Date.now(),
                    type: document.getElementById('wasteType').value,
                    weight: parseFloat(document.getElementById('wasteWeight').value),
                    scheduledDate: document.getElementById('pickupDate').value,
                    scheduledTime: document.getElementById('pickupTime').value,
                    status: "Scheduled",
                    payment: parseFloat(document.getElementById('wasteWeight').value) * 100
                };
                
                // Add to pickups
                userData.pickups.push(newPickup);
                
                // Add to payment history
                const paymentDate = new Date().toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });
                
                userData.paymentHistory.unshift({
                    id: Date.now(),
                    amount: newPickup.payment,
                    date: paymentDate,
                    type: `${newPickup.type} Waste`,
                    status: "Pending"
                });
                
                // Update UI
                updatePickupStats();
                updatePaymentHistory();
                updateRecentActivities();
                
                // Reset form
                pickupForm.reset();
                estimatedPayment.textContent = '0';
                
                // Show success message
                alert(`Pickup scheduled successfully! You will earn ₹${newPickup.payment}`);
                
                // Navigate to dashboard
                document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
                document.querySelector('.nav-link[data-page="dashboard"]').classList.add('active');
                document.querySelectorAll('.page').forEach(page => page.classList.remove('active'));
                document.getElementById('dashboard-page').classList.add('active');
            });

            // New pickup button
            newPickupBtn.addEventListener('click', function() {
                // Navigate to pickup page
                document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
                document.querySelector('.nav-link[data-page="pickup"]').classList.add('active');
                document.querySelectorAll('.page').forEach(page => page.classList.remove('active'));
                document.getElementById('pickup-page').classList.add('active');
            });

            // Add payment button
            addPaymentBtn.addEventListener('click', function() {
                addPaymentForm.style.display = addPaymentForm.style.display === 'none' ? 'block' : 'none';
            });

            // Payment form submission
            paymentForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Create new payment method
                const newPayment = {
                    id: Date.now(),
                    type: document.getElementById('cardType').value === 'visa' ? 'Visa' : 
                          document.getElementById('cardType').value === 'mastercard' ? 'MasterCard' : 'American Express',
                    last4: document.getElementById('cardNumber').value.slice(-4),
                    expiry: document.getElementById('expiryDate').value,
                    default: userData.payments.length === 0 // Set as default if first card
                };
                
                // Add to payments
                userData.payments.push(newPayment);
                
                // Update UI
                updatePaymentMethods();
                
                // Reset form
                paymentForm.reset();
                addPaymentForm.style.display = 'none';
                
                // Show success message
                alert('Payment method added successfully!');
            });
        }

        // Set up scroll animations
        function setupScrollAnimations() {
            const animatedElements = document.querySelectorAll('.animate-on-scroll');
            
            const elementObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.15 });
            
            animatedElements.forEach(element => {
                elementObserver.observe(element);
            });
        }

        // Helper function to get initials from name
        function getInitials(name) {
            return name.split(' ')
                .map(part => part.charAt(0))
                .join('')
                .toUpperCase()
                .substring(0, 2);
        }

        // Initialize dashboard when page loads
        window.addEventListener('load', function() {
            // Set default date for pickup form
            const today = new Date();
            const nextWeek = new Date(today);
            nextWeek.setDate(today.getDate() + 7);
            
            const formattedDate = nextWeek.toISOString().split('T')[0];
            document.getElementById('pickupDate').value = formattedDate;
            document.getElementById('pickupDate').min = formattedDate;
            
            // Initialize the dashboard
            initDashboard();
        });
    </script>
</body>
</html>