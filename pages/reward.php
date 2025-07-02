<?php 
$pageTitle = "Recycling Rewards | EcoClean";
$currentPage = 'rewards';
include('../includes/header.php'); 
?>

    <!-- Hero Section -->
    <section class="hero-section-sm text-white animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">Recycling Rewards</h1>
                    <p class="lead">Earn points for recycling and redeem exciting rewards</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rewards Dashboard -->
    <section class="py-5 bg-white animate__animated animate__fadeIn animate__delay-1s">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body text-center">
                            <div class="rewards-tier mb-4">
                                <div class="tier-badge gold mx-auto mb-3">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <h3 class="fw-bold">Gold Tier</h3>
                                <p class="text-muted">650 points</p>
                            </div>
                            
                            <div class="progress mb-4" style="height: 10px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            
                            <p class="mb-4">350 more points to reach <strong>Platinum Tier</strong> and get 15% discount on your next pickup.</p>
                            
                            <div class="d-grid">
                                <button class="btn btn-success">Invite Friends (+100 pts)</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h3 class="fw-bold mb-4">Your Rewards</h3>
                            
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="reward-card p-4 rounded-3 h-100">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div class="reward-icon bg-success bg-opacity-10 text-success rounded-circle">
                                                <i class="fas fa-truck"></i>
                                            </div>
                                            <span class="badge bg-success">Active</span>
                                        </div>
                                        <h4 class="fw-bold">10% Off Next Pickup</h4>
                                        <p class="text-muted small">Use this discount on your next waste collection service.</p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="fw-bold text-success">500 pts</span>
                                            <button class="btn btn-sm btn-outline-success">Redeem</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="reward-card p-4 rounded-3 h-100">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div class="reward-icon bg-primary bg-opacity-10 text-primary rounded-circle">
                                                <i class="fas fa-store"></i>
                                            </div>
                                            <span class="badge bg-secondary">Coming Soon</span>
                                        </div>
                                        <h4 class="fw-bold">Local Coffee Shop</h4>
                                        <p class="text-muted small">Free coffee at participating local businesses.</p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="fw-bold text-success">300 pts</span>
                                            <button class="btn btn-sm btn-outline-secondary" disabled>Coming Soon</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="reward-card p-4 rounded-3 h-100">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div class="reward-icon bg-warning bg-opacity-10 text-warning rounded-circle">
                                                <i class="fas fa-seedling"></i>
                                            </div>
                                            <span class="badge bg-success">Active</span>
                                        </div>
                                        <h4 class="fw-bold">Compost Kit</h4>
                                        <p class="text-muted small">Starter kit for home composting.</p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="fw-bold text-success">750 pts</span>
                                            <button class="btn btn-sm btn-outline-success">Redeem</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="reward-card p-4 rounded-3 h-100">
                                        <div class="d-flex justify-content-between align-items-start mb-3">
                                            <div class="reward-icon bg-info bg-opacity-10 text-info rounded-circle">
                                                <i class="fas fa-recycle"></i>
                                            </div>
                                            <span class="badge bg-success">Active</span>
                                        </div>
                                        <h4 class="fw-bold">Reusable Bottle</h4>
                                        <p class="text-muted small">Eco-friendly stainless steel water bottle.</p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <span class="fw-bold text-success">600 pts</span>
                                            <button class="btn btn-sm btn-outline-success">Redeem</button>
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
                <h2 class="fw-bold">How The Rewards Program Works</h2>
                <p class="lead text-muted">Earn points for your eco-friendly actions</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="step-card text-center p-3">
                        <div class="step-number bg-success text-white rounded-circle mx-auto mb-3">1</div>
                        <h4 class="fw-bold">Recycle</h4>
                        <p>Properly sort and recycle your waste through our service</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="step-card text-center p-3">
                        <div class="step-number bg-success text-white rounded-circle mx-auto mb-3">2</div>
                        <h4 class="fw-bold">Earn Points</h4>
                        <p>Get points for every kg of properly sorted recyclables</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="step-card text-center p-3">
                        <div class="step-number bg-success text-white rounded-circle mx-auto mb-3">3</div>
                        <h4 class="fw-bold">Redeem</h4>
                        <p>Exchange your points for discounts and special offers</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="step-card text-center p-3">
                        <div class="step-number bg-success text-white rounded-circle mx-auto mb-3">4</div>
                        <h4 class="fw-bold">Level Up</h4>
                        <p>Reach higher tiers for better rewards and benefits</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Leaderboard -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Community Leaderboard</h2>
                <p class="lead text-muted">Top recyclers in your neighborhood</p>
            </div>
            
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>Name</th>
                                    <th>Points</th>
                                    <th>Recycled</th>
                                    <th>Tier</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge bg-warning">1</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/user1.jpg" class="rounded-circle me-2" width="30" height="30" alt="User">
                                            <span>Alex Johnson</span>
                                        </div>
                                    </td>
                                    <td>1,250</td>
                                    <td>156 kg</td>
                                    <td><span class="badge bg-primary">Platinum</span></td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-secondary">2</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/user2.jpg" class="rounded-circle me-2" width="30" height="30" alt="User">
                                            <span>Maria Garcia</span>
                                        </div>
                                    </td>
                                    <td>1,120</td>
                                    <td>140 kg</td>
                                    <td><span class="badge bg-primary">Platinum</span></td>
                                </tr>
                                <tr>
                                    <td><span class="badge bg-danger">3</span></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/user3.jpg" class="rounded-circle me-2" width="30" height="30" alt="User">
                                            <span>James Smith</span>
                                        </div>
                                    </td>
                                    <td>980</td>
                                    <td>122 kg</td>
                                    <td><span class="badge bg-warning">Gold</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/user4.jpg" class="rounded-circle me-2" width="30" height="30" alt="User">
                                            <span>Sarah Williams</span>
                                        </div>
                                    </td>
                                    <td>850</td>
                                    <td>106 kg</td>
                                    <td><span class="badge bg-warning">Gold</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="../assets/images/user5.jpg" class="rounded-circle me-2" width="30" height="30" alt="User">
                                            <span>You</span>
                                        </div>
                                    </td>
                                    <td>650</td>
                                    <td>81 kg</td>
                                    <td><span class="badge bg-warning">Gold</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="text-center mt-4">
                        <button class="btn btn-success">See Full Leaderboard</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include('includes/footer.php'); ?>