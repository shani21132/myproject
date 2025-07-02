<?php 
$pageTitle = "Waste Sorting Guide | EcoClean";
$currentPage = 'sorting';
include('../includes/header.php'); 
?>

    <!-- Hero Section -->
    <section class="hero-section-sm text-white animate__animated animate__fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-3">AI Waste Sorting Guide</h1>
                    <p class="lead">Let our AI help you sort your waste correctly</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sorting Tool Section -->
    <section class="py-5 bg-white animate__animated animate__fadeIn animate__delay-1s">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-4 p-lg-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h2 class="fw-bold mb-4">AI Sorting Assistant</h2>
                                    <p class="mb-4">Upload a photo of your waste items and our AI will identify and suggest the correct waste category for proper disposal or recycling.</p>
                                    
                                    <div class="sorting-upload-container text-center p-4 border rounded-3 mb-4">
                                        <div id="uploadArea" class="p-4 border-2 border-dashed rounded-3">
                                            <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                            <h5>Upload Waste Photo</h5>
                                            <p class="text-muted small">Drag & drop or click to browse</p>
                                            <input type="file" id="wasteImage" accept="image/*" class="d-none">
                                            <button class="btn btn-outline-success mt-2" onclick="document.getElementById('wasteImage').click()">Select Image</button>
                                        </div>
                                        <div id="imagePreview" class="mt-3 d-none">
                                            <img id="previewImage" src="#" alt="Preview" class="img-fluid rounded-3">
                                            <button class="btn btn-sm btn-danger mt-2" id="removeImage">Remove</button>
                                        </div>
                                    </div>
                                    
                                    <button id="analyzeBtn" class="btn btn-success btn-lg w-100 d-none">
                                        <i class="fas fa-robot me-2"></i> Analyze Waste
                                    </button>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="sorting-results-container mt-4 mt-lg-0">
                                        <h4 class="fw-bold mb-3">Sorting Results</h4>
                                        
                                        <div id="loadingIndicator" class="text-center py-5 d-none">
                                            <div class="spinner-border text-success" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <p class="mt-3">Analyzing your waste items...</p>
                                        </div>
                                        
                                        <div id="resultsPlaceholder" class="text-center py-5">
                                            <i class="fas fa-recycle fa-4x text-muted mb-3"></i>
                                            <h5>No Analysis Yet</h5>
                                            <p class="text-muted">Upload a photo of your waste to get sorting recommendations.</p>
                                        </div>
                                        
                                        <div id="sortingResults" class="d-none">
                                            <div class="alert alert-success">
                                                <h5 class="alert-heading">Sorting Complete!</h5>
                                                <p>Here's how to properly dispose of your items:</p>
                                            </div>
                                            
                                            <div class="results-list">
                                                <div class="result-item mb-3">
                                                    <div class="d-flex align-items-start">
                                                        <div class="me-3">
                                                            <span class="badge bg-success">Organic</span>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-1">Food Scraps</h6>
                                                            <p class="small mb-0">Place in green bin for composting</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="result-item mb-3">
                                                    <div class="d-flex align-items-start">
                                                        <div class="me-3">
                                                            <span class="badge bg-primary">Recyclable</span>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-1">Plastic Bottle</h6>
                                                            <p class="small mb-0">Rinse and place in blue recycling bin</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="result-item">
                                                    <div class="d-flex align-items-start">
                                                        <div class="me-3">
                                                            <span class="badge bg-warning text-dark">Hazardous</span>
                                                        </div>
                                                        <div>
                                                            <h6 class="mb-1">Batteries</h6>
                                                            <p class="small mb-0">Take to special hazardous waste facility</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4">
                                                <h5 class="fw-bold mb-3">Did You Know?</h5>
                                                <div class="fact-card p-3 bg-light rounded-3">
                                                    <p class="mb-0">Properly sorting your waste can increase recycling rates by up to 60% and significantly reduce contamination in recycling streams.</p>
                                                </div>
                                            </div>
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

    <!-- Waste Categories -->
    <section class="py-5 bg-light-green">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Waste Categories</h2>
                <p class="lead text-muted">Learn about different waste types and how to dispose of them</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="category-card p-4 rounded-3 h-100 hover-effect">
                        <div class="category-icon bg-success bg-opacity-10 text-success rounded-circle mb-3">
                            <i class="fas fa-leaf fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Organic Waste</h4>
                        <p>Food scraps, yard trimmings, and other biodegradable materials that can be composted.</p>
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-check text-success me-2"></i> Fruit & vegetable scraps</li>
                            <li><i class="fas fa-check text-success me-2"></i> Coffee grounds</li>
                            <li><i class="fas fa-check text-success me-2"></i> Yard waste</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="category-card p-4 rounded-3 h-100 hover-effect">
                        <div class="category-icon bg-primary bg-opacity-10 text-primary rounded-circle mb-3">
                            <i class="fas fa-recycle fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Recyclables</h4>
                        <p>Materials that can be processed and used to make new products.</p>
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-check text-primary me-2"></i> Paper & cardboard</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Glass bottles</li>
                            <li><i class="fas fa-check text-primary me-2"></i> Metal cans</li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="category-card p-4 rounded-3 h-100 hover-effect">
                        <div class="category-icon bg-warning bg-opacity-10 text-warning rounded-circle mb-3">
                            <i class="fas fa-biohazard fa-2x"></i>
                        </div>
                        <h4 class="fw-bold">Hazardous Waste</h4>
                        <p>Materials that are flammable, toxic, or otherwise dangerous.</p>
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-check text-warning me-2"></i> Batteries</li>
                            <li><i class="fas fa-check text-warning me-2"></i> Paint</li>
                            <li><i class="fas fa-check text-warning me-2"></i> Chemicals</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const wasteImage = document.getElementById('wasteImage');
        const previewImage = document.getElementById('previewImage');
        const imagePreview = document.getElementById('imagePreview');
        const uploadArea = document.getElementById('uploadArea');
        const analyzeBtn = document.getElementById('analyzeBtn');
        const removeImage = document.getElementById('removeImage');
        const resultsPlaceholder = document.getElementById('resultsPlaceholder');
        const sortingResults = document.getElementById('sortingResults');
        const loadingIndicator = document.getElementById('loadingIndicator');
        
        // Handle image upload
        wasteImage.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    imagePreview.classList.remove('d-none');
                    uploadArea.classList.add('d-none');
                    analyzeBtn.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            }
        });
        
        // Remove image
        removeImage.addEventListener('click', function() {
            wasteImage.value = '';
            imagePreview.classList.add('d-none');
            uploadArea.classList.remove('d-none');
            analyzeBtn.classList.add('d-none');
        });
        
        // Analyze waste
        analyzeBtn.addEventListener('click', function() {
            loadingIndicator.classList.remove('d-none');
            resultsPlaceholder.classList.add('d-none');
            sortingResults.classList.add('d-none');
            
            // Simulate AI processing delay
            setTimeout(function() {
                loadingIndicator.classList.add('d-none');
                sortingResults.classList.remove('d-none');
            }, 3000);
        });
        
        // Drag and drop functionality
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('border-success');
        });
        
        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('border-success');
        });
        
        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('border-success');
            
            if (e.dataTransfer.files.length) {
                wasteImage.files = e.dataTransfer.files;
                const event = new Event('change');
                wasteImage.dispatchEvent(event);
            }
        });
    });
    </script>

<?php include('includes/footer.php'); ?>