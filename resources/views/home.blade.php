@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="bg-black">
    <!-- Consistent Voyager-Inspired Premium Slider -->
    <div x-data="{ 
            currentSlide: 0,
            slides: {{ Js::from($slides) }},
            autoplayInterval: null,
            transitionTypes: [ 'bottom-up',  'drop-down'],
            currentTransition: 'left-right',
            isTransitioning: false,
            startAutoplay() {
                this.autoplayInterval = setInterval(() => {
                    this.changeSlide((this.currentSlide + 1) % this.slides.length);
                }, 5000);
            },
            changeSlide(newIndex) {
                if (this.isTransitioning) return;
                this.isTransitioning = true;
                
                // Randomly select a transition type
                const randomIndex = Math.floor(Math.random() * this.transitionTypes.length);
                this.currentTransition = this.transitionTypes[randomIndex];
                
                setTimeout(() => {
                    this.currentSlide = newIndex;
                    setTimeout(() => {
                        this.isTransitioning = false;
                    }, 1200); // Match this to your transition duration
                }, 50);
            }
        }" 
        x-init="startAutoplay()"
        class="relative h-screen overflow-hidden">
        
        <!-- Load all images upfront to ensure they're available -->
        <div class="hidden">
            <template x-for="slide in slides">
                <img :src="slide.image" class="hidden" />
            </template>
        </div>

        <!-- Main Full-Screen Image Slides -->
        <template x-for="(slide, index) in slides" :key="index">
            <div 
                x-show="currentSlide === index"
                x-cloak
                class="absolute inset-0 z-10"
                :class="{
                    'transition-all duration-1200 ease-out': true,
                    'drop-down-effect': currentTransition === 'drop-down' && currentSlide === index
                }"
                x-transition:enter="transition transform duration-1200 ease-out"
                :x-transition:enter-start="
                    currentTransition === 'left-right' ? 'opacity-0 translate-x-full' :
                    currentTransition === 'right-left' ? 'opacity-0 -translate-x-full' :
                    currentTransition === 'bottom-up' ? 'opacity-0 translate-y-full' :
                    currentTransition === 'top-down' ? 'opacity-0 -translate-y-full' :
                    currentTransition === 'zoom-in' ? 'opacity-0 scale-150' :
                    currentTransition === 'zoom-out' ? 'opacity-0 scale-50' :
                    currentTransition === 'drop-down' ? 'opacity-0 -translate-y-full' :
                    'opacity-0'
                "
                x-transition:enter-end="opacity-100 translate-x-0 translate-y-0 scale-100"
                x-transition:leave="transition transform duration-800 ease-in-out"
                x-transition:leave-start="opacity-100 translate-x-0 translate-y-0 scale-100"
                :x-transition:leave-end="
                    currentTransition === 'left-right' ? 'opacity-0 -translate-x-full' :
                    currentTransition === 'right-left' ? 'opacity-0 translate-x-full' :
                    currentTransition === 'bottom-up' ? 'opacity-0 -translate-y-full' :
                    currentTransition === 'top-down' ? 'opacity-0 translate-y-full' :
                    currentTransition === 'zoom-in' ? 'opacity-0 scale-50' :
                    currentTransition === 'zoom-out' ? 'opacity-0 scale-150' :
                    currentTransition === 'drop-down' ? 'opacity-0 translate-y-full' :
                    'opacity-0'
                ">
                
                <!-- Full-size Image with Zoom Effect -->
                <div class="absolute inset-0 overflow-hidden bg-black">
                    <img :src="slide.image" :alt="slide.title" 
                         class="absolute inset-0 w-full h-full object-cover object-center"
                         :class="{ 'animate-subtle-zoom': currentSlide === index }">
                </div>
                
                <!-- Left Side Content Panel -->
                <div class="absolute inset-0 z-10 flex items-center">
                    <div class="container mx-auto px-6 md:px-12">
                        <div class="max-w-xl pl-0 md:pl-12"
                             x-show="currentSlide === index"
                             x-transition:enter="transition transform duration-1000 delay-500 ease-out"
                             x-transition:enter-start="opacity-0 translate-y-12"
                             x-transition:enter-end="opacity-100 translate-y-0">
                            <!-- Small label above title -->
                            <div class="text-white text-sm tracking-widest uppercase mb-2 ml-1"></div>
                            
                            <!-- Large Title - using slide title -->
                            <h1 x-text="slide.title"
                                class="text-white text-6xl md:text-7xl font-bold mb-4 
                                      tracking-tight leading-none"></h1>
                            
                            <!-- Subtitle in accent color -->
                            <div x-text="slide.subtitle ? slide.subtitle.split(' ')[0] : ''"
                                 class="text-orange-500 text-5xl font-bold mb-6"></div>
                            
                            <!-- Description Text -->
                            <p x-text="slide.subtitle"
                               class="text-white/80 text-xs leading-relaxed max-w-md mb-8"></p>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <!-- Bottom Navigation with Rounded Thumbnails -->
        <div class="absolute bottom-12 left-0 right-0 z-30">
            <div class="container mx-auto px-6 md:px-12">
                <div class="flex items-center gap-4">
                    <!-- Navigation Arrows -->
                    <button @click="changeSlide((currentSlide - 1 + slides.length) % slides.length); clearInterval(autoplayInterval); startAutoplay();"
                            class="bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center w-10 h-10
                                  backdrop-blur-sm transition-all duration-300 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    
                    <button @click="changeSlide((currentSlide + 1) % slides.length); clearInterval(autoplayInterval); startAutoplay();"
                            class="bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center w-10 h-10
                                  backdrop-blur-sm transition-all duration-300 hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    
                    <!-- Spacer -->
                    <div class="flex-grow"></div>
                    
                    <!-- Rounded Thumbnails - Fix for scrollbar issue -->
                    <div class="flex items-center gap-4 overflow-x-auto pb-2 no-scrollbar">
                        <template x-for="(slide, index) in slides" :key="'thumb-' + index">
                            <button @click="changeSlide(index); clearInterval(autoplayInterval); startAutoplay();" 
                                :class="{ 
                                    'ring-2 ring-white ring-offset-2 ring-offset-black scale-105': currentSlide === index,
                                    'opacity-70': currentSlide !== index
                                }"
                                class="rounded-2xl overflow-hidden transition-all duration-300 focus:outline-none
                                      shadow-md hover:shadow-lg hover:scale-105 relative flex-shrink-0">
                                <!-- Thumbnail image -->
                                <div class="w-36 h-28 relative">
                                    <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
                                    
                                    <!-- Dark overlay for text -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                                    
                                    <!-- Thumbnail caption -->
                                    <div class="absolute bottom-0 left-0 right-0 p-3 text-left">
                                        <div class="text-white text-xs font-medium"></div>
                                        <div class="text-gray-300 text-xs"></div>
                                    </div>
                                </div>
                            </button>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Auto-progress indicator -->
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-800">
            <div 
                x-ref="progressBar"
                x-effect="
                    $refs.progressBar.style.width = '0%';
                    $refs.progressBar.style.transition = 'none';
                    setTimeout(() => {
                        $refs.progressBar.style.width = '100%';
                        $refs.progressBar.style.transition = 'width 6s linear';
                    }, 50);
                "
                class="h-full bg-orange-500"
            ></div>
        </div>
    </div>
</div>

<style>
/* Add subtle zoom animation for active slide */
@keyframes subtleZoom {
    0% { transform: scale(1); }
    100% { transform: scale(1.05); }
}

.animate-subtle-zoom {
    animation: subtleZoom 10s ease infinite alternate;
}

/* Hide scrollbar while maintaining functionality */
.no-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}

.no-scrollbar::-webkit-scrollbar {
    display: none;  /* Chrome, Safari and Opera */
}

/* Hide elements during initial load until Alpine is ready */
[x-cloak] {
    display: none !important;
}

/* Add bouncy drop effect animation for drop-down transition */
@keyframes bounceDown {
    0% { transform: translateY(-100%); opacity: 0; }
    60% { transform: translateY(10%); opacity: 1; }
    80% { transform: translateY(-5%); }
    100% { transform: translateY(0); }
}

.drop-down-effect {
    animation: bounceDown 1.2s ease-out forwards;
}
</style>

    <!-- Message from Commandant Section -->
    <div class="py-16 bg-gradient-to-b from-blue-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Message from the Commandant</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
            </div>
            
            <div class="flex flex-col md:flex-row items-center gap-8" 
                 x-data="{ isVisible: false }" 
                 x-intersect="isVisible = true">
                <div class="md:w-1/3 transform" 
                     x-class:="isVisible ? 'translate-x-0 opacity-100' : '-translate-x-12 opacity-0'"
                     x-transition:enter="transition ease-out duration-1000 delay-300">
                    <div class="relative overflow-hidden rounded-lg shadow-xl group">
                        <img src="{{ asset('assets/images/people/mungi.png') }}" alt="TPS School Commandant" class="w-full h-auto object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                </div>
                
                <div class="md:w-2/3" 
                     x-class:="isVisible ? 'translate-x-0 opacity-100' : 'translate-x-12 opacity-0'"
                     x-transition:enter="transition ease-out duration-1000 delay-600">
                    <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                        <h3 class="text-2xl font-semibold mb-4 text-gray-800">Welcome to TPS</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">
                            It is my honor to welcome you to our esteemed institution. At TPS, we are committed to excellence in training and developing the next generation of professionals. Our dedicated faculty and state-of-the-art facilities create an environment where students can thrive academically and personally.
                       <a href="{{ route('about.leadership')}}" class="inline-flex items-center group text-blue-600 font-semibold hover:text-blue-800 transition-all duration-300">
                    Meet our leadership team
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                   </svg>
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- News, Announcements & Events Section -->
<div class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">News & Announcements</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
        </div>
        
        <div x-data="{ 
            tab: 'news', <!-- Changed default tab from 'announcements' to 'news' -->
            currentSlide: 0,
            slides: [
                {
                    image: '/assets/images/news&events/news1.jpeg',
                    title: 'Campus Expansion Project',
                    description: 'Construction has begun on our new academic building, set to open next semester.',
                    link: '/news/campus-expansion'
                },
                {
                    image: '/assets/images/news&events/news2.jpeg',
                    title: 'New ICT Laboratory Inaugurated',
                    description: 'Our institution has officially opened a state-of-the-art ICT laboratory to enhance digital skills training.',
                    link: '/news/ict-laboratory'
                },
                {
                    image: '/assets/images/news&events/news3.jpeg',
                    title: 'Annual Sports Competition Results',
                    description: 'Check out the results from our annual interdepartmental sports competition that concluded last week.',
                    link: '/news/sports-competition'
                }
            ],
            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.slides.length;
            },
            prevSlide() {
                this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
            },
            init() {
                setInterval(() => this.nextSlide(), 5000);
            }
        }" class="bg-white rounded-xl shadow-lg overflow-hidden">
            
            <!-- Tab Navigation - Reordered tabs to put News first -->
            <div class="flex border-b border-gray-200">
                <button @click="tab = 'news'" 
                        :class="{ 'border-blue-600 text-blue-600': tab === 'news', 'border-transparent': tab !== 'news' }"
                        class="flex-1 py-4 px-6 text-center font-medium border-b-2 transition-all duration-300 hover:bg-gray-50">
                    Latest News
                </button>
                <button @click="tab = 'announcements'" 
                        :class="{ 'border-blue-600 text-blue-600': tab === 'announcements', 'border-transparent': tab !== 'announcements' }"
                        class="flex-1 py-4 px-6 text-center font-medium border-b-2 transition-all duration-300 hover:bg-gray-50">
                    Announcements
                </button>
                <button @click="tab = 'events'" 
                        :class="{ 'border-blue-600 text-blue-600': tab === 'events', 'border-transparent': tab !== 'events' }"
                        class="flex-1 py-4 px-6 text-center font-medium border-b-2 transition-all duration-300 hover:bg-gray-50">
                    Upcoming Events
                </button>
            </div>
            
            <!-- Tab Content - Content remains the same, just rearranging display order -->
            <div class="p-6">
                <!-- News Tab with Slideshow -->
                <div x-show="tab === 'news'" class="transition-all duration-300 ease-in-out">
                    <!-- Slideshow component -->
                    <div class="relative w-full h-96 bg-gray-100 rounded-lg overflow-hidden">
                        <!-- Slides -->
                        <template x-for="(slide, index) in slides" :key="index">
                            <div x-show="currentSlide === index"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100"
                                 x-transition:leave="transition ease-in duration-300"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 class="absolute inset-0">
                                <div class="w-full h-full relative">
                                    <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex flex-col justify-end p-6">
                                        <h3 x-text="slide.title" class="text-white text-2xl font-bold mb-2"></h3>
                                        <p x-text="slide.description" class="text-white mb-4"></p>
                                        <a :href="slide.link" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md inline-block transition-colors duration-300 max-w-max">
                                            Read more
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </template>
                        
                        <!-- Navigation arrows -->
                        <button @click="prevSlide" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2 focus:outline-none backdrop-blur-sm transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button @click="nextSlide" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/30 hover:bg-white/50 rounded-full p-2 focus:outline-none backdrop-blur-sm transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                        
                        <!-- Slide indicator dots -->
                        <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
                            <template x-for="(slide, index) in slides" :key="index">
                                <button @click="currentSlide = index" 
                                         :class="{'bg-white': currentSlide === index, 'bg-white/50': currentSlide !== index}"
                                         class="w-3 h-3 rounded-full focus:outline-none transition-colors duration-300"></button>
                            </template>
                        </div>
                    </div>
                    
                    <!-- Enhanced news items with image slideshow -->
                    <div class="flex flex-col md:flex-row gap-6 mt-6">
                        <!-- First News Item with Slideshow -->
                        <div class="md:w-1/2 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300"
                             x-data="{
                                slides: [
                                    {
                                        image: '/assets/images/Logos/IMG_0970-1024x683.jpg',
                                        heading: 'TPS Graduates Excel in National Service',
                                        summary: 'Recent graduates from our institution have been recognized for their exceptional performance.'
                                    },
                                    {
                                        image: '/assets/images/Logos/slide2.jpg',
                                        heading: 'Award-Winning Community Service',
                                        summary: 'Our students participated in community outreach programs with outstanding results.'
                                    },
                                    {
                                        image: '/assets/images/Logos/slide3.jpg',
                                        heading: 'Leadership Training Program',
                                        summary: 'Special leadership initiative prepares students for future challenges.'
                                    },
                                    {
                                        image: '/assets/images/Logos/slide4.jpg',
                                        heading: 'International Recognition',
                                        summary: 'TPS graduates receive acknowledgment for their contributions abroad.'
                                    }
                                ],
                                currentIndex: 0,
                                interval: null,
                                startSlideshow() {
                                    this.interval = setInterval(() => {
                                        this.currentIndex = (this.currentIndex + 1) % this.slides.length;
                                    }, 4000);
                                },
                                stopSlideshow() {
                                    clearInterval(this.interval);
                                },
                                nextSlide() {
                                    this.currentIndex = (this.currentIndex + 1) % this.slides.length;
                                },
                                prevSlide() {
                                    this.currentIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
                                }
                             }"
                             x-init="startSlideshow()"
                             @mouseenter="stopSlideshow()"
                             @mouseleave="startSlideshow()">
                            <div class="relative h-48 overflow-hidden">
                                <!-- Image slides -->
                                <template x-for="(slide, index) in slides" :key="index">
                                    <img :src="slide.image" 
                                         alt="News Image"
                                         class="absolute top-0 left-0 w-full h-full object-cover transition-opacity duration-500 ease-in-out"
                                         :class="{ 'opacity-100': currentIndex === index, 'opacity-0': currentIndex !== index }">
                                </template>
                                
                                <!-- Navigation buttons -->
                                <div class="absolute inset-0 flex items-center justify-between p-2">
                                    <button @click.prevent="prevSlide()" class="bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-1 focus:outline-none transform transition hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                    <button @click.prevent="nextSlide()" class="bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-1 focus:outline-none transform transition hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                                
                                <!-- Dots indicator -->
                                <div class="absolute bottom-2 left-0 right-0 flex justify-center gap-2">
                                    <template x-for="(_, index) in slides" :key="index">
                                        <button @click="currentIndex = index" 
                                                class="w-2 h-2 rounded-full transition-all duration-300 focus:outline-none"
                                                :class="currentIndex === index ? 'bg-white scale-125' : 'bg-white bg-opacity-50'">
                                        </button>
                                    </template>
                                </div>
                            </div>
                            <div class="p-6">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <div x-show="currentIndex === index" 
                                         class="transition-all duration-500"
                                         x-transition:enter="transition ease-out duration-300"
                                         x-transition:enter-start="opacity-0 transform translate-y-4"
                                         x-transition:enter-end="opacity-100 transform translate-y-0">
                                        <h4 class="text-xl font-semibold text-gray-800 mb-2" x-text="slide.heading"></h4>
                                        <p class="text-gray-600 mb-4" x-text="slide.summary"></p>
                                    </div>
                                </template>
                                <a href="/news/show/1" class="text-blue-600 hover:underline">Read more</a>
                            </div>
                        </div>
                        
                        <!-- Second News Item with Slideshow -->
                        <div class="md:w-1/2 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300"
                             x-data="{
                                slides: [
                                    {
                                        image: '/assets/images/Logos/JL3A9818-scaled.jpg',
                                        heading: 'New ICT Laboratory Inaugurated',
                                        summary: 'Our institution has officially opened a state-of-the-art ICT laboratory.'
                                    },
                                    {
                                        image: '/assets/images/Logos/lab2.jpg',
                                        heading: 'Advanced Technology Integration',
                                        summary: 'The lab features cutting-edge equipment for practical learning experiences.'
                                    },
                                    {
                                        image: '/assets/images/Logos/lab3.jpg',
                                        heading: 'Industry Partnership Program',
                                        summary: 'Collaborations with tech companies provide real-world training opportunities.'
                                    },
                                    {
                                        image: '/assets/images/Logos/lab4.jpg',
                                        heading: 'Digital Skills Development',
                                        summary: 'Students gain hands-on experience with professional software and tools.'
                                    }
                                ],
                                currentIndex: 0,
                                interval: null,
                                startSlideshow() {
                                    this.interval = setInterval(() => {
                                        this.currentIndex = (this.currentIndex + 1) % this.slides.length;
                                    }, 4000);
                                },
                                stopSlideshow() {
                                    clearInterval(this.interval);
                                },
                                nextSlide() {
                                    this.currentIndex = (this.currentIndex + 1) % this.slides.length;
                                },
                                prevSlide() {
                                    this.currentIndex = (this.currentIndex - 1 + this.slides.length) % this.slides.length;
                                }
                             }"
                             x-init="startSlideshow()"
                             @mouseenter="stopSlideshow()"
                             @mouseleave="startSlideshow()">
                            <div class="relative h-48 overflow-hidden">
                                <!-- Image slides -->
                                <template x-for="(slide, index) in slides" :key="index">
                                    <img :src="slide.image" 
                                         alt="News Image"
                                         class="absolute top-0 left-0 w-full h-full object-cover transition-opacity duration-500 ease-in-out"
                                         :class="{ 'opacity-100': currentIndex === index, 'opacity-0': currentIndex !== index }">
                                </template>
                                
                                <!-- Navigation buttons -->
                                <div class="absolute inset-0 flex items-center justify-between p-2">
                                    <button @click.prevent="prevSlide()" class="bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-1 focus:outline-none transform transition hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                    <button @click.prevent="nextSlide()" class="bg-white bg-opacity-50 hover:bg-opacity-75 rounded-full p-1 focus:outline-none transform transition hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                                
                                <!-- Dots indicator -->
                                <div class="absolute bottom-2 left-0 right-0 flex justify-center gap-2">
                                    <template x-for="(_, index) in slides" :key="index">
                                        <button @click="currentIndex = index" 
                                                class="w-2 h-2 rounded-full transition-all duration-300 focus:outline-none"
                                                :class="currentIndex === index ? 'bg-white scale-125' : 'bg-white bg-opacity-50'">
                                        </button>
                                    </template>
                                </div>
                            </div>
                            <div class="p-6">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <div x-show="currentIndex === index" 
                                         class="transition-all duration-500"
                                         x-transition:enter="transition ease-out duration-300"
                                         x-transition:enter-start="opacity-0 transform translate-y-4"
                                         x-transition:enter-end="opacity-100 transform translate-y-0">
                                        <h4 class="text-xl font-semibold text-gray-800 mb-2" x-text="slide.heading"></h4>
                                        <p class="text-gray-600 mb-4" x-text="slide.summary"></p>
                                    </div>
                                </template>
                                <a href="/news/show/2" class="text-blue-600 hover:underline">Read more</a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 text-center">
                        <a href="/news" class="inline-flex items-center group text-blue-600 font-semibold hover:text-blue-800 transition-all duration-300">
                            View all news
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
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
                                <img src="/assets/images/Logos/womens-day.jpg" alt="Women's Day" class="absolute inset-0 w-full h-full object-cover">
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
                    '{{ asset('assets/images/Logos/hd-2048x1366-1.jpg') }}',
                    '{{ asset('assets/images/Logos/IMG-20240207-WA0065-768x512.jpg') }}'
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
            '{{ asset('assets/images/Logos/NEW-9482-scaled.jpg') }}',
            '{{ asset('assets/images/Logos/IMG-20240628-WA0124-1536x1024.jpg') }}',
            '{{ asset('assets/images/Logos/JL3A0421-scaled.jpg') }}',
            '{{ asset('assets/images/Logos/Snapinsta.app_464550583_567745649165392_6800108106112023936_n_1080-1024x576.jpg') }}'
        ]
    }" 
    @mouseenter="isHovered = true" 
    @mouseleave="isHovered = false"
    x-init="
        startSlideshow = function() {
            slideInterval = setInterval(() => {
                currentSlide = (currentSlide + 1) % slides.length;
            }, 3000);
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
        <button @click="activeModal = 'promotion'"
            class="w-full bg-purple-500 text-white py-3 rounded-lg hover:bg-purple-600 transition duration-300 transform hover:scale-105">
            View Details
        </button>
    </div>
</div>
    <!-- Proficiency Courses -->
    <div class="course-card bg-white rounded-2xl shadow-lg overflow-hidden transform hover:-translate-y-2 transition-all duration-300"
        x-data="{ isHovered: false, currentSlide: 0, slides: [
                    '{{ asset('assets/images/Logos/IMG-20240305-WA0014-1024x683.jpg') }}',
                    '{{ asset('assets/images/proficiency-slide2.jpg') }}',
                    '{{ asset('assets/images/proficiency-slide3.jpg') }}',
                    '{{ asset('assets/images/proficiency-slide4.jpg') }}'
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

    <!-- Facilities Section -->
    <div class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Facilities</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto rounded-full"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">Explore our modern facilities designed to provide a conducive environment for learning and training.</p>
            </div>
            
            <div x-data="{ activeFacility: null }"
                 class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- ICT Labs -->
                <div class="group relative overflow-hidden rounded-xl shadow-lg"
                     @mouseenter="activeFacility = 'ict'"
                     @mouseleave="activeFacility = null">
                    <img src="{{ asset('assets/images/Logos/DJI_0466-1066x546.jpg') }}" alt="ICT Lab" class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                        <h3 class="text-white text-xl font-semibold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">ICT Labs</h3>
                        <p class="text-gray-200 transform translate-y-8 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100">Modern computing facilities with latest software and hardware for digital training.</p>
                    </div>
                </div>
                
                <!-- Conference Hall -->
                <div class="group relative overflow-hidden rounded-xl shadow-lg"
                     @mouseenter="activeFacility = 'conference'"
                     @mouseleave="activeFacility = null">
                    <img src="{{ asset('assets/images/Logos/conf.jpg') }}" alt="Conference Hall" class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                        <h3 class="text-white text-xl font-semibold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">Conference Hall</h3>
                        <p class="text-gray-200 transform translate-y-8 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100">Spacious auditorium equipped with modern audio-visual system for large gatherings.</p>
                    </div>
                </div>
                
                <!-- Sports Areas -->
                <div class="group relative overflow-hidden rounded-xl shadow-lg"
                     @mouseenter="activeFacility = 'sports'"
                     @mouseleave="activeFacility = null">
                    <img src="{{ asset('assets/images/Logos/sports.jpg') }}" alt="Sports Areas" class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                        <h3 class="text-white text-xl font-semibold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">Sports Areas</h3>
                        <p class="text-gray-200 transform translate-y-8 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100">Comprehensive sports facilities including football field, basketball and volleyball courts.</p>
                    </div>
                </div>
                
                <!-- Library -->
                <div class="group relative overflow-hidden rounded-xl shadow-lg"
                     @mouseenter="activeFacility = 'library'"
                     @mouseleave="activeFacility = null">
                    <img src="{{ asset('assets/images/Logos/slide-1066x546.jpg') }}" alt="Library" class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                        <h3 class="text-white text-xl font-semibold transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500">Library</h3>
                        <p class="text-gray-200 transform translate-y-8 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 delay-100">Well-stocked library with extensive collection of books, journals and digital resources.</p>
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
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300">
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
        <a href="{{ route('services.poultry') }}" class="text-yellow-600 hover:text-yellow-800 font-medium">Learn more</a>
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
        <a href="{{ route('services.catering') }}" class="text-blue-600 hover:text-blue-800 font-medium">Learn more</a>
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
                    <a href="{{ route('services.health') }}" class="text-blue-600 hover:text-blue-800 font-medium">Learn more</a>
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
<div class="relative h-screen overflow-hidden bg-gray-100">
    <!-- Dynamic Background (Based on Active Card) -->
    <div x-data="{ 
        activeSlide: 0,
        slides: [
            {
                image: '{{ asset('assets/images/Logos/JL3A0557.jpg') }}',
                title: 'Best Police Training Academy 2024',
                description: 'Awarded for excellence in police training methodologies and exceptional graduation rates. Our academy was recognized nationally for implementing innovative training techniques that have resulted in officers who excel in their field assignments.',
                year: '2024',
                milestone: 'National Recognition'
            },
            {
                image: '{{ asset('assets/images/Logos/sports.jpg') }}',
                title: 'Community Service Excellence Award',
                description: 'Recognized for our outstanding community outreach programs and positive impact on surrounding communities. Our cadets and staff have contributed over 5,000 volunteer hours in the past year, focusing on youth mentorship and community safety initiatives.',
                year: '2023',
                milestone: 'Community Impact'
            },
            {
                image: '{{ asset('assets/images/Logos/hd-2048x1366-1.jpg') }}',
                title: 'Advanced Forensic Training Certification',                 
                description: 'Received international certification for our advanced forensic training program. Our students now benefit from hands-on experience with cutting-edge forensic technology and techniques that meet global standards of excellence.',
                year: '2022',
                milestone: 'International Recognition'
            },
            {
                image: '{{ asset('assets/images/Logos/news2.jpeg') }}',
                title: 'Academic Partnership Excellence',
                description: 'Established valuable academic partnerships with leading universities, providing advanced educational pathways for our graduates. These collaborations have created opportunities for continuing education and specialized certifications.',
                year: '2021',
                milestone: 'Academic Excellence'
            }
        ],
        init() {
            this.startAutoSlide();
            this.updateCardPositions();
        },
        startAutoSlide() {
            setInterval(() => {
                this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                this.updateCardPositions();
            }, 10000);
        },
        updateCardPositions() {
            // Logic handled by Alpine.js x-for and positioning classes
        },
        getCardClass(index) {
            const position = (index - this.activeSlide + this.slides.length) % this.slides.length;
            if (position === 0) return 'z-30 scale-110 translate-y-0 opacity-100'; // Active card
            if (position === 1) return 'z-20 scale-95 translate-y-24 opacity-90'; // First stacked card
            if (position === 2) return 'z-10 scale-90 translate-y-40 opacity-80'; // Second stacked card
            return 'z-0 scale-85 translate-y-56 opacity-70'; // Last stacked card
        }
    }" 
    x-init="init()"
    class="w-full h-full">
        
        <!-- Background Image (Current Active Card) -->
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index"
                x-transition:enter="transition-opacity duration-1000"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity duration-1000"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 w-full h-full">
                <div class="absolute inset-0 bg-black opacity-60"></div>
                <img :src="slide.image" class="absolute inset-0 w-full h-full object-cover" :alt="slide.title">
            </div>
        </template>

        <!-- Content Container -->
        <div class="relative h-full flex items-center">
            <div class="container mx-auto px-4 flex flex-col md:flex-row items-center h-full">
                
                <!-- Left Side: Timeline with Milestones -->
                <div class="w-full md:w-1/2 text-white z-10 pb-12 md:pb-0">
                    <h2 class="text-4xl font-bold mb-8">Our Achievements</h2>
                    
                    <!-- Vertical Timeline -->
                    <div class="relative pl-8 ml-8">
                        <!-- Vertical Line -->
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-blue-600 rounded"></div>
                        
                        <!-- Timeline Items -->
                        <template x-for="(slide, index) in slides" :key="index">
                            <div class="mb-12 relative">
                                <!-- Milestone Point -->
                                <div :class="activeSlide === index ? 'bg-blue-600 scale-125' : 'bg-gray-400'"
                                    class="absolute -left-10 w-4 h-4 rounded-full border-4 border-white transition-all duration-500"></div>
                                
                                <!-- Year -->
                                <div :class="activeSlide === index ? 'text-blue-300 font-bold' : 'text-gray-300'"
                                    class="text-lg mb-1 transition-all duration-500" x-text="slide.year"></div>
                                
                                <!-- Milestone -->
                                <div :class="activeSlide === index ? 'text-white' : 'text-gray-400'"
                                    class="text-lg font-semibold transition-all duration-500" x-text="slide.milestone"></div>
                                
                                <!-- Brief Description -->
                                <div x-show="activeSlide === index" 
                                    x-transition:enter="transition-all duration-500"
                                    x-transition:enter-start="opacity-0 transform -translate-x-4"
                                    x-transition:enter-end="opacity-100 transform translate-x-0"
                                    class="text-sm text-gray-300 mt-2 max-w-xs">
                                    <p x-text="slide.description.split('.')[0] + '.'"></p>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                
                <!-- Right Side: Card Castle -->
                <div class="w-full md:w-1/2 h-full relative flex items-center justify-center z-10">
                    <div class="relative h-96 w-64">
                        <template x-for="(slide, index) in slides" :key="index">
                            <div @click="activeSlide = index"
                                :class="getCardClass(index)"
                                class="absolute top-0 left-0 w-full bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-1000 cursor-pointer">
                                
                                <!-- Card Image -->
                                <div class="w-full h-32 overflow-hidden">
                                    <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover">
                                </div>
                                
                                <!-- Card Content -->
                                <div class="p-4">
                                    <h3 class="text-lg font-bold text-gray-800 mb-2" x-text="slide.title"></h3>
                                    <p class="text-xs text-gray-600 line-clamp-3" x-text="slide.description"></p>
                                </div>
                                
                                <!-- Progress Bar -->
                                <div x-show="activeSlide === index" class="absolute bottom-0 left-0 right-0 h-1 bg-gray-200">
                                    <div class="h-full bg-blue-600 animate-progress"></div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation Controls -->
        <div class="absolute bottom-8 right-8 flex space-x-4 z-20">
            <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length"
                class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-2 shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button @click="activeSlide = (activeSlide + 1) % slides.length"
                class="bg-blue-600 hover:bg-blue-700 text-white rounded-full p-2 shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    </div>
</div>


        <!-- Modal Overlay -->
        <div x-show="activeModal" 
             class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            
            <!-- Modal Content -->
            <div class="bg-white rounded-2xl max-w-2xl w-full max-h-[80vh] overflow-y-auto p-8"
                 x-show="activeModal"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-90">

                
    <!-- Recruit Course Modal --> 
    <div x-show="activeModal === 'recruit'">
        <h2 class="text-3xl font-bold text-blue-800 mb-6">Basic Recruit Courses</h2>
        <p class="text-gray-700 mb-4">
            Our Basic Recruit Courses are the gateway to a prestigious career in law enforcement. Candidates undergo comprehensive training that covers physical fitness, legal knowledge, community policing, and essential law enforcement skills.
        </p>
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-blue-700 mb-2">Course Highlights:</h3>
            <ul class="list-disc pl-5 text-gray-700 space-y-1">
                <li>Physical training and fitness development</li>
                <li>Criminal law and procedure</li>
                <li>Evidence handling and investigation techniques</li>
                <li>Firearms training and defensive tactics</li>
                <li>Community policing principles</li>
                <li>Emergency response protocols</li>
            </ul>
        </div>
        <div class="flex flex-wrap items-center gap-4">
            <a href="https://www.ajira.go.tz/recruitment/police" target="_blank" 
               class="inline-block bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition duration-300">
                Official Recruitment Portal
            </a>
            <button @click="activeModal = null" 
                    class="text-gray-600 hover:text-gray-900 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300">
                Close
            </button>
        </div>
    </div>

    <!-- Academic Course Modal -->
    <div x-show="activeModal === 'academic'">
        <h2 class="text-3xl font-bold text-green-800 mb-6">Academic Courses</h2>
        <p class="text-gray-700 mb-4">
            Our Academic Courses provide advanced educational opportunities for police personnel. From undergraduate degrees in criminology to specialized certifications in forensic science and law enforcement management, we offer pathways for continuous professional development.
        </p>
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-green-700 mb-2">Available Programs:</h3>
            <ul class="list-disc pl-5 text-gray-700 space-y-1">
                <li>Bachelor of Science in Criminal Justice</li>
                <li>Advanced Diploma in Police Administration</li>
                <li>Certificate in Forensic Investigation</li>
                <li>Specialized Law Enforcement Management Courses</li>
                <li>Criminal Psychology and Behavioral Analysis</li>
            </ul>
        </div>
        <div class="flex flex-wrap items-center gap-4">
            <a href="https://www.police.go.tz/education" target="_blank" 
               class="inline-block bg-green-500 text-white px-6 py-3 rounded-lg hover:bg-green-600 transition duration-300">
                Explore Educational Programs
            </a>
            <button @click="activeModal = null" 
                    class="text-gray-600 hover:text-gray-900 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300">
                Close
            </button>
        </div>
    </div>

    <!-- Promotional Course Modal -->
    <div x-show="activeModal === 'promotion'">
        <h2 class="text-3xl font-bold text-purple-800 mb-6">Promotional Courses</h2>
        <p class="text-gray-700 mb-4">
            Designed for ambitious officers seeking career advancement, our Promotional Courses focus on leadership skills, strategic thinking, advanced management techniques, and specialized law enforcement strategies. Prepare yourself for higher responsibilities and leadership roles.
        </p>
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-purple-700 mb-2">Leadership Tracks:</h3>
            <ul class="list-disc pl-5 text-gray-700 space-y-1">
                <li>Senior Officer Leadership Program</li>
                <li>Strategic Command and Decision Making</li>
                <li>Advanced Crisis Management</li>
                <li>Policy Development and Implementation</li>
                <li>Organizational Management in Law Enforcement</li>
            </ul>
        </div>
        <div class="flex flex-wrap items-center gap-4">
            <a href="https://www.police.go.tz/career-development" target="_blank" 
               class="inline-block bg-purple-500 text-white px-6 py-3 rounded-lg hover:bg-purple-600 transition duration-300">
                Career Development Portal
            </a>
            <button @click="activeModal = null" 
                    class="text-gray-600 hover:text-gray-900 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300">
                Close
            </button>
        </div>
    </div>

    <!-- Proficiency Course Modal -->
    <div x-show="activeModal === 'proficiency'">
        <h2 class="text-3xl font-bold text-orange-800 mb-6">Proficiency Courses</h2>
        <p class="text-gray-700 mb-4">
            Our Proficiency Courses are designed to enhance specific skills and technical expertise in key law enforcement areas. These specialized programs cover advanced investigation techniques, cybercrime prevention, intelligence analysis, tactical operations, and other critical police competencies tailored to modern policing challenges.
        </p>
        <div class="mb-6">
            <h3 class="text-xl font-semibold text-orange-700 mb-2">Specialized Tracks:</h3>
            <ul class="list-disc pl-5 text-gray-700 space-y-1">
                <li>Advanced Criminal Investigation</li>
                <li>Cybercrime Detection and Prevention</li>
                <li>Tactical Response and Special Operations</li>
                <li>Intelligence Gathering and Analysis</li>
                <li>Digital Forensics and Electronic Evidence</li>
                <li>Counter-Terrorism Training</li>
            </ul>
        </div>
        <div class="flex flex-wrap items-center gap-4">
            <a href="https://www.police.go.tz/professional-development" target="_blank" 
               class="inline-block bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition duration-300">
                Explore Proficiency Programs
            </a>
            <button @click="activeModal = null" 
                    class="text-gray-600 hover:text-gray-900 px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-100 transition duration-300">
                Close
            </button>
        </div>
    </div>
</div>



<style>
@keyframes progress {
    0% { width: 0; }
    100% { width: 100%; }
}

.animate-progress {
    animation: progress 10s linear;
}
</style>
    </div>
</div>
@endsection