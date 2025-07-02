    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">EcoClean</h5>
                    <p>Innovative waste management solutions for a sustainable future.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">Services</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="services.php#residential" class="text-white">Residential</a></li>
                        <li class="mb-2"><a href="services.php#commercial" class="text-white">Commercial</a></li>
                        <li class="mb-2"><a href="services.php#recycling" class="text-white">Recycling</a></li>
                        <li class="mb-2"><a href="services.php#hazardous" class="text-white">Hazardous</a></li>
                        <li><a href="services.php#bulk" class="text-white">Bulk Items</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">Company</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="about.php" class="text-white">About Us</a></li>
                        <li class="mb-2"><a href="blog.php" class="text-white">Blog</a></li>
                        <li class="mb-2"><a href="careers.php" class="text-white">Careers</a></li>
                        <li><a href="contact.php" class="text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="fw-bold mb-3">Newsletter</h5>
                    <p>Subscribe to get updates on our services and recycling tips.</p>
                    <form class="mt-3">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Your email">
                            <button class="btn btn-success" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; <?php echo date('Y'); ?> EcoClean. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy.php" class="text-white">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms.php" class="text-white">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script src="<?php echo $base_url; ?>assets/js/main.js"></script>
    <script src="<?php echo $base_url; ?>assets/js/animations.js"></script>
    
    <!-- Google Maps API (would be added with actual API key) -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initServiceMap" async defer></script>
</body>
</html>