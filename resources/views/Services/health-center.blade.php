@extends('layouts.app')

@section('title', '')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanzania Police Health Center - Kilimanjaro</title>
    <style>
        :root {
            --police-blue: #1C34CDFF;
            --police-black: #1A1919FF;
            --police-white: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles */
        header {
            background: linear-gradient(135deg, var(--police-blue), var(--police-green));
            color: white;
            padding: 2rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .header-content {
            position: relative;
            z-index: 2;
            padding-top: 40px; 
        }
        
        .header-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('/api/placeholder/1200/400');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: 1;
        }
        
        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            color: var(--police-yellow);
        }
        
        .subtitle {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
        }
        
        /* Overview Section */
        .overview {
            padding: 3rem 0;
            background-color: #f9f9f9;
            text-align: center;
        }
        
        .overview h2 {
            color: var(--police-blue);
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }
        
        .overview p {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1rem;
        }
        
        /* Services Section */
        .services {
            padding: 4rem 0;
        }
        
        .services-title {
            text-align: center;
            color: var(--police-blue);
            margin-bottom: 3rem;
            font-size: 2rem;
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .service-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .service-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .service-content {
            padding: 1.5rem;
        }
        
        .service-content h3 {
            color: var(--police-blue);
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        
        .service-content p {
            margin-bottom: 1rem;
        }
        
        /* Animation for cards */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .service-card {
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }
        
        .service-card:nth-child(1) { animation-delay: 0.1s; }
        .service-card:nth-child(2) { animation-delay: 0.2s; }
        .service-card:nth-child(3) { animation-delay: 0.3s; }
        .service-card:nth-child(4) { animation-delay: 0.4s; }
        .service-card:nth-child(5) { animation-delay: 0.5s; }
        .service-card:nth-child(6) { animation-delay: 0.6s; }
        .service-card:nth-child(7) { animation-delay: 0.7s; }
        .service-card:nth-child(8) { animation-delay: 0.8s; }
        .service-card:nth-child(9) { animation-delay: 0.9s; }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-bg"></div>
        <div class="container header-content">
            <h1>Chuo cha Polisi Health Center Kilimanjaro</h1>
            <p class="subtitle">Providing quality healthcare services to the Tanzania Police School and surrounding communities in Moshi, Kilimanjaro.</p>
        </div>
    </header>
    
    <section class="overview">
        <div class="container">
            <h2>Overview</h2>
            <p>It is located at the Moshi Police School located in Moshi district, Kilimanjaro region. The Police College Health Center serves approximately 1,500 people per month from various areas around us.</p>
        </div>
    </section>
    
    <section class="services">
        <div class="container">
            <h2 class="services-title">Our Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-image" style="background-image: url('/api/placeholder/400/300')"></div>
                    <div class="service-content">
                        <h3>OPD</h3>
                        <p><strong>Outpatient Department and Inpatient Department</strong></p>
                        <p>Aspernatur morbi sit cursus mauris aspernatur! Quos tortor. Ea montes anim.</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-image" style="background-image: url('/api/placeholder/400/300')"></div>
                    <div class="service-content">
                        <h3>IPD</h3>
                        <p><strong>Different tests</strong></p>
                        <p>This includes FBP, Chemistry, ie ASAT, ALAT, CREATMNE, U.A</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-image" style="background-image: url('/api/placeholder/400/300')"></div>
                    <div class="service-content">
                        <h3>RCH</h3>
                        <p><strong>Reproductive Charge Health</strong></p>
                        <p>A special service provided to pregnant womens and infants</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-image" style="background-image: url('/api/placeholder/400/300')"></div>
                    <div class="service-content">
                        <h3>LABORATORY</h3>
                        <p><strong>Outpatient Department and Inpatient Department</strong></p>
                        <p>Aspernatur morbi sit cursus mauris aspernatur! Quos tortor. Ea montes anim.</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-image" style="background-image: url('/api/placeholder/400/300')"></div>
                    <div class="service-content">
                        <h3>PHARMACY</h3>
                        <p><strong>Different tests</strong></p>
                        <p>This includes FBP, Chemistry, ie ASAT, ALAT, CREATMNE, U.A</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-image" style="background-image: url('/api/placeholder/400/300')"></div>
                    <div class="service-content">
                        <h3>CTC</h3>
                        <p><strong>Reproductive Charge Health</strong></p>
                        <p>A special service provided to pregnant womens and infants</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-image" style="background-image: url('/api/placeholder/400/300')"></div>
                    <div class="service-content">
                        <h3>ULTRA-SOUND</h3>
                        <p><strong>Outpatient Department and Inpatient Department</strong></p>
                        <p>Aspernatur morbi sit cursus mauris aspernatur! Quos tortor. Ea montes anim.</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-image" style="background-image: url('/api/placeholder/400/300')"></div>
                    <div class="service-content">
                        <h3>DENTAL</h3>
                        <p><strong>Different tests</strong></p>
                        <p>This includes FBP, Chemistry, ie ASAT, ALAT, CREATMNE, U.A</p>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-image" style="background-image: url('/api/placeholder/400/300')"></div>
                    <div class="service-content">
                        <h3>EYE</h3>
                        <p><strong>Reproductive Charge Health</strong></p>
                        <p>A special service provided to pregnant womens and infants</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        // Simple script to observe cards and animate them when they enter viewport
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                    }
                });
            }, { threshold: 0.1 });
            
            document.querySelectorAll('.service-card').forEach(card => {
                observer.observe(card);
            });
        });
    </script>
</body>
</html>
@endsection