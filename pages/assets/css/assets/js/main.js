document.addEventListener('DOMContentLoaded', function() {
    // Remove preload class after page loads
    setTimeout(function() {
        document.body.classList.remove('preload');
    }, 500);
    
    // Add scroll effect to navbar
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            document.querySelector('.navbar').classList.add('scrolled');
        } else {
            document.querySelector('.navbar').classList.remove('scrolled');
        }
    });
    
    // Initialize service coverage map
    initServiceMap();
    
    // Add hover effects to all elements with hover-effect class
    const hoverElements = document.querySelectorAll('.hover-effect');
    hoverElements.forEach(el => {
        el.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.1)';
        });
        
        el.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
    
    // Animate elements when they come into view
    const animateOnScroll = function() {
        const elements = document.querySelectorAll('.animate-on-scroll');
        
        elements.forEach(element => {
            const elementPosition = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementPosition < windowHeight - 100) {
                element.classList.add('animated');
            }
        });
    };
    
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Run once on page load
});

// Initialize service coverage map
function initServiceMap() {
    if (document.getElementById('serviceMap')) {
        // This would be replaced with actual Google Maps API implementation
        console.log('Initializing service map...');
        
        // For demo purposes, we'll just show a placeholder
        const mapElement = document.getElementById('serviceMap');
        mapElement.innerHTML = `
            <div style="width: 100%; height: 100%; background: #f0f0f0; display: flex; align-items: center; justify-content: center;">
                <div style="text-align: center; padding: 20px;">
                    <i class="fas fa-map-marked-alt fa-3x mb-3" style="color: var(--primary-color);"></i>
                    <h4>Service Coverage Map</h4>
                    <p>Interactive map showing our service areas</p>
                </div>
            </div>
        `;
    }
}