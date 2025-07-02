<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoSolutions | Green Technology</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
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
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Header & Navigation */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            background: rgba(10, 25, 47, 0.95);
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
        }

        header.scrolled {
            padding: 15px 5%;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            color: var(--light-blue);
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }

        .logo:hover {
            color: var(--accent);
            transform: scale(1.05);
        }

        .logo i {
            color: var(--light-green);
            margin-right: 10px;
            transition: all 0.5s ease;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            padding: 8px 15px;
            border-radius: 30px;
            transition: all 0.3s ease;
            position: relative;
        }

        nav ul li a:hover {
            color: var(--accent);
        }

        nav ul li a:after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--accent);
            transition: width 0.3s ease;
        }

        nav ul li a:hover:after {
            width: 100%;
        }

        .cta-button {
            background: linear-gradient(45deg, var(--light-green), var(--light-blue));
            color: var(--text-dark);
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(26, 188, 156, 0.4);
            transition: all 0.3s ease;
            display: inline-block;
            border: 2px solid transparent;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(100, 255, 218, 0.8);
            border-color: var(--light-blue);
        }

        .menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--light-blue);
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            padding: 0 10%;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(10, 25, 47, 0.85), rgba(11, 140, 123, 0.7));
        }

        .hero-content {
            max-width: 600px;
            z-index: 2;
        }

        .hero h1 {
            font-size: 4.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.1;
            background: linear-gradient(to right, var(--light-blue), var(--light-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: titleGlow 3s ease-in-out infinite alternate;
        }

        @keyframes titleGlow {
            0% { text-shadow: 0 0 10px rgba(100, 255, 218, 0.3); }
            100% { text-shadow: 0 0 30px rgba(26, 188, 156, 0.7); }
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
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
        }

        .btn-secondary:hover {
            background: rgba(26, 188, 156, 0.2);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(26, 188, 156, 0.2);
        }

        .hero-animation {
            position: absolute;
            right: 10%;
            top: 50%;
            transform: translateY(-50%);
            width: 500px;
            height: 500px;
            z-index: 1;
            opacity: 0.9;
        }

        /* Video Background */
        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .video-background video {
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.5;
            filter: blur(1px);
        }
        
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(10, 25, 47, 0.7), rgba(11, 140, 123, 0.5));
            z-index: 1;
        }

        /* Features Section */
        .features {
            padding: 100px 5%;
            position: relative;
            background: linear-gradient(to bottom, var(--gradient-start), var(--gradient-mid));
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 70px;
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(to right, var(--light-blue), var(--light-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--light-green), var(--light-blue));
            border-radius: 2px;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.4s ease;
            border: 1px solid rgba(100, 255, 218, 0.2);
            transform: translateY(0);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            perspective: 1000px;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(100, 255, 218, 0.2);
            border-color: var(--light-blue);
        }

        .feature-icon {
            font-size: 3.5rem;
            color: var(--light-blue);
            margin-bottom: 25px;
            transition: all 0.5s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotateY(20deg);
            color: var(--accent);
        }

        .feature-card h3 {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: var(--light-blue);
        }

        /* Stats Section */
        .stats {
            padding: 100px 5%;
            position: relative;
            background: linear-gradient(to bottom, var(--gradient-mid), var(--gradient-end));
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .stat-card {
            text-align: center;
            padding: 40px 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 15px;
            transition: all 0.4s ease;
            transform: translateY(20px);
            opacity: 0;
            transition: transform 0.6s ease, opacity 0.6s ease;
            border: 1px solid rgba(100, 255, 218, 0.1);
        }

        .stat-card.visible {
            transform: translateY(0);
            opacity: 1;
        }

        .stat-card:hover {
            background: rgba(100, 255, 218, 0.15);
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 25px rgba(100, 255, 218, 0.1);
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(to right, var(--light-blue), var(--light-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Testimonials */
        .testimonials {
            
            
            
            padding: 100px 5%;
            position: relative;
            background: linear-gradient(to bottom, var(--gradient-end), var(--gradient-start));
        }

        .testimonial-container {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
            position: relative;
            height: 300px;
        }

        .testimonial-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.8s ease, transform 0.8s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 30px;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            transform: translateX(100px);
            border: 1px solid rgba(100, 255, 218, 0.2);
        }

        .testimonial-slide.active {
            opacity: 1;
            transform: translateX(0);
        }

        .testimonial-text {
            display: flex;
            align-items: center;
            font-size: 1.2rem;
            font-style: italic;
            margin-bottom: 30px;
            max-width: 600px;
        }

        .testimonial-author {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--light-blue);
        }

        .testimonial-role {
            color: var(--light-green);
            font-size: 0.9rem;
        }

        .testimonial-nav {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 10px;
        }

        .testimonial-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .testimonial-dot.active {
            background: var(--light-green);
            transform: scale(1.2);
            box-shadow: 0 0 10px var(--light-green);
        }

        /* CTA Section */
        .cta-section {
            padding: 100px 5%;
            text-align: center;
            background: linear-gradient(135deg, var(--gradient-start), var(--gradient-end));
            position: relative;
            overflow: hidden;
        }

        .cta-section h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
            background: linear-gradient(to right, var(--light-blue), var(--light-green));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .cta-section p {
            max-width: 700px;
            margin: 0 auto 40px;
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .cta-form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            gap: 15px;
        }

        .cta-form input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.15);
            color: white;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .cta-form input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 15px rgba(100, 255, 218, 0.4);
        }

        .cta-form input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .cta-form button {
            background: var(--accent);
            color: var(--text-dark);
            border: none;
            padding: 0 30px;
            border-radius: 30px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(100, 255, 218, 0.4);
        }

        .cta-form button:hover {
            background: #1abc9c;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(100, 255, 218, 0.6);
        }

        /* Footer */
        footer {
            padding: 80px 5% 30px;
            background: rgba(10, 25, 47, 0.95);
            border-top: 1px solid rgba(100, 255, 218, 0.1);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-col h3 {
            font-size: 1.5rem;
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
            color: var(--light-blue);
        }

        .footer-col h3:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 40px;
            height: 3px;
            background: var(--light-green);
        }

        .footer-col p {
            margin-bottom: 20px;
            opacity: 0.8;
        }

        .footer-links a {
            display: block;
            color: var(--text-light);
            text-decoration: none;
            margin-bottom: 12px;
            opacity: 0.8;
            transition: all 0.3s ease;
            position: relative;
            padding-left: 20px;
        }

        .footer-links a:before {
            content: '›';
            position: absolute;
            left: 0;
            color: var(--light-green);
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            opacity: 1;
            padding-left: 25px;
            color: var(--light-blue);
        }

        .footer-links a:hover:before {
            color: var(--light-blue);
            transform: translateX(5px);
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(100, 255, 218, 0.1);
            border-radius: 50%;
            color: var(--light-blue);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--light-blue);
            color: var(--dark-blue);
            transform: translateY(-3px) scale(1.1);
            box-shadow: 0 0 15px rgba(100, 255, 218, 0.5);
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            margin-top: 50px;
            border-top: 1px solid rgba(100, 255, 218, 0.1);
            opacity: 0.7;
        }

        /* Animation Elements */
        .floating {
            animation: floating 8s ease-in-out infinite;
        }

        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
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
            transition: opacity 0.6s ease, transform 0.8s ease;
        }
        
        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* 3D Animation Container */
        .three-d-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 3.5rem;
            }
            .hero-animation {
                width: 400px;
                height: 400px;
                right: 5%;
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
            }
            
            nav {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 80%;
                height: calc(100vh - 80px);
                background: rgba(10, 25, 47, 0.95);
                backdrop-filter: blur(10px);
                flex-direction: column;
                transition: all 0.4s ease;
                padding: 20px;
            }
            
            nav.active {
                left: 0;
            }
            
            nav ul {
                flex-direction: column;
                width: 100%;
            }
            
            nav ul li {
                margin: 15px 0;
            }
            
            .hero {
                flex-direction: column;
                text-align: center;
                padding-top: 120px;
                padding-bottom: 50px;
            }
            
            .hero-content {
                max-width: 100%;
                margin-bottom: 50px;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .hero-animation {
                position: relative;
                right: auto;
                top: auto;
                transform: none;
                width: 100%;
                max-width: 400px;
                margin: 0 auto;
            }
            
            .cta-form {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .feature-card, .stat-card {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>

<!-- WhatsApp Floating Button -->
<a
  href="https://wa.me/923475880287"  
  class="whatsapp-float"
  target="_blank"
  rel="noopener noreferrer">

  <img
    src="https://cdn-icons-png.flaticon.com/512/733/733585.png"
    alt="Chat on WhatsApp"
    width="50"
    height="50"
/>
</a>

<!-- CSS -->
<style>
  .whatsapp-float {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 999;
    background-color: #25D366;
    border-radius: 50%;
    padding: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease;
  }

  .whatsapp-float:hover {
    transform: scale(1.1);
  }
</style>

    <!-- Video Background -->
    <div class="video-background">
        <video autoplay muted loop>
            <source src="my.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
    </div>

    <!-- Header -->
    <header id="header">
        <div class="logo">
            <i class="fas fa-leaf"></i> EcoSolutions
        </div>
        <div class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </div>
        <nav id="nav">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#stats">Stats</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="login.php" class="cta-button">login</a></li>
                <li><a href="dashboard.php" class="cta-button">Dashbaord</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Transforming Sustainability with Green Technology</h1>
            <p>We provide innovative eco-friendly solutions to help businesses reduce their carbon footprint and embrace a sustainable future.</p>
            <div class="hero-buttons">
                <a href="#" class="cta-button pulse">Pickup request</a>
                <a href="#" class="btn-secondary">Learn More</a>
            </div>
        </div>
        <div class="hero-animation" id="heroAnimation"></div>
        <div class="three-d-container" id="threeDContainer"></div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <h2 class="section-title animate-on-scroll">Our Solutions</h2>
        <div class="features-grid">
            <div class="feature-card floating animate-on-scroll">
                <div class="feature-icon">
                    <i class="fas fa-solar-panel"></i>
                </div>
                <h3>Renewable Energy</h3>
                <p>Solar, wind, and hydro solutions tailored to your energy needs.</p>
            </div>
            <div class="feature-card floating animate-on-scroll" style="animation-delay: 0.5s;">
                <div class="feature-icon">
                    <i class="fas fa-recycle"></i>
                </div>
                <h3>Waste Management</h3>
                <p>Advanced recycling and waste reduction systems.</p>
            </div>
            <div class="feature-card floating animate-on-scroll" style="animation-delay: 1s;">
                <div class="feature-icon">
                    <i class="fas fa-water"></i>
                </div>
                <h3>Water Conservation</h3>
                <p>Smart water management solutions for sustainable usage.</p>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats" id="stats">
        <h2 class="section-title animate-on-scroll">Our Impact</h2>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number" data-count="125">0</div>
                <h4>Projects Completed</h4>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-count="98">0</div>
                <h4>Client Satisfaction</h4>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-count="2500">0</div>
                <h4>Tons CO2 Reduced</h4>
            </div>
            <div class="stat-card">
                <div class="stat-number" data-count="15">0</div>
                <h4>Countries Served</h4>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials" id="testimonials">
        <h2 class="section-title animate-on-scroll">Client Testimonials</h2>
        <div class="testimonial-container">
            <div class="testimonial-slide active">
                <p class="testimonial-text">"EcoSolutions transformed our company's sustainability efforts. We've reduced our carbon footprint by 40% in just one year with their innovative solutions."</p>
                <p class="testimonial-author">Sarah Johnson</p>
                <p class="testimonial-role">CEO, GreenTech Industries</p>
            </div>
            <div class="testimonial-slide">
                <p class="testimonial-text">"The team at EcoSolutions provided exceptional service and tailored solutions that perfectly matched our environmental goals. Highly recommended!"</p>
                <p class="testimonial-author">Michael Chen</p>
                <p class="testimonial-role">Sustainability Director, GlobalCorp</p>
            </div>
            <div class="testimonial-slide">
                <p class="testimonial-text">"Their expertise in renewable energy helped us transition to 100% green energy sources, significantly reducing our operational costs."</p>
                <p class="testimonial-author">Emma Rodriguez</p>
                <p class="testimonial-role">Operations Manager, EcoManufacturing</p>
            </div>
        </div>
        <div class="testimonial-nav">
            <div class="testimonial-dot active" data-slide="0"></div>
            <div class="testimonial-dot" data-slide="1"></div>
            <div class="testimonial-dot" data-slide="2"></div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="contact">
        <h2 class="animate-on-scroll">Ready to Make a Difference?</h2>
        <p class="animate-on-scroll">Join hundreds of businesses that have already transformed their sustainability practices with our solutions.</p>
        <div class="cta-form animate-on-scroll">
            <input type="email" placeholder="Enter your email address">
            <button>Get Started</button>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-grid">
            <div class="footer-col">
                <h3>EcoSolutions</h3>
                <p>Providing innovative green technology solutions for a sustainable future.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h3>Quick Links</h3>
                <div class="footer-links">
                    <a href="#home">Home</a>
                    <a href="#features">Solutions</a>
                    <a href="#stats">Results</a>
                    <a href="#testimonials">Testimonials</a>
                    <a href="#contact">Contact</a>
                </div>
            </div>
            <div class="footer-col">
                <h3>Our Services</h3>
                <div class="footer-links">
                    <a href="#">Renewable Energy</a>
                    <a href="#">Waste Management</a>
                    <a href="#">Water Conservation</a>
                    <a href="#">Carbon Footprint Analysis</a>
                    <a href="#">Sustainability Consulting</a>
                </div>
            </div>
            <div class="footer-col">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123 Green Street, Eco City</p>
                <p><i class="fas fa-phone"></i> (123) 456-7890</p>
                <p><i class="fas fa-envelope"></i> info@ecosolutions.com</p>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2023 EcoSolutions. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const nav = document.getElementById('nav');
        
        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('active');
        });

        // Close menu when clicking a link
        const navLinks = document.querySelectorAll('nav ul li a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                nav.classList.remove('active');
            });
        });

        // Testimonial slider
        const testimonialSlides = document.querySelectorAll('.testimonial-slide');
        const testimonialDots = document.querySelectorAll('.testimonial-dot');
        let currentSlide = 0;

        function showSlide(n) {
            testimonialSlides.forEach(slide => slide.classList.remove('active'));
            testimonialDots.forEach(dot => dot.classList.remove('active'));
            
            currentSlide = (n + testimonialSlides.length) % testimonialSlides.length;
            
            testimonialSlides[currentSlide].classList.add('active');
            testimonialDots[currentSlide].classList.add('active');
        }

        testimonialDots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
            });
        });

        // Auto slide testimonials
        setInterval(() => {
            showSlide(currentSlide + 1);
        }, 5000);

        // Stats counter animation
        const statNumbers = document.querySelectorAll('.stat-number');
        const statsSection = document.querySelector('.stats');
        const statCards = document.querySelectorAll('.stat-card');

        function animateValue(obj, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const value = Math.floor(progress * (end - start) + start);
                obj.textContent = value.toLocaleString();
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        function initCounters() {
            statNumbers.forEach(number => {
                const target = parseInt(number.getAttribute('data-count'));
                animateValue(number, 0, target, 2000);
            });
            
            // Make stat cards visible
            statCards.forEach(card => {
                card.classList.add('visible');
            });
        }

        // Initialize counters when section is in view
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    initCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        statsObserver.observe(statsSection);

        // Scroll animations for elements
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

        // Enhanced 3D Animation with Three.js
        function init3DAnimation() {
            const container = document.getElementById('threeDContainer');
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 15;

            const renderer = new THREE.WebGLRenderer({ alpha: true });
            renderer.setSize(container.clientWidth, container.clientHeight);
            renderer.setClearColor(0x000000, 0);
            container.appendChild(renderer.domElement);

            // Create particles
            const particlesGeometry = new THREE.BufferGeometry();
            const particlesCount = 1500;
            const posArray = new Float32Array(particlesCount * 3);
            const colorArray = new Float32Array(particlesCount * 3);
            
            for (let i = 0; i < particlesCount * 3; i += 3) {
                posArray[i] = (Math.random() - 0.5) * 50;
                posArray[i+1] = (Math.random() - 0.5) * 50;
                posArray[i+2] = (Math.random() - 0.5) * 50;
                
                // Assign colors based on position for gradient effect
                colorArray[i] = 0.07;   // R (dark blue)
                colorArray[i+1] = 0.5 + Math.random() * 0.5;  // G (green)
                colorArray[i+2] = 0.7 + Math.random() * 0.3;  // B (light blue)
            }
            
            particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
            particlesGeometry.setAttribute('color', new THREE.BufferAttribute(colorArray, 3));
            
            const particlesMaterial = new THREE.PointsMaterial({
                size: 0.1,
                vertexColors: true,
                transparent: true,
                opacity: 0.8,
                sizeAttenuation: true
            });
            
            const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
            scene.add(particlesMesh);
            
            // Create floating shapes
            const shapes = [];
            const geometryTypes = [
                new THREE.IcosahedronGeometry(1, 0),
                new THREE.DodecahedronGeometry(1, 0),
                new THREE.TorusKnotGeometry(0.8, 0.3, 100, 16)
            ];
            
            // Add lights
            const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
            scene.add(ambientLight);
            
            const directionalLight = new THREE.DirectionalLight(0x64ffda, 1);
            directionalLight.position.set(1, 1, 1);
            scene.add(directionalLight);
            
            const pointLight = new THREE.PointLight(0x1abc9c, 2, 50);
            pointLight.position.set(5, 5, 5);
            scene.add(pointLight);
            
            // Create shapes
            for (let i = 0; i < 20; i++) {
                const geometry = geometryTypes[Math.floor(Math.random() * geometryTypes.length)];
                const material = new THREE.MeshPhongMaterial({
                    color: new THREE.Color(Math.random() * 0.2 + 0.1, Math.random() * 0.5 + 0.5, Math.random() * 0.3 + 0.7),
                    transparent: true,
                    opacity: 0.7,
                    shininess: 100,
                    wireframe: Math.random() > 0.5
                });
                
                const shape = new THREE.Mesh(geometry, material);
                
                shape.position.x = (Math.random() - 0.5) * 30;
                shape.position.y = (Math.random() - 0.5) * 30;
                shape.position.z = (Math.random() - 0.5) * 30;
                
                shape.rotation.x = Math.random() * Math.PI;
                shape.rotation.y = Math.random() * Math.PI;
                
                const scale = Math.random() * 1.5 + 0.5;
                shape.scale.set(scale, scale, scale);
                
                scene.add(shape);
                shapes.push({
                    mesh: shape,
                    speed: {
                        x: (Math.random() - 0.5) * 0.01,
                        y: (Math.random() - 0.5) * 0.01,
                        z: (Math.random() - 0.5) * 0.01
                    },
                    rotation: {
                        x: (Math.random() - 0.5) * 0.01,
                        y: (Math.random() - 0.5) * 0.01,
                        z: (Math.random() - 0.5) * 0.01
                    }
                });
            }
            
            // Animation loop
            function animate() {
                requestAnimationFrame(animate);
                
                // Animate particles
                particlesMesh.rotation.y += 0.001;
                
                // Animate shapes
                shapes.forEach(shape => {
                    shape.mesh.rotation.x += shape.rotation.x;
                    shape.mesh.rotation.y += shape.rotation.y;
                    shape.mesh.rotation.z += shape.rotation.z;
                    
                    shape.mesh.position.x += shape.speed.x;
                    shape.mesh.position.y += shape.speed.y;
                    shape.mesh.position.z += shape.speed.z;
                    
                    // Boundary check with smooth turn
                    if (Math.abs(shape.mesh.position.x) > 25) shape.speed.x *= -1;
                    if (Math.abs(shape.mesh.position.y) > 25) shape.speed.y *= -1;
                    if (Math.abs(shape.mesh.position.z) > 25) shape.speed.z *= -1;
                });
                
                renderer.render(scene, camera);
            }
            
            // Handle window resize
            window.addEventListener('resize', () => {
                camera.aspect = container.clientWidth / container.clientHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(container.clientWidth, container.clientHeight);
            });
            
            animate();
        }
        
        // Initialize animation when page loads
        window.addEventListener('load', init3DAnimation);
    </script>
</body>
</html>