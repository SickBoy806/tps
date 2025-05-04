@extends('layouts.app')

@section('title', 'Tanzania Police Health Center - Kilimanjaro')

@section('content')
<div class="health-center-wrapper">
    <div class="health-center-header">
        <div class="health-center-header-bg"></div>
        <div class="health-center-container health-center-header-content">
            <h1 class="health-center-title">{{ $healthCenterInfo->title ?? 'Chuo cha Polisi Health Center Kilimanjaro' }}</h1>
            <p class="health-center-subtitle">{{ $healthCenterInfo->subtitle ?? 'Providing quality healthcare services to the Tanzania Police School and surrounding communities in Moshi, Kilimanjaro.' }}</p>
        </div>
    </div>
    
    <section class="health-center-overview">
        <div class="health-center-container">
            <h2 class="health-center-section-title">Overview</h2>
            <p class="health-center-section-text">{{ $healthCenterInfo->overview ?? 'It is located at the Moshi Police School located in Moshi district, Kilimanjaro region. The Police College Health Center serves approximately 1,500 people per month from various areas around us.' }}</p>
        </div>
    </section>
    
    <section class="health-center-services">
        <div class="health-center-container">
            <h2 class="health-center-services-title">Our Services</h2>
            <div class="health-center-services-grid">
                @forelse($services as $service)
                <div class="health-center-service-card">
                    <div class="health-center-service-image" style="background-image: url('{{ Storage::disk('public')->url($service->image) }}')"></div>
                    <div class="health-center-service-content">
                        <h3 class="health-center-service-title">{{ $service->title }}</h3>
                        <p class="health-center-service-subtitle"><strong>{{ $service->subtitle }}</strong></p>
                        <p class="health-center-service-description">{{ $service->description }}</p>
                    </div>
                </div>
                @empty
                <!-- Fallback content if no services are found -->
                <div class="health-center-service-card">
                    <div class="health-center-service-image" style="background-image: url('/api/placeholder/400/300')"></div>
                    <div class="health-center-service-content">
                        <h3 class="health-center-service-title">No Services Added</h3>
                        <p class="health-center-service-description">Please add services through the Voyager admin panel.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

<style>
    :root {
        --police-blue: #1C34CD;
        --police-black: #1A1919;
        --police-white: #ffffff;
        --police-yellow: #FFD700;
        --police-green: #006400;
    }
    
    .health-center-wrapper * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    .health-center-wrapper {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: #333;
    }
    
    .health-center-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }
    
    /* Header Styles */
    .health-center-header {
        background: linear-gradient(135deg, var(--police-blue), var(--police-green));
        color: white;
        padding: 2rem 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .health-center-header-content {
        position: relative;
        z-index: 2;
        padding-top: 40px; 
    }
    
    .health-center-header-bg {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('{{ $backgroundImageUrl }}');
        background-size: cover;
        background-position: center;
        opacity: 0.2;
        z-index: 1;
    }
    
    .health-center-title {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        color: var(--police-yellow);
    }
    
    .health-center-subtitle {
        font-size: 1.2rem;
        max-width: 800px;
        margin: 0 auto;
    }
    
    /* Overview Section */
    .health-center-overview {
        padding: 3rem 0;
        background-color: #f9f9f9;
        text-align: center;
    }
    
    .health-center-section-title {
        color: var(--police-blue);
        margin-bottom: 1.5rem;
        font-size: 2rem;
    }
    
    .health-center-section-text {
        max-width: 800px;
        margin: 0 auto;
        font-size: 1.1rem;
    }
    
    /* Services Section */
    .health-center-services {
        padding: 4rem 0;
    }
    
    .health-center-services-title {
        text-align: center;
        color: var(--police-blue);
        margin-bottom: 3rem;
        font-size: 2rem;
    }
    
    .health-center-services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
    }
    
    .health-center-service-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
    }
    
    .health-center-service-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }
    
    .health-center-service-image {
        height: 200px;
        background-size: cover;
        background-position: center;
    }
    
    .health-center-service-content {
        padding: 1.5rem;
    }
    
    .health-center-service-title {
        color: var(--police-blue);
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }
    
    .health-center-service-subtitle {
        margin-bottom: 0.5rem;
    }
    
    .health-center-service-description {
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
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .health-center-title {
            font-size: 2rem;
        }
        
        .health-center-services-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

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
        
        document.querySelectorAll('.health-center-service-card').forEach((card, index) => {
            card.style.animationDelay = `${0.1 * (index + 1)}s`;
            observer.observe(card);
        });
    });
</script>
</div>
@endsection