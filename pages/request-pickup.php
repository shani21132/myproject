

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
    
     /* Page transition */
        .page-section {
            display: none;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
            min-height: 80vh;
            padding: 100px 0;
        }
        
        .page-section.active {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Form styling */
        .form-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .form-header {
            background: linear-gradient(135deg, var(--dark-color), var(--primary-color));
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(46, 139, 87, 0.25);
        }
        
        .submit-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.4s ease;
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(46, 139, 87, 0.3);
        }
        
        /* Learn more section */
        .feature-box {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            height: 100%;
            position: relative;
            overflow: hidden;
            border-top: 3px solid var(--primary-color);
        }
        
        .feature-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        }
        
        .feature-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 25px;
        }
        
        .feature-badge {
            position: absolute;
            top: 20px;
            right: -30px;
            background: var(--accent-color);
            color: var(--dark-color);
            padding: 8px 35px;
            transform: rotate(45deg);
            font-weight: 700;
            font-size: 14px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 3rem;
            }
            .hero-subtitle {
                font-size: 1.4rem;
            }
        }
        
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 1.2rem;
            }
            .section-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
 
 
 
 
 
 
 <!-- Request Pickup Section -->
    <section id="request-pickup" class="page-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="form-container">
                        <div class="form-header">
                            <h2 class="mb-3">Request Waste Pickup</h2>
                            <p>Schedule your waste collection in just a few steps</p>
                        </div>
                        <div class="p-4 p-md-5">
                            <?php
                            // PHP form handling
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                // Collect form data
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
                                $address = $_POST['address'];
                                $date = $_POST['date'];
                                $wasteType = $_POST['wasteType'];
                                $quantity = $_POST['quantity'];
                                $notes = $_POST['notes'];
                                $recurring = isset($_POST['recurring']) ? 'Yes' : 'No';
                                
                                // Display confirmation message
                                echo '<div class="alert alert-success text-center animate__animated animate__fadeIn">
                                        <i class="bi bi-check-circle-fill fs-1"></i>
                                        <h3 class="mt-3">Pickup Scheduled Successfully!</h3>
                                        <p class="mb-0">Thank you, ' . htmlspecialchars($name) . '! Your waste pickup is scheduled for ' . htmlspecialchars($date) . '.</p>
                                        <p class="mt-3">We\'ve sent a confirmation to ' . htmlspecialchars($email) . '</p>
                                        <a href="#home" class="btn btn-primary mt-3" data-page="home">Return to Home</a>
                                    </div>';
                            } else {
                            ?>
                            <form id="pickupForm" method="POST">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control form-control-lg" id="name" name="name" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control form-control-lg" id="email" name="email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control form-control-lg" id="phone" name="phone" required>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="date" class="form-label">Preferred Date</label>
                                        <input type="date" class="form-control form-control-lg" id="date" name="date" required>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="address" class="form-label">Full Address</label>
                                    <textarea class="form-control form-control-lg" id="address" name="address" rows="3" required></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="wasteType" class="form-label">Waste Type</label>
                                        <select class="form-select form-select-lg" id="wasteType" name="wasteType" required>
                                            <option value="">Select Waste Type</option>
                                            <option value="general">General Household Waste</option>
                                            <option value="recyclable">Recyclable Materials</option>
                                            <option value="organic">Organic Waste</option>
                                            <option value="hazardous">Hazardous Waste</option>
                                            <option value="bulk">Bulk Items</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="quantity" class="form-label">Estimated Quantity</label>
                                        <select class="form-select form-select-lg" id="quantity" name="quantity" required>
                                            <option value="">Select Quantity</option>
                                            <option value="small">Small (1-2 bags)</option>
                                            <option value="medium">Medium (3-5 bags)</option>
                                            <option value="large">Large (6+ bags)</option>
                                            <option value="bulk">Bulk Items</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="notes" class="form-label">Special Instructions</label>
                                    <textarea class="form-control form-control-lg" id="notes" name="notes" rows="3"></textarea>
                                </div>
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="recurring" name="recurring">
                                    <label class="form-check-label" for="recurring">
                                        Set up recurring pickup (weekly/monthly)
                                    </label>
                                </div>
                                <div class="text-center mt-5">
                                    <button type="submit" class="btn submit-btn btn-lg px-5">Schedule Pickup</button>
                                </div>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Learn More Section -->
    <section id="learn-more" class="page-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Learn More About Our Services</h2>
                <p class="lead">Discover how EcoClean is revolutionizing waste management</p>
            </div>
            
            <div class="row mb-5">
                <div class="col-md-6 mb-4">
                    <div class="h-100 p-5 bg-light rounded-3">
                        <h3 class="mb-4">Our Mission</h3>
                        <p>At EcoClean, our mission is to transform waste management through innovative solutions that prioritize environmental sustainability and community well-being. We believe that responsible waste handling is essential for creating cleaner, healthier cities.</p>
                        <p>By leveraging technology and sustainable practices, we aim to reduce landfill waste by 50% in the communities we serve by 2030, while making waste collection more efficient and user-friendly.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="h-100 p-5 text-white rounded-3" style="background: linear-gradient(135deg, var(--dark-color), var(--primary-color));">
                        <h3 class="mb-4">Environmental Impact</h3>
                        <p>Since our founding, EcoClean has diverted over 2,500 tons of waste from landfills through our comprehensive recycling and composting programs. Our smart routing technology reduces fuel consumption by up to 20%, significantly lowering our carbon footprint.</p>
                        <p>We partner with local recycling facilities and environmental organizations to ensure materials are processed responsibly and sustainably.</p>
                    </div>
                </div>
            </div>
            
            <h3 class="text-center mb-4">Service Features</h3>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <span class="feature-badge">Popular</span>
                        <i class="bi bi-calendar-check feature-icon"></i>
                        <h4>Flexible Scheduling</h4>
                        <p>Schedule pickups on your terms with our easy online calendar. Choose from one-time, weekly, or monthly service options that fit your schedule.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <i class="bi bi-graph-up feature-icon"></i>
                        <h4>Waste Analytics</h4>
                        <p>Access detailed reports on your waste production and recycling rates through our customer portal. Track your environmental impact over time.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-box">
                        <span class="feature-badge">New</span>
                        <i class="bi bi-award feature-icon"></i>
                        <h4>Rewards Program</h4>
                        <p>Earn points for proper waste sorting and recycling that can be redeemed for discounts, gift cards, or donations to environmental causes.</p>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Residential Services</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Curbside collection for all waste types</li>
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Recycling and composting services</li>
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Bulk item pickup (furniture, appliances)</li>
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Hazardous waste disposal events</li>
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i> 24/7 customer support</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">Commercial Services</h4>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Customized waste management plans</li>
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Dedicated account management</li>
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Waste auditing and consulting</li>
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Sustainability reporting</li>
                                <li class="list-group-item border-0 ps-0"><i class="bi bi-check-circle-fill text-success me-2"></i> Employee engagement programs</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <a href="#request-pickup" class="btn btn-primary btn-lg" data-page="request-pickup">Schedule Your Pickup Today</a>
            </div>
        </div>
    </section>

    </body>
    </html>
