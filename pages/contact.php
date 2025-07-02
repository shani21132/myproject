<?php 
$pageTitle = "Contact Us | EcoClean";
$currentPage = 'contact';
include('../includes/header.php'); 
?>

    <!-- Hero Section -->
    <section class="hero-section-sm text-white animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Contact Us</h1>
                    <p class="lead">We're here to help with all your waste management needs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5 bg-white animate__animated animate__fadeIn animate__delay-1s">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4 p-lg-5">
                            <h2 class="fw-bold mb-4">Get In Touch</h2>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone (optional)</label>
                                    <input type="tel" class="form-control" id="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <select class="form-select" id="subject" required>
                                        <option value="" selected disabled>Select a subject</option>
                                        <option value="service">Service Inquiry</option>
                                        <option value="support">Customer Support</option>
                                        <option value="billing">Billing Question</option>
                                        <option value="feedback">Feedback</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success btn-lg">Send Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4 p-lg-5">
                            <h2 class="fw-bold mb-4">Contact Information</h2>
                            <p class="lead mb-4">Reach out to us through any of these channels.</p>
                            
                            <div class="contact-info mb-4">
                                <div class="d-flex mb-3">
                                    <div class="contact-icon bg-success bg-opacity-10 text-success rounded-circle me-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Address</h5>
                                        <p class="mb-0">123 Green Way, Eco City, EC 12345</p>
                                    </div>
                                </div>
                                
                                <div class="d-flex mb-3">
                                    <div class="contact-icon bg-success bg-opacity-10 text-success rounded-circle me-3">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Phone</h5>
                                        <p class="mb-0">(123) 456-7890</p>
                                        <p class="mb-0">Mon-Fri: 8am-6pm</p>
                                    </div>
                                </div>
                                
                                <div class="d-flex mb-3">
                                    <div class="contact-icon bg-success bg-opacity-10 text-success rounded-circle me-3">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Email</h5>
                                        <p class="mb-0">info@ecoclean.example</p>
                                        <p class="mb-0">support@ecoclean.example</p>
                                    </div>
                                </div>
                                
                                <div class="d-flex">
                                    <div class="contact-icon bg-success bg-opacity-10 text-success rounded-circle me-3">
                                        <i class="fas fa-comment-dots"></i>
                                    </div>
                                    <div>
                                        <h5 class="fw-bold mb-1">Live Chat</h5>
                                        <p class="mb-0">Available 24/7 through our app</p>
                                        <a href="#" class="text-success">Start Chat Now</a>
                                    </div>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <h5 class="fw-bold mb-3">Follow Us</h5>
                            <div class="social-links">
                                <a href="#" class="social-link bg-facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-link bg-twitter"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link bg-instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link bg-linkedin"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="social-link bg-youtube"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-0">
        <div class="container-fluid p-0">
            <div class="map-container">
                <