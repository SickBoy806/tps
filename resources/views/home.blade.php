@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="bg-white">
    <!-- Fullscreen Hero Section with Slideshow (Maintained from original) -->
    <div x-data="{ 
            currentSlide: 0,
            slides: {{ Js::from($slides) }},
            loop() {
                setInterval(() => {
                    this.currentSlide = (this.currentSlide + 1) % this.slides.length
                }, 5000)
            }
        }" 
        x-init="loop()"
        class="relative bg-blue-600 h-screen overflow-hidden">
        
        <!-- Slides -->
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="currentSlide === index"
                x-transition:enter="transition transform duration-700"
                x-transition:enter-start="opacity-0 translate-x-full"
                x-transition:enter-end="opacity-100 translate-x-0"
                x-transition:leave="transition transform duration-700"
                x-transition:leave-start="opacity-100 translate-x-0"
                x-transition:leave-end="opacity-0 -translate-x-full"
                class="absolute inset-0">
                
                <!-- Background Image -->
                <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/30"></div>
                <img :src="slide.image" :alt="slide.title" class="absolute inset-0 w-full h-full object-cover">
                
                <!-- Content -->
                <div class="relative z-20 container mx-auto px-4 h-full flex items-center">
                    <div class="text-white max-w-3xl">
                        <div class="backdrop-blur-sm bg-black/20 p-8 rounded-lg border border-white/10">
                            <h1 x-text="slide.title"
                                class="text-6xl font-bold mb-6 transform transition-all duration-700 
                                text-transparent bg-clip-text bg-gradient-to-r from-white to-gray-300
                                drop-shadow-lg"></h1>
                            <p x-text="slide.subtitle"
                                class="text-2xl mb-8 transform transition-all duration-700 delay-200
                                text-gray-200 leading-relaxed"></p>
                            <template x-if="slide.button_text">
                                <a :href="slide.button_link"
                                    class="inline-block bg-white text-blue-600 px-10 py-4 rounded-full 
                                    font-semibold text-lg hover:bg-blue-50 hover:scale-105
                                    transform transition-all duration-300 
                                    shadow-lg hover:shadow-xl"
                                    x-text="slide.button_text">
                                </a>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <!-- Enhanced Navigation Arrows -->
        <button @click="currentSlide = (currentSlide - 1 + slides.length) % slides.length"
            class="absolute left-6 top-1/2 -translate-y-1/2 z-30 bg-white/10 hover:bg-white/30 
                rounded-full p-4 backdrop-blur-md transition-all duration-300 
                hover:scale-110 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white transition-transform group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button @click="currentSlide = (currentSlide + 1) % slides.length"
            class="absolute right-6 top-1/2 -translate-y-1/2 z-30 bg-white/10 hover:bg-white/30 
                rounded-full p-4 backdrop-blur-md transition-all duration-300 
                hover:scale-110 group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Enhanced Slide Indicators -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-30 flex gap-3">
            <template x-for="(slide, index) in slides" :key="'slide-' + index">
                <button @click="currentSlide = index"
                    :class="currentSlide === index ? 'bg-white w-12' : 'bg-white/50 w-3 hover:bg-white/70'"
                    class="h-3 rounded-full transition-all duration-300 hover:scale-110"> 
                </button>
            </template>
        </div>
    </div>

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
            tab: 'announcements',
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
            
            <!-- Tab Navigation -->
            <div class="flex border-b border-gray-200">
                <button @click="tab = 'announcements'" 
                        :class="{ 'border-blue-600 text-blue-600': tab === 'announcements', 'border-transparent': tab !== 'announcements' }"
                        class="flex-1 py-4 px-6 text-center font-medium border-b-2 transition-all duration-300 hover:bg-gray-50">
                    Announcements
                </button>
                <button @click="tab = 'news'" 
                        :class="{ 'border-blue-600 text-blue-600': tab === 'news', 'border-transparent': tab !== 'news' }"
                        class="flex-1 py-4 px-6 text-center font-medium border-b-2 transition-all duration-300 hover:bg-gray-50">
                    Latest News
                </button>
                <button @click="tab = 'events'" 
                        :class="{ 'border-blue-600 text-blue-600': tab === 'events', 'border-transparent': tab !== 'events' }"
                        class="flex-1 py-4 px-6 text-center font-medium border-b-2 transition-all duration-300 hover:bg-gray-50">
                    Upcoming Events
                </button>
            </div>
            
            <!-- Tab Content -->
            <div class="p-6">
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
                    
                    <!-- Original news items -->
                    <div class="flex flex-col md:flex-row gap-6 mt-6">
                        <div class="md:w-1/2 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                            <img src="/assets/images/Logos/IMG_0970-1024x683.jpg" alt="News 1" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h4 class="text-xl font-semibold text-gray-800 mb-2">TPS Graduates Excel in National Service</h4>
                                <p class="text-gray-600 mb-4">Recent graduates from our institution have been recognized for their exceptional performance in various national service roles.</p>
                                <a href="/news/show/1" class="text-blue-600 hover:underline">Read more</a>
                            </div>
                        </div>
                        <div class="md:w-1/2 bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                            <img src="/assets/images/Logos/JL3A9818-scaled.jpg" alt="News 2" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h4 class="text-xl font-semibold text-gray-800 mb-2">New ICT Laboratory Inaugurated</h4>
                                <p class="text-gray-600 mb-4">Our institution has officially opened a state-of-the-art ICT laboratory to enhance digital skills training.</p>
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
            <button @click="activeModal = 'proficiency'"
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
                <!-- Health Center -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 transform hover:scale-105 transition-all duration-300"
                     x-data="{ isHovered: false }"
                     @mouseenter="isHovered = true"
                     @mouseleave="isHovered = false">
                    <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mb-4 mx-auto"
                         :class="{ 'animate-pulse': isHovered }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-3 text-gray-800">Health Center</h3>
                    <p class="text-gray-600 text-center">Comprehensive healthcare services for students and staff with qualified medical professionals.</p>
                    <div class="mt-4 text-center">
                        <a href="{{ route('services.health') }}" class="text-blue-600 hover:text-blue-800 font-medium">Learn more</a>
                    </div>
                </div>
                
                <!-- Services Section (continued) -->
                <!-- Driving School (fixed SVG path) -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 transform hover:scale-105 transition-all duration-300"
                     x-data="{ isHovered: false }"
                     @mouseenter="isHovered = true"
                     @mouseleave="isHovered = false">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-4 mx-auto"
                         :class="{ 'animate-pulse': isHovered }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-3 text-gray-800">Driving School</h3>
                    <p class="text-gray-600 text-center">Professional driving lessons with certified instructors using modern vehicles.</p>
                    <div class="mt-4 text-center">
                        <a href="{{ route('services.driving') }}" class="text-blue-600 hover:text-blue-800 font-medium">Learn more</a>
                    </div>
                </div>
                
                <!-- Poultry Section -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 transform hover:scale-105 transition-all duration-300"
                     x-data="{ isHovered: false }"
                     @mouseenter="isHovered = true"
                     @mouseleave="isHovered = false">
                    <div class="w-16 h-16 bg-yellow-100 text-yellow-600 rounded-full flex items-center justify-center mb-4 mx-auto"
                         :class="{ 'animate-pulse': isHovered }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-3 text-gray-800">Poultry Farm</h3>
                    <p class="text-gray-600 text-center">Modern poultry farming facility offering practical training in sustainable animal husbandry.</p>
                    <div class="mt-4 text-center">
                        <a href="{{ route('services.poultry') }}" class="text-blue-600 hover:text-blue-800 font-medium">Learn more</a>
                    </div>
                </div>
                
                <!-- Catering Section -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 transform hover:scale-105 transition-all duration-300"
                     x-data="{ isHovered: false }"
                     @mouseenter="isHovered = true"
                     @mouseleave="isHovered = false">
                    <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-4 mx-auto"
                         :class="{ 'animate-pulse': isHovered }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-3 text-gray-800">Catering Services</h3>
                    <p class="text-gray-600 text-center">Professional catering services for events with culinary training opportunities for students.</p>
                    <div class="mt-4 text-center">
                        <a href="{{ route('services.catering') }}" class="text-blue-600 hover:text-blue-800 font-medium">Learn more</a>
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