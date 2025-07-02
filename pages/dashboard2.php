<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoClean - Smart Waste Management Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #28a745;
            --secondary-color: #20c997;
            --dark-color: #1e5631;
            --light-color: #f8f9fa;
            --accent-color: #ffc107;
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 80px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            overflow-x: hidden;
            color: #333;
            line-height: 1.6;
        }
        
        /* Dashboard Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(135deg, var(--dark-color) 0%, #2a6b3d 100%);
            color: white;
            position: fixed;
            height: 100vh;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 5px 0 15px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }
        
        .sidebar-collapsed {
            width: var(--sidebar-collapsed-width);
        }
        
        .sidebar-collapsed .sidebar-brand,
        .sidebar-collapsed .nav-link-text {
            display: none;
        }
        
        .sidebar-collapsed .nav-item {
            text-align: center;
        }
        
        .sidebar-collapsed .nav-link {
            justify-content: center;
        }
        
        .sidebar-brand {
            padding: 20px;
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 1.3rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            position: sticky;
            top: 0;
            background: linear-gradient(135deg, var(--dark-color) 0%, #2a6b3d 100%);
            z-index: 1010;
        }
        
        .sidebar-brand i {
            margin-right: 10px;
            font-size: 1.5rem;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .nav-item {
            position: relative;
            margin: 5px 15px;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .nav-item.active {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            padding: 12px 15px;
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: white;
        }
        
        .nav-link i {
            font-size: 1.2rem;
            margin-right: 10px;
            width: 24px;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .nav-link-text {
            transition: all 0.3s ease;
        }
        
        .nav-item.active .nav-link {
            color: white;
            font-weight: 500;
        }
        
        .nav-item.active:before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: var(--accent-color);
        }
        
        /* Main Content Area */
        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            padding: 20px;
            transition: all 0.3s ease;
        }
        
        .main-content-expanded {
            margin-left: var(--sidebar-collapsed-width);
            width: calc(100% - var(--sidebar-collapsed-width));
        }
        
        /* Top Navigation */
        .top-nav {
            background-color: white;
            padding: 15px 25px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            position: sticky;
            top: 20px;
            z-index: 100;
        }
        
        .toggle-sidebar {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark-color);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .toggle-sidebar:hover {
            color: var(--primary-color);
            transform: rotate(90deg);
        }
        
        .user-profile {
            display: flex;
            align-items: center;
        }
        
        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
            border: 2px solid var(--primary-color);
        }
        
        .user-info {
            margin-right: 20px;
            text-align: right;
        }
        
        .user-name {
            font-weight: 600;
            margin-bottom: 0;
            color: var(--dark-color);
        }
        
        .user-role {
            font-size: 0.8rem;
            color: #6c757d;
        }
        
        .notification-bell {
            position: relative;
            margin-right: 20px;
            color: var(--dark-color);
            font-size: 1.2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .notification-bell:hover {
            color: var(--primary-color);
            transform: scale(1.1);
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* Dashboard Cards */
        .dashboard-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            border: none;
            position: relative;
            overflow: hidden;
            height: 100%;
        }
        
        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .dashboard-card:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            transition: all 0.3s ease;
        }
        
        .dashboard-card:hover:before {
            height: 8px;
        }
        
        .card-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: white;
        }
        
        .card-icon.primary {
            background: linear-gradient(135deg, var(--primary-color), #5cb85c);
        }
        
        .card-icon.warning {
            background: linear-gradient(135deg, #ffc107, #f0ad4e);
        }
        
        .card-icon.danger {
            background: linear-gradient(135deg, #dc3545, #d9534f);
        }
        
        .card-icon.info {
            background: linear-gradient(135deg, #17a2b8, #5bc0de);
        }
        
        .card-title {
            font-size: 0.9rem;
            font-weight: 600;
            color: #6c757d;
            margin-bottom: 5px;
        }
        
        .card-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 10px;
        }
        
        .card-change {
            font-size: 0.8rem;
            display: flex;
            align-items: center;
        }
        
        .card-change.positive {
            color: var(--primary-color);
        }
        
        .card-change.negative {
            color: #dc3545;
        }
        
        /* Charts Container */
        .chart-container {
            background: white;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            height: 100%;
        }
        
        .chart-container:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .chart-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0;
        }
        
        .chart-period {
            background-color: #f8f9fa;
            border-radius: 20px;
            padding: 5px 10px;
            font-size: 0.8rem;
            display: flex;
        }
        
        .chart-period-item {
            padding: 3px 12px;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .chart-period-item.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .chart-period-item:not(.active):hover {
            background-color: #e9ecef;
        }
        
        /* Recent Pickups Table */
        .pickups-table {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            overflow: hidden;
        }
        
        .pickups-table:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .table-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0;
        }
        
        .table-actions .btn {
            padding: 5px 15px;
            font-size: 0.8rem;
            border-radius: 20px;
        }
        
        .table {
            margin-bottom: 0;
            width: 100%;
        }
        
        .table th {
            border-top: none;
            font-weight: 600;
            color: #6c757d;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .table td {
            vertical-align: middle;
            font-size: 0.9rem;
        }
        
        .status-badge {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 500;
        }
        
        .status-badge.scheduled {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        
        .status-badge.in-progress {
            background-color: #fff8e1;
            color: #ff8f00;
        }
        
        .status-badge.completed {
            background-color: #e8f5e9;
            color: #388e3c;
        }
        
        .status-badge.cancelled {
            background-color: #ffebee;
            color: #d32f2f;
        }
        
        .action-btn {
            width: 30px;
            height: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f8f9fa;
            color: #6c757d;
            border: none;
            transition: all 0.3s ease;
        }
        
        .action-btn:hover {
            background-color: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }
        
        /* Calendar Widget */
        .calendar-widget {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            height: 100%;
        }
        
        .calendar-widget:hover {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .calendar-title {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0;
        }
        
        .calendar-nav {
            display: flex;
        }
        
        .calendar-nav-btn {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: #f8f9fa;
            color: #6c757d;
            border: none;
            transition: all 0.3s ease;
            margin: 0 5px;
        }
        
        .calendar-nav-btn:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* Page Content */
        .page-content {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        .page-content.active {
            display: block;
            opacity: 1;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: var(--dark-color);
        }
        
        /* Smart Bin Status */
        .bin-status {
            display: flex;
            align-items: center;
        }
        
        .bin-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 8px;
        }
        
        .bin-indicator.full {
            background-color: #dc3545;
        }
        
        .bin-indicator.medium {
            background-color: #ffc107;
        }
        
        .bin-indicator.empty {
            background-color: #28a745;
        }
        
        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                width: var(--sidebar-width);
            }
            
            .sidebar-show {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
                width: 100%;
            }
            
            .mobile-overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0,0,0,0.5);
                z-index: 999;
            }
            
            .sidebar-show + .mobile-overlay {
                display: block;
            }
        }
        
        @media (max-width: 768px) {
            .user-info {
                display: none;
            }
            
            .top-nav {
                padding: 15px;
            }
            
            .dashboard-card, .chart-container {
                padding: 15px;
            }
        }
        
        @media (max-width: 576px) {
            .top-nav {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .user-profile {
                margin-left: auto;
            }
            
            .chart-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
            
            .chart-period {
                align-self: stretch;
                justify-content: center;
            }
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .animate-fadein {
            animation: fadeIn 0.6s ease forwards;
        }
        
        .animate-pulse {
            animation: pulse 2s infinite;
        }
        
        /* Mobile menu button */
        .mobile-menu-btn {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1001;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }
        
        @media (max-width: 992px) {
            .mobile-menu-btn {
                display: block;
            }
        }
        
        /* Chart placeholders */
        .chart-placeholder {
            width: 100%;
            height: 300px;
            background: #f8f9fa;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6c757d;
            font-weight: 500;
        }
        
        .chart-placeholder i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <button class="mobile-menu-btn">
        <i class="bi bi-list"></i>
    </button>
    
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                <i class="bi bi-recycle"></i>
                <span class="nav-link-text">EcoClean</span>
            </div>
            <div class="sidebar-menu">
                <ul class="nav flex-column">
                    <li class="nav-item active" data-page="dashboard">
                        <a class="nav-link" href="#">
                            <i class="bi bi-speedometer2"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item" data-page="schedule">
                        <a class="nav-link" href="#">
                            <i class="bi bi-calendar-check"></i>
                            <span class="nav-link-text">Pickup Schedule</span>
                        </a>
                    </li>
                    <li class="nav-item" data-page="collection">
                        <a class="nav-link" href="#">
                            <i class="bi bi-trash"></i>
                            <span class="nav-link-text">Waste Collection</span>
                        </a>
                    </li>
                    <li class="nav-item" data-page="recycling">
                        <a class="nav-link" href="#">
                            <i class="bi bi-recycle"></i>
                            <span class="nav-link-text">Recycling</span>
                        </a>
                    </li>
                    <li class="nav-item" data-page="analytics">
                        <a class="nav-link" href="#">
                            <i class="bi bi-graph-up"></i>
                            <span class="nav-link-text">Analytics</span>
                        </a>
                    </li>
                    <li class="nav-item" data-page="bins">
                        <a class="nav-link" href="#">
                            <i class="bi bi-qr-code-scan"></i>
                            <span class="nav-link-text">Smart Bins</span>
                        </a>
                    </li>
                    <li class="nav-item" data-page="tracking">
                        <a class="nav-link" href="#">
                            <i class="bi bi-geo-alt"></i>
                            <span class="nav-link-text">Tracking</span>
                        </a>
                    </li>
                    <li class="nav-item" data-page="payments">
                        <a class="nav-link" href="pay.php">
                            <i class="bi bi-credit-card"></i>
                            <span class="nav-link-text">Payments</span>
                        </a>
                    </li>
                    <li class="nav-item" data-page="profile">
                        <a class="nav-link" href="#">
                            <i class="bi bi-person"></i>
                            <span class="nav-link-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item" data-page="settings">
                        <a class="nav-link" href="#">
                            <i class="bi bi-gear"></i>
                            <span class="nav-link-text">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        
        <div class="mobile-overlay"></div>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Top Navigation -->
            <nav class="top-nav">
                <button class="toggle-sidebar">
                    <i class="bi bi-list"></i>
                </button>
                <div class="d-flex align-items-center">
                    <div class="notification-bell">
                        <i class="bi bi-bell"></i>
                        <span class="notification-badge">3</span>
                    </div>
                    <div class="user-profile">
                        <div class="user-info">
                            <h6 class="user-name">John Doe</h6>
                            <p class="user-role">Residential Customer</p>
                        </div>
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User Profile">
                    </div>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <div class="page-content active" id="dashboard-content">
                <div class="row">
                    <!-- Stats Cards -->
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card animate-fadein">
                            <div class="card-icon primary">
                                <i class="bi bi-trash"></i>
                            </div>
                            <h6 class="card-title">Total Collections</h6>
                            <h3 class="card-value">1,248</h3>
                            <div class="card-change positive">
                                <i class="bi bi-arrow-up"></i> 12% from last month
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card animate-fadein">
                            <div class="card-icon warning">
                                <i class="bi bi-recycle"></i>
                            </div>
                            <h6 class="card-title">Recycled Waste</h6>
                            <h3 class="card-value">856 kg</h3>
                            <div class="card-change positive">
                                <i class="bi bi-arrow-up"></i> 8% from last month
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card animate-fadein">
                            <div class="card-icon danger">
                                <i class="bi bi-exclamation-triangle"></i>
                            </div>
                            <h6 class="card-title">Pending Pickups</h6>
                            <h3 class="card-value">3</h3>
                            <div class="card-change negative">
                                <i class="bi bi-arrow-down"></i> 1 from yesterday
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="dashboard-card animate-fadein">
                            <div class="card-icon info">
                                <i class="bi bi-coin"></i>
                            </div>
                            <h6 class="card-title">EcoCredits</h6>
                            <h3 class="card-value">1,450</h3>
                            <div class="card-change positive">
                                <i class="bi bi-arrow-up"></i> 250 new credits
                            </div>
                        </div>
                    </div>

                    <!-- Waste Collection Chart -->
                    <div class="col-lg-8">
                        <div class="chart-container">
                            <div class="chart-header">
                                <h5 class="chart-title">Waste Collection Overview</h5>
                                <div class="chart-period">
                                    <span class="chart-period-item active">Week</span>
                                    <span class="chart-period-item">Month</span>
                                    <span class="chart-period-item">Year</span>
                                </div>
                            </div>
                            <div class="chart-placeholder">
                                <div class="text-center">
                                    <i class="bi bi-bar-chart"></i>
                                    <p>Waste Collection Chart</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Calendar Widget -->
                    <div class="col-lg-4">
                        <div class="calendar-widget">
                            <div class="calendar-header">
                                <h5 class="calendar-title">Pickup Schedule</h5>
                                <div class="calendar-nav">
                                    <button class="calendar-nav-btn prev-btn">
                                        <i class="bi bi-chevron-left"></i>
                                    </button>
                                    <button class="calendar-nav-btn next-btn">
                                        <i class="bi bi-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div id="calendar" class="p-3">
                                <div class="text-center mb-3">
                                    <h5>June 2025</h5>
                                </div>
                                <div class="calendar-grid">
                                    <div class="calendar-header-row">
                                        <div class="calendar-day-header">Sun</div>
                                        <div class="calendar-day-header">Mon</div>
                                        <div class="calendar-day-header">Tue</div>
                                        <div class="calendar-day-header">Wed</div>
                                        <div class="calendar-day-header">Thu</div>
                                        <div class="calendar-day-header">Fri</div>
                                        <div class="calendar-day-header">Sat</div>
                                    </div>
                                    <div class="calendar-week">
                                        <div class="calendar-day">26</div>
                                        <div class="calendar-day">27</div>
                                        <div class="calendar-day">28</div>
                                        <div class="calendar-day">29</div>
                                        <div class="calendar-day">30</div>
                                        <div class="calendar-day">31</div>
                                        <div class="calendar-day active">
                                            <div>1</div>
                                            <div class="calendar-event bg-primary">Pickup</div>
                                        </div>
                                    </div>
                                    <div class="calendar-week">
                                        <div class="calendar-day">2</div>
                                        <div class="calendar-day">3</div>
                                        <div class="calendar-day">4</div>
                                        <div class="calendar-day">5</div>
                                        <div class="calendar-day">6</div>
                                        <div class="calendar-day">7</div>
                                        <div class="calendar-day">8</div>
                                    </div>
                                    <div class="calendar-week">
                                        <div class="calendar-day">9</div>
                                        <div class="calendar-day">10</div>
                                        <div class="calendar-day active">
                                            <div>11</div>
                                            <div class="calendar-event bg-success">Recycling</div>
                                        </div>
                                        <div class="calendar-day">12</div>
                                        <div class="calendar-day">13</div>
                                        <div class="calendar-day">14</div>
                                        <div class="calendar-day">15</div>
                                    </div>
                                    <div class="calendar-week">
                                        <div class="calendar-day">16</div>
                                        <div class="calendar-day">17</div>
                                        <div class="calendar-day">18</div>
                                        <div class="calendar-day active">
                                            <div>19</div>
                                            <div class="calendar-event bg-warning">Bulk</div>
                                        </div>
                                        <div class="calendar-day">20</div>
                                        <div class="calendar-day">21</div>
                                        <div class="calendar-day">22</div>
                                    </div>
                                    <div class="calendar-week">
                                        <div class="calendar-day">23</div>
                                        <div class="calendar-day">24</div>
                                        <div class="calendar-day">25</div>
                                        <div class="calendar-day">26</div>
                                        <div class="calendar-day">27</div>
                                        <div class="calendar-day">28</div>
                                        <div class="calendar-day">29</div>
                                    </div>
                                    <div class="calendar-week">
                                        <div class="calendar-day">30</div>
                                        <div class="calendar-day"></div>
                                        <div class="calendar-day"></div>
                                        <div class="calendar-day"></div>
                                        <div class="calendar-day"></div>
                                        <div class="calendar-day"></div>
                                        <div class="calendar-day"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Pickups Table -->
                    <div class="col-12">
                        <div class="pickups-table">
                            <div class="table-header">
                                <h5 class="table-title">Recent Pickups</h5>
                                <div class="table-actions">
                                    <button class="btn btn-sm btn-outline-primary">View All</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Pickup ID</th>
                                            <th>Date & Time</th>
                                            <th>Waste Type</th>
                                            <th>Weight</th>
                                            <th>Driver</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#EC-78945</td>
                                            <td>Today, 10:30 AM</td>
                                            <td>Mixed Waste</td>
                                            <td>12.5 kg</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://randomuser.me/api/portraits/men/41.jpg" width="30" height="30" class="rounded-circle me-2">
                                                    <span>Michael B.</span>
                                                </div>
                                            </td>
                                            <td><span class="status-badge in-progress">In Progress</span></td>
                                            <td>
                                                <button class="action-btn me-2">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button class="action-btn">
                                                    <i class="bi bi-chat"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#EC-78944</td>
                                            <td>Yesterday, 2:15 PM</td>
                                            <td>Recyclables</td>
                                            <td>8.2 kg</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://randomuser.me/api/portraits/women/63.jpg" width="30" height="30" class="rounded-circle me-2">
                                                    <span>Sarah J.</span>
                                                </div>
                                            </td>
                                            <td><span class="status-badge completed">Completed</span></td>
                                            <td>
                                                <button class="action-btn me-2">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button class="action-btn">
                                                    <i class="bi bi-chat"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#EC-78943</td>
                                            <td>Yesterday, 9:00 AM</td>
                                            <td>Organic</td>
                                            <td>5.7 kg</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="https://randomuser.me/api/portraits/men/22.jpg" width="30" height="30" class="rounded-circle me-2">
                                                    <span>Robert T.</span>
                                                </div>
                                            </td>
                                            <td><span class="status-badge completed">Completed</span></td>
                                            <td>
                                                <button class="action-btn me-2">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button class="action-btn">
                                                    <i class="bi bi-chat"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pickup Schedule Page -->
            <div class="page-content" id="schedule-content">
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <h4 class="mb-4">Schedule a New Pickup</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Pickup Date</label>
                                        <input type="date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Preferred Time</label>
                                        <select class="form-select">
                                            <option>Morning (8AM - 12PM)</option>
                                            <option>Afternoon (12PM - 4PM)</option>
                                            <option>Evening (4PM - 8PM)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Waste Type</label>
                                        <select class="form-select">
                                            <option>General Waste</option>
                                            <option>Recyclables</option>
                                            <option>Organic</option>
                                            <option>Hazardous</option>
                                            <option>E-Waste</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Estimated Weight (kg)</label>
                                        <input type="number" class="form-control" placeholder="Enter weight">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label">Special Instructions</label>
                                        <textarea class="form-control" rows="3" placeholder="Any special instructions for our team"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary">Schedule Pickup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="pickups-table">
                            <div class="table-header">
                                <h5 class="table-title">Upcoming Pickups</h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Pickup ID</th>
                                            <th>Date & Time</th>
                                            <th>Waste Type</th>
                                            <th>Estimated Weight</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#EC-78946</td>
                                            <td>Tomorrow, 2:00 PM</td>
                                            <td>Recyclables</td>
                                            <td>7.5 kg</td>
                                            <td><span class="status-badge scheduled">Scheduled</span></td>
                                            <td>
                                                <button class="action-btn me-2">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="action-btn">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#EC-78947</td>
                                            <td>June 28, 2025, 10:00 AM</td>
                                            <td>Organic</td>
                                            <td>6.0 kg</td>
                                            <td><span class="status-badge scheduled">Scheduled</span></td>
                                            <td>
                                                <button class="action-btn me-2">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="action-btn">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#EC-78948</td>
                                            <td>July 5, 2025, 3:30 PM</td>
                                            <td>General Waste</td>
                                            <td>10.0 kg</td>
                                            <td><span class="status-badge scheduled">Scheduled</span></td>
                                            <td>
                                                <button class="action-btn me-2">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button class="action-btn">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Smart Bins Page -->
            <div class="page-content" id="bins-content">
                <div class="row">
                    <div class="col-12">
                        <div class="dashboard-card">
                            <h4 class="mb-4">Smart Bin Monitoring</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Bin ID</th>
                                            <th>Location</th>
                                            <th>Type</th>
                                            <th>Capacity</th>
                                            <th>Last Emptied</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#BIN-001</td>
                                            <td>Main Street</td>
                                            <td>General Waste</td>
                                            <td>
                                                <div class="progress" style="height: 10px;">
                                                    <div class="progress-bar bg-danger" style="width: 95%"></div>
                                                </div>
                                            </td>
                                            <td>June 23, 2025</td>
                                            <td>
                                                <div class="bin-status">
                                                    <div class="bin-indicator full"></div>
                                                    <span>Full</span>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger">Request Emptying</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#BIN-002</td>
                                            <td>Park Entrance</td>
                                            <td>Recycling</td>
                                            <td>
                                                <div class="progress" style="height: 10px;">
                                                    <div class="progress-bar bg-warning" style="width: 65%"></div>
                                                </div>
                                            </td>
                                            <td>June 24, 2025</td>
                                            <td>
                                                <div class="bin-status">
                                                    <div class="bin-indicator medium"></div>
                                                    <span>Medium</span>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View Details</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#BIN-003</td>
                                            <td>City Square</td>
                                            <td>Organic</td>
                                            <td>
                                                <div class="progress" style="height: 10px;">
                                                    <div class="progress-bar bg-success" style="width: 30%"></div>
                                                </div>
                                            </td>
                                            <td>June 25, 2025</td>
                                            <td>
                                                <div class="bin-status">
                                                    <div class="bin-indicator empty"></div>
                                                    <span>Empty</span>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View Details</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#BIN-004</td>
                                            <td>Market Place</td>
                                            <td>General Waste</td>
                                            <td>
                                                <div class="progress" style="height: 10px;">
                                                    <div class="progress-bar bg-warning" style="width: 75%"></div>
                                                </div>
                                            </td>
                                            <td>June 24, 2025</td>
                                            <td>
                                                <div class="bin-status">
                                                    <div class="bin-indicator medium"></div>
                                                    <span>Medium</span>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">View Details</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="chart-container">
                            <div class="chart-header">
                                <h5 class="chart-title">Bin Utilization</h5>
                            </div>
                            <div class="chart-placeholder">
                                <div class="text-center">
                                    <i class="bi bi-graph-up"></i>
                                    <p>Bin Utilization Chart</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="chart-container">
                            <div class="chart-header">
                                <h5 class="chart-title">Bin Status Distribution</h5>
                            </div>
                            <div class="chart-placeholder">
                                <div class="text-center">
                                    <i class="bi bi-pie-chart"></i>
                                    <p>Bin Status Distribution Chart</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Page -->
            <div class="page-content" id="profile-content">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="dashboard-card">
                            <div class="text-center">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" class="rounded-circle mb-3" width="150" height="150">
                                <h4>John Doe</h4>
                                <p class="text-muted">Residential Customer</p>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-sm btn-outline-primary me-2">
                                        <i class="bi bi-pencil"></i> Edit Profile
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="bi bi-camera"></i> Change Photo
                                    </button>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div class="mb-3">
                                <h6>Account Information</h6>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Membership Level
                                        <span class="badge bg-success">Premium</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        EcoCredits Balance
                                        <span class="fw-bold">1,450</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Account Status
                                        <span class="text-success">Active</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Member Since
                                        <span>Jan 15, 2023</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-8">
                        <div class="dashboard-card">
                            <h4 class="mb-4">Account Settings</h4>
                            
                            <div class="mb-4">
                                <h5>Personal Information</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" value="John">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" value="Doe">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" value="john.doe@example.com">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone</label>
                                        <input type="tel" class="form-control" value="(555) 123-4567">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <h5>Address</h5>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Street Address</label>
                                        <input type="text" class="form-control" value="123 Green Street">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control" value="Eco City">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">State</label>
                                        <input type="text" class="form-control" value="EC">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">ZIP Code</label>
                                        <input type="text" class="form-control" value="12345">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-4">
                                <h5>Password</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Other pages would be implemented similarly -->
            
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Toggle Sidebar
        document.querySelector('.toggle-sidebar').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('sidebar-collapsed');
            document.querySelector('.main-content').classList.toggle('main-content-expanded');
        });
        
        // Mobile menu toggle
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.add('sidebar-show');
        });
        
        // Close sidebar when clicking on overlay
        document.querySelector('.mobile-overlay').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.remove('sidebar-show');
        });
        
        // Navigation between pages
        document.querySelectorAll('.nav-item').forEach(item => {
            item.addEventListener('click', function() {
                // Close sidebar on mobile after selection
                if (window.innerWidth < 992) {
                    document.querySelector('.sidebar').classList.remove('sidebar-show');
                }
                
                // Remove active class from all items
                document.querySelectorAll('.nav-item').forEach(navItem => {
                    navItem.classList.remove('active');
                });
                
                // Add active class to clicked item
                this.classList.add('active');
                
                // Hide all page content
                document.querySelectorAll('.page-content').forEach(page => {
                    page.classList.remove('active');
                });
                
                // Show the selected page content
                const pageId = this.getAttribute('data-page');
                document.getElementById(`${pageId}-content`).classList.add('active');
            });
        });
        
        // Chart period selector
        document.querySelectorAll('.chart-period-item').forEach(item => {
            item.addEventListener('click', function() {
                this.parentNode.querySelector('.active').classList.remove('active');
                this.classList.add('active');
            });
        });
        
        // Calendar navigation
        document.querySelector('.calendar-nav-btn.prev-btn').addEventListener('click', function() {
            alert('Previous month navigation would be implemented here');
        });
        
        document.querySelector('.calendar-nav-btn.next-btn').addEventListener('click', function() {
            alert('Next month navigation would be implemented here');
        });
        
        // Animate cards on hover
        document.querySelectorAll('.dashboard-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('animate__animated', 'animate__pulse');
            });
            
            card.addEventListener('mouseleave', function() {
                this.classList.remove('animate__animated', 'animate__pulse');
            });
        });
    </script>
</body>
</html>