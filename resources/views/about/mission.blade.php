@extends('layouts.app')

@section('title', 'Mission, Vision & Values')

@section('content')
<div class="min-h-screen flex flex-col ">
    <!-- Title Section with Background Image -->
    <div class="relative bg-cover bg-center text-white py-12 pt-24 shadow-md" style="background-image: url('{{ asset('assets/images/newsmain/uwanaja.PNG') }}');">
        <div class="absolute inset-0 "></div><!-- Overlay to ensure text is readable -->
        <div class="container mx-auto px-30 text-center relative z-10">
            <h1 class="text-4xl font-bold tracking-wide uppercase"></h1>
        </div>
    </div>

    <!-- Independent Mission and Vision Section with enhanced Vision style -->
    <div class="container mx-auto px-6 py-12">
        <!-- Mission Block -->
        <div class="mb-12 bg-white rounded-lg shadow-lg hover:shadow-2xl border-l-4 border-blue-600 transition duration-300 hover:-translate-y-1 p-8">
            <div class="flex items-center mb-4">
                <span class="text-blue-600 text-5xl mr-4">🎯</span>
                <h2 class="text-3xl font-bold text-blue-700">Our Mission</h2>
            </div>
            <p class="text-gray-700 leading-relaxed text-lg">
                To protect people and properties from all unlawful acts by detection, prevention and solving crime for the maintenance of law and order in The United Republic of Tanzania.
            </p>
        </div>
        


<!-- Independent Mission and Vision Section with enhanced Vision style -->
<div class="container mx-auto px-6 py-12">
    <!-- Vision Block -->
    <div class="mb-12 bg-white rounded-lg shadow-lg hover:shadow-2xl border-l-4 border-yellow-600 transition duration-300 hover:-translate-y-1 p-8">
        <div class="flex items-center mb-4">
            <span class="text-yellow-600 text-5xl mr-4">👁️</span>
            <h2 class="text-3xl font-bold text-yellow-700">Our Vision</h2>
        </div>
        <p class="text-gray-700 leading-relaxed text-lg">
            A low crime prevalence and law abiding society.
        </p>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Core Values Timeline</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .timeline-container {
            position: relative;
            padding: 2rem 0;
        }
        
        .timeline-line {
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background-color: #3b82f6;
            transform: translateX(-50%);
        }
        
        .timeline-point {
            position: absolute;
            left: 50%;
            width: 24px;
            height: 24px;
            background-color: #3b82f6;
            border-radius: 50%;
            transform: translateX(-50%);
            z-index: 10;
            animation: pulse 2s infinite;
        }
        
        .timeline-point.green {
            background-color: #10b981;
        }
        
        .timeline-point.orange {
            background-color: #f59e0b;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); }
            70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }
        
        .timeline-entry {
            display: flex;
            justify-content: center;
            margin-bottom: 6rem;
            position: relative;
        }
        
        .timeline-content {
            width: 90%;
            max-width: 400px;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        
        .timeline-content.appear {
            opacity: 1;
            transform: translateY(0);
        }
        
        .timeline-left {
            justify-content: flex-end;
            padding-right: 3rem;
            margin-right: auto;
            margin-left: 0;
            width: 50%;
        }
        
        .timeline-right {
            justify-content: flex-start;
            padding-left: 3rem;
            margin-left: auto;
            margin-right: 0;
            width: 50%;
        }
        
        @media (max-width: 768px) {
            .timeline-left, .timeline-right {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
                padding-left: 3rem;
                padding-right: 0;
                justify-content: flex-start;
            }
            
            .timeline-line {
                left: 2rem;
            }
            
            .timeline-point {
                left: 2rem;
            }
        }
    </style>
</head>
<body class="bg-blue-50">
    <!-- Header -->
    <header class="py-6">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-center text-green-800">Our Core Values</h1>
        </div>
    </header>
    
    <!-- Timeline Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="timeline-container">
                <!-- Vertical timeline line -->
                <div class="timeline-line"></div>
                
                <!-- Timeline Entry 1 - Professionalism -->
                <div class="timeline-entry">
                    <div class="timeline-right">
                        <div class="timeline-point" style="top: 2rem;"></div>
                        <div class="timeline-content bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-1 border-l-4 border-green-500">
                            <h3 class="text-2xl font-semibold text-green-600 mb-4">Professionalism <span class="text-green-500 text-3xl">⚖️</span></h3>
                            <p class="text-gray-700 leading-relaxed">
                                We adhere to the highest professional standards and best practices in performing our duties.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Timeline Entry 2 - Patriotism -->
                <div class="timeline-entry">
                    <div class="timeline-left">
                        <div class="timeline-point green" style="top: 2rem;"></div>
                        <div class="timeline-content bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-1 border-l-4 border-green-500">
                            <h3 class="text-2xl font-semibold text-green-600 mb-4">Patriotism <span class="text-green-500 text-3xl">🌱</span></h3>
                            <p class="text-gray-700 leading-relaxed">
                                We are courageous and ready to sacrifice our life in order to safe guard life and property of others.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Timeline Entry 3 - Character -->
                <div class="timeline-entry">
                    <div class="timeline-right">
                        <div class="timeline-point" style="top: 2rem;"></div>
                        <div class="timeline-content bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-1 border-l-4 border-green-500">
                            <h3 class="text-2xl font-semibold text-green-600 mb-4">Character <span class="text-green-500 text-3xl">🔍</span></h3>
                            <p class="text-gray-700 leading-relaxed">
                                We observe morally accepted norms and decisions rooted in good character.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Timeline Entry 4 - Integrity -->
                <div class="timeline-entry">
                    <div class="timeline-left">
                        <div class="timeline-point orange" style="top: 2rem;"></div>
                        <div class="timeline-content bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-1 border-l-4 border-green-500">
                            <h3 class="text-2xl font-semibold text-green-600 mb-4">Integrity <span class="text-green-500 text-3xl">💎</span></h3>
                            <p class="text-gray-700 leading-relaxed">
                                We observe and adhere moral values and ethical principles.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Timeline Entry 5 - Innovation -->
                <div class="timeline-entry">
                    <div class="timeline-right">
                        <div class="timeline-point" style="top: 2rem;"></div>
                        <div class="timeline-content bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-1 border-l-4 border-green-500">
                            <h3 class="text-2xl font-semibold text-green-600 mb-4">Innovation <span class="text-green-500 text-3xl">💡</span></h3>
                            <p class="text-gray-700 leading-relaxed">
                                We encourage, promote and implement value added ideas, initiatives and methods from inside and outside the Organization.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Timeline Entry 6 - Honour -->
                <div class="timeline-entry">
                    <div class="timeline-left">
                        <div class="timeline-point green" style="top: 2rem;"></div>
                        <div class="timeline-content bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-1 border-l-4 border-green-500">
                            <h3 class="text-2xl font-semibold text-green-600 mb-4">Honour <span class="text-green-500 text-3xl">🏅</span></h3>
                            <p class="text-gray-700 leading-relaxed">
                                We value honesty, impartiality and trustworthiness.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Timeline Entry 7 - Customer Service -->
                <div class="timeline-entry">
                    <div class="timeline-right">
                        <div class="timeline-point" style="top: 2rem;"></div>
                        <div class="timeline-content bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-1 border-l-4 border-green-500">
                            <h3 class="text-2xl font-semibold text-green-600 mb-4">Customer Service <span class="text-green-500 text-3xl">👥</span></h3>
                            <p class="text-gray-700 leading-relaxed">
                                We are responsive to customer needs and aim to meet their expectations.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Timeline Entry 8 - Community Engagement -->
                <div class="timeline-entry">
                    <div class="timeline-left">
                        <div class="timeline-point orange" style="top: 2rem;"></div>
                        <div class="timeline-content bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-1 border-l-4 border-green-500">
                            <h3 class="text-2xl font-semibold text-green-600 mb-4">Community Engagement <span class="text-green-500 text-3xl">🤝</span></h3>
                            <p class="text-gray-700 leading-relaxed">
                                We value partnership with the community as a means to strategic policing.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const timelineContents = document.querySelectorAll('.timeline-content');
            
            function isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }
            
            function handleScroll() {
                timelineContents.forEach((content, index) => {
                    if (isInViewport(content)) {
                        setTimeout(() => {
                            content.classList.add('appear');
                        }, index * 200);
                    }
                });
            }
            
            // Initial check
            handleScroll();
            
            // Add scroll listener
            window.addEventListener('scroll', handleScroll);
        });
    </script>
</body>
</html>

    <!-- Community Impact Section -->
    <div class="bg-white py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10 text-blue-900">Our Community Impact</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-blue-50 p-6 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-3">500+</div>
                    <div class="text-gray-700">Community Events</div>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold text-green-600 mb-3">1000+</div>
                    <div class="text-gray-700">Lives Positively Impacted</div>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold text-yellow-600 mb-3">95%</div>
                    <div class="text-gray-700">Community Satisfaction</div>
                </div>
                <div class="bg-blue-50 p-6 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold text-red-600 mb-3">24/7</div>
                    <div class="text-gray-700">Emergency Response</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section with Motto -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-400 text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Join Our Mission</h2>
            <p class="text-xl mb-4">Interested in making a difference? Learn more about how you can contribute to our community.</p>
            <p class="italic text-lg mb-8">"Discipline, Justice, Professionalism and Integrity, Foundation of Our Success."</p>
            <a href="#" class="bg-white text-blue-600 hover:bg-blue-100 px-8 py-3 rounded-full font-semibold transition duration-300 inline-block">Get Involved</a>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Hide blocks initially to prepare for animation */
    .slide-in-block {
        opacity: 0;
    }
    
    .slide-in-block[data-animation="left"] {
        transform: translateX(-100px);
    }
    
    .slide-in-block[data-animation="right"] {
        transform: translateX(100px);
    }
    
    /* Define sliding animations */
    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(100px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }
    
    /* Connection node animation */
    @keyframes pulsate {
        0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(72, 187, 120, 0.7); }
        50% { transform: scale(1.2); box-shadow: 0 0 10px 5px rgba(72, 187, 120, 0.4); }
        100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(72, 187, 120, 0); }
    }
    
    /* Slow spin animation for vision section */
    @keyframes spin-slow {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    
    .animate-spin-slow {
        animation: spin-slow 12s linear infinite;
    }
    
    .connection-node {
        transition: all 0.3s ease-out;
    }
    
    .connection-node.active {
        animation: pulsate 1s ease-out 1;
    }
    
    /* Make sure the mission/vision page has a minimum height */
    .min-h-screen {
        min-height: 100vh;
    }
    
    /* Ensure the central line is visible throughout */
    .relative:has(.grid) {
        padding-bottom: 2rem;
    }
    
    /* Improve central line visibility */
    .absolute.left-1/2.transform.-translate-x-1/2.w-1 {
        box-shadow: 0 0 10px rgba(39, 174, 96, 0.5);
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all slide-in blocks and connection nodes
        const slideBlocks = document.querySelectorAll('.slide-in-block');
        const connectionNodes = document.querySelectorAll('.connection-node');
        
        // Special animations for mission and vision blocks
        const missionBlock = document.querySelector('.mb-12.bg-white.rounded-lg');
        const visionBlock = document.querySelector('.relative.mb-12.overflow-hidden');
        
        // Add entrance animations
        if (missionBlock) {
            missionBlock.style.opacity = "0";
            missionBlock.style.transform = "translateY(30px)";
            
            setTimeout(() => {
                missionBlock.style.transition = "all 0.8s ease-out";
                missionBlock.style.opacity = "1";
                missionBlock.style.transform = "translateY(0)";
            }, 300);
        }
        
        if (visionBlock) {
            visionBlock.style.opacity = "0";
            visionBlock.style.transform = "translateY(30px)";
            
            setTimeout(() => {
                visionBlock.style.transition = "all 0.8s ease-out";
                visionBlock.style.opacity = "1";
                visionBlock.style.transform = "translateY(0)";
            }, 500);
        }
        
        // Function to animate blocks sequentially with better staggering
        function animateBlocksOnLoad() {
            slideBlocks.forEach((block, index) => {
                const direction = block.getAttribute('data-animation');
                // Create staggered effect with increasing delays
                const delay = 0.2 + (index * 0.15);
                
                // Set transition properties
                block.style.transition = `opacity 0.8s ease-out ${delay}s, transform 0.8s ease-out ${delay}s`;
                
                // Add animation class after a small delay
                setTimeout(() => {
                    block.style.opacity = "1";
                    block.style.transform = "translateX(0)";
                    
                    // Activate the corresponding connection node with a slight delay
                    setTimeout(() => {
                        // Find the closest connection node to this block
                        const connectionNode = block.closest('.grid.grid-cols-2').querySelector('.connection-node');
                        if (connectionNode) {
                            connectionNode.classList.add('active');
                        }
                    }, 500);
                }, 100);
            });
        }
        
        // Enhanced scroll-based animations using Intersection Observer
        function animateOnScroll() {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const block = entry.target;
                        const direction = block.getAttribute('data-animation');
                        
                        // Add animation
                        block.style.animation = `slideIn${direction === 'left' ? 'Left' : 'Right'} 0.8s ease-out forwards`;
                        
                        // Find the closest connection node
                        setTimeout(() => {
                            const connectionNode = block.closest('.grid.grid-cols-2').querySelector('.connection-node');
                            if (connectionNode) {
                                connectionNode.classList.add('active');
                            }
                        }, 600);
                        
                        // Stop observing this element
                        observer.unobserve(block);
                    }
                });
            }, { 
                threshold: 0.15, // Trigger when 15% of element is visible
                rootMargin: '-50px' // Slight offset to trigger animation before fully in view
            });
            
            // Start observing each block
            slideBlocks.forEach(block => {
                observer.observe(block);
            });
        }
        
        // Start initial animation for elements in viewport
        setTimeout(animateBlocksOnLoad, 300);
        
        // Handle animations for elements that come into view when scrolling
        animateOnScroll();
        
        // Add scroll-driven parallax effect to the central line
        window.addEventListener('scroll', function() {
            const scrollY = window.scrollY;
            const centralLine = document.querySelector('.absolute.left-1/2.transform.-translate-x-1/2.w-1');
            if (centralLine) {
                // Subtle parallax effect
                centralLine.style.height = `calc(100% + ${scrollY * 0.05}px)`;
            }
        });
    });
</script>
@endpush