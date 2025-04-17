<!-- layout/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TPS Moshi')</title>
    <link rel="stylesheet" href="{{ asset('build/assets/app-DnJZKFsY.css') }}">
    <script src="{{ asset('build/assets/app-SgndWJd4.js') }}" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>

    <style>
    /* Wave animation styles - Enhanced and more attractive with reduced size */
    .wave-border {
        position: relative;
        width: 100%;
        height: 100px;
        /* Reduced height from 160px to 100px */
        overflow: hidden;
        margin-bottom: -2px;
        /* Ensures seamless connection with footer */
        background: linear-gradient(to bottom, #001433, transparent);
    }

    .waves-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    .waves {
        width: 100%;
        height: 100%;
        display: block;
        filter: drop-shadow(0 3px 10px rgba(0, 0, 0, 0.3));
    }

    .wave-path {
        transform-origin: center bottom;
    }

    .wave1 {
        animation: wave-move-1 18s ease-in-out infinite alternate;
        filter: drop-shadow(0 2px 5px rgba(0, 30, 80, 0.4));
    }

    .wave2 {
        animation: wave-move-2 15s ease-in-out infinite alternate-reverse;
        filter: drop-shadow(0 2px 4px rgba(0, 50, 160, 0.3));
    }

    .wave3 {
        animation: wave-move-3 20s ease-in-out infinite alternate;
        filter: drop-shadow(0 2px 6px rgba(0, 40, 120, 0.5));
    }

    .wave4 {
        animation: wave-move-4 16s ease-in-out infinite alternate-reverse;
        filter: drop-shadow(0 1px 3px rgba(255, 255, 255, 0.2));
    }

    /* Improved wave animations with more natural movement */
    @keyframes wave-move-1 {
        0% {
            transform: translateX(-35px) translateY(5px) scale(1.05);
        }

        25% {
            transform: translateX(-20px) translateY(-2px) scale(1.03);
        }

        50% {
            transform: translateX(-15px) translateY(-7px) scale(1.02);
        }

        75% {
            transform: translateX(-5px) translateY(-3px) scale(1.01);
        }

        100% {
            transform: translateX(0px) translateY(0px) scale(1);
        }
    }

    @keyframes wave-move-2 {
        0% {
            transform: translateX(25px) translateY(7px) scale(1.03);
        }

        25% {
            transform: translateX(15px) translateY(0px) scale(1.04);
        }

        50% {
            transform: translateX(10px) translateY(-5px) scale(1.05);
        }

        75% {
            transform: translateX(-5px) translateY(0px) scale(1.04);
        }

        100% {
            transform: translateX(-15px) translateY(3px) scale(1.02);
        }
    }

    @keyframes wave-move-3 {
        0% {
            transform: translateX(-30px) translateY(-2px) scale(1.04);
        }

        25% {
            transform: translateX(-15px) translateY(2px) scale(1.02);
        }

        50% {
            transform: translateX(-5px) translateY(4px) scale(1.01);
        }

        75% {
            transform: translateX(10px) translateY(0px) scale(1.02);
        }

        100% {
            transform: translateX(20px) translateY(-3px) scale(1.03);
        }
    }

    @keyframes wave-move-4 {
        0% {
            transform: translateX(15px) translateY(8px) scale(1.02);
        }

        25% {
            transform: translateX(0px) translateY(0px) scale(1.03);
        }

        50% {
            transform: translateX(-20px) translateY(-3px) scale(1.04);
        }

        75% {
            transform: translateX(-15px) translateY(0px) scale(1.03);
        }

        100% {
            transform: translateX(-10px) translateY(5px) scale(1.01);
        }
    }

    /* Enhanced shimmer effect for the waves */
    .waves {
        animation: shimmer 12s infinite linear;
    }

    @keyframes shimmer {
        0% {
            filter: brightness(100%) contrast(100%);
        }

        25% {
            filter: brightness(103%) contrast(105%);
        }

        50% {
            filter: brightness(107%) contrast(110%);
        }

        75% {
            filter: brightness(103%) contrast(105%);
        }

        100% {
            filter: brightness(100%) contrast(100%);
        }
    }

    /* Sparkling effects */
    .sparkle {
        opacity: 0;
        animation: sparkle-animation 5s infinite;
    }

    .s1 {
        animation-delay: 0s;
    }

    .s2 {
        animation-delay: 0.7s;
    }

    .s3 {
        animation-delay: 1.4s;
    }

    .s4 {
        animation-delay: 2.1s;
    }

    .s5 {
        animation-delay: 2.8s;
    }

    .s6 {
        animation-delay: 3.5s;
    }

    .s7 {
        animation-delay: 1.0s;
    }

    .s8 {
        animation-delay: 2.3s;
    }

    .s9 {
        animation-delay: 3.2s;
    }

    @keyframes sparkle-animation {
        0% {
            opacity: 0;
            transform: scale(0);
        }

        20% {
            opacity: 1;
            transform: scale(1);
        }

        40% {
            opacity: 0;
            transform: scale(0);
        }

        100% {
            opacity: 0;
            transform: scale(0);
        }
    }


    .container-content {
        padding-top: 80px;
    }

    /* Remove outline and box-shadow on focus */
    nav a:focus, 
    nav button:focus {
        outline: none !important;
        box-shadow: none !important;
    }

    /* Hide the mobile menu toggle button on desktop view */
    @media (min-width: 768px) {
        .mbd {
            display: none !important;
        }
    }


</style>

</head>
<!-- Ensure Alpine.js is included in your project -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<nav x-data="{ mobileMenuOpen: false }"
    class="fixed top-0 w-full bg-slate-900/90 backdrop-blur-md z-40 border-b border-blue-900/50">
    <div class="container mx-auto px-4 sm:px-7">
        <div class="flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3 py-2">
                <img src="{{ asset('assets/images/Logos/tanzania-police-seeklogo.png') }}" alt="TPS Moshi"
                    class="h-12 w-16 sm:h-16 sm:w-20">
                <span class="text-xl sm:text-2xl font-bold text-white tracking-tight">TPS Moshi</span>
            </a>

            <!-- Mobile menu button -->
            <div class="mbd">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white p-2 focus:outline-none">
                    <!-- Hamburger icon -->
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <!-- X icon -->
                    <svg x-show="mobileMenuOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-8">
                <a href="{{ route('home') }}"
                    class="text-white hover:text-blue-400 transition-colors duration-200 {{ Route::currentRouteName() == 'home' ? 'text-blue-400' : '' }}">Home</a>

                    
                <!-- About Us Dropdown -->
                <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                @php
                    $aboutRoutes = ['about.history', 'about.mission', 'about.leadership', 'about.department'];
                @endphp
                <button @click="open = !open"
                    class="flex items-center transition-colors duration-200 focus:outline-none {{ in_array(Route::currentRouteName(), $aboutRoutes) ? 'text-blue-400' : 'text-white hover:text-blue-400' }}">

                        About Us
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute left-0 mt-2 w-48 bg-slate-800 rounded-md shadow-lg border border-blue-900/50 z-20 py-1">
                        <a href="{{ route('about.history') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Our History
                        </a>
                        <a href="{{ route('about.mission') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Mission & Vision
                        </a>
                        <a href="{{ route('about.leadership') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Leadership
                        </a>
                        <a href="{{ route('about.departments') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Department
                        </a>
                    </div>
                </div>

                <!-- Dropdown Template -->
                <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                @php
                    $admissionRoutes = ['admissions.undergraduate', 'admissions.graduate'];
                @endphp
                <button @click="open = !open"
                    class="flex items-center transition-colors duration-200 focus:outline-none {{ in_array(Route::currentRouteName(), $admissionRoutes) ? 'text-blue-400' : 'text-white hover:text-blue-400' }}">

                        Admissions
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute left-0 mt-2 w-48 bg-slate-800 rounded-md shadow-lg border border-blue-900/50 z-20 py-1">
                        <a href="{{ route('admissions.undergraduate') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200 {{ Route::currentRouteName() == 'admissions.undergraduate' ? 'text-blue-400' : '' }}">
                            Undergraduate
                        </a>
                        <a href="{{ route('admissions.graduate') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200 {{ Route::currentRouteName() == 'admissions.graduate' ? 'text-blue-400' : '' }}">
                            Graduate
                        </a>
                    </div>
                </div>


                <!-- Facilities Dropdown -->
                <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                @php
                    $facilityRoutes = ['facilities.sports', 'facilities.library', 'facilities.training'];
                @endphp
                <button @click="open = !open"
                    class="flex items-center transition-colors duration-200 focus:outline-none {{ in_array(Route::currentRouteName(), $facilityRoutes) ? 'text-blue-400' : 'text-white hover:text-blue-400' }}">
                        Facilities
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute left-0 mt-2 w-48 bg-slate-800 rounded-md shadow-lg border border-blue-900/50 z-20 py-1">
                        <a href="{{ route('facilities.sports') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Sports
                        </a>
                        <a href="{{ route('facilities.library') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Library
                        </a>
                        <a href="{{ route('facilities.training') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Training
                        </a>
                    </div>
                </div>

                <!-- Careers Dropdown -->
                <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                @php
                    $careerRoutes = ['careers.opportunities', 'careers.internships', 'careers.benefits'];
                @endphp
                <button @click="open = !open"
                    class="flex items-center transition-colors duration-200 focus:outline-none {{ in_array(Route::currentRouteName(), $careerRoutes) ? 'text-blue-400' : 'text-white hover:text-blue-400' }}">
                        Careers
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute left-0 mt-2 w-48 bg-slate-800 rounded-md shadow-lg border border-blue-900/50 z-20 py-1">
                        <a href="{{ route('careers.opportunities') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Job Opportunities
                        </a>
                        <a href="{{ route('careers.internships') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Internships
                        </a>
                        <a href="{{ route('careers.benefits') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Benefits
                        </a>
                    </div>
                </div>

                <!-- News & Events Dropdown -->
                <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                @php
                    $newsRoutes = ['news.latest', 'news.upcoming'];
                @endphp
                <button @click="open = !open"
                    class="flex items-center transition-colors duration-200 focus:outline-none {{ in_array(Route::currentRouteName(), $newsRoutes) ? 'text-blue-400' : 'text-white hover:text-blue-400' }}">
                        News & Events
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-1"
                        class="absolute left-0 mt-2 w-48 bg-slate-800 rounded-md shadow-lg border border-blue-900/50 z-20 py-1">
                        <a href="{{ route('news.latest') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Latest News
                        </a>
                        <a href="{{ route('news.upcoming') }}"
                            class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">
                            Upcoming Events
                        </a>
                    </div>
                </div>

                <!-- Contact Us Link -->
                <a href="{{ route('contact.index') }}"
                    class="text-white hover:text-blue-400 transition-colors duration-200 {{ Route::currentRouteName() == 'contact.index' ? 'text-blue-400 font-bold' : '' }}">
                    Contact Us
                </a>



                <!-- Emergency Button -->
                <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-full 
                    transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-400">
                    Emergency
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95" class="md:hidden mt-2 pb-4">
            <a href="{{ route('home') }}" class="block py-2 text-white hover:text-blue-400">Home</a>

            <!-- Mobile Accordion Menus -->
            <!-- Admissions -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full py-2 text-white hover:text-blue-400">
                    <span>Admissions</span>
                    <svg class="w-4 h-4 transition-transform" :class="{'rotate-180': open}" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="pl-4 py-1 space-y-1">
                    <a href="{{ route('admissions.undergraduate') }}"
                        class="block py-1 text-gray-300 hover:text-blue-400">
                        Undergraduate
                    </a>
                    <a href="{{ route('admissions.graduate') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Graduate
                    </a>
                </div>
            </div>

            <!-- About Us -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full py-2 text-white hover:text-blue-400">
                    <span>About Us</span>
                    <svg class="w-4 h-4 transition-transform" :class="{'rotate-180': open}" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="pl-4 py-1 space-y-1">
                    <a href="{{ route('about.history') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Our History
                    </a>
                    <a href="{{ route('about.mission') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Mission & Vision
                    </a>
                    <a href="{{ route('about.leadership') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Leadership
                    </a>
                </div>
            </div>

            <!-- Facilities -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full py-2 text-white hover:text-blue-400">
                    <span>Facilities</span>
                    <svg class="w-4 h-4 transition-transform" :class="{'rotate-180': open}" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="pl-4 py-1 space-y-1">
                    <a href="{{ route('facilities.sports') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Sports
                    </a>
                    <a href="{{ route('facilities.library') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Library
                    </a>
                    <a href="{{ route('facilities.training') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Training
                    </a>
                </div>
            </div>

            <!-- Careers -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full py-2 text-white hover:text-blue-400">
                    <span>Careers</span>
                    <svg class="w-4 h-4 transition-transform" :class="{'rotate-180': open}" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="pl-4 py-1 space-y-1">
                    <a href="{{ route('careers.opportunities') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Job Opportunities
                    </a>
                    <a href="{{ route('careers.internships') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Internships
                    </a>
                    <a href="{{ route('careers.benefits') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Benefits
                    </a>
                </div>
            </div>

            <!-- News & Events -->
            <div x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex items-center justify-between w-full py-2 text-white hover:text-blue-400">
                    <span>News & Events</span>
                    <svg class="w-4 h-4 transition-transform" :class="{'rotate-180': open}" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" class="pl-4 py-1 space-y-1">
                    <a href="{{ route('news.latest') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Latest News
                    </a>
                    <a href="{{ route('news.upcoming') }}" class="block py-1 text-gray-300 hover:text-blue-400">
                        Upcoming Events
                    </a>
                </div>
            </div>

            <!-- Contact Us -->
            <a href="{{ route('contact.index') }}" class="block py-2 text-white hover:text-blue-400">
                Contact Us
            </a>

            <!-- Emergency Button -->
            <div class="mt-4">
                <button class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-md 
                    transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-red-400 font-medium">
                    Emergency
                </button>
            </div>
        </div>
    </div>
</nav>
<div class="container-content">
    @yield('content')
</div>

<!-- AlpineJS for dropdown functionality -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Emergency Mode Script -->
<script>
document.getElementById('emergency-btn').addEventListener('click', function() {
    document.getElementById('emergency-overlay').classList.toggle('hidden');
});

// Handle keyboard navigation for dropdowns
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        document.querySelectorAll('.dropdown-content').forEach(dropdown => {
            dropdown.classList.add('hidden');
        });
    }
});
</script>
<!-- Footer Section with Tanzania Police Colors Wave Animation -->
<div class="wave-border">
    <div class="waves-container">
        <!-- Tanzania Police-inspired waves with enhanced design -->
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <!-- Navy blue wave with gradient -->
            <defs>
                <linearGradient id="blueGradient1" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#00205B;stop-opacity:0.9" />
                    <stop offset="50%" style="stop-color:#002D62;stop-opacity:0.95" />
                    <stop offset="100%" style="stop-color:#003F8A;stop-opacity:0.9" />
                </linearGradient>
            </defs>
            <path class="wave-path wave1" fill="url(#blueGradient1)"
                d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,90.7C672,85,768,107,864,122.7C960,139,1056,149,1152,149.3C1248,149,1344,139,1392,133.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>

            <!-- Medium blue wave with gradient -->
            <defs>
                <linearGradient id="blueGradient2" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#4169E1;stop-opacity:0.8" />
                    <stop offset="50%" style="stop-color:#4682B4;stop-opacity:0.7" />
                    <stop offset="100%" style="stop-color:#1E90FF;stop-opacity:0.8" />
                </linearGradient>
            </defs>
            <path class="wave-path wave2" fill="url(#blueGradient2)"
                d="M0,160L48,165.3C96,171,192,181,288,176C384,171,480,149,576,149.3C672,149,768,171,864,176C960,181,1056,171,1152,165.3C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>

            <!-- Royal blue wave with gradient -->
            <defs>
                <linearGradient id="blueGradient3" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#0033A0;stop-opacity:0.75" />
                    <stop offset="50%" style="stop-color:#0047AB;stop-opacity:0.8" />
                    <stop offset="100%" style="stop-color:#2B60DE;stop-opacity:0.75" />
                </linearGradient>
            </defs>
            <path class="wave-path wave3" fill="url(#blueGradient3)"
                d="M0,224L48,213.3C96,203,192,181,288,176C384,171,480,181,576,186.7C672,192,768,192,864,170.7C960,149,1056,107,1152,96C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>

            <!-- White wave with subtle gradient -->
            <defs>
                <linearGradient id="whiteGradient" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" style="stop-color:#FFFFFF;stop-opacity:0.7" />
                    <stop offset="50%" style="stop-color:#F8F8FF;stop-opacity:0.5" />
                    <stop offset="100%" style="stop-color:#FFFFFF;stop-opacity:0.7" />
                </linearGradient>
            </defs>
            <path class="wave-path wave4" fill="url(#whiteGradient)"
                d="M0,256L48,261.3C96,267,192,277,288,277.3C384,277,480,267,576,245.3C672,224,768,192,864,192C960,192,1056,224,1152,240C1248,256,1344,256,1392,256L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>

            <!-- Add sparkling effects as small circles -->
            <g class="sparkles">
                <circle class="sparkle s1" cx="200" cy="150" r="1.5" fill="#FFFFFF" />
                <circle class="sparkle s2" cx="400" cy="130" r="1" fill="#FFFFFF" />
                <circle class="sparkle s3" cx="600" cy="170" r="1.2" fill="#FFFFFF" />
                <circle class="sparkle s4" cx="800" cy="140" r="1.3" fill="#FFFFFF" />
                <circle class="sparkle s5" cx="1000" cy="160" r="1" fill="#FFFFFF" />
                <circle class="sparkle s6" cx="1200" cy="130" r="1.5" fill="#FFFFFF" />
                <circle class="sparkle s7" cx="300" cy="200" r="1.4" fill="#FFFFFF" />
                <circle class="sparkle s8" cx="700" cy="190" r="1.2" fill="#FFFFFF" />
                <circle class="sparkle s9" cx="1100" cy="180" r="1" fill="#FFFFFF" />
            </g>
        </svg>
    </div>
</div>
<!-- Footer Content Begin -->
<footer class="bg-gradient-to-b from-slate-900 to-slate-950 text-white pt-2">
    <!-- Partners Slideshow Section -->
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-2xl font-bold text-center text-white mb-8">WADAU WETU</h2>

        <div class="relative overflow-hidden" x-data="{ activeSlide: 0, slides: [0, 1, 2, 3] }"
            x-init="setInterval(() => { activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1 }, 3000)">
            <!-- Slides container -->
            <div class="flex transition-transform duration-500 ease-in-out"
                x-bind:style="'transform: translateX(-' + (activeSlide * 100) + '%)'">
                <!-- First slide -->
                <div class="w-full flex-shrink-0 flex justify-center items-center space-x-12 py-6">
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/Ashok Leyland Logo - PNG Logo Vector Brand Downloads (SVG, EPS).jpg') }}"
                            alt="Logo" class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/nmb.jpg') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/exim.png') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/stanbic.jpg') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                </div>

                <!-- Second slide -->
                <div class="w-full flex-shrink-0 flex justify-center items-center space-x-12 py-6">
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/INTERPOL LOGO.jpg') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/November 16, 1945 - The constitution of UNESCO was….jpg') }}"
                            alt="Logo" class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/tbs.jpg') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/tanzania_breweries_ltd.jpg') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                </div>

                <!-- Third slide -->
                <div class="w-full flex-shrink-0 flex justify-center items-center space-x-12 py-6">
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/Bank of Tanzania (BOT) Logo PNG Vector (AI) Free Download.jpg') }}"
                            alt="Logo" class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/hifadhi.jpg') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/Tanesco.png') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/TAA.jpg') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                </div>


                <!-- forth slide -->
                <div class="w-full flex-shrink-0 flex justify-center items-center space-x-12 py-6">
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/latra.jpg') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/Tanzania Railways Corporation Logo PNG Vector (AI) Free Download.jpg') }}"
                            alt="Logo" class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/What Is The Commonwealth _.jpg') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                    <div
                        class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                        <img src="{{ asset('assets/images/partners/hanns.png') }}" alt="Logo"
                            class="max-w-full max-h-full">
                    </div>
                </div>
            </div>

            <!-- Indicators -->
            <div class="absolute bottom-1 left-0 right-0 flex justify-center space-x-2">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index" class="w-3 h-3 rounded-full transition-colors duration-300"
                        :class="{'bg-blue-500': activeSlide === index, 'bg-blue-200': activeSlide !== index}">
                    </button>
                </template>
            </div>
        </div>
    </div>

    <!-- Footer grid layout -->
    <div class="container mx-auto px-6 py-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Contact Us Section - 1 column -->
            <div class="space-y-4 transform transition duration-500 hover:-translate-y-1">
                <h3 class="text-xl font-bold text-blue-400 border-b border-blue-800/50 pb-2">CONTACT US</h3>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <i class="fas fa-map-marker-alt text-blue-500 mt-1 mr-3"></i>
                        <span>123 Education Avenue, Moshi, Tanzania</span>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-phone text-blue-500 mt-1 mr-3"></i>
                        <span>+255 123 456 789</span>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-phone text-blue-500 mt-1 mr-3"></i>
                        <span>0272754387</span>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-envelope text-blue-500 mt-1 mr-3"></i>
                        <span>info@tpsmoshi.ac.tz</span>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-clock text-blue-500 mt-1 mr-3"></i>
                        <span>Monday - Friday: 8:00 AM - 5:00 PM</span>
                    </div>
                </div>
            </div>

            <!-- Important Links - 1 column -->
            <div class="space-y-4 transform transition duration-500 hover:-translate-y-1">
                <h3 class="text-xl font-bold text-blue-400 border-b border-blue-800/50 pb-2">IMPORTANT LINKS</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admissions.undergraduate') }}"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            Admissions
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('careers.opportunities') }}"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            Career Opportunities
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('links.ura-saccos') }}"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            URA Saccos L.T.D
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('links.immigration') }}"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            Immigration Department
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('news.latest') }}"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            News and Events
                        </a>
                    </li>
                    <li>
                        <a href="https://tps.go.tz/login"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center"
                            target="_blank">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            Tanzania Police School - Moshi
                        </a>
                    </li>
                </ul>

                <!-- Social Media Links added under Important Links -->
                <div class="pt-4 mt-4 border-t border-blue-900/30">
                    <h4 class="text-sm font-semibold text-blue-400 mb-3">FOLLOW US</h4>
                    <div class="flex space-x-3">
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-blue-400 hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-blue-400 hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-blue-400 hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-blue-400 hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/255769067063"
                            class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-white hover:bg-green-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Useful Links - 1 column -->
            <div class="space-y-4 transform transition duration-500 hover:-translate-y-1">
                <h3 class="text-xl font-bold text-blue-400 border-b border-blue-800/50 pb-2">USEFUL LINKS</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('links.moha') }}"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center"
                            target="_blank">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            Ministry of Home Affairs
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('links.nida') }}"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center"
                            target="_blank">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            National Identification Authority
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('links.tamisemi') }}"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center"
                            target="_blank">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            Tamisemi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('links.jeshi-wananchi') }}"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            Jeshi la Wananchi Tanzania
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('links.zimamoto') }}"
                            class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                            <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                            Jeshi la Zimamoto na Uokoaji
                        </a>
                    </li>
                </ul>

                <!-- Youtube link in its own section -->
                <div class="pt-4 mt-4 border-t border-blue-900/30">
                    <h4 class="text-sm font-semibold text-blue-400 mb-3">OUR CHANNEL</h4>
                    <a href="#"
                        class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-blue-400 hover:bg-red-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Visitors Stats Section - 1 column with reduced vertical size -->
            <div class="space-y-3 transform transition duration-500 hover:-translate-y-1"
                x-data="{ visitorStats: { daily: 152, weekly: 987, monthly: 4325, total: 158764 } }">
                <h3 class="text-xl font-bold text-blue-400 border-b border-blue-800/50 pb-2">VISITORS</h3>
                <div class="space-y-3">
                    <div
                        class="bg-slate-800/50 rounded-lg p-3 border border-blue-900/20 hover:border-blue-500/40 transition-all duration-300">
                        <div class="flex justify-between items-center text-sm">
                            <span>Daily</span>
                            <span class="text-blue-400 font-bold" x-text="visitorStats.daily" x-init="setTimeout(() => { 
                                  const counter = setInterval(() => {
                                      if (visitorStats.daily < 152) visitorStats.daily++;
                                      else clearInterval(counter);
                                  }, 50);
                              }, 500)">0</span>
                        </div>
                        <div class="w-full bg-slate-700 rounded-full h-1 mt-1">
                            <div class="bg-blue-500 h-1 rounded-full"
                                x-bind:style="'width: ' + ((visitorStats.daily / 200) * 100) + '%'"></div>
                        </div>
                    </div>

                    <div
                        class="bg-slate-800/50 rounded-lg p-3 border border-blue-900/20 hover:border-blue-500/40 transition-all duration-300">
                        <div class="flex justify-between items-center text-sm">
                            <span>Weekly</span>
                            <span class="text-blue-400 font-bold" x-text="visitorStats.weekly" x-init="setTimeout(() => {
                                  let start = 0;
                                  const target = visitorStats.weekly;
                                  const duration = 1500;
                                  const step = target / (duration / 20);
                                  const counter = setInterval(() => {
                                      start += step;
                                      if (start >= target) {
                                          visitorStats.weekly = target;
                                          clearInterval(counter);
                                      } else {
                                          visitorStats.weekly = Math.floor(start);
                                      }
                                  }, 20);
                              }, 800)">0</span>
                        </div>
                        <div class="w-full bg-slate-700 rounded-full h-1 mt-1">
                            <div class="bg-blue-500 h-1 rounded-full"
                                x-bind:style="'width: ' + ((visitorStats.weekly / 1000) * 100) + '%'"></div>
                        </div>
                    </div>

                    <div
                        class="bg-slate-800/50 rounded-lg p-3 border border-blue-900/20 hover:border-blue-500/40 transition-all duration-300">
                        <div class="flex justify-between items-center text-sm">
                            <span>Monthly</span>
                            <span class="text-blue-400 font-bold" x-text="visitorStats.monthly.toLocaleString()" x-init="setTimeout(() => {
                                  let start = 0;
                                  const target = visitorStats.monthly;
                                  const duration = 2000;
                                  const step = target / (duration / 20);
                                  const counter = setInterval(() => {
                                      start += step;
                                      if (start >= target) {
                                          visitorStats.monthly = target;
                                          clearInterval(counter);
                                      } else {
                                          visitorStats.monthly = Math.floor(start);
                                      }
                                  }, 20);
                              }, 1200)">0</span>
                        </div>
                        <div class="w-full bg-slate-700 rounded-full h-1 mt-1">
                            <div class="bg-blue-500 h-1 rounded-full"
                                x-bind:style="'width: ' + ((visitorStats.monthly / 5000) * 100) + '%'"></div>
                        </div>
                    </div>

                    <div
                        class="bg-slate-800/50 rounded-lg p-3 border border-blue-900/20 hover:border-blue-500/40 transition-all duration-300">
                        <div class="flex justify-between items-center text-sm">
                            <span>Total</span>
                            <span class="text-blue-400 font-bold" x-text="visitorStats.total.toLocaleString()" x-init="setTimeout(() => {
                                  let start = 0;
                                  const target = visitorStats.total;
                                  const duration = 3000;
                                  const step = target / (duration / 20);
                                  const counter = setInterval(() => {
                                      start += step;
                                      if (start >= target) {
                                          visitorStats.total = target;
                                          clearInterval(counter);
                                      } else {
                                          visitorStats.total = Math.floor(start);
                                      }
                                  }, 20);
                              }, 1500)">0</span>
                        </div>
                        <div class="w-full bg-slate-700 rounded-full h-1 mt-1">
                            <div class="bg-blue-500 h-1 rounded-full"
                                x-bind:style="'width: ' + ((visitorStats.total / 200000) * 100) + '%'"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom footer section -->
        <div class="mt-12 pt-8 border-t border-blue-900/30">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Logo and Copyright -->
                <div class="flex items-center space-x-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    <p class="text-gray-400">© {{ date('Y') }} Tanzania Police School. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>

</footer>
</body>

</html>