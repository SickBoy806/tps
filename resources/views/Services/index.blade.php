@extends('layouts.app')
@section('title', 'Services')
@section('content')
<!-- Hero Banner with Parallax and Animated Elements -->
<div class="relative bg-gradient-to-r from-blue-900 to-indigo-800 py-24 mb-16 text-white overflow-hidden">
    <!-- Animated Background Shapes -->
    <div class="absolute inset-0 overflow-hidden" aria-hidden="true">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-blue-500 opacity-10 rounded-full animate-pulse"></div>
        <div class="absolute top-20 left-10 w-72 h-72 bg-indigo-500 opacity-10 rounded-full animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-10 right-20 w-56 h-56 bg-purple-500 opacity-10 rounded-full animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <!-- Subtle Background Image with Parallax Effect -->
    <div class="absolute inset-0 parallax-bg">
        <img src="{{ asset('assets/images/Logos/tanzania-police-seeklogo.png') }}" alt="Background" class="w-full h-full object-cover opacity-5">
    </div>
    
    <div class="container mx-auto text-center relative z-10 px-4">
        <div class="animate-fade-in-up">
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 drop-shadow-lg">Our <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-300 to-indigo-300">Services</span></h1>
            <p class="text-xl max-w-3xl mx-auto opacity-90 mb-10">Discover our wide range of professional services designed to meet your needs with excellence and dedication.</p>
            
            <!-- Interactive Search Filter (for visual appeal) -->
<div class="max-w-xs mx-auto mt-6 mb-2 relative transition-all duration-300 group">
    <input type="text" placeholder="Search services..." class="w-full px-6 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-700 bg-white bg-opacity-95 backdrop-blur-sm shadow-lg transition-all duration-300">
    <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 transition-all duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
    </button>
</div>
            
            <!-- Category Pills -->
            <div class="flex flex-wrap justify-center gap-2 mt-4">
                <button class="category-pill-active px-4 py-1 rounded-full text-sm font-medium bg-white text-blue-800 hover:bg-blue-50 transition-all duration-300 transform hover:scale-105">
                    All
                </button>
                <button class="category-pill px-4 py-1 rounded-full text-sm font-medium bg-orange bg-opacity-20 text-orange hover:bg-opacity-30 transition-all duration-300 transform hover:scale-105">
                    Healthcare
                </button>
                <button class="category-pill px-4 py-1 rounded-full text-sm font-medium bg-orange bg-opacity-20 text-orange hover:bg-opacity-30 transition-all duration-300 transform hover:scale-105">
                    Education
                </button>
                <button class="category-pill px-4 py-1 rounded-full text-sm font-medium bg-blue bg-opacity-20 text-orange hover:bg-opacity-30 transition-all duration-300 transform hover:scale-105">
                    Creative Arts
                </button>
                <button class="category-pill px-4 py-1 rounded-full text-sm font-medium bg-blue bg-opacity-20 text-orange hover:bg-opacity-30 transition-all duration-300 transform hover:scale-105">
                    Animal Care
                </button>
            </div>
        </div>
    </div>
    
    <!-- Scroll Down Indicator -->
    <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</div>

<div class="container mx-auto px-4 mb-20">
    <!-- Featured Services Banner -->
    <div class="mb-12 text-center animate-fade-in">
        <h2 class="text-3xl font-bold mb-2">Our <span class="text-blue-600">Featured</span> Services</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Explore our most popular offerings that have made a significant impact in our community.</p>
        <div class="h-1 w-24 bg-blue-600 mx-auto mt-4 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Health Center Card -->
        <div class="service-card group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="relative overflow-hidden">
                <img src="{{ asset('images/health-center.jpg') }}" 
                     class="h-56 w-full object-cover transition-transform duration-700 group-hover:scale-110" 
                     alt="Health Center" 
                     onerror="this.src='https://source.unsplash.com/random/500x300/?hospital'">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                <div class="absolute top-3 left-3">
                    <span class="inline-block bg-blue-600 text-white text-xs px-3 py-1 rounded-full font-semibold shadow-lg">Healthcare</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold mb-3 group-hover:text-blue-600 transition-colors duration-300">Health Center</h3>
                <p class="text-gray-600 mb-5">Tanzania Police School Health Center in Moshi, Kilimanjaro. Providing quality healthcare services to the community.</p>
                
                <!-- Service Details - Interactive Expandable Section -->
                <div class="service-details overflow-hidden transition-all duration-500 max-h-0 group-hover:max-h-40 opacity-0 group-hover:opacity-100">
                    <div class="pt-3 border-t border-gray-200">
                        <ul class="space-y-1 text-sm text-gray-600">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                24/7 Emergency Services
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Professional Medical Staff
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Modern Facilities
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('services.health') }}" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 transition-colors group">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <button class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Driving School Card -->
        <div class="service-card group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="relative overflow-hidden">
                <img src="{{ asset('images/driving-school.jpg') }}" 
                     class="h-56 w-full object-cover transition-transform duration-700 group-hover:scale-110" 
                     alt="Driving School" 
                     onerror="this.src='https://source.unsplash.com/random/500x300/?driving'">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                <div class="absolute top-3 left-3">
                    <span class="inline-block bg-green-600 text-white text-xs px-3 py-1 rounded-full font-semibold shadow-lg">Education</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold mb-3 group-hover:text-green-600 transition-colors duration-300">Driving School</h3>
                <p class="text-gray-600 mb-5">Professional driving instruction with certified instructors. Learn to drive safely and confidently.</p>
                
                <!-- Service Details - Interactive Expandable Section -->
                <div class="service-details overflow-hidden transition-all duration-500 max-h-0 group-hover:max-h-40 opacity-0 group-hover:opacity-100">
                    <div class="pt-3 border-t border-gray-200">
                        <ul class="space-y-1 text-sm text-gray-600">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Licensed Instructors
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Modern Training Vehicles
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Flexible Class Schedule
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('services.driving') }}" class="inline-flex items-center text-green-600 font-medium hover:text-green-800 transition-colors group">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <button class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Poetry Service Card -->
        <div class="service-card group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="relative overflow-hidden">
                <img src="{{ asset('images/poetry.jpg') }}" 
                     class="h-56 w-full object-cover transition-transform duration-700 group-hover:scale-110" 
                     alt="Poetry Service" 
                     onerror="this.src='https://source.unsplash.com/random/500x300/?poetry'">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-0 group-hover:opacity-70 transition-opacity duration-300"></div>
                <div class="absolute top-3 left-3">
                    <span class="inline-block bg-purple-600 text-white text-xs px-3 py-1 rounded-full font-semibold shadow-lg">Creative Arts</span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-2xl font-bold mb-3 group-hover:text-purple-600 transition-colors duration-300">Poetry Service</h3>
                <p class="text-gray-600 mb-5">Creative writing and poetry workshops. Express yourself through the power of words.</p>
                
                <!-- Service Details - Interactive Expandable Section -->
                <div class="service-details overflow-hidden transition-all duration-500 max-h-0 group-hover:max-h-40 opacity-0 group-hover:opacity-100">
                    <div class="pt-3 border-t border-gray-200">
                        <ul class="space-y-1 text-sm text-gray-600">
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Expert Facilitators
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                All Skill Levels Welcome
                            </li>
                            <li class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Performance Opportunities
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('services.poetry') }}" class="inline-flex items-center text-purple-600 font-medium hover:text-purple-800 transition-colors group">
                        Learn More
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                    <button class="w-10 h-10 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center hover:bg-purple-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Showcase Services Section (Wider Cards) -->
    <div class="mt-16 mb-8 text-center animate-fade-in">
        <h2 class="text-3xl font-bold mb-2">Showcase <span class="text-blue-600">Services</span></h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Our premium offerings with specialized facilities and expert staff.</p>
        <div class="h-1 w-24 bg-blue-600 mx-auto mt-4 rounded-full"></div>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-10">
        <!-- Dogs & Horses Card (Wider card with enhanced interaction) -->
        <div class="service-card-large group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
            <div class="relative overflow-hidden">
                <img src="{{ asset('images/dogs-horses.jpg') }}" 
                     class="h-64 w-full object-cover transition-transform duration-700 group-hover:scale-110" 
                     alt="Dogs & Horses" 
                     onerror="this.src='https://source.unsplash.com/random/800x400/?animals'">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                    <span class="inline-block bg-yellow-600 text-white text-xs px-3 py-1 rounded-full font-semibold shadow-lg mb-2">Animal Care</span>
                    <h3 class="text-2xl font-bold mb-2">Dogs & Horses</h3>
                    <p class="text-white text-opacity-90 mb-4 max-w-lg">Professional animal training, care, and facilities for dogs and horses. Specialized programs for service animals.</p>
                    
                    <div class="flex space-x-3">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white bg-opacity-20 backdrop-filter backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Expert Trainers
                        </span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white bg-opacity-20 backdrop-filter backdrop-blur-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Modern Facilities
                        </span>
                    </div>
                </div>
                <div class="absolute top-3 right-3">
                    <span class="inline-block bg-yellow-500 text-white text-xs px-3 py-1 rounded-full font-semibold animate-pulse">Featured</span>
                </div>
            </div>
            <div class="p-6 flex justify-between items-center">
                <a href="{{ route('services.animals') }}" class="inline-flex items-center text-yellow-600 font-medium hover:text-yellow-800 transition-colors group">
                    Learn More
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
                <div class="flex items-center space-x-2">
                    <button class="w-10 h-10 rounded-full bg-yellow-50 text-yellow-600 flex items-center justify-center hover:bg-yellow-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </button>
                    <button class="w-10 h-10 rounded-full bg-yellow-50 text-yellow-600 flex items-center justify-center hover:bg-yellow-100 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Catering Card (Wider card with enhanced interaction) -->
<div class="service-card-large group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
    <div class="relative overflow-hidden">
        <img src="{{ asset('images/catering.jpg') }}" 
             class="h-64 w-full object-cover transition-transform duration-700 group-hover:scale-110" 
             alt="Catering" 
             onerror="this.src='https://source.unsplash.com/random/800x400/?catering'">
        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-70"></div>
        <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
            <span class="inline-block bg-red-600 text-white text-xs px-3 py-1 rounded-full font-semibold shadow-lg mb-2">Food Service</span>
            <h3 class="text-2xl font-bold mb-2">Catering</h3>
            <p class="text-white text-opacity-90 mb-4 max-w-lg">Professional catering services for all occasions. From small gatherings to large events, we provide delicious food and excellent service.</p>
            
            <div class="flex space-x-3">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white bg-opacity-20 backdrop-filter backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                    </svg>
                    Experienced Chefs
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white bg-opacity-20 backdrop-filter backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    24/7 Service
                </span>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white bg-opacity-20 backdrop-filter backdrop-blur-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                    </svg>
                    Custom Menus
                </span>
            </div>
        </div>
    </div>
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center">
                <div class="text-yellow-400 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
                <span class="text-gray-600 ml-2">4.9 (128 reviews)</span>
            </div>
            <span class="text-gray-500 text-sm">Starting from</span>
        </div>
        <div class="flex justify-between items-center">
            <p class="text-gray-700">Custom menus for weddings, corporate events, birthday parties and more.</p>

        </div>
        <div class="mt-6">
    <a href="{{ route('services.catering') }}" class="block w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-4 rounded-lg text-center transition duration-300 transform hover:scale-105">
        Book Now
    </a>
</div>
    </div>
</div>
</div>
</div>
@endsection