@extends('layouts.app')
@section('title', 'Services')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tanzania Police School - Poultry Services</title>
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

    .poultry-animation {
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
    Tanzania Police School Poultry Services
    <div class="subtitle">Quality Poultry Production & Training</div>
    <div class="poultry-animation" style="top: 20px; right: 100px;"></div>
    <div class="poultry-animation" style="bottom: 20px; left: 150px;"></div>
  </div>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>Excellence in Poultry Farming</h1>
      <p>Tanzania Police School proudly presents our exceptional poultry services, combining traditional knowledge with modern farming techniques. Experience sustainable poultry production that supports our community and enhances officer training.</p>
      <button class="btn" onclick="scrollToSection('services')">Explore Our Services</button>
    </div>
  </section>

  <!-- Services Section -->
  <section class="services" id="services">
    <h2 class="section-title">Our Poultry Services</h2>
    <p>We offer a range of poultry services to meet your needs, from educational programs to quality egg and meat production.</p>
    
    <div class="service-cards">
      <div class="service-card" onclick="showModal('training')">
        <div class="service-img">
          <img src="/api/placeholder/300/200" alt="Poultry Training">
        </div>
        <div class="service-info">
          <h3>Poultry Training</h3>
          <p>Learn modern poultry farming techniques from our experienced instructors in a hands-on environment.</p>
        </div>
      </div>
      
      <div class="service-card" onclick="showModal('eggs')">
        <div class="service-img">
          <img src="/api/placeholder/300/200" alt="Egg Production">
        </div>
        <div class="service-info">
          <h3>Egg Production</h3>
          <p>Premium quality eggs from our layers, available for purchase by individuals and businesses.</p>
        </div>
      </div>
      
      <div class="service-card" onclick="showModal('broilers')">
        <div class="service-img">
          <img src="/api/placeholder/300/200" alt="Broiler Production">
        </div>
        <div class="service-info">
          <h3>Broiler Production</h3>
          <p>Healthy, well-raised broiler chickens for quality meat production and consumption.</p>
        </div>
      </div>
      
      <div class="service-card" onclick="showModal('consultation')">
        <div class="service-img">
          <img src="/api/placeholder/300/200" alt="Poultry Consultation">
        </div>
        <div class="service-info">
          <h3>Poultry Consultation</h3>
          <p>Expert advice and guidance for starting or improving your own poultry farming venture.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  <section class="gallery" id="gallery">
    <h2 class="section-title">Our Gallery</h2>
    <p>Explore images of our poultry farm, facilities, and products at the Tanzania Police School.</p>
    
    <div class="gallery-container">
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Layer Chickens">
        <div class="gallery-caption">
          <h3>Layer Farm</h3>
          <p>Our modern layer housing facilities</p>
        </div>
      </div>
      
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Broiler Chickens">
        <div class="gallery-caption">
          <h3>Broiler Production</h3>
          <p>Healthy broilers raised in clean conditions</p>
        </div>
      </div>
      
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Egg Collection">
        <div class="gallery-caption">
          <h3>Egg Collection</h3>
          <p>Daily egg collection and sorting</p>
        </div>
      </div>
      
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Training Session">
        <div class="gallery-caption">
          <h3>Training Sessions</h3>
          <p>Practical training for officers and community members</p>
        </div>
      </div>
      
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Feed Production">
        <div class="gallery-caption">
          <h3>Feed Production</h3>
          <p>On-site production of balanced poultry feed</p>
        </div>
      </div>
      
      <div class="gallery-item">
        <img src="/api/placeholder/300/300" alt="Poultry Health">
        <div class="gallery-caption">
          <h3>Poultry Health</h3>
          <p>Regular health checks and vaccinations</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact" id="contact">
    <h2 class="section-title">Contact Us</h2>
    <p>Interested in our poultry services? Get in touch with us to learn more or schedule a visit.</p>
    
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
          <option value="training">Poultry Training</option>
          <option value="eggs">Egg Purchase</option>
          <option value="broilers">Broiler Purchase</option>
          <option value="consultation">Poultry Consultation</option>
        </select>
      </div>
      
      <div class="form-group">
        <label for="message">Your Message</label>
        <textarea id="message" placeholder="Tell us about your interest in our poultry services"></textarea>
      </div>
      
      <button type="submit" class="btn" onclick="submitForm()">Send Message</button>
    </div>
  </section>

  <!-- Modals -->
  <div class="modal" id="training-modal">
    <div class="modal-content">
      <button class="close-modal" onclick="closeModal('training')">×</button>
      <h2>Poultry Training Programs</h2>
      <img src="/api/placeholder/600/300" alt="Poultry Training" style="width: 100%; margin: 1rem 0;">
      <p>Our poultry training programs provide hands-on experience in various aspects of poultry farming. Led by experienced instructors from the Tanzania Police School, these workshops cater to all skill levels from beginners to advanced practitioners.</p>
      <h3>Training Features:</h3>
      <ul style="margin-left: 2rem; margin-bottom: 1rem;">
        <li>Small group sizes for personalized attention</li>
        <li>Practical hands-on experience with live birds</li>
        <li>Techniques for layer management, broiler production, and disease control</li>
        <li>Feed formulation and nutrition management</li>
        <li>Certificate of completion</li>
      </ul>
      <h3>Schedule:</h3>
      <p>Training programs are held weekly on Tuesdays and Thursdays from 2 PM to 5 PM, and on Saturdays from 10 AM to 4 PM.</p>
      <h3>Pricing:</h3>
      <p>Single session: 30,000 TZS<br>
      5-session package: 125,000 TZS<br>
      10-session package: 220,000 TZS</p>
      <button class="btn" onclick="closeModal('training'); scrollToSection('contact')">Book a Training Session</button>
    </div>
  </div>

  <div class="modal" id="eggs-modal">
    <div class="modal-content">
      <button class="close-modal" onclick="closeModal('eggs')">×</button>
      <h2>Egg Production</h2>
      <img src="/api/placeholder/600/300" alt="Egg Production" style="width: 100%; margin: 1rem 0;">
      <p>Our layer farm produces high-quality eggs daily from well-managed, properly fed chickens. We maintain strict hygiene standards and implement regular health checks to ensure our eggs are of the highest quality.</p>
      <h3>Egg Products:</h3>
      <ul style="margin-left: 2rem; margin-bottom: 1rem;">
        <li>Fresh table eggs (available in trays of 30)</li>
        <li>Graded eggs (small, medium, large, extra-large)</li>
        <li>Special orders for events and businesses</li>
        <li>Weekly subscription service available</li>
        <li>Delivery services for bulk orders</li>
      </ul>
      <h3>Purchasing Information:</h3>
      <p>Eggs can be purchased directly from our farm shop or ordered for delivery (minimum order quantity applies).</p>
      <h3>Pricing:</h3>
      <p>Single tray (30 eggs): 12,000 TZS<br>
      5 trays: 55,000 TZS<br>
      10 trays: 100,000 TZS<br>
      (Special rates available for regular customers and bulk purchases)</p>
      <button class="btn" onclick="closeModal('eggs'); scrollToSection('contact')">Order Eggs</button>
    </div>
  </div>

  <div class="modal" id="broilers-modal">
    <div class="modal-content">
      <button class="close-modal" onclick="closeModal('broilers')">×</button>
      <h2>Broiler Production</h2>
      <img src="/api/placeholder/600/300" alt="Broiler Production" style="width: 100%; margin: 1rem 0;">
      <p>We raise broiler chickens in a clean, well-managed environment with proper nutrition and health care. Our broilers are free from harmful antibiotics and chemicals, ensuring you get healthy, quality meat.</p>
      <h3>Broiler Products:</h3>
      <ul style="margin-left: 2rem; margin-bottom: 1rem;">
        <li>Live broilers (1.5-2.5 kg)</li>
        <li>Dressed broilers (fresh or frozen)</li>
        <li>Special cuts available on request</li>
        <li>Bulk orders for events and businesses</li>
        <li>Regular supply contracts available</li>
      </ul>
      <h3>Ordering Information:</h3>
      <p>Orders should be placed at least 3 days in advance for live birds and 1 day for dressed birds. Delivery available for orders of 10 birds or more within the local area.</p>
      <h3>Pricing:</h3>
      <p>Live broiler: 10,000-15,000 TZS (depending on weight)<br>
      Dressed broiler: Additional 2,000 TZS per bird<br>
      (Special rates available for bulk orders)</p>
      <button class="btn" onclick="closeModal('broilers'); scrollToSection('contact')">Order Broilers</button>
    </div>
  </div>

  <div class="modal" id="consultation-modal">
    <div class="modal-content">
      <button class="close-modal" onclick="closeModal('consultation')">×</button>
      <h2>Poultry Consultation Services</h2>
      <img src="/api/placeholder/600/300" alt="Poultry Consultation" style="width: 100%; margin: 1rem 0;">
      <p>Our experienced poultry experts provide consultation services to help you establish or improve your poultry farming venture. We offer practical advice based on years of experience in the Tanzanian poultry sector.</p>
      <h3>Consultation Services:</h3>
      <ul style="margin-left: 2rem; margin-bottom: 1rem;">
        <li>Initial farm assessment and feasibility studies</li>
        <li>Housing design and construction guidance</li>
        <li>Flock management and production planning</li>
        <li>Disease prevention and control strategies</li>
        <li>Marketing and business development advice</li>
      </ul>
      <h3>Process:</h3>
      <p>Consultation begins with an initial meeting to discuss your goals, followed by site visits and detailed recommendations. We can provide ongoing support throughout your poultry farming journey.</p>
      <h3>Pricing:</h3>
      <p>Initial consultation: 50,000 TZS<br>
      Site visit and assessment: 100,000 TZS<br>
      Comprehensive business plan: 250,000 TZS<br>
      Monthly support package: 150,000 TZS</p>
      <button class="btn" onclick="closeModal('consultation'); scrollToSection('contact')">Request Consultation</button>
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
        alert('Thank you for your message! The Tanzania Police School Poultry Services team will contact you shortly.');
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
        element.classList.add('poultry-animation');
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
        element.classList.add('poultry-animation');
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