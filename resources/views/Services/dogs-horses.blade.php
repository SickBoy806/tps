@extends('layouts.app')

@section('title', 'Driving')

@section('content')
<nav class="secondary-navbar" id="navbar">
        <ul>
            <li><a href="#history">History</a></li>
            <li><a href="#units">Units</a></li>
            <li><a href="#statistics">Statistics</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanzania Police School Moshi - Dog and Horse Units</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
            scroll-behavior: smooth;
        }
    .secondary-navbar {
    background-color: #003366;
    top: 50px; /* Adjust this value based on your main navbar height */
    z-index: 80; /* Slightly lower than main navbar z-index */
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
    padding-top: 40px; 
}
        .secondary-navbar.scrolled {
            padding: 5px 0;
            background-color: rgba(0, 51, 102, 0.9);
        }
        .secondary-navbar ul {
            display: flex;
            list-style: none;
            justify-content: center;
            margin: 0;
            padding: 0;
        }
        .secondary-navbar li {
            margin: 0 15px;
        }
        .secondary-navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            transition: all 0.3s ease;
            position: relative;
        }
        .secondary-navbar a:hover {
            background-color: #00254d;
            border-radius: 5px;
            transform: translateY(-2px);
        }
        .secondary-navbar a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: white;
            transition: all 0.3s ease;
        }
        .secondary-navbar a:hover::after {
            width: 80%;
            left: 10%;
        }
        .hero {
            background-image: url('/api/placeholder/1200/400');
            background-size: cover;
            background-position: center;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 1;
        }
        .hero-content {
            position: relative;
            z-index: 2;
            animation: fadeInUp 1s ease;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .section {
            margin-bottom: 40px;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
        }
        .section.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .section:hover {
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: translateY(-5px);
        }
        h1, h2, h3 {
            color: #003366;
        }
        .units-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        .unit {
            flex: 1;
            min-width: 300px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .unit:hover {
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .unit::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 0;
            background-color: #003366;
            transition: height 0.3s ease;
        }
        .unit:hover::before {
            height: 100%;
        }
        .stats {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }
        .stat-card {
            flex: 1;
            min-width: 150px;
            background-color: #003366;
            color: white;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .stat-card::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: -100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: all 0.5s ease;
        }
        .stat-card:hover::after {
            left: 100%;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            margin: 10px 0;
            opacity: 0;
            transform: scale(0.5);
            transition: all 0.5s ease;
        }
        .stat-card.visible .stat-number {
            opacity: 1;
            transform: scale(1);
        }
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }
        .gallery-item {
            height: 200px;
            background-color: #ddd;
            background-size: cover;
            background-position: center;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .gallery-item::after {
            content: 'Click to View';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0,0,0,0.6);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            opacity: 0;
            transition: all 0.3s ease;
        }
        .gallery-item:hover::after {
            opacity: 1;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: white;
            max-width: 80%;
            max-height: 80%;
            border-radius: 5px;
            position: relative;
            overflow: hidden;
            animation: zoomIn 0.3s ease;
        }
        .modal-image {
            width: 100%;
            height: auto;
        }
        .close-modal {
            position: absolute;
            top: 10px;
            right: 10px;
            color: white;
            font-size: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .close-modal:hover {
            transform: rotate(90deg);
        }
        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .contact-card {
            flex: 1;
            min-width: 250px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .contact-card:hover {
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            transform: translateY(-5px);
        }
        .contact-form {
            margin-top: 30px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #003366;
            box-shadow: 0 0 5px rgba(0,51,102,0.3);
            outline: none;
        }
        .btn {
            background-color: #003366;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn:hover {
            background-color: #00254d;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.1);
        }
        .progress-container {
            position: fixed;
            top: 0;
            width: 100%;
            height: 4px;
            background: transparent;
            z-index: 1000;
        }
        .progress-bar {
            height: 4px;
            background: #003366;
            width: 0%;
            transition: width 0.3s ease;
        }
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #003366;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            opacity: 0;
            transition: all 0.3s ease;
            transform: translateY(100px);
            box-shadow: 0 5px 10px rgba(0,0,0,0.2);
            z-index: 99;
        }
        .back-to-top.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .back-to-top:hover {
            background-color: #00254d;
            transform: translateY(-5px) scale(1.1);
        }
        .tab-content {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        .tab-content.active {
            display: block;
        }
        .tabs {
            display: flex;
            gap: 5px;
            margin-bottom: 20px;
        }
        .tab {
            padding: 10px 15px;
            background-color: #f1f1f1;
            border-radius: 5px 5px 0 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .tab:hover {
            background-color: #ddd;
        }
        .tab.active {
            background-color: #003366;
            color: white;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .counter {
            display: inline-block;
            animation: countUp 2s ease forwards;
        }
        @keyframes countUp {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <!-- Progress bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    

    <!-- Hero section -->
    <div class="hero">
        <div class="hero-content">
            <h1>Tanzania Police School Moshi</h1>
            <h2>Dog and Horse Units</h2>
        </div>
    </div>

    <div class="container">
        <!-- History Section -->
        <section id="history" class="section">
            <h2>Our History</h2>
            <p>Established in 1958, the Tanzania Police School Moshi has been a center of excellence for police training in East Africa. The Dog and Horse Units were formally introduced in 1965 as specialized departments to enhance security operations, border patrol, and ceremonial functions.</p>
            <p>Over the decades, these units have evolved to incorporate modern training techniques while maintaining the proud traditions of the Tanzania Police Force. Our canine and equestrian teams have represented Tanzania in international competitions and have been recognized for their outstanding service in various security operations across the region.</p>
        </section>

        <!-- Units Section -->
        <section id="units" class="section">
            <h2>Our Specialized Units</h2>
            
            <div class="tabs">
                <div class="tab active" data-tab="dog-unit">Dog Unit</div>
                <div class="tab" data-tab="cavalry-unit">Cavalry Unit</div>
            </div>
            
            <div class="units-container">
                <!-- Dog Unit -->
                <div id="dog-unit-content" class="tab-content active">
                    <div class="unit">
                        <h3>Dog Unit</h3>
                        <p>The Dog Unit (K9) at Tanzania Police School Moshi specializes in training and deploying service dogs for various police operations including:</p>
                        <ul>
                            <li>Narcotics detection</li>
                            <li>Explosives detection</li>
                            <li>Search and rescue operations</li>
                            <li>Criminal apprehension</li>
                            <li>Border patrol and security</li>
                        </ul>
                        <p>Our unit primarily works with German Shepherds, Belgian Malinois, and Labrador Retrievers. Each dog undergoes an intensive 16-week basic training program followed by specialized training in their designated field.</p>
                        <button class="btn" id="learnMoreDogs">Learn More About Our Dogs</button>
                    </div>
                </div>

                <!-- Cavalry Unit -->
                <div id="cavalry-unit-content" class="tab-content">
                    <div class="unit">
                        <h3>Cavalry Unit</h3>
                        <p>The Cavalry Unit maintains the proud equestrian tradition of the Tanzania Police Force. Our mounted officers fulfill various roles including:</p>
                        <ul>
                            <li>Ceremonial duties for state functions</li>
                            <li>Crowd control and public order maintenance</li>
                            <li>Patrol of rough terrain and remote areas</li>
                            <li>Community policing and public relations</li>
                        </ul>
                        <p>Our stable houses primarily Thoroughbreds and local crossbreeds known for their strength and adaptability to Tanzania's diverse climate. Training for cavalry officers includes both equestrian skills and specialized police tactics on horseback.</p>
                        <button class="btn" id="learnMoreHorses">Learn More About Our Horses</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section id="statistics" class="section">
            <h2>Unit Statistics</h2>
            <div class="stats" id="mainStats">
                <div class="stat-card">
                    <h3>Service Dogs</h3>
                    <div class="stat-number"><span class="counter" data-target="42">0</span></div>
                    <p>Active in service</p>
                </div>
                <div class="stat-card">
                    <h3>Horses</h3>
                    <div class="stat-number"><span class="counter" data-target="28">0</span></div>
                    <p>In the cavalry</p>
                </div>
                <div class="stat-card">
                    <h3>Annual Operations</h3>
                    <div class="stat-number"><span class="counter" data-target="120">0</span>+</div>
                    <p>Successful missions</p>
                </div>
                <div class="stat-card">
                    <h3>Personnel</h3>
                    <div class="stat-number"><span class="counter" data-target="85">0</span></div>
                    <p>Specialized officers</p>
                </div>
            </div>

            <h3>Training Statistics</h3>
            <div class="stats" id="trainingStats">
                <div class="stat-card">
                    <h3>Dogs Trained</h3>
                    <div class="stat-number"><span class="counter" data-target="18">0</span></div>
                    <p>Annually</p>
                </div>
                <div class="stat-card">
                    <h3>Cavalry Officers</h3>
                    <div class="stat-number"><span class="counter" data-target="15">0</span></div>
                    <p>Trained annually</p>
                </div>
                <div class="stat-card">
                    <h3>Training Success</h3>
                    <div class="stat-number"><span class="counter" data-target="92">0</span>%</div>
                    <p>Completion rate</p>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="section">
            <h2>Photo Gallery</h2>
            <div class="gallery">
                <div class="gallery-item" style="background-image: url('/api/placeholder/300/200')" data-img="/api/placeholder/800/600"></div>
                <div class="gallery-item" style="background-image: url('/api/placeholder/300/200')" data-img="/api/placeholder/800/600"></div>
                <div class="gallery-item" style="background-image: url('/api/placeholder/300/200')" data-img="/api/placeholder/800/600"></div>
                <div class="gallery-item" style="background-image: url('/api/placeholder/300/200')" data-img="/api/placeholder/800/600"></div>
                <div class="gallery-item" style="background-image: url('/api/placeholder/300/200')" data-img="/api/placeholder/800/600"></div>
                <div class="gallery-item" style="background-image: url('/api/placeholder/300/200')" data-img="/api/placeholder/800/600"></div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="section">
            <h2>Contact Information</h2>
            <div class="contact-info">
                <div class="contact-card">
                    <h3>Dog Unit Command</h3>
                    <p><strong>Officer in Charge:</strong> Commander James Makundi</p>
                    <p><strong>Phone:</strong> +255 123 456 789</p>
                    <p><strong>Email:</strong> dogunit@tpsmoshi.go.tz</p>
                    <p><strong>Office Hours:</strong> 8:00 AM - 4:00 PM (Monday to Friday)</p>
                </div>
                <div class="contact-card">
                    <h3>Cavalry Unit Command</h3>
                    <p><strong>Officer in Charge:</strong> Commander Sarah Mwambene</p>
                    <p><strong>Phone:</strong> +255 987 654 321</p>
                    <p><strong>Email:</strong> cavalry@tpsmoshi.go.tz</p>
                    <p><strong>Office Hours:</strong> 8:00 AM - 4:00 PM (Monday to Friday)</p>
                </div>
                <div class="contact-card">
                    <h3>General Inquiries</h3>
                    <p><strong>Address:</strong> Tanzania Police School Moshi, P.O. Box 3016, Moshi, Tanzania</p>
                    <p><strong>General Phone:</strong> +255 272 750 333</p>
                    <p><strong>Email:</strong> info@tpsmoshi.go.tz</p>
                    <p><strong>Visitor Hours:</strong> By appointment only</p>
                </div>
            </div>

            <div class="contact-form">
                <h3>Send us a Message</h3>
                <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select id="subject">
                            <option value="general">General Inquiry</option>
                            <option value="dog">Dog Unit Inquiry</option>
                            <option value="cavalry">Cavalry Unit Inquiry</option>
                            <option value="visit">Visit Request</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn">Send Message</button>
                </form>
            </div>
        </section>
    </div>

    <!-- Image Modal -->
    <div class="modal" id="imageModal">
        <span class="close-modal" id="closeModal">&times;</span>
        <div class="modal-content">
            <img class="modal-image" id="modalImage" src="" alt="Enlarged image">
        </div>
    </div>

    <!-- Back to top button -->
    <div class="back-to-top" id="backToTop">↑</div>

    <script>
        // When the document is loaded, run these functions
        document.addEventListener('DOMContentLoaded', function() {
            // Scroll animations
            const sections = document.querySelectorAll('.section');
            const navbar = document.getElementById('navbar');
            const backToTop = document.getElementById('backToTop');
            const progressBar = document.getElementById('progressBar');
            const statCards = document.querySelectorAll('.stat-card');
            const counters = document.querySelectorAll('.counter');
            
            // Tab functionality
            const tabs = document.querySelectorAll('.tab');
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));
                    // Add active class to current tab
                    tab.classList.add('active');
                    
                    // Hide all tab content
                    const tabContents = document.querySelectorAll('.tab-content');
                    tabContents.forEach(content => content.classList.remove('active'));
                    
                    // Show current tab content
                    const targetId = tab.getAttribute('data-tab') + '-content';
                    document.getElementById(targetId).classList.add('active');
                });
            });
            
            // Gallery modal functionality
            const galleryItems = document.querySelectorAll('.gallery-item');
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const closeModal = document.getElementById('closeModal');
            
            galleryItems.forEach(item => {
                item.addEventListener('click', () => {
                    modal.style.display = 'flex';
                    modalImg.src = item.getAttribute('data-img');
                });
            });
            
            closeModal.addEventListener('click', () => {
                modal.style.display = 'none';
            });
            
            window.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
            
            // Form submission handler
            const contactForm = document.getElementById('contactForm');
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const name = document.getElementById('name').value;
                alert(`Thank you, ${name}! Your message has been sent. We will get back to you shortly.`);
                contactForm.reset();
            });
            
            // Learn more buttons
            document.getElementById('learnMoreDogs').addEventListener('click', function() {
                alert('We have specialized training programs for our K9 units. Each dog is carefully selected and trained for specific tasks. Contact us to learn more about our training methods and capabilities.');
            });
            
            document.getElementById('learnMoreHorses').addEventListener('click', function() {
                alert('Our cavalry unit horses undergo rigorous training to prepare them for police duties. Each horse is paired with an officer who forms a lasting bond. Visit us to see our horses in action.');
            });
            
            // Update progress bar on scroll
            function updateProgressBar() {
                const windowHeight = window.innerHeight;
                const documentHeight = document.body.scrollHeight - windowHeight;
                const scrollPosition = window.scrollY;
                const progress = (scrollPosition / documentHeight) * 100;
                progressBar.style.width = progress + '%';
            }
            
            // Check for scroll position to animate sections and stats
            function checkScroll() {
    // Add scrolled class to navbar
    if (window.scrollY > 70) { /* Adjust based on where you want the effect to trigger */
        navbar.classList.add('scrolled');
        backToTop.classList.add('visible');
    } else {
        navbar.classList.remove('scrolled');
        backToTop.classList.remove('visible');
    }
                
                // Animate sections when they come into view
                sections.forEach(section => {
                    const sectionTop = section.getBoundingClientRect().top;
                    if (sectionTop < window.innerHeight - 100) {
                        section.classList.add('visible');
                    }
                });
                
                // Animate stats when they come into view
                statCards.forEach(card => {
                    const cardTop = card.getBoundingClientRect().top;
                    if (cardTop < window.innerHeight - 50) {
                        card.classList.add('visible');
                    }
                });
                
                updateProgressBar();
            }
            
            // Counter animation function
            function startCounters() {
                counters.forEach(counter => {
                    const target = +counter.getAttribute('data-target');
                    const duration = 2000; // 2 seconds
                    const incrementTime = 20; // Update every 20ms
                    const totalIncrements = duration / incrementTime;
                    const incrementValue = target / totalIncrements;
                    let currentValue = 0;
                    
                    const updateCounter = () => {
                        currentValue += incrementValue;
                        if (currentValue < target) {
                            counter.textContent = Math.ceil(currentValue);
                            setTimeout(updateCounter, incrementTime);
                        } else {
                            counter.textContent = target;
                        }
                    };
                    
                    const observer = new IntersectionObserver((entries) => {
                        if (entries[0].isIntersecting) {
                            updateCounter();
                            observer.disconnect();
                        }
                    });
                    
                    observer.observe(counter);
                });
            }
            
            // Back to top button functionality
            backToTop.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Smooth scroll for navbar links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                });
            });
            
            // Initialize all animations and event listeners
            window.addEventListener('scroll', checkScroll);
            checkScroll(); // Check on initial load
            startCounters(); // Start counters on initial load
        });
    </script>
</body>
</html>
@endsection