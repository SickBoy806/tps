@extends('layouts.app')

@section('title', 'Driving')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanzania Police School - Professional Driving Course</title>
    <style>
        :root {
            --primary: #0a3d62;
            --secondary: #f39c12;
            --light: #f8f9fa;
            --dark: #212529;
            --accent: #e74c3c;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            color: var(--dark);
            background-color: var(--light);
            line-height: 1.6;
        }
        
        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/api/placeholder/1200/800') center/cover no-repeat;
            color: white;
            padding: 0 1rem;
            margin-top: 0;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin-bottom: 2rem;
            animation: fadeInUp 1.2s ease;
        }
        
        .cta-btn {
            display: inline-block;
            background-color: var(--secondary);
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
            animation: fadeInUp 1.4s ease;
        }
        
        .cta-btn:hover {
            background-color: #e67e22;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .section {
            padding: 5rem 2rem;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            font-size: 2.2rem;
            color: var(--primary);
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 4px;
            background-color: var(--secondary);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background-color: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            text-align: center;
            opacity: 0;
            transform: translateY(20px);
        }
        
        .feature-card.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            color: var(--secondary);
            margin-bottom: 1rem;
        }
        
        .course-details {
            background-color: #f5f5f5;
        }
        
        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .course-item {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            opacity: 0;
            transform: translateY(20px);
        }
        
        .course-item.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .course-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .course-img {
            height: 200px;
            background-color: #ddd;
            background-size: cover;
            background-position: center;
        }
        
        .course-content {
            padding: 1.5rem;
        }
        
        .course-title {
            margin-bottom: 0.5rem;
            color: var(--primary);
        }
        
        .course-description {
            margin-bottom: 1rem;
            color: #666;
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .gallery-item {
            height: 250px;
            background-color: #ddd;
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            cursor: pointer;
            opacity: 0;
            transform: scale(0.9);
            transition: all 0.3s ease;
        }
        
        .gallery-item.visible {
            opacity: 1;
            transform: scale(1);
        }
        
        .gallery-item:hover::after {
            content: 'View Larger';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .testimonials {
            background-color: var(--primary);
            color: white;
        }
        
        .testimonial-slider {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
            overflow: hidden;
        }
        
        .testimonial-slide {
            text-align: center;
            padding: 2rem 1rem;
            display: none;
        }
        
        .testimonial-slide.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        .testimonial-content {
            font-size: 1.2rem;
            font-style: italic;
            margin-bottom: 1.5rem;
        }
        
        .testimonial-author {
            font-weight: bold;
        }
        
        .testimonial-nav {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
            gap: 10px;
        }
        
        .testimonial-nav button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: none;
            background-color: rgba(255,255,255,0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .testimonial-nav button.active {
            background-color: white;
            transform: scale(1.2);
        }
        
        .faq {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .faq-item {
            margin-bottom: 1rem;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            background-color: white;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }
        
        .faq-item.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .faq-question {
            padding: 1rem;
            background-color: var(--primary);
            color: white;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .faq-question::after {
            content: '+';
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }
        
        .faq-item.active .faq-question::after {
            transform: rotate(45deg);
        }
        
        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: all 0.3s ease;
            padding: 0 1rem;
        }
        
        .faq-item.active .faq-answer {
            max-height: 200px;
            padding: 1rem;
        }
        
        .contact {
            background-color: #f5f5f5;
        }
        
        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(10, 61, 98, 0.2);
        }
        
        .form-textarea {
            height: 150px;
            resize: vertical;
        }
        
        .form-submit {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            display: block;
            width: 100%;
        }
        
        .form-submit:hover {
            background-color: #0c2e4b;
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
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 100;
            font-size: 1.5rem;
        }
        
        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .section {
                padding: 3rem 1rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
        }
        
        .nav-pills {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 2rem;
            padding-top: 1rem;
        }
        
        .nav-pill {
            background-color: var(--primary);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        
        .nav-pill:hover {
            background-color: var(--secondary);
            transform: translateY(-3px);
        }
        
        /* New Slideshow Styles */
        .slideshow-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }
        
        .slideshow-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            background-size: cover;
            background-position: center;
        }
        
        .slideshow-slide.active {
            opacity: 1;
        }
        
        .slideshow-nav {
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 8px;
            z-index: 10;
        }
        
        .slideshow-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .slideshow-dot.active {
            background-color: white;
            transform: scale(1.2);
        }
        
        .slideshow-prev, .slideshow-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            z-index: 10;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .slideshow-prev {
            left: 10px;
        }
        
        .slideshow-next {
            right: 10px;
        }

    .gallery-item {
    position: relative;
    overflow: hidden;
}

.gallery-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    color: white;
    padding: 10px;
    transform: translateY(100%);
    transition: transform 0.3s ease;
}

.gallery-item:hover .gallery-overlay {
    transform: translateY(0);
}

.gallery-caption {
    text-align: center;
    font-weight: 500;
}

    </style>
</head>
<body>
    <!-- Navigation Pills at the top instead of header -->
    <div class="container">
        <div class="nav-pills">
            <a href="#home" class="nav-pill">Home</a>
            <a href="#about" class="nav-pill">About</a>
            <a href="#courses" class="nav-pill">Courses</a>
            <a href="#gallery" class="nav-pill">Gallery</a>
            <a href="#faq" class="nav-pill">FAQ</a>
            <a href="#contact" class="nav-pill">Contact</a>
        </div>
    </div>

    <section id="home" class="hero" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('images/hero-background.jpg') }}') center/cover no-repeat;">
    <h1>Professional Driving Course</h1>
    <p>Master the art of safe and responsible driving with Tanzania's most trusted driving school</p>
    <a href="#courses" class="cta-btn">Explore Our Courses</a>
</section>

    <section id="about" class="section">
        <div class="container">
            <h2 class="section-title">Why Choose Our Driving School</h2>
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon">🎓</div>
                    <h3>Professional Training</h3>
                    <p>Our certified instructors provide comprehensive training that goes beyond just passing the driving test.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛣️</div>
                    <h3>Real-world Experience</h3>
                    <p>Practice in various road conditions to build confidence and develop essential driving skills.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🛡️</div>
                    <h3>Safety First</h3>
                    <p>Learn defensive driving techniques that prioritize your safety and the safety of others on the road.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📜</div>
                    <h3>Official Certification</h3>
                    <p>Upon completion, receive an official driving certificate from the Tanzania Police School.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="courses" class="section course-details">
        <div class="container">
            <h2 class="section-title">Our Driving Courses</h2>
            <div class="course-grid">
                <!-- Basic Traffic Rules & Signs Course with Slideshow -->
<div class="course-item">
    <div class="slideshow-container" id="basic-traffic-slideshow">
        <!-- 15 slides for Basic Traffic Rules & Signs -->
        <div class="slideshow-slide active" style="background-image: url('{{ asset('assets/images/driving/traff/Traffic Symbol Signs And Road Safety Signs _ Engineering Discoveries.jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/traff/download (5).jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/traff/Isharat Seir (إشارات السير)_ #isharat #traffic #signs in #arabic.jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/traff/download (6).jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/traff/download (7).jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/traff/Segnali stradali_ spiegazione dei cartelli segnaletici con relative immagini [foto gallery] - Normative - Automoto_it.jpeg') }}')"></div>
        

        <button class="slideshow-prev" onclick="moveSlide('basic-traffic-slideshow', -1)">❮</button>
        <button class="slideshow-next" onclick="moveSlide('basic-traffic-slideshow', 1)">❯</button>
    </div>
    <div class="course-content">
        <h3 class="course-title">Basic Traffic Rules & Signs</h3>
        <p class="course-description">Master the essential traffic rules and learn to interpret all road signs for safe navigation.</p>
        <ul>
            <li>Understanding road signs and markings</li>
            <li>Right of way rules</li>
            <li>Traffic signals and their meanings</li>
            <li>Pedestrian and crosswalk regulations</li>
        </ul>
    </div>
</div>
                
                <!-- Maneuvering & Vehicle Control Course with Slideshow -->
<div class="course-item">
    <div class="slideshow-container" id="maneuvering-slideshow">
        <!-- 5 slides for Maneuvering & Vehicle Control -->
        <div class="slideshow-slide active" style="background-image: url('{{ asset('assets/images/driving/Easy Forward Bay Parking (Step-By-Step) - Driving Tips.jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/manover1.jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/How to do 3-point turns.jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/HOW TO CHANGE LANES SAFELY WHILE DRIVING (Basic skill to pass the Road Test).jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/How to Reverse Park _ Reverse Parking_ Parking tips #Reverseparking #parking.jpeg') }}')"></div>
        <button class="slideshow-prev" onclick="moveSlide('maneuvering-slideshow', -1)">❮</button>
        <button class="slideshow-next" onclick="moveSlide('maneuvering-slideshow', 1)">❯</button>
    </div>
    <div class="course-content">
        <h3 class="course-title">Maneuvering & Vehicle Control</h3>
        <p class="course-description">Learn precise control techniques for various driving scenarios and challenging conditions.</p>
        <ul>
            <li>Parking techniques (parallel, reverse, etc.)</li>
            <li>Lane changing and overtaking</li>
            <li>Navigating roundabouts and intersections</li>
            <li>Reversing and three-point turns</li>
        </ul>
    </div>
</div>
                
                <!-- Defensive Driving Course with Slideshow -->
<div class="course-item">
    <div class="slideshow-container" id="defensive-slideshow">
        <!-- 5 slides for Defensive Driving -->
        <div class="slideshow-slide active" style="background-image: url('{{ asset('assets/images/driving/download (4).jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/Driving safety tips.jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/MAD On New Zealand.jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/Tips to Defensive Driving.jpeg') }}')"></div>
        <div class="slideshow-slide" style="background-image: url('{{ asset('assets/images/driving/Globe Toyota - Here are the tips to drive in Fog! #fog #winters _ Facebook.jpeg') }}')"></div>
        <button class="slideshow-prev" onclick="moveSlide('defensive-slideshow', -1)">❮</button>
        <button class="slideshow-next" onclick="moveSlide('defensive-slideshow', 1)">❯</button>
    </div>
    <div class="course-content">
        <h3 class="course-title">Defensive Driving</h3>
        <p class="course-description">Develop advanced skills to anticipate hazards and prevent accidents in challenging situations.</p>
        <ul>
            <li>Hazard perception and risk assessment</li>
            <li>Emergency braking and evasive maneuvers</li>
            <li>Night driving and adverse weather conditions</li>
            <li>Managing road rage and aggressive drivers</li>
        </ul>
      </div>
     </div>
        </div>
    </section>

                 <div style="margin-top: 3rem;">
                <h3 style="text-align: center; margin-bottom: 2rem;">Course Details</h3>
                <div class="course-item" style="max-width: 800px; margin: 0 auto;">
                    <div class="course-content">
                        <h4>Importance of Driving School</h4>
                        <p>Having a driving license is not enough. One needs professional training which one can get only at a driving school. How many of us can confidently claim that they can clear a test about traffic signs? The fact is, very few.</p>
                        
                        <h4 style="margin-top: 1rem;">Learner Detailed Track Course</h4>
                        <p>Our beginner course takes you through a structured learning path, starting with vehicle familiarization and progressing to complex maneuvers. Each student receives personalized attention to develop their skills at their own pace.</p>
                        
                        <h4 style="margin-top: 1rem;">Advanced Course</h4>
                        <p>For those looking to master defensive driving techniques and advanced maneuvers, our advanced course offers specialized training to handle any situation on the road with confidence and skill.</p>
                        
                        <p style="margin-top: 1rem;">We go beyond teaching just the controls of the car. We believe in teaching our learners how to use those controls effortlessly. At the same time, we teach our learners to respect other drivers' rights while also understanding the responsibilities of being a driver.</p>
                    </div>
                </div>
            </div>

    <section id="gallery" class="section">
    <div class="container">
        <h2 class="section-title">Training Highlights</h2>
        <div class="gallery">
            @php
                $galleryImages = \App\Models\GalleryImage::where('category', 'training_highlights')
                    ->where('status', true)
                    ->orderBy('order')
                    ->get();
            @endphp
            
            @forelse($galleryImages as $image)
                <div class="gallery-item" style="background-image: url('{{ Voyager::image($image->image) }}')">
                    @if($image->title)
                        <div class="gallery-overlay">
                            <div class="gallery-caption">{{ $image->title }}</div>
                        </div>
                    @endif
                </div>
            @empty
                <div class="alert">No gallery images found.</div>
            @endforelse
        </div>
    </div>
</section>

    <section id="testimonials" class="section testimonials">
        <div class="container">
            <h2 class="section-title" style="color: white;">What Our Students Say</h2>
            <div class="testimonial-slider">
                <div class="testimonial-slide active">
                    <p class="testimonial-content">"The training at Tanzania Police School transformed my driving skills. The instructors were patient and professional, ensuring I understood all aspects of safe driving."</p>
                    <p class="testimonial-author">- Daniel M., Dar es Salaam</p>
                </div>
                <div class="testimonial-slide">
                    <p class="testimonial-content">"I was terrified of driving before, but the step-by-step approach at this school built my confidence. Now I drive with ease even in heavy traffic."</p>
                    <p class="testimonial-author">- Sarah K., Arusha</p>
                </div>
                <div class="testimonial-slide">
                    <p class="testimonial-content">"The defensive driving techniques I learned here saved me from a potential accident last month. Everyone should take this course!"</p>
                    <p class="testimonial-author">- Joseph T., Mwanza</p>
                </div>
                <div class="testimonial-nav">
                    <button class="active" data-slide="0"></button>
                    <button data-slide="1"></button>
                    <button data-slide="2"></button>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="section">
        <div class="container">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <div class="faq">
                <div class="faq-item">
                    <div class="faq-question">How long does the driving course take?</div>
                    <div class="faq-answer">Our standard course lasts for 4 weeks, with both theoretical and practical sessions. However, we offer flexible scheduling to accommodate your needs.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Do I need any prior experience to join?</div>
                    <div class="faq-answer">No prior experience is required. Our courses are designed for complete beginners and those looking to improve their existing skills.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Will I get help with the licensing process?</div>
                    <div class="faq-answer">Yes, we provide guidance throughout the licensing process, including preparation for both written and practical driving tests.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">What types of vehicles do you use for training?</div>
                    <div class="faq-answer">We train on both manual and automatic transmission vehicles. Our fleet includes sedans, SUVs, and commercial vehicles for specialized training.</div>
                </div>
                <div class="faq-item">
                    <div class="faq-question">Is the certificate recognized nationwide?</div>
                    <div class="faq-answer">Yes, our certification is officially recognized by the Tanzania Police Force and transportation authorities throughout the country.</div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="section contact">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>
            <div class="contact-form">
                <div class="form-group">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" id="name" class="form-input" placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" id="email" class="form-input" placeholder="Enter your email address">
                </div>
                <div class="form-group">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" id="phone" class="form-input" placeholder="Enter your phone number">
                </div>
                <div class="form-group">
                    <label for="course" class="form-label">Course of Interest</label>
                    <select id="course" class="form-input">
                        <option value="">Select a course</option>
                        <option value="basic">Basic Traffic Rules & Signs</option>
                        <option value="maneuvering">Maneuvering & Vehicle Control</option>
                        <option value="defensive">Defensive Driving</option>
                        <option value="all">Complete Driving Program</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" class="form-input form-textarea" placeholder="Any specific questions or requirements?"></textarea>
                </div>
                <button type="submit" class="form-submit">Submit Inquiry</button>
            </div>
        </div>
    </section>

    <a href="#" class="back-to-top">↑</a>

    <script>

    // Slideshow functionality
function moveSlide(slideshowId, direction) {
    const slides = document.querySelectorAll(`#${slideshowId} .slideshow-slide`);
    let activeIndex = 0;
    
    // Find the current active slide
    slides.forEach((slide, index) => {
        if (slide.classList.contains('active')) {
            activeIndex = index;
            slide.classList.remove('active');
        }
    });
    
    // Calculate the next slide index
    const totalSlides = slides.length;
    let nextIndex = (activeIndex + direction) % totalSlides;
    
    // If going backward from first slide, go to last slide
    if (nextIndex < 0) {
        nextIndex = totalSlides - 1;
    }
    
    // Activate the next slide
    slides[nextIndex].classList.add('active');
}

// Auto rotate course slideshows
const slideshowIds = ['basic-traffic-slideshow', 'maneuvering-slideshow', 'defensive-slideshow'];

slideshowIds.forEach(id => {
    setInterval(() => {
        moveSlide(id, 1); // Move forward by one slide
    }, 4000); // Change slide every 4 seconds
});
        // Intersection Observer for animations
        const animateElements = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        };

        const observer = new IntersectionObserver(animateElements, {
            root: null,
            threshold: 0.1
        });

        // Observe all elements that should be animated
        document.querySelectorAll('.feature-card, .course-item, .gallery-item, .faq-item').forEach(el => {
            observer.observe(el);
        });

        // Testimonial Slider
        const slides = document.querySelectorAll('.testimonial-slide');
        const navButtons = document.querySelectorAll('.testimonial-nav button');
        
        navButtons.forEach(button => {
            button.addEventListener('click', () => {
                const slideIndex = button.getAttribute('data-slide');
                
                // Hide all slides and remove active class from nav buttons
                slides.forEach(slide => slide.classList.remove('active'));
                navButtons.forEach(btn => btn.classList.remove('active'));
                
                // Show selected slide and set active class on nav button
                slides[slideIndex].classList.add('active');
                button.classList.add('active');
            });
        });
        
        // Auto rotate testimonials
        let currentSlide = 0;
        const totalSlides = slides.length;
        
        setInterval(() => {
            currentSlide = (currentSlide + 1) % totalSlides;
            
            // Hide all slides and remove active class from nav buttons
            slides.forEach(slide => slide.classList.remove('active'));
            navButtons.forEach(btn => btn.classList.remove('active'));
            
            // Show current slide and set active class on nav button
            slides[currentSlide].classList.add('active');
            navButtons[currentSlide].classList.add('active');
        }, 5000);
        
        // FAQ Accordion
        const faqQuestions = document.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const faqItem = question.parentElement;
                
                // Toggle active class on clicked item
                faqItem.classList.toggle('active');
                
                // Close other items
                document.querySelectorAll('.faq-item').forEach(item => {
                    if (item !== faqItem) {
                        item.classList.remove('active');
                    }
                });
            });
        });
        
        // Back to top button
        const backToTopBtn = document.querySelector('.back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });
        
        backToTopBtn.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        // Gallery image enlarge animation (placeholder)
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                // Here you would typically show a modal with the enlarged image
                // For now, we'll just add a visual effect
                item.style.transform = 'scale(1.02)';
                setTimeout(() => {
                    item.style.transform = 'scale(1)';
                }, 300);
            });
        });
    </script>
</body>
</html>

@endsection