@extends('layouts.app')

@section('title', 'Driving')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tanzania Police School - Pottery Services</title>
  <style>
    :root {
      --police-blue: #003580;
      --police-gold: #FFD700;
      --police-white: #FFFFFF;
      --police-red: #B22234;
      --light-blue: #4682B4;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      background-color: var(--police-white);
      color: #333;
      line-height: 1.6;
    }

    .main-title {
      background-color: var(--police-blue);
      color: var(--police-gold);
      text-align: center;
      padding: 2rem;
      font-size: 2.5rem;
      position: relative;
       margin-top: 60px;
    }

    .subtitle {
      color: var(--police-white);
      font-size: 1.2rem;
      margin-top: 0.5rem;
    }

    .btn {
      display: inline-block;
      background-color: var(--police-gold);
      color: var(--police-blue);
      padding: 0.8rem 1.5rem;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      transition: all 0.3s;
      cursor: pointer;
      border: none;
    }

    .btn:hover {
      background-color: var(--police-white);
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .hero {
      background: linear-gradient(rgba(0,53,128,0.8), rgba(0,53,128,0.8)), url('/api/placeholder/1200/600') center/cover no-repeat;
      height: 400px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--police-white);
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .hero-content {
      z-index: 1;
      max-width: 800px;
      padding: 2rem;
    }

    .hero h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: var(--police-gold);
    }

    .hero p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
    }

    .services {
      padding: 4rem 2rem;
      text-align: center;
    }

    .section-title {
      font-size: 2rem;
      color: var(--police-blue);
      margin-bottom: 2rem;
      position: relative;
      display: inline-block;
    }

    .section-title::after {
      content: '';
      position: absolute;
      width: 50%;
      height: 3px;
      background-color: var(--police-gold);
      bottom: -10px;
      left: 25%;
    }

    .service-cards {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 2rem;
      margin-top: 3rem;
    }

    .service-card {
      background-color: white;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
      width: 300px;
      transition: transform 0.3s, box-shadow 0.3s;
      cursor: pointer;
    }

    .service-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }

    .service-img {
      height: 200px;
      background-color: var(--light-blue);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.2rem;
    }

    .service-info {
      padding: 1.5rem;
    }

    .service-info h3 {
      color: var(--police-blue);
      margin-bottom: 0.5rem;
    }

    .gallery {
      padding: 4rem 2rem;
      background-color: #f5f5f5;
    }

    .gallery-container {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
      gap: 1.5rem;
      margin-top: 3rem;
    }

    .gallery-item {
      height: 250px;
      background-color: var(--police-blue);
      border-radius: 8px;
      overflow: hidden;
      position: relative;
      cursor: pointer;
    }

    .gallery-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s;
    }

    .gallery-item:hover img {
      transform: scale(1.1);
    }

    .gallery-caption {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: rgba(0,53,128,0.8);
      color: white;
      padding: 1rem;
      transform: translateY(100%);
      transition: transform 0.3s;
    }

    .gallery-item:hover .gallery-caption {
      transform: translateY(0);
    }

    .contact {
      padding: 4rem 2rem;
      background-color: var(--police-blue);
      color: var(--police-white);
    }

    .contact-form {
      max-width: 600px;
      margin: 3rem auto 0;
      background-color: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .form-group {
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      margin-bottom: 0.5rem;
      color: var(--police-blue);
      font-weight: bold;
    }

    input, textarea, select {
      width: 100%;
      padding: 0.8rem;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 1rem;
    }

    textarea {
      min-height: 150px;
      resize: vertical;
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
      align-items: center;
      justify-content: center;
      opacity: 0;
      transition: opacity 0.3s;
    }

    .modal.active {
      display: flex;
      opacity: 1;
    }

    .modal-content {
      background-color: white;
      padding: 2rem;
      border-radius: 8px;
      max-width: 800px;
      width: 90%;
      max-height: 80vh;
      overflow-y: auto;
      position: relative;
    }

    .close-modal {
      position: absolute;
      top: 1rem;
      right: 1rem;
      font-size: 1.5rem;
      cursor: pointer;
      background: none;
      border: none;
      color: #777;
    }

    .pottery-animation {
      width: 100px;
      height: 100px;
      background-color: var(--police-gold);
      border-radius: 50%;
      position: absolute;
      animation: float 5s infinite ease-in-out;
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0) rotate(0deg);
      }
      50% {
        transform: translateY(-20px) rotate(180deg);
      }
    }

    /* Responsive styles */
    @media (max-width: 768px) {
      .hero {
        height: 300px;
      }
      
      .hero h1 {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>
  <!-- Main Title -->
  <div class="main-title">
    Tanzania Police School Pottery Services
    <div class="subtitle">Crafting Excellence, Building Community</div>
    <div class="pottery-animation" style="top: 20px; right: 100px;"></div>
    <div class="pottery-animation" style="bottom: 20px; left: 150px;"></div>
  </div>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Discover the Art of Pottery</h1>
      <p>Tanzania Police School proudly presents our exceptional pottery services, combining traditional craftsmanship with modern techniques. Experience the transformative power of clay in the hands of our skilled artisans.</p>
      <button class="btn" onclick="scrollToSection('services')">Explore Our Services</button>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services" id="services">
    <h2 class="section-title">Our Pottery Services</h2>
    <p>We offer a range of pottery services to meet your needs, from educational programs to custom ceramic creations.</p>
    
    <div class="service-cards">
      <div class="service-card" onclick="showModal('workshop')">
        <div class="service-img">
          <img src="/api/placeholder/300/200" alt="Pottery Workshops">
        </div>
        <div class="service-info">
          <h3>Pottery Workshops</h3>
          <p>Learn the art of pottery from our skilled instructors in a collaborative environment.</p>
        </div>
      </div>
      
      <div class="service-card" onclick="showModal('custom')">
        <div class="service-img">
          <img src="/api/placeholder/300/200" alt="Custom Pottery">
        </div>
        <div class="service-info">
          <h3>Custom Pottery</h3>
          <p>Commission unique pottery pieces tailored to your specific requirements and preferences.</p>
        </div>
      </div>
      
      <div class="service-card" onclick="showModal('educational')">
        <div class="service-img">
          <img src="/api/placeholder/300/200" alt="Educational Programs">
        </div>
        <div class="service-info">
          <h3>Educational Programs</h3>
          <p>Comprehensive pottery education programs for schools, organizations, and community groups.</p>
        </div>
      </div>
      
      <div class="service-card" onclick="showModal('restoration')">
        <div class="service-img">
          <img src="/api/placeholder/300/200" alt="Pottery Restoration">
        </div>
        <div class="service-info">
          <h3>Pottery Restoration</h3>
          <p>Expert restoration services for damaged pottery and ceramic artifacts.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  <section class="gallery" id="gallery">
    <h2 class="section-title">Our Gallery</h2>
    <p>Explore our collection of handcrafted pottery and ceramic artworks created at the Tanzania Police School.</p>
    
    <div class="gallery-container">
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Traditional Pottery">
        <div class="gallery-caption">
          <h3>Traditional Tanzania Pottery</h3>
          <p>Handcrafted using ancient techniques</p>
        </div>
      </div>
      
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Modern Ceramics">
        <div class="gallery-caption">
          <h3>Modern Ceramic Designs</h3>
          <p>Contemporary approaches to pottery</p>
        </div>
      </div>
      
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Decorative Pieces">
        <div class="gallery-caption">
          <h3>Decorative Pieces</h3>
          <p>Functional art for your home</p>
        </div>
      </div>
      
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Student Work">
        <div class="gallery-caption">
          <h3>Student Creations</h3>
          <p>Work from our talented students</p>
        </div>
      </div>
      
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Cultural Artifacts">
        <div class="gallery-caption">
          <h3>Cultural Artifacts</h3>
          <p>Preserving Tanzania's rich heritage</p>
        </div>
      </div>
      
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Ceremonial Pottery">
        <div class="gallery-caption">
          <h3>Ceremonial Pottery</h3>
          <p>Special pieces for important occasions</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact" id="contact">
    <h2 class="section-title">Contact Us</h2>
    <p>Interested in our pottery services? Get in touch with us to learn more or schedule a visit.</p>
    
    <div class="contact-form">
      <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" placeholder="Enter your name">
      </div>
      
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" placeholder="Enter your email">
      </div>
      
      <div class="form-group">
        <label for="service">Service of Interest</label>
        <select id="service">
          <option value="">Select a service</option>
          <option value="workshops">Pottery Workshops</option>
          <option value="custom">Custom Pottery</option>
          <option value="educational">Educational Programs</option>
          <option value="restoration">Pottery Restoration</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="message">Your Message</label>
        <textarea id="message" placeholder="Tell us about your interest in our pottery services"></textarea>
      </div>
      
      <button type="submit" class="btn" onclick="submitForm()">Send Message</button>
    </div>
  </section>

  <!-- Modals -->
  <div class="modal" id="workshop-modal">
    <div class="modal-content">
      <button class="close-modal" onclick="closeModal('workshop')">×</button>
      <h2>Pottery Workshops</h2>
      <img src="/api/placeholder/600/300" alt="Pottery Workshop" style="width: 100%; margin: 1rem 0;">
      <p>Our pottery workshops provide hands-on experience in various pottery techniques. Led by experienced instructors from the Tanzania Police School, these workshops cater to all skill levels from beginners to advanced practitioners.</p>
      <h3>Workshop Features:</h3>
      <ul style="margin-left: 2rem; margin-bottom: 1rem;">
        <li>Small group sizes for personalized attention</li>
        <li>All materials and tools provided</li>
        <li>Techniques including hand-building, wheel throwing, and glazing</li>
        <li>Take home your finished creations</li>
        <li>Certificate of completion</li>
      </ul>
      <h3>Schedule:</h3>
      <p>Workshops are held weekly on Tuesdays and Thursdays from 2 PM to 5 PM, and on Saturdays from 10 AM to 4 PM.</p>
      <h3>Pricing:</h3>
      <p>Single session: 30,000 TZS<br>
      5-session package: 125,000 TZS<br>
      10-session package: 220,000 TZS</p>
      <button class="btn" onclick="closeModal('workshop'); scrollToSection('contact')">Book a Workshop</button>
    </div>
  </div>

  <div class="modal" id="custom-modal">
    <div class="modal-content">
      <button class="close-modal" onclick="closeModal('custom')">×</button>
      <h2>Custom Pottery Services</h2>
      <img src="/api/placeholder/600/300" alt="Custom Pottery" style="width: 100%; margin: 1rem 0;">
      <p>Our custom pottery service allows you to commission unique ceramic pieces tailored to your specifications. Whether you need ceremonial pieces, corporate gifts, or unique home décor, our skilled artisans can bring your vision to life.</p>
      <h3>Custom Services Include:</h3>
      <ul style="margin-left: 2rem; margin-bottom: 1rem;">
        <li>Initial consultation to discuss your requirements</li>
        <li>Design proposals with sketches</li>
        <li>Sample pieces when required</li>
        <li>Production of your approved design</li>
        <li>Delivery services available</li>
      </ul>
      <h3>Process:</h3>
      <p>The custom pottery process typically takes 4-6 weeks from initial consultation to delivery, depending on complexity and quantity.</p>
      <h3>Pricing:</h3>
      <p>Pricing varies based on design complexity, size, and quantity. Please contact us for a personalized quote.</p>
      <button class="btn" onclick="closeModal('custom'); scrollToSection('contact')">Request Custom Pottery</button>
    </div>
  </div>

  <div class="modal" id="educational-modal">
    <div class="modal-content">
      <button class="close-modal" onclick="closeModal('educational')">×</button>
      <h2>Educational Programs</h2>
      <img src="/api/placeholder/600/300" alt="Educational Programs" style="width: 100%; margin: 1rem 0;">
      <p>The Tanzania Police School offers comprehensive pottery educational programs designed for schools, community organizations, and youth groups. Our programs blend practical skills with cultural and historical context.</p>
      <h3>Program Options:</h3>
      <ul style="margin-left: 2rem; margin-bottom: 1rem;">
        <li>School field trips (half-day or full-day)</li>
        <li>Multi-week curriculum programs</li>
        <li>Teacher training workshops</li>
        <li>Community outreach programs</li>
        <li>Cultural heritage pottery programs</li>
      </ul>
      <h3>Benefits:</h3>
      <p>Our educational programs enhance fine motor skills, creativity, cultural awareness, and provide therapeutic benefits. All programs can be customized to meet specific educational objectives.</p>
      <h3>Pricing:</h3>
      <p>Educational program pricing is based on group size, duration, and materials. Special rates are available for public schools and community organizations.</p>
      <button class="btn" onclick="closeModal('educational'); scrollToSection('contact')">Inquire About Programs</button>
    </div>
  </div>

  <div class="modal" id="restoration-modal">
    <div class="modal-content">
      <button class="close-modal" onclick="closeModal('restoration')">×</button>
      <h2>Pottery Restoration Services</h2>
      <img src="/api/placeholder/600/300" alt="Pottery Restoration" style="width: 100%; margin: 1rem 0;">
      <p>Our skilled restoration specialists can repair and restore damaged pottery and ceramic artifacts. Whether it's a family heirloom, an archaeological piece, or a broken favorite, we can help preserve these valuable items.</p>
      <h3>Restoration Services:</h3>
      <ul style="margin-left: 2rem; margin-bottom: 1rem;">
        <li>Assessment and documentation of damage</li>
        <li>Cleaning and stabilization</li>
        <li>Reconstruction of missing pieces</li>
        <li>Color matching and surface restoration</li>
        <li>Conservation and preservation advice</li>
      </ul>
      <h3>Process:</h3>
      <p>Restoration begins with an initial assessment to determine the scope of work required. Timelines vary based on the complexity of the restoration needed.</p>
      <h3>Pricing:</h3>
      <p>Restoration services are quoted on a case-by-case basis after assessment. Please contact us to arrange an evaluation of your pottery item.</p>
      <button class="btn" onclick="closeModal('restoration'); scrollToSection('contact')">Request Restoration</button>
    </div>
  </div>

  <script>
    // Show modal function
    function showModal(type) {
      document.getElementById(type + '-modal').classList.add('active');
      document.body.style.overflow = 'hidden';
    }
    
    // Close modal function
    function closeModal(type) {
      document.getElementById(type + '-modal').classList.remove('active');
      document.body.style.overflow = 'auto';
    }
    
    // Scroll to section function
    function scrollToSection(sectionId) {
      const section = document.getElementById(sectionId);
      if (section) {
        section.scrollIntoView({behavior: 'smooth'});
      }
    }
    
    // Form submission
    function submitForm() {
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const service = document.getElementById('service').value;
      const message = document.getElementById('message').value;
      
      if (name && email && service && message) {
        alert('Thank you for your message! The Tanzania Police School Pottery Services team will contact you shortly.');
        // Reset form
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('service').value = '';
        document.getElementById('message').value = '';
      } else {
        alert('Please fill in all fields before submitting.');
      }
    }
    
    // Add floating animations
    function addFloatingElements() {
      const hero = document.querySelector('.hero');
      const services = document.querySelector('.services');
      
      for (let i = 0; i < 5; i++) {
        const element = document.createElement('div');
        element.classList.add('pottery-animation');
        element.style.left = Math.random() * 80 + 10 + '%';
        element.style.top = Math.random() * 80 + 10 + '%';
        element.style.width = Math.random() * 40 + 30 + 'px';
        element.style.height = element.style.width;
        element.style.opacity = Math.random() * 0.5 + 0.2;
        element.style.animationDuration = Math.random() * 3 + 3 + 's';
        element.style.animationDelay = Math.random() * 2 + 's';
        
        hero.appendChild(element);
      }
      
      for (let i = 0; i < 3; i++) {
        const element = document.createElement('div');
        element.classList.add('pottery-animation');
        element.style.left = Math.random() * 80 + 10 + '%';
        element.style.top = Math.random() * 30 + 'px';
        element.style.width = Math.random() * 30 + 20 + 'px';
        element.style.height = element.style.width;
        element.style.opacity = Math.random() * 0.3 + 0.1;
        element.style.animationDuration = Math.random() * 4 + 4 + 's';
        element.style.animationDelay = Math.random() * 3 + 's';
        
        services.appendChild(element);
      }
    }
    
    // Initialize on page load
    window.onload = function() {
      addFloatingElements();
    };
  </script>
</body>
</html>

@endsection