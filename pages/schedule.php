<?php 
$pageTitle = "Schedule Pickup | EcoClean";
$currentPage = 'schedule';
include('../includes/header.php'); 
?>

    <!-- Hero Section -->
    <section class="hero-section-sm text-white animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Schedule a Pickup</h1>
                    <p class="lead">Book your waste collection in just a few clicks</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Form -->
    <section class="py-5 bg-white animate__animated animate__fadeIn animate__delay-1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4 p-lg-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h2 class="fw-bold mb-4">Pickup Details</h2>
                                    <form id="pickupForm">
                                        <div class="mb-3">
                                            <label for="pickupType" class="form-label">Pickup Type</label>
                                            <select class="form-select" id="pickupType" required>
                                                <option value="" selected disabled>Select type</option>
                                                <option value="residential">Residential</option>
                                                <option value="commercial">Commercial</option>
                                                <option value="recycling">Recycling</option>
                                                <option value="hazardous">Hazardous Waste</option>
                                                <option value="bulk">Bulk Items</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="pickupDate" class="form-label">Pickup Date</label>
                                            <input type="date" class="form-control" id="pickupDate" min="<?php echo date('Y-m-d'); ?>" required>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="pickupTime" class="form-label">Time Slot</label>
                                            <select class="form-select" id="pickupTime" required>
                                                <option value="" selected disabled>Select time slot</option>
                                                <option value="morning">Morning (8am - 12pm)</option>
                                                <option value="afternoon">Afternoon (12pm - 4pm)</option>
                                                <option value="evening">Evening (4pm - 8pm)</option>
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="pickupAddress" class="form-label">Address</label>
                                            <textarea class="form-control" id="pickupAddress" rows="3" required></textarea>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="specialInstructions" class="form-label">Special Instructions</label>
                                            <textarea class="form-control" id="specialInstructions" rows="2"></textarea>
                                        </div>
                                        
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-success btn-lg">Schedule Pickup</button>
                                        </div>
                                    </form>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="calendar-container mt-4 mt-lg-0">
                                        <h4 class="fw-bold mb-3">Available Dates</h4>
                                        <div id="bookingCalendar"></div>
                                        
                                        <div class="availability-info mt-4">
                                            <h5 class="fw-bold mb-3">Real-Time Availability</h5>
                                            <div class="availability-map" id="availabilityMap" style="height: 200px;"></div>
                                            <p class="mt-3 text-muted">Green zones indicate areas with available slots today.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-5 bg-light-green">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Smart Scheduling Features</h2>
                <p class="lead text-muted">Our system optimizes routes for efficiency and reduced emissions</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card p-4 rounded-3 h-100 hover-effect">
                        <div class="feature-icon bg-success bg-opacity-10 text-success rounded-circle mb-3">
                            <i class="fas fa-route fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Route Optimization</h4>
                        <p>Our algorithm creates the most efficient routes to reduce fuel consumption and emissions.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card p-4 rounded-3 h-100 hover-effect">
                        <div class="feature-icon bg-success bg-opacity-10 text-success rounded-circle mb-3">
                            <i class="fas fa-bell fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Smart Reminders</h4>
                        <p>Get automatic reminders before your pickup and notifications when the truck is nearby.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card p-4 rounded-3 h-100 hover-effect">
                        <div class="feature-icon bg-success bg-opacity-10 text-success rounded-circle mb-3">
                            <i class="fas fa-history fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Pickup History</h4>
                        <p>View your past pickups and easily schedule recurring services.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>