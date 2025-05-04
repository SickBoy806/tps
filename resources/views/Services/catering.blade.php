@extends('layouts.app')
@section('title', 'Services')
@section('content')
<div class="tps-wrapper">
    <section class="tps-hero">
        <div class="tps-container">
            <div class="tps-hero-content">
                <h1>Tanzania Police School Catering Services</h1>
                <p>Professional catering for official functions, training events, ceremonies, and special occasions with exceptional service.</p>
                <a href="#contact" class="tps-cta-btn">Book Our Services</a>
            </div>
        </div>
    </section>

    <section class="tps-section" id="services">
        <div class="tps-container">
            <div class="tps-section-title">
                <h2>Our Catering Services</h2>
            </div>
            <div class="tps-services-grid">
                <div class="tps-service-card" style="--i:1">
                    <img src="/api/placeholder/400/300" alt="Official Functions Catering" class="tps-service-img">
                    <div class="tps-service-content">
                        <h3>Official Functions</h3>
                        <p>Sophisticated catering solutions for government meetings, official ceremonies, and diplomatic events with attention to protocol and presentation.</p>
                    </div>
                </div>
                <div class="tps-service-card" style="--i:2">
                    <img src="/api/placeholder/400/300" alt="Training Events Catering" class="tps-service-img">
                    <div class="tps-service-content">
                        <h3>Training Events</h3>
                        <p>Nutritionally balanced meals and refreshments for training courses, workshops, and seminars, designed to maintain focus and energy.</p>
                    </div>
                </div>
                <div class="tps-service-card" style="--i:3">
                    <img src="/api/placeholder/400/300" alt="Special Occasions Catering" class="tps-service-img">
                    <div class="tps-service-content">
                        <h3>Special Occasions</h3>
                        <p>Elegant catering for graduations, award ceremonies, retirements, and special institutional celebrations with customized menus.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tps-section tps-menu-section" id="menu">
        <div class="tps-container">
            <div class="tps-section-title">
                <h2>Our Menu Options</h2>
            </div>
            <div x-data="{activeTab: 'breakfast'}">
                <div class="tps-menu-tabs">
                    <button class="tps-menu-tab" :class="{'active': activeTab === 'breakfast'}" @click="activeTab = 'breakfast'">Breakfast</button>
                    <button class="tps-menu-tab" :class="{'active': activeTab === 'lunch'}" @click="activeTab = 'lunch'">Lunch</button>
                    <button class="tps-menu-tab" :class="{'active': activeTab === 'dinner'}" @click="activeTab = 'dinner'">Dinner</button>
                    <button class="tps-menu-tab" :class="{'active': activeTab === 'refreshments'}" @click="activeTab = 'refreshments'">Refreshments</button>
                </div>
                
                <div class="tps-menu-content" x-show="activeTab === 'breakfast'">
                    <div class="tps-menu-item" style="--i:1">
                        <img src="/api/placeholder/120/120" alt="Continental Breakfast" class="tps-menu-item-img">
                        <div class="tps-menu-item-content">
                            <div class="tps-menu-item-header">
                                <h3 class="tps-menu-item-title">Continental Breakfast</h3>
                                <span class="tps-menu-item-price">15,000 TZS</span>
                            </div>
                            <p class="tps-menu-item-desc">Selection of pastries, breads, fresh fruit, yogurt, tea, coffee, and fruit juices.</p>
                        </div>
                    </div>
                    <div class="tps-menu-item" style="--i:2">
                        <img src="/api/placeholder/120/120" alt="Full English Breakfast" class="tps-menu-item-img">
                        <div class="tps-menu-item-content">
                            <div class="tps-menu-item-header">
                                <h3 class="tps-menu-item-title">Traditional Breakfast</h3>
                                <span class="tps-menu-item-price">20,000 TZS</span>
                            </div>
                            <p class="tps-menu-item-desc">Eggs, sausages, beans, toast, grilled tomatoes, and breakfast potatoes with tea or coffee.</p>
                        </div>
                    </div>
                </div>
                
                <div class="tps-menu-content" x-show="activeTab === 'lunch'">
                    <div class="tps-menu-item" style="--i:1">
                        <img src="/api/placeholder/120/120" alt="Executive Lunch" class="tps-menu-item-img">
                        <div class="tps-menu-item-content">
                            <div class="tps-menu-item-header">
                                <h3 class="tps-menu-item-title">Executive Lunch</h3>
                                <span class="tps-menu-item-price">25,000 TZS</span>
                            </div>
                            <p class="tps-menu-item-desc">Three-course meal with starter, main course options, and dessert with refreshments.</p>
                        </div>
                    </div>
                    <div class="tps-menu-item" style="--i:2">
                        <img src="/api/placeholder/120/120" alt="Buffet Lunch" class="tps-menu-item-img">
                        <div class="tps-menu-item-content">
                            <div class="tps-menu-item-header">
                                <h3 class="tps-menu-item-title">Buffet Lunch</h3>
                                <span class="tps-menu-item-price">22,000 TZS</span>
                            </div>
                            <p class="tps-menu-item-desc">Selection of salads, main dishes including rice, ugali, meat and vegetable options, and desserts.</p>
                        </div>
                    </div>
                </div>
                
                <div class="tps-menu-content" x-show="activeTab === 'dinner'">
                    <div class="tps-menu-item" style="--i:1">
                        <img src="/api/placeholder/120/120" alt="Formal Dinner" class="tps-menu-item-img">
                        <div class="tps-menu-item-content">
                            <div class="tps-menu-item-header">
                                <h3 class="tps-menu-item-title">Formal Dinner</h3>
                                <span class="tps-menu-item-price">30,000 TZS</span>
                            </div>
                            <p class="tps-menu-item-desc">Elegant four-course meal with appetizer, soup or salad, main course, and dessert with beverage service.</p>
                        </div>
                    </div>
                    <div class="tps-menu-item" style="--i:2">
                        <img src="/api/placeholder/120/120" alt="Gala Dinner" class="tps-menu-item-img">
                        <div class="tps-menu-item-content">
                            <div class="tps-menu-item-header">
                                <h3 class="tps-menu-item-title">Ceremonial Dinner</h3>
                                <span class="tps-menu-item-price">35,000 TZS</span>
                            </div>
                            <p class="tps-menu-item-desc">Premium dining experience with international cuisine options, served with professional waitstaff.</p>
                        </div>
                    </div>
                </div>
                
                <div class="tps-menu-content" x-show="activeTab === 'refreshments'">
                    <div class="tps-menu-item" style="--i:1">
                        <img src="/api/placeholder/120/120" alt="Coffee Break" class="tps-menu-item-img">
                        <div class="tps-menu-item-content">
                            <div class="tps-menu-item-header">
                                <h3 class="tps-menu-item-title">Coffee Break</h3>
                                <span class="tps-menu-item-price">8,000 TZS</span>
                            </div>
                            <p class="tps-menu-item-desc">Coffee, tea, and a selection of pastries or light snacks for short breaks.</p>
                        </div>
                    </div>
                    <div class="tps-menu-item" style="--i:2">
                        <img src="/api/placeholder/120/120" alt="Refreshment Package" class="tps-menu-item-img">
                        <div class="tps-menu-item-content">
                            <div class="tps-menu-item-header">
                                <h3 class="tps-menu-item-title">Full Refreshment Package</h3>
                                <span class="tps-menu-item-price">12,000 TZS</span>
                            </div>
                            <p class="tps-menu-item-desc">Assorted beverages, fresh fruits, pastries, and light finger foods for extended breaks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="tps-section" id="contact">
        <div class="tps-container">
            <div class="tps-section-title">
                <h2>Book Our Services</h2>
            </div>
            <div class="tps-contact-form-container">
                <div class="tps-contact-info">
                    <h2>Contact Information</h2>
                    <p>For inquiries about our catering services, please contact us using the form or through the information below. We're available to discuss your requirements and provide customized solutions for your events.</p>
                    <p>
                        <strong>Phone:</strong> +255 123 456 789<br>
                        <strong>Email:</strong> catering@tanzaniapolice.edu.tz<br>
                        <strong>Address:</strong> Tanzania Police School, Moshi, Tanzania
                    </p>
                </div>
                <div class="tps-form-wrapper">
                    <form id="tps-booking-form">
                        <div class="tps-form-group">
                            <label for="name" class="tps-form-label">Full Name</label>
                            <input type="text" id="name" class="tps-form-control" required>
                        </div>
                        <div class="tps-form-group">
                            <label for="email" class="tps-form-label">Email Address</label>
                            <input type="email" id="email" class="tps-form-control" required>
                        </div>
                        <div class="tps-form-group">
                            <label for="phone" class="tps-form-label">Phone Number</label>
                            <input type="tel" id="phone" class="tps-form-control" required>
                        </div>
                        <div class="tps-form-group">
                            <label for="event-type" class="tps-form-label">Event Type</label>
                            <select id="event-type" class="tps-form-control" required>
                                <option value="">Select Event Type</option>
                                <option value="official">Official Function</option>
                                <option value="training">Training Event</option>
                                <option value="special">Special Occasion</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="tps-form-group">
                            <label for="message" class="tps-form-label">Special Requirements</label>
                            <textarea id="message" class="tps-form-control" rows="4"></textarea>
                        </div>
                        <button type="submit" class="tps-submit-btn">Submit Booking Request</button>
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

<style>
    :root {
        --tps-primary: #103783; /* Deep blue (Tanzania Police) */
        --tps-secondary: #1D5597; /* Medium blue */
        --tps-accent: #FFB81C; /* Gold accent */
        --tps-light: #E9F0FA; /* Light blue */
        --tps-dark: #002147; /* Very dark blue */
        --tps-white: #ffffff;
    }

    .tps-wrapper * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .tps-wrapper {
        background-color: var(--tps-light);
        color: var(--tps-dark);
        overflow-x: hidden;
    }

    .tps-container {
        width: 90%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .tps-hero {
        position: relative;
        height: 60vh;
        display: flex;
        margin-top: 70px;
        align-items: center;
        background: url('/api/placeholder/1200/600') center/cover no-repeat;
        background-attachment: fixed;
    }

    .tps-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 33, 71, 0.7);
    }

    .tps-hero-content {
        position: relative;
        z-index: 1;
        text-align: left;
        padding: 0 2rem;
        max-width: 650px;
        animation: tps-fadeIn 1s forwards;
    }

    .tps-hero-content h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: var(--tps-white);
        position: relative;
        display: inline-block;
    }

    .tps-hero-content h1::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -10px;
        width: 100px;
        height: 4px;
        background-color: var(--tps-accent);
    }

    .tps-hero-content p {
        font-size: 1.2rem;
        margin-bottom: 2rem;
        color: var(--tps-white);
    }

    .tps-cta-btn {
        display: inline-block;
        background-color: var(--tps-accent);
        color: var(--tps-dark);
        padding: 0.8rem 2rem;
        font-weight: 600;
        text-decoration: none;
        border-radius: 4px;
        transition: all 0.3s ease;
        border: 2px solid var(--tps-accent);
    }

    .tps-cta-btn:hover {
        background-color: transparent;
        color: var(--tps-accent);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .tps-section {
        padding: 4rem 0;
    }

    .tps-section-title {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .tps-section-title h2 {
        font-size: 2.5rem;
        color: var(--tps-primary);
        display: inline-block;
        margin-bottom: 0.5rem;
    }

    .tps-section-title::after {
        content: '';
        position: absolute;
        width: 80px;
        height: 4px;
        background-color: var(--tps-accent);
        left: 50%;
        transform: translateX(-50%);
        bottom: -10px;
    }

    .tps-services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }

    .tps-service-card {
        background-color: var(--tps-white);
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: tps-fadeUp 0.6s forwards;
        animation-delay: calc(var(--i) * 0.1s);
        opacity: 0;
    }

    .tps-service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .tps-service-img {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }

    .tps-service-content {
        padding: 1.5rem;
    }

    .tps-service-content h3 {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
        color: var(--tps-primary);
    }

    .tps-service-content p {
        color: #666;
        margin-bottom: 1rem;
    }

    .tps-menu-section {
        background-color: var(--tps-white);
    }

    .tps-menu-tabs {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 3rem;
        flex-wrap: wrap;
    }

    .tps-menu-tab {
        padding: 0.7rem 1.5rem;
        background-color: var(--tps-light);
        color: var(--tps-primary);
        border: none;
        border-radius: 30px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .tps-menu-tab.active, .tps-menu-tab:hover {
        background-color: var(--tps-primary);
        color: var(--tps-white);
    }

    .tps-menu-content {
        display: flex;
        flex-wrap: wrap;
        gap: 2rem;
        justify-content: center;
    }

    .tps-menu-item {
        display: flex;
        background-color: var(--tps-light);
        border-radius: 8px;
        overflow: hidden;
        width: 100%;
        max-width: 550px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        animation: tps-fadeUp 0.6s forwards;
        animation-delay: calc(var(--i) * 0.1s);
        opacity: 0;
    }

    .tps-menu-item-img {
        width: 120px;
        height: 120px;
        object-fit: cover;
    }

    .tps-menu-item-content {
        padding: 1rem;
        flex: 1;
    }

    .tps-menu-item-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 0.5rem;
    }

    .tps-menu-item-title {
        font-size: 1.2rem;
        color: var(--tps-primary);
    }

    .tps-menu-item-price {
        font-weight: 700;
        color: var(--tps-accent);
        background-color: rgba(255, 184, 28, 0.1);
        padding: 0.2rem 0.5rem;
        border-radius: 4px;
    }

    .tps-menu-item-desc {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 0.5rem;
    }

    .tps-contact-form-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 3rem;
        align-items: center;
    }

    .tps-contact-info {
        animation: tps-fadeLeft 0.6s forwards;
        opacity: 0;
        color: var(--tps-dark);
    }

    .tps-contact-info h2 {
        font-size: 1.8rem;
        margin-bottom: 1.5rem;
        color: var(--tps-primary);
    }

    .tps-contact-info p {
        margin-bottom: 1.5rem;
        line-height: 1.6;
        color: var(--tps-dark);
    }

    .tps-contact-info strong {
        color: var(--tps-primary);
    }

    .tps-form-wrapper {
        background-color: var(--tps-white);
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        animation: tps-fadeRight 0.6s forwards;
        opacity: 0;
    }

    .tps-form-group {
        margin-bottom: 1.5rem;
    }

    .tps-form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--tps-primary);
    }

    .tps-form-control {
        width: 100%;
        padding: 0.8rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .tps-form-control:focus {
        outline: none;
        border-color: var(--tps-primary);
        box-shadow: 0 0 0 2px rgba(16, 55, 131, 0.2);
    }

    .tps-submit-btn {
        background-color: var(--tps-primary);
        color: var(--tps-white);
        border: none;
        padding: 0.8rem 1.5rem;
        font-weight: 600;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
    }

    .tps-submit-btn:hover {
        background-color: var(--tps-secondary);
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    @keyframes tps-fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes tps-fadeUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes tps-fadeLeft {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @keyframes tps-fadeRight {
        from { opacity: 0; transform: translateX(20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    @media (max-width: 768px) {
        .tps-hero-content h1 {
            font-size: 2.5rem;
        }
        .tps-contact-form-container {
            gap: 2rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Register ScrollTrigger plugin
        gsap.registerPlugin(ScrollTrigger);
        
        // Initialize animations
        gsap.from(".tps-service-card", {
            duration: 0.8, 
            y: 50, 
            opacity: 0, 
            stagger: 0.2,
            scrollTrigger: {
                trigger: ".tps-services-grid",
                start: "top 80%"
            }
        });
        
        gsap.from(".tps-contact-info", {
            duration: 0.8,
            x: -50,
            opacity: 0,
            scrollTrigger: {
                trigger: ".tps-contact-form-container",
                start: "top 80%"
            }
        });
        
        gsap.from(".tps-form-wrapper", {
            duration: 0.8,
            x: 50,
            opacity: 0,
            scrollTrigger: {
                trigger: ".tps-contact-form-container",
                start: "top 80%"
            }
        });
        
        // Form submission
        document.getElementById('tps-booking-form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Thank you for your booking request. Our team will contact you shortly to confirm your booking.');
            this.reset();
        });
    });
</script>
@endsection