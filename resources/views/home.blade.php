@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanzania Police Force Carousel</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Carousel container styling */
        .carousel-container {
            margin: 0;
            background-color: #000;
            color: #eee;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            overflow-x: hidden;
            width: 100%;
            height: 100%;
        }
        
        .carousel-container a {
            text-decoration: none;
            color: #eee;
        }
        
        /* carousel */
        .carousel {
            height: 90vh;
            width: 100%;
            overflow: hidden;
            position: relative;
        }
        
        /* Slide Items */
        .carousel .list .item {
            width: 100%;
            height: 100%;
            position: absolute;
            inset: 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease;
        }
        
        .carousel .list .item.active {
            opacity: 1;
            visibility: visible;
        }
        
        .carousel .list .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            display: block;
        }
        
        /* Image fallback */
        .carousel .list .item .image-fallback {
            width: 100%;
            height: 100%;
            background-color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5em;
            color: #999;
        }
        
        .carousel .list .item .content {
            position: absolute;
            top: 20%;
            width: 100%;
            max-width: 80%;
            left: 50%;
            transform: translateX(-50%);
            padding-right: 30%;
            box-sizing: border-box;
            color: #fff;
            text-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
            z-index: 2;
        }
        
        .carousel .list .item .author {
            font-weight: bold;
            letter-spacing: 10px;
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }
        
        .carousel .list .item .title,
        .carousel .list .item .topic {
            font-size: 5em;
            font-weight: bold;
            line-height: 1.3em;
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }
        
        .carousel .list .item .topic {
            color: #f1683a;
        }
        
        .carousel .list .item .des {
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
            margin: 25px 0;
        }
        
        .carousel .list .item .buttons {
            display: grid;
            grid-template-columns: repeat(2, 130px);
            grid-template-rows: 40px;
            gap: 5px;
            margin-top: 20px;
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.8s ease;
        }
        
        .carousel .list .item .buttons button {
            border: none;
            background-color: #eee;
            letter-spacing: 3px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .carousel .list .item .buttons button:hover {
            background-color: #f1683a;
            color: #fff;
        }
        
        .carousel .list .item .buttons button:nth-child(2) {
            background-color: transparent;
            border: 1px solid #fff;
            color: #eee;
        }
        
        .carousel .list .item .buttons button:nth-child(2):hover {
            background-color: #fff;
            color: #000;
        }
        
        /* Show content animations for active slide */
        .carousel .list .item.active .author,
        .carousel .list .item.active .title,
        .carousel .list .item.active .topic,
        .carousel .list .item.active .des,
        .carousel .list .item.active .buttons {
            opacity: 1;
            transform: translateY(0);
        }
        
        .carousel .list .item.active .author {
            transition-delay: 0.3s;
        }
        
        .carousel .list .item.active .title {
            transition-delay: 0.6s;
        }
        
        .carousel .list .item.active .topic {
            transition-delay: 0.9s;
        }
        
        .carousel .list .item.active .des {
            transition-delay: 1.2s;
        }
        
        .carousel .list .item.active .buttons {
            transition-delay: 1.5s;
        }
        
        /* Right-aligned thumbnails */
        .thumbnail {
           position: absolute;
           bottom: 50px;
           right: 120px;
           width: max-content;
           z-index: 100;
           display: flex;
           gap: 20px;
           transform: none;
        }
        
        .thumbnail .item {
           width: 150px;
           height: 220px;
           flex-shrink: 0;
           position: relative;
           border-radius: 20px;
           overflow: hidden;
           cursor: pointer;
           transition: all 0.3s ease;
           border: 2px solid transparent;
        }
        
        .thumbnail .item:hover {
            transform: scale(1.05);
        }
        
        .thumbnail .item.active {
            border: 2px solid #fff;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
        }
        
        .thumbnail .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
        
        .thumbnail .item .content {
            color: #fff;
            position: absolute;
            bottom: 10px;
            left: 10px;
            right: 10px;
        }
        
        .thumbnail .item .content .title {
            font-weight: 500;
            font-size: 10px;
            text-shadow: 0 3px 5px rgba(0, 0, 0, 0.7);
        }
        
        .thumbnail .item .content .description {
            font-weight: 300;
            font-size: 8px;
            opacity: 0.8;
        }
        
        /* Navigation arrows */
        .arrows {
            position: absolute;
            bottom: 50px;
            right: 50px;
            z-index: 100;
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .arrows button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(238, 238, 238, 0.3);
            border: none;
            color: #fff;
            font-weight: bold;
            transition: 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(5px);
        }
        
        .arrows button:hover {
            background-color: #fff;
            color: #000;
            transform: scale(1.1);
        }
        
        /* Progress indicator */
        .carousel .time {
            position: absolute;
            z-index: 1000;
            width: 0%;
            height: 3px;
            background-color: #f1683a;
            left: 0;
            top: 0;
        }
        
        /* Zoom effect for active slide */
        @keyframes subtleZoom {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.05);
            }
        }
        
        .animate-subtle-zoom {
            animation: subtleZoom 10s ease infinite alternate;
        }
        
        /* Responsive design improvements */
        @media screen and (max-width: 1400px) {
            .carousel {
                height: 90vh;
            }

            .carousel .list .item .content {
                padding-right: 20%;
            }

            .carousel .list .item img {
                display: block;
                width: 100%;
                height: auto;
                /* margin-top: 80px !important; */
            }
    }


        
        @media screen and (max-width: 992px) {
              
            .carousel {
                height: 50vh;
            }

            .thumbnail {
                right: 50px;
                gap: 15px;
            }
            
            .thumbnail .item {
                width: 130px;
                height: 190px;
            }
        }
        
        @media screen and (max-width: 768px) {
            .carousel-container {
                /* margin-top: 7vw; */
                font-size: 10px;
            }
                
            .carousel {
                height: 40vh;
            }
            
            .carousel .list .item .content {
                /* margin-top: 7vw; */
                padding-right: 5%;
                top: 15%;
                max-width: 90%;
            }

            .carousel .list .item img {
                /* margin-top: 7vw; */
                object-fit: cover;
                height: 100%;
                width: 100%;
                display: block;
            }
            
            .carousel .list .item .title,
            .carousel .list .item .topic {
                font-size: 3em;
            }
            
            .thumbnail {
                right: 20px;
                bottom: 50px;
                gap: 10px;
                flex-wrap: wrap;
                justify-content: flex-end;
                max-width: 80%;
            }
            
            .thumbnail .item {
                width: 100px;
                height: 150px;
                margin-bottom: 5px;
            }
            
            .arrows {
                bottom: 20px;
                right: 20px;
            }
        }
        
        @media screen and (max-width: 576px) {
            .carousel .list .item .content {
                padding-right: 0;
                top: 10%;
                max-width: 95%;
            }
            
            .carousel .list .item .title,
            .carousel .list .item .topic {
                font-size: 2em;
            }
            
            .carousel .list .item .author {
                letter-spacing: 5px;
                font-size: 10px;
            }
            
            .carousel .list .item .des {
                font-size: 12px;
            }
            
            .thumbnail {
                bottom: 70px;
                right: 10px;
                gap: 5px;
                flex-wrap: wrap;
                max-width: 90%;
            }
            
            .thumbnail .item {
                width: 70px;
                height: 100px;
            }
            
            .thumbnail .item .content .title {
                font-size: 8px;
            }
            
            .thumbnail .item .content .description {
                font-size: 6px;
            }
            
            .arrows {
                bottom: 20px;
                right: 10px;
            }
            
            .arrows button {
                width: 30px;
                height: 30px;
            }
            
            .carousel .list .item .buttons {
                grid-template-columns: repeat(2, 90px);
                grid-template-rows: 30px;
                font-size: 10px;
            }
        }
        
        /* Extra small devices */
        @media screen and (max-width: 375px) {
            .carousel .list .item .title,
            .carousel .list .item .topic {
                font-size: 1.5em;
            }
            
            .thumbnail {
                bottom: 60px;
                max-width: 95%;
            }
            
            .thumbnail .item {
                width: 60px;
                height: 90px;
            }
        }
        
        /* Accessibility styles */
        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0;
        }
        
        /* Focus indicators for keyboard navigation */
        .thumbnail .item:focus,
        .arrows button:focus {
            outline: 3px solid #f1683a;
            outline-offset: 2px;
        }
    </style>
</head>
<body>
    <div class="carousel-container">
        <div class="carousel" aria-roledescription="carousel" aria-label="Tanzania Police Force Officials">
            <!-- List of Slides - Static Version -->
            <div class="list">
                <!-- Slide 1 -->
                <div class="item active" aria-roledescription="slide" aria-label="Slide 1 of 4">
                    <img src="assets/images/people/igpco.jpg" alt="INSPECTOR GENERAL OF POLICE" class="animate-subtle-zoom" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="image-fallback" style="display:none;">INSPECTOR GENERAL OF POLICE</div>
                    <div class="content">
                        <div class="author">POLICE FORCE</div>
                        <div class="title">INSPECTOR GENERAL OF POLICE</div>
                        <div class="topic">TANZANIA</div>
                        <div class="des">Head of Tanzania Police Force</div>
                        <div class="buttons">
                        </div>
                    </div>
                </div>
                
                <!-- Slide 2 -->
                <div class="item" aria-roledescription="slide" aria-label="Slide 2 of 4">
                    <img src="assets/images/people/news2.jpeg" alt="COMMANDANT" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="image-fallback" style="display:none;">COMMANDANT</div>
                    <div class="content">
                        <div class="author">POLICE & IAA ASSOCIATION</div>
                        <div class="title">ACADEMIC INTERGRATION</div>
                        <div class="topic">TPS</div>
                        <div class="des">Higher Studies TPS</div>
                        <div class="buttons">
                        </div>
                    </div>
                </div>
                
                <!-- Slide 3 -->
                <div class="item" aria-roledescription="slide" aria-label="Slide 3 of 4">
                    <img src="assets/images/people/samia.jpeg" alt="PRESIDENT" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="image-fallback" style="display:none;">PRESIDENT OF TANZANIA</div>
                    <div class="content">
                        <div class="author">GOVERNMENT</div>
                        <div class="title">PRESIDENT</div>
                        <div class="topic">TANZANIA</div>
                        <div class="des">The President of Tanzania</div>
                        <div class="buttons">
                        </div>
                    </div>
                </div>
                
                <!-- Slide 4 -->
                <div class="item" aria-roledescription="slide" aria-label="Slide 4 of 4">
                    <img src="assets/images/people/maafande.jpeg" alt="OFFICERS" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="image-fallback" style="display:none;">POLICE OFFICERS</div>
                    <div class="content">
                        <div class="author">TRAINING</div>
                        <div class="title">OFFICERS</div>
                        <div class="topic">POLICE FORCE</div>
                        <div class="des">Police Officers in Training</div>
                        <div class="buttons">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Thumbnail Navigation - Static Version -->
            <div class="thumbnail" role="tablist" aria-label="Slide selection">
                <!-- Thumbnail 1 -->
                <div class="item active" onclick="goToSlide(0)" role="tab" tabindex="0" aria-selected="true" aria-controls="slide-0" id="thumb-0" onkeydown="handleKeyDown(event, 0)">
                    <img src="assets/images/people/igpco.jpg" alt="INSPECTOR GENERAL OF POLICE" onerror="this.style.display='none'; this.parentNode.style.backgroundColor='#333';">
                    <div class="content">
                        <div class="title">INSPECTOR GENERAL OF POLICE</div>
                        <div class="description">TANZANIA</div>
                    </div>
                </div>
                
                <!-- Thumbnail 2 -->
                <div class="item" onclick="goToSlide(1)" role="tab" tabindex="0" aria-selected="false" aria-controls="slide-1" id="thumb-1" onkeydown="handleKeyDown(event, 1)">
                    <img src="assets/images/people/news2.jpeg" alt="ACADEMIC INTERGRATION" onerror="this.style.display='none'; this.parentNode.style.backgroundColor='#333';">
                    <div class="content">
                        <div class="title">POLICE & IAA ASSOCIATION</div>
                        <div class="description">Higher Studies TPS</div>
                    </div>
                </div>
                
                <!-- Thumbnail 3 -->
                <div class="item" onclick="goToSlide(2)" role="tab" tabindex="0" aria-selected="false" aria-controls="slide-2" id="thumb-2" onkeydown="handleKeyDown(event, 2)">
                    <img src="assets/images/people/samia.jpeg" alt="PRESIDENT" onerror="this.style.display='none'; this.parentNode.style.backgroundColor='#333';">
                    <div class="content">
                        <div class="title">PRESIDENT</div>
                        <div class="description">TANZANIA</div>
                    </div>
                </div>
                
                <!-- Thumbnail 4 -->
                <div class="item" onclick="goToSlide(3)" role="tab" tabindex="0" aria-selected="false" aria-controls="slide-3" id="thumb-3" onkeydown="handleKeyDown(event, 3)">
                    <img src="assets/images/people/maafande.jpeg" alt="OFFICERS" onerror="this.style.display='none'; this.parentNode.style.backgroundColor='#333';">
                    <div class="content">
                        <div class="title">OFFICERS</div>
                        <div class="description">POLICE FORCE</div>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Arrows -->
            <div class="arrows">
                <button id="prev" onclick="prevSlide()" aria-label="Previous slide" tabindex="0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </button>
                <button id="next" onclick="nextSlide()" aria-label="Next slide" tabindex="0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
            
            <!-- Progress Indicator -->
            <div class="time" id="progressBar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"></div>
        </div>
    </div>

    <script>
// Variables
let currentSlide = 0;
const slides = document.querySelectorAll('.carousel .list .item');
const thumbnails = document.querySelectorAll('.thumbnail .item');
const totalSlides = slides.length;
let autoplayInterval;
const timeAutoNext = 7000;
const transitionDelay = 100; // Increased from 50ms for better reliability
let isTransitioning = false;

// Initialize
function init() {
    // Set initial states
    updateSlideAttributes();
    
    // Start progress bar and autoplay
    resetTimeProgress();
    startAutoplay();
    
    // Add event listeners
    window.addEventListener('resize', handleResize);
    document.addEventListener('keydown', handleGlobalKeyDown);
    
    // Add pause/resume on focus/blur
    document.addEventListener('visibilitychange', handleVisibilityChange);
}

// Update ARIA attributes for accessibility
function updateSlideAttributes() {
    slides.forEach((slide, index) => {
        slide.setAttribute('id', `slide-${index}`);
        slide.setAttribute('aria-hidden', index === currentSlide ? 'false' : 'true');
    });
    
    thumbnails.forEach((thumb, index) => {
        thumb.setAttribute('aria-selected', index === currentSlide ? 'true' : 'false');
    });
}

// Handle visibility change (pause autoplay when tab not visible)
function handleVisibilityChange() {
    if (document.hidden) {
        clearInterval(autoplayInterval);
    } else {
        startAutoplay();
    }
}

// Handle keyboard navigation for thumbnails
function handleKeyDown(event, index) {
    if (event.key === 'Enter' || event.key === ' ') {
        event.preventDefault();
        goToSlide(index);
    }
}

// Handle global keyboard navigation
function handleGlobalKeyDown(event) {
    switch (event.key) {
        case 'ArrowLeft':
            event.preventDefault();
            prevSlide();
            break;
        case 'ArrowRight':
            event.preventDefault();
            nextSlide();
            break;
    }
}

// Handle window resize for responsive behavior
function handleResize() {
    // Adjust the carousel for responsive layouts
    const carousel = document.querySelector('.carousel');
    if (window.innerWidth <= 768) {
        // Additional responsive behavior could be added here
    }
}

function startAutoplay() {
    clearInterval(autoplayInterval);
    autoplayInterval = setInterval(() => {
        nextSlide();
    }, timeAutoNext);
}

function resetTimeProgress() {
    const progressBar = document.getElementById('progressBar');
    if (progressBar) {
        progressBar.style.width = '0%';
        progressBar.style.transition = 'none';
        progressBar.setAttribute('aria-valuenow', '0');
        
        // Use requestAnimationFrame for smoother transitions
        requestAnimationFrame(() => {
            setTimeout(() => {
                progressBar.style.width = '100%';
                progressBar.style.transition = `width ${timeAutoNext/1000}s linear`;
                progressBar.setAttribute('aria-valuenow', '100');
            }, 50);
        });
    }
}

function nextSlide() {
    if (isTransitioning) return;
    changeSlide((currentSlide + 1) % totalSlides);
}

function prevSlide() {
    if (isTransitioning) return;
    changeSlide((currentSlide - 1 + totalSlides) % totalSlides);
}

function goToSlide(index) {
    if (currentSlide === index || isTransitioning) return;
    changeSlide(index);
}

function changeSlide(newIndex) {
    isTransitioning = true;
    
    // Remove active class from current slide
    slides[currentSlide].classList.remove('active');
    slides[currentSlide].setAttribute('aria-hidden', 'true');
    thumbnails[currentSlide].classList.remove('active');
    thumbnails[currentSlide].setAttribute('aria-selected', 'false');
    
    // Reset the progress bar at the beginning of slide change
    resetTimeProgress();
    
    // Use requestAnimationFrame for smoother transitions
    requestAnimationFrame(() => {
        setTimeout(() => {
            // Update current slide
            currentSlide = newIndex;
            
            // Add active class to new slide
            slides[currentSlide].classList.add('active');
            slides[currentSlide].setAttribute('aria-hidden', 'false');
            thumbnails[currentSlide].classList.add('active');
            thumbnails[currentSlide].setAttribute('aria-selected', 'true');
            
            // Focus on the active thumbnail for accessibility
            if (document.activeElement === thumbnails[currentSlide] || 
                (document.activeElement && document.activeElement.closest('.thumbnail'))) {
                thumbnails[currentSlide].focus({preventScroll: true});
            }
            
            // Complete transition after animation ends
            setTimeout(() => {
                isTransitioning = false;
            }, 500);
        }, transitionDelay);
    });
    
    // Restart the autoplay timer
    startAutoplay();
}

// Error handling for images
function handleImageError(img) {
    img.style.display = 'none';
    img.nextElementSibling.style.display = 'flex';
}

// Preload images to prevent flickering
function preloadImages() {
    const imageUrls = [
        'assets/images/people/igpco.jpeg',
        'assets/images/people/news2.jpeg',
        'assets/images/people/samia.jpeg',
        'assets/images/people/maafande.jpeg'
    ];
    
    imageUrls.forEach(url => {
        const img = new Image();
        img.src = url;
    });
}

// Initialize the carousel
window.addEventListener('load', () => {
    preloadImages();
    init();
});

// Clean up event listeners when page is unloaded
window.addEventListener('unload', () => {
    clearInterval(autoplayInterval);
    window.removeEventListener('resize', handleResize);
    document.removeEventListener('keydown', handleGlobalKeyDown);
    document.removeEventListener('visibilitychange', handleVisibilityChange);
});
    </script>
</body>
</html>    


    <!-- Commandant news -->

<style>
/* Mobile Responsive Styles */
@media screen and (max-width: 768px) {
    .commandant {
        padding: 12px;
        margin-bottom: 15px;
        font-size: 14px;
        height: 50px !important; /* Fixed height for tablets */
        overflow-y: auto; /* Enable scrolling if content exceeds height */
    }
    .commandant img{
        height: 80vw;
    }
}
</style>
<div class="py-8 md:py-16 bg-gradient-to-b from-blue-50 to-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-8 md:mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Message from the Commandant</h2>
            <div class="w-16 md:w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        
        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-8" 
             x-data="{ isVisible: false }" 
             x-intersect="isVisible = true">
            <div class="w-full md:w-1/3 transform" 
                 x-class:="isVisible ? 'translate-x-0 opacity-100' : '-translate-x-12 opacity-0'"
                 x-transition:enter="transition ease-out duration-1000 delay-300 commandant">
                <div class="relative overflow-hidden rounded-lg shadow-xl group">
                    <!-- Modified image container to prevent stretching -->
                    <div class="aspect-w-4 aspect-h-5 max-w-full">
                        <img src="{{ asset('assets/images/people/mungi.png') }}" alt="TPS School Commandant" 
                             class="w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </div>
            </div>
            
            <div class="w-full md:w-2/3 mt-6 md:mt-0" 
                 x-class:="isVisible ? 'translate-x-0 opacity-100' : 'translate-x-12 opacity-0'"
                 x-transition:enter="transition ease-out duration-1000 delay-600">
                <div class="bg-white p-6 md:p-8 rounded-xl shadow-lg border border-gray-100">
                    <h3 class="text-xl md:text-2xl font-semibold mb-3 md:mb-4 text-gray-800">Welcome to TPS</h3>
                    <p class="text-gray-600 mb-4 md:mb-6 leading-relaxed text-sm md:text-base">
                        It is my honor to welcome you to our esteemed institution. At TPS, we are committed to excellence in training and developing the next generation of professionals. Our dedicated faculty and state-of-the-art facilities create an environment where students can thrive academically and personally.
                    </p>
                    <a href="{{ route('about.leadership')}}" class="inline-flex items-center group text-blue-600 font-semibold hover:text-blue-800 transition-all duration-300 text-sm md:text-base">
                        Meet our leadership team
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


<!-- News, Announcements & Events Section -->
<div class="py-16 bg-gray-50" x-data="{ tab: 'news' }">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">News & Announcements</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        
        <!-- Section Selector Tabs -->

        <!-- Tab Selector -->
<div class="flex justify-center mb-8">
    <div class="inline-flex bg-gray-100 rounded-lg p-1 shadow-sm">
        <button 
            @click="tab = 'news'" 
            :class="{'bg-blue-600 text-white': tab === 'news', 'text-gray-700 hover:text-gray-900': tab !== 'news'}" 
            class="px-4 py-2 font-medium rounded-md transition-all duration-200 ease-in-out">
            News
        </button>
        <button 
            @click="tab = 'announcements'" 
            :class="{'bg-blue-600 text-white': tab === 'announcements', 'text-gray-700 hover:text-gray-900': tab !== 'announcements'}" 
            class="px-4 py-2 font-medium rounded-md transition-all duration-200 ease-in-out">
            Announcements
        </button>
        <button 
            @click="tab = 'events'" 
            :class="{'bg-blue-600 text-white': tab === 'events', 'text-gray-700 hover:text-gray-900': tab !== 'events'}" 
            class="px-4 py-2 font-medium rounded-md transition-all duration-200 ease-in-out">
            Events
        </button>
    </div>
</div>
<!-- News Tab with Updated Layout -->
<div x-show="tab === 'news'" class="transition-all duration-300 ease-in-out">
    <!-- Main news grid layout -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Featured News Item (Larger, left column) -->
        <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300"
             x-data="{ 
                currentSlide: 0,
                slides: [
                    { 
                        image: '/assets/images/newsmain/igp.png', 
                        alt: 'Leadership Training Closure Ceremony',
                        title: 'SHEREHE ZA KUFUNGA MAFUNZO UONGOZI MDOGO TPS – MOSHI KOZI NO 2-2024/2025',
                        author: 'Yona Dauden',
                        date: 'March 7, 2025',
                        content: 'MKUU WA JESHI LA POLISI TANZANIA IGP CAMILLUS M. WAMBURA NI MGENI RASMI KATIKA SHEREHE YA KUFUNGA MAFUNZO YA UONGOZI MDOGO TPS – MOSHI KOZI NO 2-2024/2025...',
                        link: '/news/1'
                    },
                    { 
                        image: '/assets/images/news&events/news3.jpeg', 
                        alt: 'Bravo COY Team',
                        title: 'TPS-MOSHI & IAA Academic Board meeting',
                        author: 'Baraka charles mussula',
                        date: 'February 25, 2025',
                        content: '',
                        link: '/news/2'
                    },
                    { 
                        image: '/assets/images/news&events/news1.jpeg', 
                        alt: 'Zanzibar Revolution Anniversary',
                        title: 'TPS-MOSHI & IAA Academic Board meeting',
                        author: 'Baraka charles mussula',
                        date: 'January 12, 2025',
                        content: '',
                        link: '/news/3'
                    }
                ],
                startSlideshow() {
                    setInterval(() => {
                        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                    }, 5000); // Change slide every 5 seconds
                }
             }"
             x-init="startSlideshow()">
            <div class="relative h-80 overflow-hidden">
                <!-- Slideshow images -->
                <template x-for="(slide, index) in slides" :key="index">
                    <img :src="slide.image" 
                         :alt="slide.alt" 
                         class="w-full h-full object-cover absolute transition-opacity duration-500 ease-in-out"
                         :class="{'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index}">
                </template>
                
                <!-- Slide indicators -->
                <div class="absolute bottom-12 left-0 right-0 flex justify-center space-x-2">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="currentSlide = index" 
                                class="w-2 h-2 rounded-full transition-all duration-300 focus:outline-none"
                                :class="{'bg-white w-4': currentSlide === index, 'bg-white/50': currentSlide !== index}">
                        </button>
                    </template>
                </div>
                
                <div class="absolute bottom-0 left-0 bg-blue-600 text-white px-3 py-1 text-sm font-medium">
                    Featured News
                </div>
            </div>
            
            <!-- Dynamic content section that changes with slides -->
            <div class="p-6">
                <template x-for="(slide, index) in slides" :key="index">
                    <div x-show="currentSlide === index"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0">
                        <h3 class="text-2xl font-bold text-gray-800 mb-3" x-text="slide.title"></h3>
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <span class="mr-3 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span x-text="slide.author"></span>
                            </span>
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span x-text="slide.date"></span>
                            </span>
                        </div>
                        <p class="text-gray-600 mb-4 text-lg" x-text="slide.content"></p>
                        <a :href="slide.link" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center text-lg">
                            Read more
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </template>
            </div>
        </div>

        <!-- Right column with 2x2 grid of smaller news items -->
        <div class="grid grid-cols-2 gap-4">
            <!-- News Item 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="/assets/images/newsmain/mungi cup.jpg" alt="Bravo COY Team" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 bg-blue-600 text-white px-2 py-1 text-xs font-medium">
                        Latest News
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="text-sm font-bold text-gray-800 mb-1">TIMU YA BRAVO COY YAIBUKA MSHINDI MUNGI CAP.</h3>
                    <div class="flex items-center text-gray-500 text-xs mb-2">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            February 25, 2025
                        </span>
                    </div>
                    <a href="/news/2" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center text-xs">
                        Read more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- News Item 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="/assets/images/newsmain/zenji.png" alt="Zanzibar Revolution Anniversary" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 bg-blue-600 text-white px-2 py-1 text-xs font-medium">
                        Latest News
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="text-sm font-bold text-gray-800 mb-1">KHERI YA MIAKA 61 YA MAPINDUZI YA ZANZIBAR</h3>
                    <div class="flex items-center text-gray-500 text-xs mb-2">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            January 12, 2025
                        </span>
                    </div>
                    <a href="/news/3" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center text-xs">
                        Read more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- News Item 4 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="/assets/images/newsmain/miti.jpg" alt="Tree Planting for New Year" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 bg-blue-600 text-white px-2 py-1 text-xs font-medium">
                        Latest Event
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="text-sm font-bold text-gray-800 mb-1">MWAKA MPYA 2025 KWA UPANDAJI MITI</h3>
                    <div class="flex items-center text-gray-500 text-xs mb-2">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            January 2, 2025
                        </span>
                    </div>
                    <a href="/news/4" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center text-xs">
                        Read more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- News Item 5 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="/assets/images/newsmain/zahanatiWhatsApp-Image-2024-12-27-at-4.23.26-PM-300x169.jpeg" alt="Community Service at Sinai Clinic" class="w-full h-full object-cover">
                    <div class="absolute bottom-0 left-0 bg-blue-600 text-white px-2 py-1 text-xs font-medium">
                        Latest News
                    </div>
                </div>
                <div class="p-3">
                    <h3 class="text-sm font-bold text-gray-800 mb-1">USAFI KATIKA ZAHANATI YA SINAI</h3>
                    <div class="flex items-center text-gray-500 text-xs mb-2">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            December 27, 2024
                        </span>
                    </div>
                    <a href="/news/5" class="text-blue-600 hover:text-blue-800 font-medium inline-flex items-center text-xs">
                        Read more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Announcements Tab -->
                <div x-show="tab === 'announcements'" class="transition-all duration-300 ease-in-out">
                    <ul class="divide-y divide-gray-200">
                        <!-- New Police Job Announcement with PDF -->
                        <li class="py-4 flex items-start">
                            <div class="flex-shrink-0 bg-red-100 text-red-800 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-800">Police Job Openings Announced</h4>
                                <p class="text-gray-600">The Tanzania Police Force is now accepting applications for multiple positions. Check the instructions document for eligibility requirements and application procedures.</p>
                                <p class="text-sm text-gray-500 mt-2">Posted on March 21, 2025</p>
                                
                               <!-- PDF Download Section -->
                                <div class="mt-4 bg-gray-50 p-4 rounded-lg border border-gray-200">
                                    <!-- First Existing PDF -->
                                    <div class="flex items-center justify-between mb-4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">New Job Announcement 2025</p>
                                                <p class="text-xs text-gray-500">PDF • 2.4 MB</p>
                                            </div>
                                        </div>
                                        <a href="/assets/documents/new-police-job-announcement.pdf" download class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            Download PDF
                                        </a>
                                    </div>

                                    <!-- New PDF for Application Processes and Procedures -->
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                            <div class="ml-3">
                                                <p class="text-sm font-medium text-gray-900">Job Application Instructions</p>
                                                <p class="text-xs text-gray-500">PDF • 4.8 MB</p>
                                            </div>
                                        </div>
                                        <a href="/assets/documents/police-job-instructions.pdf" download class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                            Download PDF
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                        <li class="py-4 flex items-start">
                            <div class="flex-shrink-0 bg-blue-100 text-blue-800 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-800">Enrollment Open for New Term</h4>
                                <p class="text-gray-600">Applications for the upcoming term are now open. Early applicants will receive priority consideration.</p>
                                <p class="text-sm text-gray-500 mt-2">Posted on March 1, 2025</p>
                            </div>
                        </li>
                        <li class="py-4 flex items-start">
                            <div class="flex-shrink-0 bg-green-100 text-green-800 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-800">New Driving Course Added</h4>
                                <p class="text-gray-600">We're excited to announce our new advanced driving course starting next month.</p>
                                <p class="text-sm text-gray-500 mt-2">Posted on February 25, 2025</p>
                            </div>
                        </li>
                    </ul>
                    <div class="mt-6 text-center">
                        <a href="/news/upcoming" class="inline-flex items-center group text-blue-600 font-semibold hover:text-blue-800 transition-all duration-300">
                            View all announcements
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>
				
                
                <!-- Events Tab -->
                <div x-show="tab === 'events'" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform -translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="transition-all duration-300 ease-in-out">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Event Card 1 -->
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="relative h-56">
                                <!-- Background Image -->
                                <img src="/assets/images/Logos/promotional-course.jpg" alt="Promotional Course" class="absolute inset-0 w-full h-full object-cover">
                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/20 flex flex-col justify-center p-6">
                                    <!-- Description on top of background image -->
                                    <span lang="it">
                                        <p class="text-white mb-4 font-italic text-lg">
                                            "Congratulations to all the newly promoted Corporals and Sergeants of the Tanzania Police Force! Your dedication and hard work during your promotional courses have paid off. Wishing you continued success in your service to the nation."
                                        </p>
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-blue-100 text-blue-800 text-center rounded-lg p-3 mr-4">
                                        <div class="text-2xl font-bold">07</div>
                                        <div class="text-sm">Mar</div>
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-semibold text-gray-800">Promotional Course Passingout</h4>
                                        <p class="text-gray-500">9:00 AM - 4:00 PM, Kilele Pori</p>
                                    </div>
                                </div>
                                <a href="/events-detail/1" class="text-blue-600 hover:underline">Event details</a>
                            </div>
                        </div>
                        
                        <!-- Event Card 2 -->
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                            <div class="relative h-56">
                                <!-- Background Image -->
                                <img src="/assets/images/facilities/kaganda.jpeg" alt="Women's Day" class="absolute inset-0 w-full h-full object-cover">
                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/20 flex flex-col justify-center p-6">
                                    <!-- Description on top of background image -->
                                    <span lang="it">
                                        <p class="text-white mb-4 font-italic text-lg">
                                            "On this International Women's Day, we celebrate the incredible strength, resilience, and achievements of women everywhere. May we continue to champion equality, empower each other, and build a future where every woman's voice is heard and valued. Here's to the women who inspire us daily!"
                                        </p>
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-center mb-4">
                                    <div class="bg-green-100 text-green-800 text-center rounded-lg p-3 mr-4">
                                        <div class="text-2xl font-bold">09</div>
                                        <div class="text-sm">Mar</div>
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-semibold text-gray-800">Womens Day</h4>
                                        <p class="text-gray-500">1:00 PM - 5:00 PM, Arusha</p>
                                    </div>
                                </div>
                                <a href="/events-detail/2" class="text-blue-600 hover:underline">Event details</a>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 text-center">
                        <a href="/news/upcoming" class="inline-flex items-center group text-blue-600 font-semibold hover:text-blue-800 transition-all duration-300">
                            View all events
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tanzania Police Service Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .course-card {
            transition: all 0.3s ease;
            animation: fadeIn 0.6s ease-out;
        }
        .course-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }
        .course-image {
            transition: filter 0.3s ease;
        }
        .course-card:hover .course-image {
            filter: brightness(110%);
        }
        
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    .slideshow-container {
        width: 606.67px;
        height: 348px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        background-color: white;
        overflow: hidden;
        position: relative;
    }
    
    .columns-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        width: 542px;
        margin: 0 auto;
    }
    
    .left-column {
        width: 271px;
        height: 260px;
        box-sizing: border-box;
        overflow: hidden;
        position: relative;
    }
    
    .right-column {
        width: 271px;
        height: 260px;
        box-sizing: border-box;
        padding: 20px;
        overflow-y: auto;
    }
    
    .column-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .image-container:hover .column-image {
        transform: scale(1.05);
    }
    
    .dots {
        text-align: center;
        position: absolute;
        bottom: 15px;
        width: 100%;
        z-index: 10;
    }
    
    .dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        margin: 0 5px;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .dot.active {
        width: 24px;
        border-radius: 4px;
        background-color: #3b82f6;
    }
    
    .icon-circle {
        transition: all 0.3s ease;
    }
    
    .slide-content:hover .icon-circle {
        transform: scale(1.1);
    }
    
    .progress-bar {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        width: 0;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6);
        z-index: 5;
    }
    
    .slide-number {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 0.75rem;
        font-weight: 500;
    }
    
    .nav-button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.8);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
    }
    
    .nav-button:hover {
        background-color: white;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }
    
    .nav-prev {
        left: 10px;
    }
    
    .nav-next {
        right: 10px;
    }
    
    .description-text {
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.5s ease;
        transition-delay: 0.2s;
    }
    
    .active .description-text {
        opacity: 1;
        transform: translateY(0);
    }
    
    /* Custom scrollbar */
    .right-column::-webkit-scrollbar {
        width: 4px;
    }
    
    .right-column::-webkit-scrollbar-track {
        background: #f1f1f1;
    }
    
    .right-column::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 10px;
    }
    
    .right-column::-webkit-scrollbar-thumb:hover {
        background: #9ca3af;
    }
    [x-cloak] { display: none !important; }
</style>

<div x-data="{ 
        activeSlide: 1, 
        autoplay: true,
        totalSlides: 3,
        progressWidth: 0,
        startAutoplay() {
            if (this.autoplay) {
                this.interval = setInterval(() => {
                    this.activeSlide = this.activeSlide === this.totalSlides ? 1 : this.activeSlide + 1;
                    this.progressWidth = 0;
                }, 7000);
                this.startProgress();
            }
        },
        startProgress() {
            const duration = 7000;
            const start = Date.now();
            const updateProgress = () => {
                const elapsed = Date.now() - start;
                this.progressWidth = (elapsed / duration) * 100;
                if (elapsed < duration && this.autoplay) {
                    requestAnimationFrame(updateProgress);
                }
            };
            requestAnimationFrame(updateProgress);
        },
        stopAutoplay() {
            clearInterval(this.interval);
            this.autoplay = false;
        },
        init() {
            this.startAutoplay();
        }
    }

    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-blue-100" x-data="{ activeModal: null }">
    <section class="container mx-auto px-4 py-12">



    <h2 class="text-4xl font-bold text-center text-blue-900 mb-12 animate-pulse">
    Discover Tanzania Police School Courses
</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
    <!-- Basic Recruit Courses -->
    <div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300"
        x-data="{ isHovered: false, currentSlide: 0, slides: [
                    '{{ asset('assets/images/Logos/KURUT.png') }}',
                    '{{ asset('assets/images/Logos/KURUTA2.jpeg') }}',
                    '{{ asset('assets/images/news&events/proficiency.png') }}',
                    '{{ asset('assets/images/news&events/prof2.png') }}'
                 ] }" @mouseenter="isHovered = true; startSlideshow()" @mouseleave="isHovered = false; stopSlideshow()"
        x-init="slideInterval = null;
                        startSlideshow = function() {
                            if (slideInterval === null) {
                                slideInterval = setInterval(() => {
                                    currentSlide = (currentSlide + 1) % slides.length;
                                }, 3000);
                            }
                        };
                        stopSlideshow = function() {
                            clearInterval(slideInterval);
                            slideInterval = null;
                        }">
        <div class="relative h-64 overflow-hidden">
            <template x-for="(slide, index) in slides" :key="index">
                <img :src="slide" alt="Basic Recruit Courses"
                    class="course-image absolute w-full h-full object-cover transition-transform duration-300"
                    :class="{ 'scale-110': isHovered, 'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index }"
                    style="transition: opacity 0.5s ease-in-out">
            </template>
            <div
                class="absolute inset-0 bg-blue-900 bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                <span class="text-white text-xl font-bold">Police Recruitment</span>
            </div>
            <!-- Slideshow Controls -->
            <div class="absolute bottom-2 left-0 right-0 flex justify-center gap-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click.stop="currentSlide = index"
                        class="w-2 h-2 rounded-full transition-colors duration-300"
                        :class="currentSlide === index ? 'bg-white' : 'bg-white bg-opacity-50'"></button>
                </template>
            </div>
        </div>
        <div class="p-6">
            <h3 class="text-2xl font-semibold text-blue-800 mb-4">Basic Recruit Courses</h3>
            <p class="text-gray-600 mb-4">
                Comprehensive entry-level training program designed to transform motivated individuals into professional
                police officers through rigorous physical and mental preparation.
            </p>
           <button @click="activeModal = 'recruit'; window.location.href='{{ route('careers.benefits') }}'"
        class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition duration-300 transform hover:scale-105">
        Learn More
           </button>
        </div>
    </div>

    <!-- Academic Courses -->
<div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300"
    x-data="{ 
        isHovered: false, 
        currentSlide: 0, 
        slideInterval: null,
        slides: [
            '{{ asset('assets/images/motions/P360.mp4') }}',
            '{{ asset('assets/images/motions/P1.mp4') }}',
            '{{ asset('assets/images/motions/videoblocks.mp4') }}',
            '{{ asset('assets/images/motions/videoblocks-flying-through-futuristic-technological.mp4') }}'
        ]
    }" 
    @mouseenter="isHovered = true"
    @mouseleave="isHovered = false"
    x-init="
        function startSlideshow() {
            if (slideInterval === null) {
                slideInterval = setInterval(() => {
                    currentSlide = (currentSlide + 1) % slides.length;
                }, 5000);
            }
        }
        
        function stopSlideshow() {
            if (slideInterval !== null) {
                clearInterval(slideInterval);
                slideInterval = null;
            }
        }
        
        // Start slideshow immediately on page load
        startSlideshow();
        
        // Clean up on element removal
        $cleanup = () => stopSlideshow();
    ">
    <div class="relative h-64 overflow-hidden">
        <template x-for="(slide, index) in slides" :key="index">
            <div class="absolute inset-0 transition-opacity duration-500"
                :class="{ 'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index }">
                <video class="w-full h-full object-cover" autoplay loop muted playsinline
                    :class="{ 'scale-110': isHovered }"
                    style="transition: transform 0.3s ease-in-out">
                    <source :src="slide" type="video/mp4">
                    Your browser does not support video playback.
                </video>
            </div>
        </template>
        <div
            class="absolute inset-0 bg-green-900 bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
            <span class="text-white text-xl font-bold">Academic Excellence</span>
        </div>
        <!-- Slideshow Controls -->
        <div class="absolute bottom-2 left-0 right-0 flex justify-center gap-2">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click.stop="currentSlide = index"
                    class="w-2 h-2 rounded-full transition-colors duration-300"
                    :class="currentSlide === index ? 'bg-white' : 'bg-white bg-opacity-50'"></button>
            </template>
        </div>
    </div>
    <div class="p-6">
        <h3 class="text-2xl font-semibold text-green-800 mb-4">Academic Courses</h3>
        <p class="text-gray-600 mb-4">
            Advanced educational programs offering undergraduate degrees and specialized certifications in
            criminology, forensic science, and law enforcement management.
        </p>
            <button @click="activeModal = 'academic'; window.location.href='{{ route('admissions.programes') }}'"
             class="w-full bg-green-500 text-white py-3 rounded-lg hover:bg-green-600 transition duration-300 transform hover:scale-105">
             Explore Programs
            </button>
       </div>
</div>
    <!-- Promotional Courses -->
<div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300"
    x-data="{ 
        isHovered: false, 
        currentSlide: 0, 
        slideInterval: null,
        slides: [
            '{{ asset('assets/images/courses/WhatsApp Image 2025-03-19 at 7.58.15 PM.jpeg') }}',
            '{{ asset('assets/images/news&events/uhaini.JPG') }}',
            '{{ asset('assets/images/news&events/gwaride.JPG') }}',
            '{{ asset('assets/images/Logos/Snapinsta.app_464550583_567745649165392_6800108106112023936_n_1080-1024x576.jpg') }}'
        ]
    }" 
    @mouseenter="isHovered = true" 
    @mouseleave="isHovered = false"
    x-init="
        startSlideshow = function() {
            slideInterval = setInterval(() => {
                currentSlide = (currentSlide + 1) % slides.length;
            }, 2000);
        };
        stopSlideshow = function() {
            if (slideInterval) {
                clearInterval(slideInterval);
                slideInterval = null;
            }
        };
        startSlideshow(); // Start the slideshow immediately
    ">
    <div class="relative h-64 overflow-hidden">
        <template x-for="(slide, index) in slides" :key="index">
            <img :src="slide" alt="Promotional Courses"
                class="course-image absolute w-full h-full object-cover transition-transform duration-300"
                :class="{ 'scale-110': isHovered, 'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index }"
                style="transition: opacity 0.5s ease-in-out">
        </template>
        <div class="absolute inset-0 bg-purple-900 bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
            <span class="text-white text-xl font-bold">Career Advancement</span>
        </div>
        <!-- Slideshow Controls -->
        <div class="absolute bottom-2 left-0 right-0 flex justify-center gap-2">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click.stop="currentSlide = index"
                    class="w-2 h-2 rounded-full transition-colors duration-300"
                    :class="currentSlide === index ? 'bg-white' : 'bg-white bg-opacity-50'"></button>
            </template>
        </div>
    </div>
    <div class="p-6">
        <h3 class="text-2xl font-semibold text-purple-800 mb-4">Promotional Courses</h3>
        <p class="text-gray-600 mb-4">
            Specialized leadership and skill enhancement training designed to prepare officers for higher ranks and
            strategic roles to play within the Tanzania Police Service.
        </p>
       <button @click="window.location.href='{{ route('police.promotional-courses') }}'"
    class="w-full bg-purple-500 text-white py-3 rounded-lg hover:bg-purple-600 transition duration-300 transform hover:scale-105">
    View Details
</button>
    </div>
</div>
    <!-- Proficiency Courses -->
    <div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300"
        x-data="{ isHovered: false, currentSlide: 0, slides: [
                    '{{ asset('assets/images/news&events/majaliwa.png') }}',
                    '{{ asset('assets/images/courses/WhatsApp Image 2025-03-19 at 7.58.15 PM.jpeg') }}',
                    '{{ asset('assets/images/news&events/medani.JPG') }}',
                    '{{ asset('assets/images/news&events/2025_03_06_17_27_IMG_4048.JPG') }}'
                ] }" @mouseenter="isHovered = true; startSlideshow()" @mouseleave="isHovered = false; stopSlideshow()"
        x-init="slideInterval = null;
                        startSlideshow = function() {
                            if (slideInterval === null) {
                                slideInterval = setInterval(() => {
                                    currentSlide = (currentSlide + 1) % slides.length;
                                }, 3000);
                            }
                        };
                        stopSlideshow = function() {
                            clearInterval(slideInterval);
                            slideInterval = null;
                        }">
        <div class="relative h-64 overflow-hidden">
            <template x-for="(slide, index) in slides" :key="index">
                <img :src="slide" alt="Proficiency Courses"
                    class="course-image absolute w-full h-full object-cover transition-transform duration-300"
                    :class="{ 'scale-110': isHovered, 'opacity-100': currentSlide === index, 'opacity-0': currentSlide !== index }"
                    style="transition: opacity 0.5s ease-in-out">
            </template>
            <div
                class="absolute inset-0 bg-orange-900 bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                <span class="text-white text-xl font-bold">Skill Enhancement</span>
            </div>
            <!-- Slideshow Controls -->
            <div class="absolute bottom-2 left-0 right-0 flex justify-center gap-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click.stop="currentSlide = index"
                        class="w-2 h-2 rounded-full transition-colors duration-300"
                        :class="currentSlide === index ? 'bg-white' : 'bg-white bg-opacity-50'"></button>
                </template>
            </div>
        </div>
        <div class="p-6">
            <h3 class="text-2xl font-semibold text-orange-800 mb-4">Proficiency Courses</h3>
            <p class="text-gray-600 mb-4">
                Specialized training programs focusing on developing specific technical skills, tactical operations, and
                expertise in areas such as investigation, cybersecurity, and intelligence.
            </p>
            <button 
    @click="window.location.href='{{ route('admissions.proficiency-courses') }}'"
    class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600 transition duration-300 transform hover:scale-105">
    View Programs
</button>
        </div>
    </div>
</div>

                <!-- Our Facilities -->


<!-- Facilities Section - Updated with Side-by-Side Category Slideshows -->
<div class="py-16 bg-white" x-data="facilitiesSideBySideSlider()">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Facilities</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Explore our modern facilities designed to provide a conducive environment for learning and training.</p>
        </div>
        
        <!-- Side-by-Side Slideshows -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Left Side: ICT Labs & Conference Hall -->
            <div class="facilities-side">
                <!-- Category Navigation - Left Side -->
                <div class="flex justify-center mb-4">
                    <div class="flex flex-wrap justify-center gap-2">
                        <template x-for="(category, index) in leftCategories" :key="index">
                            <button @click="changeLeftCategory(index)" 
                                    class="px-4 py-2 rounded-lg transition-all duration-300"
                                    :class="leftCurrentCategory === index ? 'bg-blue-600 text-white font-medium' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'">
                                <span x-text="category.name"></span>
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Left Slideshow -->
                <div class="relative overflow-hidden rounded-xl shadow-xl h-80 mb-4" 
                     @touchstart="leftTouchStart" 
                     @touchend="leftTouchEnd">
                    
                    <!-- All Left Slides -->
                    <template x-for="(category, categoryIndex) in leftCategories" :key="categoryIndex">
                        <template x-for="(slide, slideIndex) in category.slides" :key="`left-${categoryIndex}-${slideIndex}`">
                            <div x-show="leftCurrentCategory === categoryIndex && leftCurrentSlide === slideIndex"
                                 x-transition:enter="slide-enter"
                                 class="absolute inset-0 w-full h-full">
                                <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent flex flex-col justify-end p-6">
                                    <span class="text-blue-400 text-sm font-semibold uppercase tracking-wider mb-1" x-text="category.name"></span>
                                    <h3 class="text-white text-xl font-bold mb-2" x-text="slide.title"></h3>
                                    <p class="text-gray-200 text-base mb-3" x-text="slide.description"></p>
                                    <div class="flex">
                                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md text-sm">
                                            Learn More
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </template>
                    
                    <!-- Navigation Arrows - Left Side -->
                    <button @click="prevLeftSlide()" class="absolute left-2 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="nextLeftSlide()" class="absolute right-2 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    
                    <!-- Slide Indicators - Left Side -->
                    <div class="absolute bottom-2 left-0 right-0 flex justify-center space-x-2">
                        <template x-for="(slide, index) in leftCategories[leftCurrentCategory].slides" :key="index">
                            <button @click="leftCurrentSlide = index" 
                                    class="w-2 h-2 rounded-full transition-all duration-300"
                                    :class="leftCurrentSlide === index ? 'bg-white scale-125' : 'bg-white/50 hover:bg-white/70'">
                            </button>
                        </template>
                    </div>
                </div>
                
                <!-- Progress Bar - Left Side -->
                <div class="w-full bg-gray-200 rounded-full h-1 mb-4">
                    <div class="bg-blue-600 h-1 rounded-full transition-all duration-500" 
                         :style="{
                             width: `${((leftCurrentCategory * 3) + leftCurrentSlide + 1) / (leftCategories.length * 3) * 100}%`
                         }">
                    </div>
                </div>
            </div>
            
            <!-- Right Side: Sports Areas & Library -->
            <div class="facilities-side">
                <!-- Category Navigation - Right Side -->
                <div class="flex justify-center mb-4">
                    <div class="flex flex-wrap justify-center gap-2">
                        <template x-for="(category, index) in rightCategories" :key="index">
                            <button @click="changeRightCategory(index)" 
                                    class="px-4 py-2 rounded-lg transition-all duration-300"
                                    :class="rightCurrentCategory === index ? 'bg-blue-600 text-white font-medium' : 'bg-gray-200 text-gray-700 hover:bg-gray-300'">
                                <span x-text="category.name"></span>
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Right Slideshow -->
                <div class="relative overflow-hidden rounded-xl shadow-xl h-80 mb-4" 
                     @touchstart="rightTouchStart" 
                     @touchend="rightTouchEnd">
                    
                    <!-- All Right Slides -->
                    <template x-for="(category, categoryIndex) in rightCategories" :key="categoryIndex">
                        <template x-for="(slide, slideIndex) in category.slides" :key="`right-${categoryIndex}-${slideIndex}`">
                            <div x-show="rightCurrentCategory === categoryIndex && rightCurrentSlide === slideIndex"
                                 x-transition:enter="slide-enter"
                                 class="absolute inset-0 w-full h-full">
                                <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent flex flex-col justify-end p-6">
                                    <span class="text-blue-400 text-sm font-semibold uppercase tracking-wider mb-1" x-text="category.name"></span>
                                    <h3 class="text-white text-xl font-bold mb-2" x-text="slide.title"></h3>
                                    <p class="text-gray-200 text-base mb-3" x-text="slide.description"></p>
                                    <div class="flex">
                                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md text-sm">
                                            Learn More
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </template>
                    
                    <!-- Navigation Arrows - Right Side -->
                    <button @click="prevRightSlide()" class="absolute left-2 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="nextRightSlide()" class="absolute right-2 top-1/2 -translate-y-1/2 bg-black/50 hover:bg-black/70 text-white w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300 transform hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    
                    <!-- Slide Indicators - Right Side -->
                    <div class="absolute bottom-2 left-0 right-0 flex justify-center space-x-2">
                        <template x-for="(slide, index) in rightCategories[rightCurrentCategory].slides" :key="index">
                            <button @click="rightCurrentSlide = index" 
                                    class="w-2 h-2 rounded-full transition-all duration-300"
                                    :class="rightCurrentSlide === index ? 'bg-white scale-125' : 'bg-white/50 hover:bg-white/70'">
                            </button>
                        </template>
                    </div>
                </div>
                
                <!-- Progress Bar - Right Side -->
                <div class="w-full bg-gray-200 rounded-full h-1 mb-4">
                    <div class="bg-blue-600 h-1 rounded-full transition-all duration-500" 
                         :style="{
                             width: `${((rightCurrentCategory * 3) + rightCurrentSlide + 1) / (rightCategories.length * 3) * 100}%`
                         }">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mt-8 text-center">
            <a href="{{ route('facilities.library') }}" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-300 shadow-md hover:shadow-lg transform hover:scale-105 transition-transform">
                Explore All Facilities
            </a>
        </div>
    </div>
</div>

<!-- CSS Animation Styles (add to your stylesheet or in a style tag in the head) -->
<style>
    @keyframes slideIn {
        from { transform: translateX(100%); }
        to { transform: translateX(0); }
    }
    
    .slide-enter {
        animation: slideIn 0.7s ease-out;
    }
</style>

<!-- Alpine.js Component Script (add before closing body tag) -->
<script>
    function facilitiesSideBySideSlider() {
        return {
            // Left Side (ICT Labs & Conference Hall)
            leftCurrentCategory: 0,
            leftCurrentSlide: 0,
            leftSlideInterval: 3000, // 3 seconds per slide
            leftAutoplayInterval: null,
            leftTouchStartX: 0,
            leftTouchEndX: 0,
            
            // Right Side (Sports Areas & Library)
            rightCurrentCategory: 0,
            rightCurrentSlide: 0,
            rightSlideInterval: 3000, // 3 seconds per slide
            rightAutoplayInterval: null,
            rightTouchStartX: 0,
            rightTouchEndX: 0,
            
            // Left Side Categories
            leftCategories: [
                {
                    name: "ICT Labs",
                    slides: [
                        {
                            title: "Computer Training Center",
                            description: "State-of-the-art computer lab with the latest hardware for hands-on training.",
                            image: "{{ asset('assets/images/facilities/maintain.jpg') }}"
                        },
                        {
                            title: "Networking Lab",
                            description: "Specialized lab for network administration and cybersecurity training.",
                            image: "{{ asset('assets/images/newsmain/networking.jpg') }}"
                        },
                        {
                            title: "Software Development Studio",
                            description: "Collaborative space for coding and software project development.",
                            image: "{{ asset('assets/images/Logos/DJI_0466-1066x546.jpg') }}"
                        }
                    ]
                },
                {
                    name: "Conference Hall",
                    slides: [
                        {
                            title: "Main Auditorium",
                            description: "Spacious hall with state-of-the-art audio-visual systems for large events.",
                            image: "{{ asset('assets/images/Logos/conf.jpg') }}"
                        },
                        {
                            title: "Presentation Rooms",
                            description: "Medium-sized rooms equipped for professional presentations and meetings.",
                            image: "{{ asset('assets/images/newsmain/hall (1).jpeg') }}"
                        },
                        {
                            title: "Breakout Areas",
                            description: "Comfortable spaces for small group discussions and networking.",
                            image: "{{ asset('assets/images/newsmain/amga.jpg') }}"
                        }
                    ]
                }
            ],
            
            // Right Side Categories
            rightCategories: [
                {
                    name: "Sports Areas",
                    slides: [
                        {
                            title: "Football Field",
                            description: "Regulation-size football field with quality turf and spectator seating.",
                            image: "{{ asset('assets/images/facilities/footbal.jpg') }}"
                        },
                        {
                            title: "Basketball Courts",
                            description: "Multiple indoor and outdoor basketball courts for training and competitions.",
                            image: "{{ asset('assets/images/facilities/batuli.jpg') }}"
                        },
                        {
                            title: "Volleyball & Tennis",
                            description: "Multi-purpose courts for volleyball and tennis with proper equipment.",
                            image: "{{ asset('assets/images/facilities/voly1.jpg') }}"
                        }
                    ]
                },
                {
                    name: "Library",
                    slides: [
                        {
                            title: "Main Reading Area",
                            description: "Quiet space with comfortable seating for focused study and research.",
                            image: "{{ asset('assets/images/Logos/slide-1066x546.jpg') }}"
                        },
                        {
                            title: "Digital Resource Center",
                            description: "Access to online journals, e-books, and digital educational materials.",
                            image: "{{ asset('assets/images/Logos/slide-1066x546.jpg') }}"
                        },
                        {
                            title: "Collaborative Learning Zones",
                            description: "Designated areas for group study and collaborative projects.",
                            image: "{{ asset('assets/images/Logos/slide-1066x546.jpg') }}"
                        }
                    ]
                }
            ],
            
            init() {
                this.startLeftAutoplay();
                this.startRightAutoplay();
            },
            
            // Left Side Methods
            startLeftAutoplay() {
                this.leftAutoplayInterval = setInterval(() => {
                    this.nextLeftSlide();
                }, this.leftSlideInterval);
            },
            
            stopLeftAutoplay() {
                if (this.leftAutoplayInterval) {
                    clearInterval(this.leftAutoplayInterval);
                }
            },
            
            nextLeftSlide() {
                this.stopLeftAutoplay();
                
                // Move to next slide in the same category
                if (this.leftCurrentSlide < this.leftCategories[this.leftCurrentCategory].slides.length - 1) {
                    this.leftCurrentSlide++;
                } else {
                    // If we're at the last slide in the category, move to the next category
                    this.leftCurrentSlide = 0;
                    this.leftCurrentCategory = (this.leftCurrentCategory + 1) % this.leftCategories.length;
                }
                
                this.startLeftAutoplay();
            },
            
            prevLeftSlide() {
                this.stopLeftAutoplay();
                
                // Move to previous slide in the same category
                if (this.leftCurrentSlide > 0) {
                    this.leftCurrentSlide--;
                } else {
                    // If we're at the first slide in the category, move to the previous category
                    this.leftCurrentCategory = (this.leftCurrentCategory - 1 + this.leftCategories.length) % this.leftCategories.length;
                    this.leftCurrentSlide = this.leftCategories[this.leftCurrentCategory].slides.length - 1;
                }
                
                this.startLeftAutoplay();
            },
            
            changeLeftCategory(index) {
                this.stopLeftAutoplay();
                this.leftCurrentCategory = index;
                this.leftCurrentSlide = 0;
                this.startLeftAutoplay();
            },
            
            leftTouchStart(e) {
                this.leftTouchStartX = e.changedTouches[0].screenX;
            },
            
            leftTouchEnd(e) {
                this.leftTouchEndX = e.changedTouches[0].screenX;
                if (this.leftTouchEndX < this.leftTouchStartX - 50) {
                    this.nextLeftSlide(); // Swipe left
                } else if (this.leftTouchEndX > this.leftTouchStartX + 50) {
                    this.prevLeftSlide(); // Swipe right
                }
            },
            
            // Right Side Methods
            startRightAutoplay() {
                this.rightAutoplayInterval = setInterval(() => {
                    this.nextRightSlide();
                }, this.rightSlideInterval);
            },
            
            stopRightAutoplay() {
                if (this.rightAutoplayInterval) {
                    clearInterval(this.rightAutoplayInterval);
                }
            },
            
            nextRightSlide() {
                this.stopRightAutoplay();
                
                // Move to next slide in the same category
                if (this.rightCurrentSlide < this.rightCategories[this.rightCurrentCategory].slides.length - 1) {
                    this.rightCurrentSlide++;
                } else {
                    // If we're at the last slide in the category, move to the next category
                    this.rightCurrentSlide = 0;
                    this.rightCurrentCategory = (this.rightCurrentCategory + 1) % this.rightCategories.length;
                }
                
                this.startRightAutoplay();
            },
            
            prevRightSlide() {
                this.stopRightAutoplay();
                
                // Move to previous slide in the same category
                if (this.rightCurrentSlide > 0) {
                    this.rightCurrentSlide--;
                } else {
                    // If we're at the first slide in the category, move to the previous category
                    this.rightCurrentCategory = (this.rightCurrentCategory - 1 + this.rightCategories.length) % this.rightCategories.length;
                    this.rightCurrentSlide = this.rightCategories[this.rightCurrentCategory].slides.length - 1;
                }
                
                this.startRightAutoplay();
            },
            
            changeRightCategory(index) {
                this.stopRightAutoplay();
                this.rightCurrentCategory = index;
                this.rightCurrentSlide = 0;
                this.startRightAutoplay();
            },
            
            rightTouchStart(e) {
                this.rightTouchStartX = e.changedTouches[0].screenX;
            },
            
            rightTouchEnd(e) {
                this.rightTouchEndX = e.changedTouches[0].screenX;
                if (this.rightTouchEndX < this.rightTouchStartX - 50) {
                    this.nextRightSlide(); // Swipe left
                } else if (this.rightTouchEndX > this.rightTouchStartX + 50) {
                    this.prevRightSlide(); // Swipe right
                }
            }
        };
    }
</script>

<!-- Services Section -->
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Services</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
            <p class="text-gray-600 mt-4 max-w-2xl mx-auto">We provide a range of services to support our students and community members.</p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Driving School -->
            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 transform hover:scale-105 transition-all duration-300">
                <div class="w-20 h-20 bg-blue-100 rounded-full flex items-center justify-center mb-4 mx-auto relative overflow-hidden" id="drivingIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <!-- Traffic Light -->
                        <rect id="trafficLight" x="9" y="2" width="6" height="14" rx="1" stroke-width="1.5"/>
                        
                        <!-- Red Light -->
                        <circle id="redLight" cx="12" cy="5" r="1.5" fill="#ef4444"/>
                        
                        <!-- Yellow Light -->
                        <circle id="yellowLight" cx="12" cy="9" r="1.5" fill="#9ca3af"/>
                        
                        <!-- Green Light -->
                        <circle id="greenLight" cx="12" cy="13" r="1.5" fill="#9ca3af"/>
                        
                        <!-- Road Sign -->
                        <path id="roadSign" d="M4 6L6 4L8 6L6 8L4 6Z" stroke-width="1.5" fill="#fcd34d" stroke="#f59e0b"/>
                        
                        <!-- License Card -->
                        <g id="licenseCard">
                            <rect x="14" y="12" width="7" height="5" rx="1" stroke-width="1.5" fill="#0ea5e9" fill-opacity="0.3" />
                            <path d="M16 14.5h3" stroke-width="1" />
                            <path d="M16 16h3" stroke-width="1" />
                        </g>
                        
                        <!-- Road with moving lines -->
                        <path id="road" d="M2 20h20" stroke-width="1.5"/>
                        
                        <!-- Road markings -->
                        <g id="roadMarkings">
                            <path d="M7 20l1-1.5" stroke-width="1.5"/>
                            <path d="M12 20l1-1.5" stroke-width="1.5"/>
                            <path d="M17 20l1-1.5" stroke-width="1.5"/>
                        </g>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-center mb-3 text-gray-800">Driving School</h3>
                <p class="text-gray-600 text-center">Professional driving lessons with certified instructors using modern vehicles.</p>
                <div class="mt-4 text-center">
                    <a href="{{ route('services.driving') }}" 
                       class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-all duration-300">
                        Learn more
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <script>
                    // Wait for DOM to be ready
                    document.addEventListener('DOMContentLoaded', function() {
                        // Get all elements
                        const trafficLight = document.getElementById('trafficLight');
                        const redLight = document.getElementById('redLight');
                        const yellowLight = document.getElementById('yellowLight');
                        const greenLight = document.getElementById('greenLight');
                        const roadSign = document.getElementById('roadSign');
                        const licenseCard = document.getElementById('licenseCard');
                        const road = document.getElementById('road');
                        const roadMarkings = document.getElementById('roadMarkings');
                        
                        // Animation variables
                        let lightState = 0;
                        let assemblePercent = 100;
                        let assembleDirection = 'assembled';
                        let cycleCount = 0;
                        let lastUpdateTime = Date.now();
                        
                        // Function to calculate and apply transformations
                        function getTransform(element, baseX, baseY, targetX, targetY, rotation) {
                            const progress = assemblePercent / 100;
                            const x = baseX + (targetX - baseX) * (1 - progress);
                            const y = baseY + (targetY - baseY) * (1 - progress);
                            const r = rotation * (1 - progress);
                            element.style.transform = `translate(${x}px, ${y}px) rotate(${r}deg)`;
                        }
                        
                        // Animation function
                        function animate() {
                            const currentTime = Date.now();
                            const deltaTime = currentTime - lastUpdateTime;
                            lastUpdateTime = currentTime;
                            
                            // Handle light cycling when fully assembled
                            if (assembleDirection === 'assembled') {
                                if (deltaTime > 0 && currentTime % 800 < 100) {
                                    lightState = (lightState + 1) % 3;
                                    
                                    // Update light colors
                                    redLight.setAttribute('fill', lightState === 0 ? '#ef4444' : '#9ca3af');
                                    yellowLight.setAttribute('fill', lightState === 1 ? '#f59e0b' : '#9ca3af');
                                    greenLight.setAttribute('fill', lightState === 2 ? '#10b981' : '#9ca3af');
                                    
                                    // After one complete cycle (back to red), start disassembling
                                    if (lightState === 0) {
                                        cycleCount++;
                                        if (cycleCount >= 1) {
                                            assembleDirection = 'disassembling';
                                            cycleCount = 0;
                                        }
                                    }
                                }
                            }
                            
                            // Handle assembly/disassembly animation
                            if (assembleDirection === 'disassembling') {
                                assemblePercent = Math.max(0, assemblePercent - 1);
                                if (assemblePercent <= 0) {
                                    assembleDirection = 'assembling';
                                }
                            } else if (assembleDirection === 'assembling') {
                                assemblePercent = Math.min(100, assemblePercent + 1);
                                if (assemblePercent >= 100) {
                                    assembleDirection = 'assembled';
                                    // Reset light state to red to start a new cycle
                                    lightState = 0;
                                    redLight.setAttribute('fill', '#ef4444');
                                    yellowLight.setAttribute('fill', '#9ca3af');
                                    greenLight.setAttribute('fill', '#9ca3af');
                                }
                            }
                            
                            // Apply transformations
                            getTransform(trafficLight, 0, 0, -6, -6, -30);
                            getTransform(redLight, 0, 0, -8, -4, -45);
                            getTransform(yellowLight, 0, 0, -7, -2, -40);
                            getTransform(greenLight, 0, 0, -6, 0, -35);
                            getTransform(roadSign, 0, 0, -2, -5, 45);
                            getTransform(licenseCard, 0, 0, 8, -5, 45);
                            getTransform(road, 0, 0, 0, 5, 0);
                            getTransform(roadMarkings, 0, 0, 0, 6, 0);
                            
                            // Continue animation
                            requestAnimationFrame(animate);
                        }
                        
                        // Start animation
                        animate();
                    });
                </script>
            </div>
            
            <!-- Poultry Section with Cycling Animal Icons -->
<div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 transform hover:scale-105 transition-all duration-300"
     x-data="{ 
        isHovered: false, 
        currentIcon: 0,
        animals: ['chicken', 'egg', 'pig', 'cow', 'feed', 'farm'],
        animalLabels: {
            'chicken': 'Poultry (Meat)',
            'egg': 'Poultry (Eggs)',
            'pig': 'Pig Farming',
            'cow': 'Cattle Raising',
            'feed': 'Animal Feed',
            'farm': 'Farm Management'
        },
        interval: null,
        startCycle() {
            this.interval = setInterval(() => {
                this.currentIcon = (this.currentIcon + 1) % this.animals.length;
            }, 2500);
        },
        stopCycle() {
            clearInterval(this.interval);
        }
     }"
     x-init="startCycle()"
     @mouseenter="isHovered = true"
     @mouseleave="isHovered = false">
    <div class="w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mb-4 mx-auto"
         :class="{ 'animate-pulse': isHovered }">
        
        <!-- Chicken/Poultry Icon -->
        <svg x-show="animals[currentIcon] === 'chicken'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 rotate-12"
             x-transition:enter-end="opacity-100 rotate-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 rotate-0"
             x-transition:leave-end="opacity-0 rotate-12">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M12 5c1 0 2 .5 2 2s-1 2-2 2" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M10 9c-3 0-6 3-6 6 0 1 0 3 2 3h8c2 0 2-2 2-3 0-3-3-6-6-6z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M8 15l-2 4M12 15v4M16 15l2 4" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M13 7l2-2" />
        </svg>
        
        <!-- Egg Icon -->
        <svg x-show="animals[currentIcon] === 'egg'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 rotate-12"
             x-transition:enter-end="opacity-100 rotate-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 rotate-0"
             x-transition:leave-end="opacity-0 rotate-12">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M12 4c-4.5 0-8 5-8 10s3.5 7 8 7 8-2 8-7-3.5-10-8-10z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M10 12.5a2 2 0 104 0 2 2 0 00-4 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M8 10c-.5-1 .5-2 2-3" />
        </svg>
        
        <!-- Pig Icon -->
        <svg x-show="animals[currentIcon] === 'pig'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 rotate-12"
             x-transition:enter-end="opacity-100 rotate-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 rotate-0"
             x-transition:leave-end="opacity-0 rotate-12">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M15 5c2 0 4 1 4 3 0 .5-.5 2-1 2" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M8 10c-3 0-4 2-4 4s1 4 4 4h8c3 0 4-2 4-4s-1-4-4-4H8z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M8 14a1 1 0 100-2 1 1 0 000 2zM16 14a1 1 0 100-2 1 1 0 000 2z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M5 18l2-2M19 18l-2-2" />
        </svg>
        
        <!-- Cow Icon -->
        <svg x-show="animals[currentIcon] === 'cow'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 rotate-12"
             x-transition:enter-end="opacity-100 rotate-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 rotate-0"
             x-transition:leave-end="opacity-0 rotate-12">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M6 7c-1 0-2-1-2-2s1-2 2-2M18 7c1 0 2-1 2-2s-1-2-2-2" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M6 7h12v6c0 3-2.5 6-6 6s-6-3-6-6V7z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M9 10v2M15 10v2" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M8 19l-2 2M16 19l2 2" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M10 13h4" />
        </svg>
        
        <!-- Feed Icon -->
        <svg x-show="animals[currentIcon] === 'feed'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 rotate-12"
             x-transition:enter-end="opacity-100 rotate-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 rotate-0"
             x-transition:leave-end="opacity-0 rotate-12">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M4 7v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2H6c-1.1 0-2 .9-2 2z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M8 10a2 2 0 104 0 2 2 0 00-4 0zM16 15a2 2 0 100-4 2 2 0 000 4z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M6 15h4M14 10h4" />
        </svg>
        
        <!-- Farm Management Icon -->
        <svg x-show="animals[currentIcon] === 'farm'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 rotate-12"
             x-transition:enter-end="opacity-100 rotate-0"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 rotate-0"
             x-transition:leave-end="opacity-0 rotate-12">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
    </div>
    <h3 class="text-xl font-semibold text-center mb-3 text-gray-800">
        <span x-text="animalLabels[animals[currentIcon]]"></span>
    </h3>
    <p class="text-gray-600 text-center">
        <span x-show="animals[currentIcon] === 'chicken'">Modern poultry farming facility offering practical training in sustainable meat production techniques.</span>
        <span x-show="animals[currentIcon] === 'egg'">Expert training in egg production with focus on maximizing yield and maintaining high quality standards.</span>
        <span x-show="animals[currentIcon] === 'pig'">Complete pig farming program covering breeding, nutrition, housing and health management practices.</span>
        <span x-show="animals[currentIcon] === 'cow'">Comprehensive cattle raising experience with training in both dairy and beef production systems.</span>
        <span x-show="animals[currentIcon] === 'feed'">Advanced animal nutrition training with hands-on experience in feed formulation and management.</span>
        <span x-show="animals[currentIcon] === 'farm'">Integrated farm management education covering business planning, operations and sustainable practices.</span>
    </p>
    <div class="mt-4 text-center">
    <a href="{{ route('services.poultry') }}" class="inline-block px-6 py-2.5 bg-yellow-800 text-white font-medium rounded-lg hover:bg-yellow-700 transition-colors duration-300 shadow-md">Learn more</a>
</div>
</div>
            
        <!-- Catering Section with Cycling Icons -->
<div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 transform hover:scale-105 transition-all duration-300"
     x-data="{ 
        isHovered: false, 
        currentIcon: 0,
        icons: ['foodbox', 'menulist', 'catering', 'music', 'meeting', 'tickets', 'reception'],
        interval: null,
        startCycle() {
            this.interval = setInterval(() => {
                this.currentIcon = (this.currentIcon + 1) % this.icons.length;
            }, 2000);
        },
        stopCycle() {
            clearInterval(this.interval);
        }
     }"
     x-init="startCycle()"
     @mouseenter="isHovered = true"
     @mouseleave="isHovered = false">
    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4 mx-auto"
         :class="{ 'animate-pulse': isHovered }">
        
        <!-- Food Box Icon -->
        <svg x-show="icons[currentIcon] === 'foodbox'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M5 11h14v6a2 2 0 01-2 2H7a2 2 0 01-2-2v-6z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M6 11V7a2 2 0 012-2h8a2 2 0 012 2v4" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M10 11V9M14 11V9" />
        </svg>
        
        <!-- Menu List Icon -->
        <svg x-show="icons[currentIcon] === 'menulist'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M6 10h4M6 14h12M6 18h8" />
        </svg>
        
        <!-- Catering Icon -->
        <svg x-show="icons[currentIcon] === 'catering'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M12 4v16m8-8H4M6 8h.01M6 16h.01M18 8h.01M18 16h.01" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M12 17c2.761 0 5-2.239 5-5s-2.239-5-5-5-5 2.239-5 5 2.239 5 5 5z" />
        </svg>
        
        <!-- Music Icon -->
        <svg x-show="icons[currentIcon] === 'music'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M9 19V6l12-3v13" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M6 19a3 3 0 100-6 3 3 0 000 6zM18 16a3 3 0 100-6 3 3 0 000 6z" />
        </svg>
        
        <!-- Meeting Icon -->
        <svg x-show="icons[currentIcon] === 'meeting'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        
        <!-- Tickets Icon -->
        <svg x-show="icons[currentIcon] === 'tickets'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M7 8h2M7 12h2M7 16h2" />
        </svg>
        
        <!-- Reception Icon -->
        <svg x-show="icons[currentIcon] === 'reception'" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
             x-transition:enter="transition ease-out duration-300 transform"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200 transform"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                  d="M12 11c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM3 15h.01M9 15h.01" />
        </svg>
    </div>
    <h3 class="text-xl font-semibold text-center mb-3 text-gray-800">
        <span x-text="icons[currentIcon].charAt(0).toUpperCase() + icons[currentIcon].slice(1) + ' Services'"></span>
    </h3>
    <p class="text-gray-600 text-center">Professional event planning services with customized solutions for your special occasions.</p>
    <div class="mt-4 text-center">
    <a href="{{ route('services.catering') }}" class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors duration-300 shadow-md">Learn more</a>
</div>
</div>
            
            <!-- Health Center -->
            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 transform hover:scale-105 transition-all duration-300"
                 x-data="{ 
                    currentIconIndex: 0,
                    icons: [
                        {
                            path: 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                            name: 'Doctor'
                        },
                        {
                            path: 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm0 8a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zm12 0a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z',
                            name: 'Nurse'
                        },
                        {
                            path: 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z',
                            name: 'Labs'
                        },
                        {
                            path: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                            name: 'Insurance'
                        },
                        {
                            path: 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
                            name: 'Prescription'
                        },
                        {
                            path: 'M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z',
                            name: 'Emergency'
                        },
                        {
                            path: 'M13 10V3L4 14h7v7l9-11h-7z',
                            name: 'Ambulance'
                        },
                        {
                            path: 'M4 4a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2h-3v4l-4-4H6a2 2 0 01-2-2V4zm5 7a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0zm4 0a1 1 0 11-2 0 1 1 0 012 0z',
                            name: 'Pharmacy'
                        },
                        {
                            path: 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',
                            name: 'Medical Report'
                        }
                    ],
                    startAutoRotation() {
                        setInterval(() => {
                            this.currentIconIndex = (this.currentIconIndex + 1) % this.icons.length;
                        }, 1500);
                    }
                 }"
                 x-init="startAutoRotation()">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-4 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" :d="icons[currentIconIndex].path" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-center mb-3 text-gray-800">Health Center</h3>
                <p class="text-gray-600 text-center">Professional healthcare services providing medical support with qualified practitioners for students and staff.</p>
<div class="mt-4 text-center">
    <a href="{{ route('services.health') }}" class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-300 shadow-md">Learn more</a>
</div>
            </div>
        </div>
        
        <div class="mt-10 text-center">
            <a href="{{ route('services.index') }}" class="inline-flex items-center group px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300 shadow-md">
                View all our services
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </a>
        </div>
    </div>
</div>

    <!-- Add any additional sections here -->

<!-- Our Achievements Section -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanzania Police School Timeline</title>
    <style>
        /* Base styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            color: white;
        }
        
        /* Custom cursor */
        .cursor {
            position: fixed;
            width: 20px;
            height: 20px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            pointer-events: none;
            transform: translate(-50%, -50%);
            transition: transform 0.1s ease;
            z-index: 9999;
            mix-blend-mode: difference;
        }
        
        /* Main container - adjusted to fit parent container */
        .fullscreen-container {
            position: relative;
            width: 100%;
            height: 100%;
            min-height: 600px;
            overflow: hidden;
            background-color: #2d4739;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Title area - adjusted positioning for responsiveness */
        .title-area {
            position: absolute;
            top: 5%;
            left: 5%;
            z-index: 10;
            padding: 10px;
        }
        
        .school-title {
            font-size: clamp(24px, 3vw, 36px);
            font-weight: bold;
            margin: 0;
        }
        
        .school-subtitle {
            font-size: clamp(16px, 2vw, 20px);
            opacity: 0.8;
            margin: 5px 0 0 0;
        }
        
        /* Timeline styles - improved responsive behavior */
        .timeline-container {
            position: relative;
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            z-index: 10;
            padding: 0 15px;
        }
        
        .timeline {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.3);
            margin: 40px 0;
        }
        
        .year-label {
            color: white;
            font-weight: bold;
            font-size: clamp(14px, 1.5vw, 18px);
        }
        
        .timeline-marker {
            position: absolute;
            width: 12px;
            height: 12px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        
        .timeline-marker:hover {
            transform: translate(-50%, -50%) scale(1.5);
        }
        
        .timeline-marker.active {
            background-color: #fff;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
            transform: translate(-50%, -50%) scale(1.2);
        }
        
        /* Content styles - improved flex behavior */
        .content-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            width: 100%;
            margin-top: 30px;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .content {
            display: flex;
            flex-direction: column;
            flex: 1;
            min-width: 280px;
            padding-right: 20px;
        }
        
        .year-heading {
            font-size: clamp(36px, 5vw, 56px);
            font-weight: bold;
            margin: 0 0 20px 0;
        }
        
        .milestone-title {
            font-size: clamp(24px, 3vw, 36px);
            font-weight: bold;
            margin: 0 0 20px 0;
        }
        
        .milestone-description {
            font-size: clamp(14px, 1.5vw, 18px);
            line-height: 1.6;
        }
        
        .image-container {
            flex: 1;
            min-width: 280px;
            height: clamp(200px, 30vh, 350px);
            border: 2px solid rgba(255, 255, 255, 0.3);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.5s ease;
        }
        
        .milestone-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }
        
        /* Navigation Controls - improved positioning */
        .nav-controls {
            position: absolute;
            bottom: 5%;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: clamp(20px, 3vw, 40px);
            z-index: 10;
        }
        
        .nav-button {
            width: clamp(32px, 4vw, 48px);
            height: clamp(32px, 4vw, 48px);
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(14px, 1.5vw, 18px);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .nav-button:hover {
            background-color: rgba(0, 0, 0, 0.5);
            transform: scale(1.1);
        }
        
        /* Social Links - improved positioning */
        .social-links {
            position: absolute;
            bottom: 5%;
            right: 5%;
            display: flex;
            gap: clamp(8px, 1vw, 16px);
            z-index: 10;
        }
        
        .social-link {
            width: clamp(32px, 4vw, 48px);
            height: clamp(32px, 4vw, 48px);
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: clamp(12px, 1.5vw, 16px);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background-color: rgba(0, 0, 0, 0.5);
            transform: scale(1.1);
        }
        
        /* Canvas styling */
        #scene {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        
        /* Responsive adjustments - improved breakpoints */
        @media (max-width: 992px) {
            .content-wrapper {
                flex-direction: column;
            }
            
            .content {
                width: 100%;
                padding-right: 0;
                margin-bottom: 20px;
            }
            
            .image-container {
                width: 100%;
                margin: 0 auto;
            }
        }
        
        @media (max-width: 768px) {
            .social-links {
                bottom: 15%;
                right: 5%;
            }
            
            .timeline-container {
                margin-top: 60px;
            }
        }
        
        @media (max-width: 480px) {
            .nav-controls {
                bottom: 3%;
            }
            
            .social-links {
                bottom: 3%;
                right: 3%;
                gap: 8px;
            }
            
            .social-link {
                width: 32px;
                height: 32px;
                font-size: 12px;
            }
            
            .nav-button {
                width: 32px;
                height: 32px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="fullscreen-container" id="timeline-app">
        <!-- Custom Cursor -->
        <div class="cursor" id="custom-cursor"></div>
        
        <!-- WebGL Scene Background -->
        <canvas id="scene"></canvas>
        
        <!-- Title Area -->
        <div class="title-area">
            <h1 class="school-title">Tanzania Police School</h1>
            <p class="school-subtitle">A Century of Service and Training</p>
        </div>
        
        <!-- Main Content -->
        <div class="timeline-container">
            <!-- Timeline Navigation -->
            <div class="timeline">
                <div class="year-label">1921</div>
                <!-- Timeline markers will be generated by JS -->
                <div class="year-label">2023</div>
            </div>
            
            <!-- Content Area -->
            <div class="content-wrapper">
                <div class="content">
                    <h2 class="year-heading" id="year-display">1984</h2>
                    <h3 class="milestone-title" id="milestone-title">Advanced Training Programs</h3>
                    <p class="milestone-description" id="milestone-description">The Tanzania Police School introduced advanced courses in criminal investigation, forensics, and community policing to address evolving security challenges. This era saw a more scientific approach to police education with laboratory facilities and specialized instructors.</p>
                </div>
                
                <!-- Image Container -->
                <div class="image-container">
                    <img src="/api/placeholder/500/350" class="milestone-image" alt="Historical photo">
                </div>
            </div>
        </div>
        
        <!-- Navigation Controls -->
        <div class="nav-controls">
            <div class="nav-button" id="prev-btn">&lt;</div>
            <div class="nav-button" id="pause-btn">||</div>
            <div class="nav-button" id="next-btn">&gt;</div>
        </div>
        
        <!-- Social Links -->
        <div class="social-links">
            <div class="social-link">FB</div>
            <div class="social-link">TW</div>
            <div class="social-link">YT</div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Timeline data
            const milestones = [
                {
                    year: "1921",
                    title: "Foundation of Police Training",
                    description: "The foundation of formal police training in Tanzania was established under colonial administration, focusing on basic law enforcement skills and colonial policing methods.",
                    image: "/api/placeholder/500/350"
                },
                {
                    year: "1946",
                    title: "Establishment of Central Police Training School",
                    description: "The Central Police Training School was formally established in Dar es Salaam as the main training institution for police officers in the territory. This marked a significant step in the professionalization of police services with standardized curriculum and training methods.",
                    image: "/api/placeholder/500/350"
                },
                {
                    year: "1961",
                    title: "Post-Independence Reforms",
                    description: "Following Tanzania's independence, the police training system underwent significant reforms to align with the new nation's values and priorities. The curriculum was updated to emphasize service to citizens rather than colonial interests.",
                    image: "/api/placeholder/500/350"
                },
                {
                    year: "1975",
                    title: "Establishment of TPS Moshi",
                    description: "The Tanzania Police School in Moshi was established as a specialized training center, expanding the nation's police training capabilities with modern facilities and expanded curriculum.",
                    image: "/api/placeholder/500/350"
                },
                {
                    year: "1984",
                    title: "Advanced Training Programs",
                    description: "The Tanzania Police School introduced advanced courses in criminal investigation, forensics, and community policing to address evolving security challenges. This era saw a more scientific approach to police education with laboratory facilities and specialized instructors.",
                    image: "/api/placeholder/500/350"
                },
                {
                    year: "1995",
                    title: "Curriculum Modernization",
                    description: "A comprehensive curriculum review was conducted, integrating human rights, community policing principles, and international best practices into the training program.",
                    image: "/api/placeholder/500/350"
                },
                {
                    year: "2008",
                    title: "International Training Partnerships",
                    description: "TPS established partnerships with international police training institutions, facilitating exchange programs and adopting global best practices in law enforcement training.",
                    image: "/api/placeholder/500/350"
                },
                {
                    year: "2018",
                    title: "PRC-Funded Facility Expansion",
                    description: "Completed the Phase II construction project with PRC funding, featuring three academic buildings with computer labs, lecture rooms, and administrative facilities. The expansion includes four dormitory blocks accommodating 320 students and two major water systems.",
                    image: "/api/placeholder/500/350"
                },
                {
                    year: "2020",
                    title: "Multi-Campus Expansion",
                    description: "Expanded from a single campus to three distinct facilities: TPS Main Campus, Kilele Pori, and Kamba Pori. This strategic expansion has increased our training capacity from 600 recruits in the 1990s to over 10,000 today, making us one of the largest police training institutions in the region.",
                    image: "/api/placeholder/500/350"
                },
                {
                    year: "2022",
                    title: "Advanced Forensic Training Certification",
                    description: "Received international certification for our advanced forensic training program. Our students now benefit from hands-on experience with cutting-edge forensic technology and techniques that meet global standards of excellence.",
                    image: "/api/placeholder/500/350"
                },
                {
                    year: "2023",
                    title: "Community Service Excellence Award",
                    description: "Recognized for our outstanding community outreach programs and positive impact on surrounding communities. Our cadets and staff have contributed over 5,000 volunteer hours in the past year, focusing on youth mentorship and community safety initiatives.",
                    image: "/api/placeholder/500/350"
                }
            ];
            
            // App state
            let activeSlide = 4; // Start with 1984 milestone (index 4)
            let isTransitioning = false;
            let autoSlideInterval = null;
            
            // DOM elements
            const yearDisplay = document.getElementById('year-display');
            const milestoneTitle = document.getElementById('milestone-title');
            const milestoneDescription = document.getElementById('milestone-description');
            const milestoneImage = document.querySelector('.milestone-image');
            const timeline = document.querySelector('.timeline');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const pauseBtn = document.getElementById('pause-btn');
            const timelineApp = document.getElementById('timeline-app');
            
            // Initialize the timeline
            function init() {
                createTimelineMarkers();
                setupMouseTracking();
                initThreeScene();
                startAutoSlide();
                updateUI();
                
                // Event listeners
                prevBtn.addEventListener('click', prevSlide);
                nextBtn.addEventListener('click', nextSlide);
                pauseBtn.addEventListener('click', pauseAutoSlide);
                window.addEventListener('resize', () => {
                    resizeThreeScene();
                    updateUI();
                });
            }
            
            // Update UI based on container size
            function updateUI() {
                const containerHeight = timelineApp.offsetHeight;
                const containerWidth = timelineApp.offsetWidth;
                
                // Adjust spacing based on container dimensions
                if (containerHeight < 500) {
                    document.querySelector('.timeline-container').style.marginTop = '40px';
                } else {
                    document.querySelector('.timeline-container').style.marginTop = '0';
                }
            }
            
            // Create timeline markers
            function createTimelineMarkers() {
                milestones.forEach((milestone, index) => {
                    // Calculate position as percentage
                    const percent = index / (milestones.length - 1) * 100;
                    
                    // Create marker
                    const marker = document.createElement('div');
                    marker.className = 'timeline-marker';
                    if (index === activeSlide) {
                        marker.classList.add('active');
                    }
                    marker.style.left = `${percent}%`;
                    
                    // Add click event
                    marker.addEventListener('click', () => {
                        if (isTransitioning) return;
                        goToSlide(index);
                    });
                    
                    timeline.appendChild(marker);
                });
            }
            
            // Auto slide functions
            function startAutoSlide() {
                stopAutoSlide();
                autoSlideInterval = setInterval(() => {
                    if (!isTransitioning) {
                        nextSlide();
                    }
                }, 10000);
            }
            
            function stopAutoSlide() {
                if (autoSlideInterval) {
                    clearInterval(autoSlideInterval);
                }
            }
            
            function pauseAutoSlide() {
                stopAutoSlide();
                pauseBtn.textContent = '▶';
                pauseBtn.addEventListener('click', resumeAutoSlide, { once: true });
            }
            
            function resumeAutoSlide() {
                startAutoSlide();
                pauseBtn.textContent = '||';
            }
            
            // Navigation functions
            function nextSlide() {
                isTransitioning = true;
                activeSlide = (activeSlide + 1) % milestones.length;
                updateActiveMarker();
                animateContentChange();
            }
            
            function prevSlide() {
                isTransitioning = true;
                activeSlide = (activeSlide - 1 + milestones.length) % milestones.length;
                updateActiveMarker();
                animateContentChange();
            }
            
            function goToSlide(index) {
                if (index === activeSlide) return;
                
                isTransitioning = true;
                activeSlide = index;
                updateActiveMarker();
                animateContentChange();
                
                // Reset auto slide timer
                stopAutoSlide();
                startAutoSlide();
            }
            
            function updateActiveMarker() {
                document.querySelectorAll('.timeline-marker').forEach((marker, i) => {
                    if (i === activeSlide) {
                        marker.classList.add('active');
                    } else {
                        marker.classList.remove('active');
                    }
                });
            }
            
            // Animate content changes
            function animateContentChange() {
                // Fade out
                fadeOut([yearDisplay, milestoneTitle, milestoneDescription], () => {
                    // Update content
                    yearDisplay.textContent = milestones[activeSlide].year;
                    milestoneTitle.textContent = milestones[activeSlide].title;
                    milestoneDescription.textContent = milestones[activeSlide].description;
                    milestoneImage.src = milestones[activeSlide].image;
                    milestoneImage.alt = milestones[activeSlide].title;
                    
                    // Fade in
                    fadeIn([yearDisplay, milestoneTitle, milestoneDescription], () => {
                        isTransitioning = false;
                    });
                });
            }
            
            function fadeOut(elements, onComplete) {
                let count = 0;
                elements.forEach((el, i) => {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(20px)';
                    el.style.transition = `opacity 0.4s ease, transform 0.4s ease`;
                    
                    setTimeout(() => {
                        count++;
                        if (count === elements.length && onComplete) {
                            onComplete();
                        }
                    }, 400);
                });
            }
            
            function fadeIn(elements, onComplete) {
                let count = 0;
                elements.forEach((el, i) => {
                    setTimeout(() => {
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                        
                        el.addEventListener('transitionend', function handler() {
                            count++;
                            if (count === elements.length && onComplete) {
                                onComplete();
                            }
                            el.removeEventListener('transitionend', handler);
                        });
                    }, i * 100);
                });
            }
            
            // Mouse tracking for custom cursor
            function setupMouseTracking() {
                const cursor = document.getElementById('custom-cursor');
                
                document.addEventListener('mousemove', (e) => {
                    // Move cursor
                    cursor.style.left = e.clientX + 'px';
                    cursor.style.top = e.clientY + 'px';
                    
                    // Check if hovering over interactive elements
                    const target = e.target;
                    if (target.classList.contains('nav-button') || 
                        target.classList.contains('timeline-marker') || 
                        target.classList.contains('social-link')) {
                        cursor.style.transform = 'translate(-50%, -50%) scale(1.5)';
                        cursor.style.backgroundColor = 'rgba(255, 255, 255, 0.9)';
                    } else {
                        cursor.style.transform = 'translate(-50%, -50%) scale(1)';
                        cursor.style.backgroundColor = 'rgba(255, 255, 255, 0.7)';
                    }
                });
                
                // Hide cursor on mobile/touch devices
                if ('ontouchstart' in window) {
                    cursor.style.display = 'none';
                }
            }
            
            // ThreeJS background scene
            function initThreeScene() {
                // Import ThreeJS from CDN if it doesn't exist
                if (typeof THREE === 'undefined') {
                    const script = document.createElement('script');
                    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js';
                    script.onload = setupScene;
                    document.head.appendChild(script);
                } else {
                    setupScene();
                }
                
                function setupScene() {
                    // Scene setup
                    const scene = new THREE.Scene();
                    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
                    const renderer = new THREE.WebGLRenderer({ 
                        canvas: document.getElementById('scene'),
                        alpha: true,
                        antialias: true
                    });
                    
                    renderer.setSize(timelineApp.offsetWidth, timelineApp.offsetHeight);
                    renderer.setPixelRatio(window.devicePixelRatio);
                    
                    // Create particles
                    const particleGeometry = new THREE.BufferGeometry();
                    const particleCount = 1500;
                    const posArray = new Float32Array(particleCount * 3);
                    
                    for (let i = 0; i < particleCount * 3; i++) {
                        posArray[i] = (Math.random() - 0.5) * 20;
                    }
                    
                    particleGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
                    
                    const particleMaterial = new THREE.PointsMaterial({
                        color: 0x5f9ea0,
                        size: 0.05,
                        transparent: true,
                        blending: THREE.AdditiveBlending
                    });
                    
                    const particleSystem = new THREE.Points(particleGeometry, particleMaterial);
                    scene.add(particleSystem);
                    
                    // 3D shapes in background
                    const geometries = [
                        new THREE.IcosahedronGeometry(0.6, 0),
                        new THREE.BoxGeometry(0.7, 0.7, 0.7),
                        new THREE.TorusGeometry(0.5, 0.2, 16, 100)
                    ];
                    
                    const material = new THREE.MeshPhongMaterial({
                        color: 0x5f9ea0,
                        transparent: true,
                        opacity: 0.7,
                        wireframe: true
                    });
                    
                    const shapes = [];
                    
                    // Create floating shapes
                    for (let i = 0; i < 15; i++) {
                        const geometry = geometries[Math.floor(Math.random() * geometries.length)];
                        const mesh = new THREE.Mesh(geometry, material);
                        
                        mesh.position.set(
                            (Math.random() - 0.5) * 15,
                            (Math.random() - 0.5) * 15,
                            (Math.random() - 0.5) * 15 - 5
                        );
                        
                        scene.add(mesh);
                        
                        shapes.push({
                            mesh,
                            rotSpeed: {
                                x: (Math.random() - 0.5) * 0.01,
                                y: (Math.random() - 0.5) * 0.01,
                                z: (Math.random() - 0.5) * 0.01
                            },
                            floatSpeed: {
                                x: (Math.random() - 0.5) * 0.005,
                                y: (Math.random() - 0.5) * 0.005,
                                z: (Math.random() - 0.5) * 0.005
                            }
                        });
                    }
                    
                    // Add lighting
                    const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
                    scene.add(ambientLight);
                    
                    const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
                    directionalLight.position.set(1, 1, 1);
                    scene.add(directionalLight);
                    
                    camera.position.z = 5;
                    
                    // 3D parallax effect with mouse movement
                    document.addEventListener('mousemove', (e) => {
                        const x = (e.clientX / window.innerWidth) * 2 - 1;
                        const y = -(e.clientY / window.innerHeight) * 2 + 1;
                        
                        // Animate camera position
                        const targetX = x * 0.8;
                        const targetY = y * 0.8;
                        
                        camera.position.x += (targetX - camera.position.x) * 0.05;
                        camera.position.y += (targetY - camera.position.y) * 0.05;
                        camera.lookAt(scene.position);
                    });
                    
                    // Animation loop
                    function animate() {
                        requestAnimationFrame(animate);
                        
                        // Rotate particle system
                        particleSystem.rotation.y += 0.0005;
                        particleSystem.rotation.x += 0.0002;
                        
                        // Animate shapes
                        shapes.forEach(shape => {
                            shape.mesh.rotation.x += shape.rotSpeed.x;
                            shape.mesh.rotation.y += shape.rotSpeed.y;
                            shape.mesh.rotation.z += shape.rotSpeed.z;
                            
                            shape.mesh.position.x += Math.sin(Date.now() * 0.001) * shape.floatSpeed.x;
                            shape.mesh.position.y += Math.cos(Date.now() * 0.001) * shape.floatSpeed.y;
                            shape.mesh.position.z += Math.sin(Date.now() * 0.001) * shape.floatSpeed.z;
                        });
                        
                        renderer.render(scene, camera);
                    }
                    
                    animate();
                    
                    // Store renderer and camera for resize event
                    window.threeRenderer = renderer;
                    window.threeCamera = camera;
                }
            }
            
            function resizeThreeScene() {
                if (window.threeRenderer && window.threeCamera) {
                    window.threeCamera.aspect = timelineApp.offsetWidth / timelineApp.offsetHeight;
                    window.threeCamera.updateProjectionMatrix();
                    window.threeRenderer.setSize(timelineApp.offsetWidth, timelineApp.offsetHeight);
                }
            }
            
            // Initialize the app
            init();
        });
    </script>
</body>
</html>
</div>
@endsection