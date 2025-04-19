@extends('layouts.app')
@section('title', 'Poultry Services')
@section('content')
<div class="main-title">
  Tanzania Police School Poultry Services
  <div class="subtitle">Quality Poultry Production & Training</div>
  <div class="poultry-animation" style="top: 20px; right: 100px;"></div>
  <div class="poultry-animation" style="bottom: 20px; left: 150px;"></div>
</div>

<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(rgba(0,53,128,0.8), rgba(0,53,128,0.8)), url('{{ Voyager::image(setting('poultry.hero_background', '/api/placeholder/1200/600')) }}') center/cover no-repeat;">
  <div class="hero-content">
    <h1>{{ setting('poultry.hero_title', 'Excellence in Poultry Farming') }}</h1>
    <p>{{ setting('poultry.hero_description', 'Tanzania Police School proudly presents our exceptional poultry services, combining traditional knowledge with modern farming techniques. Experience sustainable poultry production that supports our community and enhances officer training.') }}</p>
    <button class="btn" onclick="scrollToSection('services')">{{ setting('poultry.hero_button_text', 'Explore Our Services') }}</button>
  </div>
</section>

<!-- Services Section -->
<section class="services" id="services">
  <h2 class="section-title">{{ setting('poultry.services_title', 'Our Poultry Services') }}</h2>
  <p>{{ setting('poultry.services_description', 'We offer a range of poultry services to meet your needs, from educational programs to quality egg and meat production.') }}</p>
  
  <div class="service-cards">
    @foreach($services as $service)
      <div class="service-card" onclick="showModal('{{ $service->slug }}')">
        <div class="service-img">
          <img src="{{ Voyager::image($service->image) }}" alt="{{ $service->title }}">
        </div>
        <div class="service-info">
          <h3>{{ $service->title }}</h3>
          <p>{{ $service->excerpt }}</p>
        </div>
      </div>
    @endforeach
  </div>
</section>

<!-- Gallery Section -->
<section class="gallery" id="gallery">
  <h2 class="section-title">{{ setting('poultry.gallery_title', 'Our Gallery') }}</h2>
  <p>{{ setting('poultry.gallery_description', 'Explore images of our poultry farm, facilities, and products at the Tanzania Police School.') }}</p>
  
  <div class="gallery-container">
    @foreach($gallery_images as $image)
      <div class="gallery-item">
        <img src="{{ Voyager::image($image->image) }}" alt="{{ $image->title }}">
        <div class="gallery-caption">
          <h3>{{ $image->title }}</h3>
          <p>{{ $image->description }}</p>
        </div>
      </div>
    @endforeach
  </div>
</section>

<!-- Contact Section -->
<section class="contact" id="contact">
  <h2 class="section-title">{{ setting('poultry.contact_title', 'Contact Us') }}</h2>
  <p>{{ setting('poultry.contact_description', 'Interested in our poultry services? Get in touch with us to learn more or schedule a visit.') }}</p>
  
  <div class="contact-form">
    <form action="{{ route('services.poultry.contact') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>
      
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      
      <div class="form-group">
        <label for="service">Service of Interest</label>
        <select id="service" name="service" required>
          <option value="">Select a service</option>
          @foreach($services as $service)
            <option value="{{ $service->slug }}">{{ $service->title }}</option>
          @endforeach
        </select>
      </div>
      
      <div class="form-group">
        <label for="message">Your Message</label>
        <textarea id="message" name="message" placeholder="Tell us about your interest in our poultry services" required></textarea>
      </div>
      
      <button type="submit" class="btn">Send Message</button>
    </form>
  </div>
</section>

<!-- Modals -->
@foreach($services as $service)
  <div class="modal" id="{{ $service->slug }}-modal">
    <div class="modal-content">
      <button class="close-modal" onclick="closeModal('{{ $service->slug }}')">×</button>
      <h2>{{ $service->title }}</h2>
      <img src="{{ Voyager::image($service->image) }}" alt="{{ $service->title }}" style="width: 100%; margin: 1rem 0;">
      {!! $service->body !!}
      <button class="btn" onclick="closeModal('{{ $service->slug }}'); scrollToSection('contact')">{{ $service->meta_description ?? 'Contact Us' }}</button>
    </div>
  </div>
@endforeach

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
    overflow: hidden;
  }

  .service-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
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
@endsection