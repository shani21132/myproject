<?php 
$pageTitle = "Blog & Resources | EcoClean";
$currentPage = 'blog';
include('../includes/header.php'); 
?>

    <!-- Hero Section -->
    <section class="hero-section-sm text-white animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">EcoClean Blog</h1>
                    <p class="lead">Learn about waste management, recycling, and sustainability</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    <section class="py-5 bg-white animate__animated animate__fadeIn animate__delay-1s">
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <!-- Featured Post -->
                    <div class="card border-0 shadow-sm mb-5">
                        <img src="../assets/images/blog-featured.jpg" class="card-img-top" alt="Featured Blog Post">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <span class="badge bg-success me-2">Featured</span>
                                <small class="text-muted">June 15, 2023 • 5 min read</small>
                            </div>
                            <h2 class="card-title fw-bold">How to Reduce Household Waste by 50%</h2>
                            <p class="card-text">Discover practical strategies to significantly cut down your household waste output and make a real environmental impact.</p>
                            <a href="blog-post.php" class="btn btn-success mt-3">Read More</a>
                        </div>
                    </div>
                    
                    <!-- Recent Posts -->
                    <h3 class="fw-bold mb-4">Recent Articles</h3>
                    
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card border-0 h-100 hover-effect">
                                <img src="../assets/images/blog1.jpg" class="card-img-top" alt="Blog Post">
                                <div class="card-body">
                                    <small class="text-muted">June 10, 2023 • 3 min read</small>
                                    <h5 class="card-title mt-2">The Future of Smart Waste Management</h5>
                                    <p class="card-text">How technology is revolutionizing the way we handle and think about waste.</p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="blog-post.php" class="btn btn-sm btn-outline-success">Read More</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border-0 h-100 hover-effect">
                                <img src="../assets/images/blog2.jpg" class="card-img-top" alt="Blog Post">
                                <div class="card-body">
                                    <small class="text-muted">June 5, 2023 • 4 min read</small>
                                    <h5 class="card-title mt-2">Composting 101: A Beginner's Guide</h5>
                                    <p class="card-text">Everything you need to know to start composting at home, even with limited space.</p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="blog-post.php" class="btn btn-sm btn-outline-success">Read More</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border-0 h-100 hover-effect">
                                <img src="../assets/images/blog3.jpg" class="card-img-top" alt="Blog Post">
                                <div class="card-body">
                                    <small class="text-muted">May 28, 2023 • 6 min read</small>
                                    <h5 class="card-title mt-2">Understanding Recycling Symbols</h5>
                                    <p class="card-text">Decoding the numbers and symbols on plastic products to recycle correctly.</p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="blog-post.php" class="btn btn-sm btn-outline-success">Read More</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border-0 h-100 hover-effect">
                                <img src="../assets/images/blog4.jpg" class="card-img-top" alt="Blog Post">
                                <div class="card-body">
                                    <small class="text-muted">May 20, 2023 • 5 min read</small>
                                    <h5 class="card-title mt-2">Zero Waste Kitchen Strategies</h5>
                                    <p class="card-text">Practical tips to minimize waste in your kitchen and save money.</p>
                                </div>
                                <div class="card-footer bg-transparent border-0">
                                    <a href="blog-post.php" class="btn btn-sm btn-outline-success">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pagination -->
                    <nav aria-label="Blog pagination" class="mt-5">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                
                <!-- Sidebar -->
                <div class="col-lg-4">
                    <!-- Search -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Search</h5>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search articles...">
                                <button class="btn btn-success" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Categories -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Categories</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="#" class="text-decoration-none">Waste Reduction <span class="badge bg-success float-end">12</span></a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none">Recycling <span class="badge bg-success float-end">8</span></a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none">Composting <span class="badge bg-success float-end">5</span></a></li>
                                <li class="mb-2"><a href="#" class="text-decoration-none">Sustainability <span class="badge bg-success float-end">15</span></a></li>
                                <li><a href="#" class="text-decoration-none">Community <span class="badge bg-success float-end">7</span></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Popular Posts -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Popular Posts</h5>
                            <div class="popular-post mb-3">
                                <a href="#" class="d-flex text-decoration-none">
                                    <img src="../assets/images/blog-small1.jpg" class="rounded me-3" width="60" height="60" alt="Popular Post">
                                    <div>
                                        <h6 class="mb-0">10 Easy Swaps to Reduce Plastic Use</h6>
                                        <small class="text-muted">May 15, 2023</small>
                                    </div>
                                </a>
                            </div>
                            <div class="popular-post mb-3">
                                <a href="#" class="d-flex text-decoration-none">
                                    <img src="../assets/images/blog-small2.jpg" class="rounded me-3" width="60" height="60" alt="Popular Post">
                                    <div>
                                        <h6 class="mb-0">The Truth About Biodegradable Plastics</h6>
                                        <small class="text-muted">April 28, 2023</small>
                                    </div>
                                </a>
                            </div>
                            <div class="popular-post">
                                <a href="#" class="d-flex text-decoration-none">
                                    <img src="../assets/images/blog-small3.jpg" class="rounded me-3" width="60" height="60" alt="Popular Post">
                                    <div>
                                        <h6 class="mb-0">How We Reduced Office Waste by 75%</h6>
                                        <small class="text-muted">April 15, 2023</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Newsletter -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-3">Newsletter</h5>
                            <p>Subscribe to get updates on new articles and recycling tips.</p>
                            <form>
                                <div class="mb-3">
                                    <input type="email" class="form-control" placeholder="Your email">
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-success" type="submit">Subscribe</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-success text-white">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Have Waste Management Questions?</h2>
            <p class="lead mb-5">Our team is here to help you with any questions about recycling, composting, or our services.</p>
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                <a href="contact.php" class="btn btn-light btn-lg px-4 gap-3">Contact Us</a>
                <a href="services.php" class="btn btn-outline-light btn-lg px-4">Our Services</a>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>