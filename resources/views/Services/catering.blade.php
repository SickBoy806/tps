@extends('layouts.app')
@section('title', 'Services')
@section('content')
<div class="container1">
    <section class="hero">
        <div class="container1">
            <div class="hero-content">
                <h1>Tanzania Police School Catering Services</h1>
                <p>Professional catering for official functions, training events, ceremonies, and special occasions with exceptional service.</p>
                <a href="#contact" class="cta-btn">Book Our Services</a>
            </div>
        </div>
    </section>

    <section class="section" id="services">
        <div class="container1">
            <div class="section-title">
                <h2>Our Catering Services</h2>
            </div>
            <div class="services-grid">
                <div class="service-card" style="--i:1">
                    <img src="/api/placeholder/400/300" alt="Official Functions Catering" class="service-img">
                    <div class="service-content">
                        <h3>Official Functions</h3>
                        <p>Sophisticated catering solutions for government meetings, official ceremonies, and diplomatic events with attention to protocol and presentation.</p>
                    </div>
                </div>
                <div class="service-card" style="--i:2">
                    <img src="/api/placeholder/400/300" alt="Training Events Catering" class="service-img">
                    <div class="service-content">
                        <h3>Training Events</h3>
                        <p>Nutritionally balanced meals and refreshments for training courses, workshops, and seminars, designed to maintain focus and energy.</p>
                    </div>
                </div>
                <div class="service-card" style="--i:3">
                    <img src="/api/placeholder/400/300" alt="Special Occasions Catering" class="service-img">
                    <div class="service-content">
                        <h3>Special Occasions</h3>
                        <p>Elegant catering for graduations, award ceremonies, retirements, and special institutional celebrations with customized menus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section menu-section" id="menu">
        <div class="container1">
            <div class="section-title">
                <h2>Our Menu Options</h2>
            </div>
            <div x-data="{activeTab: 'breakfast'}">
                <div class="menu-tabs">
                    <button class="menu-tab" :class="{'active': activeTab === 'breakfast'}" @click="activeTab = 'breakfast'">Breakfast</button>
                    <button class="menu-tab" :class="{'active': activeTab === 'lunch'}" @click="activeTab = 'lunch'">Lunch</button>
                    <button class="menu-tab" :class="{'active': activeTab === 'dinner'}" @click="activeTab = 'dinner'">Dinner</button>
                    <button class="menu-tab" :class="{'active': activeTab === 'refreshments'}" @click="activeTab = 'refreshments'">Refreshments</button>
                </div>
                
                <div class="menu-content" x-show="activeTab === 'breakfast'">
                    <div class="menu-item" style="--i:1">
                        <img src="/api/placeholder/120/120" alt="Continental Breakfast" class="menu-item-img">
                        <div class="menu-item-content">
                            <div class="menu-item-header">
                                <h3 class="menu-item-title">Continental Breakfast</h3>
                                <span class="menu-item-price">15,000 TZS</span>
                            </div>
                            <p class="menu-item-desc">Selection of pastries, breads, fresh fruit, yogurt, tea, coffee, and fruit juices.</p>
                        </div>
                    </div>
                    <div class="menu-item" style="--i:2">
                        <img src="/api/placeholder/120/120" alt="Full English Breakfast" class="menu-item-img">
                        <div class="menu-item-content">
                            <div class="menu-item-header">
                                <h3 class="menu-item-title">Traditional Breakfast</h3>
                                <span class="menu-item-price">20,000 TZS</span>
                            </div>
                            <p class="menu-item-desc">Eggs, sausages, beans, toast, grilled tomatoes, and breakfast potatoes with tea or coffee.</p>
                        </div>
                    </div>
                </div>
                
                <div class="menu-content" x-show="activeTab === 'lunch'">
                    <div class="menu-item" style="--i:1">
                        <img src="/api/placeholder/120/120" alt="Executive Lunch" class="menu-item-img">
                        <div class="menu-item-content">
                            <div class="menu-item-header">
                                <h3 class="menu-item-title">Executive Lunch</h3>
                                <span class="menu-item-price">25,000 TZS</span>
                            </div>
                            <p class="menu-item-desc">Three-course meal with starter, main course options, and dessert with refreshments.</p>
                        </div>
                    </div>
                    <div class="menu-item" style="--i:2">
                        <img src="/api/placeholder/120/120" alt="Buffet Lunch" class="menu-item-img">
                        <div class="menu-item-content">
                            <div class="menu-item-header">
                                <h3 class="menu-item-title">Buffet Lunch</h3>
                                <span class="menu-item-price">22,000 TZS</span>
                            </div>
                            <p class="menu-item-desc">Selection of salads, main dishes including rice, ugali, meat and vegetable options, and desserts.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Added missing dinner content -->
                <div class="menu-content" x-show="activeTab === 'dinner'">
                    <div class="menu-item" style="--i:1">
                        <img src="/api/placeholder/120/120" alt="Formal Dinner" class="menu-item-img">
                        <div class="menu-item-content">
                            <div class="menu-item-header">
                                <h3 class="menu-item-title">Formal Dinner</h3>
                                <span class="menu-item-price">30,000 TZS</span>
                            </div>
                            <p class="menu-item-desc">Elegant four-course meal with appetizer, soup or salad, main course, and dessert with beverage service.</p>
                        </div>
                    </div>
                    <div class="menu-item" style="--i:2">
                        <img src="/api/placeholder/120/120" alt="Gala Dinner" class="menu-item-img">
                        <div class="menu-item-content">
                            <div class="menu-item-header">
                                <h3 class="menu-item-title">Ceremonial Dinner</h3>
                                <span class="menu-item-price">35,000 TZS</span>
                            </div>
                            <p class="menu-item-desc">Premium dining experience with international cuisine options, served with professional waitstaff.</p>
                        </div>
                    </div>
                </div>
                
                <!-- Added missing refreshments content -->
                <div class="menu-content" x-show="activeTab === 'refreshments'">
                    <div class="menu-item" style="--i:1">
                        <img src="/api/placeholder/120/120" alt="Coffee Break" class="menu-item-img">
                        <div class="menu-item-content">
                            <div class="menu-item-header">
                                <h3 class="menu-item-title">Coffee Break</h3>
                                <span class="menu-item-price">8,000 TZS</span>
                            </div>
                            <p class="menu-item-desc">Coffee, tea, and a selection of pastries or light snacks for short breaks.</p>
                        </div>
                    </div>
                    <div class="menu-item" style="--i:2">
                        <img src="/api/placeholder/120/120" alt="Refreshment Package" class="menu-item-img">
                        <div class="menu-item-content">
                            <div class="menu-item-header">
                                <h3 class="menu-item-title">Full Refreshment Package</h3>
                                <span class="menu-item-price">12,000 TZS</span>
                            </div>
                            <p class="menu-item-desc">Assorted beverages, fresh fruits, pastries, and light finger foods for extended breaks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="contact">
        <div class="container1">
            <div class="section-title">
                <h2>Book Our Services</h2>
            </div>
            <div class="contact-form-container1">
                <div style="color: white;">
    <h2 style="color: white;">Contact Information</h2>
                     
    <p style="color: white;">For inquiries about our catering services,
     please contact us using the form or through the information below.
     We're available to discuss your requirements and provide customized solutions for your events.</p>
                     
    <p style="color: white;"><strong style="color: white;">Phone:</strong> +255 123 456 789                      
    <strong style="color: white;">Email:</strong> catering@tanzaniapolice.edu.tz                      
    <strong style="color: white;">Address:</strong> Tanzania Police School, Moshi, Tanzania</p>
</div>
                <div class="form-wrapper">
                    <form id="booking-form">
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="event-type" class="form-label">Event Type</label>
                            <select id="event-type" class="form-control" required>
                                <option value="">Select Event Type</option>
                                <option value="official">Official Function</option>
                                <option value="training">Training Event</option>
                                <option value="special">Special Occasion</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message" class="form-label">Special Requirements</label>
                            <textarea id="message" class="form-control" rows="4"></textarea>
                        </div>
                        <button type="submit" class="submit-btn">Submit Booking Request</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Register ScrollTrigger plugin
        gsap.registerPlugin(ScrollTrigger);
        
        // Initialize animations
        gsap.from(".service-card", {
            duration: 0.8, 
            y: 50, 
            opacity: 0, 
            stagger: 0.2,
            scrollTrigger: {
                trigger: ".services-grid",
                start: "top 80%"
            }
        });
        
        gsap.from(".contact-info", {
            duration: 0.8,
            x: -50,
            opacity: 0,
            scrollTrigger: {
                trigger: ".contact-form-container1",
                start: "top 80%"
            }
        });
        
        gsap.from(".form-wrapper", {
            duration: 0.8,
            x: 50,
            opacity: 0,
            scrollTrigger: {
                trigger: ".contact-form-container1",
                start: "top 80%"
            }
        });
        
        // Form submission
        document.getElementById('booking-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your booking request. Our team will contact you shortly to confirm your booking.');
            this.reset();
        });
    });
</script>

<style>
    :root {
        --primary: #103783; /* Deep blue (Tanzania Police) */
        --secondary: #1D5597; /* Medium blue */
        --accent: #FFB81C; /* Gold accent */
        --light: #E9F0FA; /* Light blue */
        --dark: #002147; /* Very dark blue */
        --white: #ffffff;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: var(--light);
        color: var(--dark);
        overflow-x: hidden;
    }

    .container1 {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .hero {
        position: relative;
        height: 60vh;
        display: flex;
        margin-top: 70px;
        align-items: center;
        background: url('/api/placeholder/1200/600') center/cover no-repeat;
        background-attachment: fixed;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 33, 71, 0.7);
    }

    .hero-content {
        position: relative;
        z-index: 1;
        text-align: left;
        padding: 0 2rem;
        max-width: 650px;
        animation: fadeIn 1s forwards;
    }

    .hero-content h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: var(--white);
        position: relative;
        display: inline-block;
    }

    .hero-content h1::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 100px;
        height: 4px;
        background-color: var(--accent);
    }

    .hero-content p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        color: var(--white);
    }

    .cta-btn {
        display: inline-block;
        background-color: var(--accent);
        color: var(--dark);
        padding: 0.8rem 2rem;
        font-weight: 600;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s ease;
        border: 2px solid var(--accent);
    }

    .cta-btn:hover {
        background-color: transparent;
        color: var(--accent);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .section {
        padding: 4rem 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .section-title h2 {
        font-size: 2.5rem;
        color: var(--primary);
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background-color: var(--accent);
        left: 50%;
        transform: translateX(-50%);
        bottom: -10px;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .service-card {
        background-color: var(--white);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: fadeUp 0.6s forwards;
        animation-delay: calc(var(--i) * 0.1s);
        opacity: 0;
    }

    .service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .service-img {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .service-content {
        padding: 1.5rem;
    }

    .service-content h3 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: var(--primary);
    }

    .service-content p {
        color: #666;
        margin-bottom: 1rem;
    }

    .menu-section {
        background-color: var(--white);
    }

    .menu-tabs {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
    }

    .menu-tab {
        padding: 0.7rem 1.5rem;
        background-color: var(--light);
        color: var(--primary);
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .menu-tab.active, .menu-tab:hover {
        background-color: var(--primary);
        color: var(--white);
    }

    .menu-content {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        justify-content: center;
    }

    .menu-item {
        display: flex;
        background-color: var(--light);
        border-radius: 8px;
        overflow: hidden;
        width: 100%;
        max-width: 550px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        animation: fadeUp 0.6s forwards;
        animation-delay: calc(var(--i) * 0.1s);
        opacity: 0;
    }

    .menu-item-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
    }

    .menu-item-content {
        padding: 1rem;
        flex: 1;
    }

    .menu-item-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 0.5rem;
    }

    .menu-item-title {
        font-size: 1.2rem;
        color: var(--primary);
    }

    .menu-item-price {
        font-weight: 700;
        color: var(--accent);
        background-color: rgba(255, 184, 28, 0.1);
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
    }

    .menu-item-desc {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 0.5rem;
    }

    .contact-form-container1 {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 3rem;
        align-items: center;
    }

    .contact-info {
        animation: fadeLeft 0.6s forwards;
        opacity: 0;
    }

    .contact-info h3 {
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        color: var(--primary);
    }

    .contact-info p {
        margin-bottom: 1.5rem;
        line-height: 1.6;
        color: var(--dark); /* Override the orange color */
    }

    .form-wrapper {
        background-color: var(--white);
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        animation: fadeRight 0.6s forwards;
        opacity: 0;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--primary);
    }

    .form-control {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 2px rgba(16, 55, 131, 0.2);
    }

    .submit-btn {
        background-color: var(--primary);
        color: var(--white);
        border: none;
        padding: 0.8rem 1.5rem;
        font-weight: 600;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }

    .submit-btn:hover {
        background-color: var(--secondary);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeLeft {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes fadeRight {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 2.5rem;
        }
        .contact-form-container1 {
            gap: 2rem;
        }
    }

    /* Override conflicting styles */
    .service-content h3 {
        color: var(--primary); /* Override aquamarine color */
    }
    
    .service-content p {
        color: #666; /* Override orange color */
    }
</style>
@endsection