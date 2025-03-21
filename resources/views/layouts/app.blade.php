<!-- layout/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TPS Moshi')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900">
    <!-- Emergency Mode Overlay -->
    <div id="emergency-overlay" class="fixed inset-0 bg-red-900/20 z-50 pointer-events-none hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-red-600/20 to-blue-600/20 animate-pulse"></div>
    </div>

    <nav class="fixed top-0 w-full bg-slate-900/90 backdrop-blur-md z-40 border-b border-blue-900/50">
        <div class="container mx-auto px-7">
            <div class="flex justify-between items-center">
           <!-- Logo -->
<a href="{{ url('/') }}" class="flex items-center space-x-3 py-2">
    <img src="{{ asset('assets/images/Logos/tanzania-police-seeklogo.png') }}" alt="TPS Moshi" class="h-16 w-20">
    <span class="text-2xl font-bold text-white tracking-tight">TPS Moshi</span>
</a>


                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="menu-btn" class="text-white focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex md:items-center md:space-x-8">
                    <a href="{{ route('home') }}" class="text-white hover:text-blue-400 transition-colors duration-200">Home</a>

                    <div class="relative group" x-data="{ open: false }" @mouseover="open = true" @mouseleave="open = false">
                        <button class="dropdown-btn flex items-center text-white hover:text-blue-400 transition-colors duration-200">
                            Admissions
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="dropdown-content absolute bg-slate-800 shadow-lg rounded-md z-10 w-48 mt-2 border border-blue-900/50"
                             x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 transform -translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-150"
                             x-transition:leave-start="opacity-100 transform translate-y-0"
                             x-transition:leave-end="opacity-0 transform -translate-y-2"
                             @click.away="open = false">
                            <a href="{{ route('admissions.undergraduate') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Undergraduate</a>
                            <a href="{{ route('admissions.graduate') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Graduate</a>
                        </div>
                    </div>


                    <!-- About Us Dropdown -->
<div class="relative group" x-data="{ open: false }" @mouseover="open = true" @mouseleave="open = false">
    <button class="dropdown-btn flex items-center text-white hover:text-blue-400 transition-colors duration-200">
        About Us
        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div class="dropdown-content absolute bg-slate-800 shadow-lg rounded-md z-10 w-48 mt-2 border border-blue-900/50"
         x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         @click.away="open = false">
        <a href="{{ route('about.history') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Our History</a>
        <a href="{{ route('about.mission') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Mission & Vision</a>
        <a href="{{ route('about.leadership') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Leadership</a>
    </div>
</div>

<!-- Facilities Dropdown -->
<div class="relative group" x-data="{ open: false }" @mouseover="open = true" @mouseleave="open = false">
    <button class="dropdown-btn flex items-center text-white hover:text-blue-400 transition-colors duration-200">
        Facilities
        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div class="dropdown-content absolute bg-slate-800 shadow-lg rounded-md z-10 w-48 mt-2 border border-blue-900/50"
         x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         @click.away="open = false">
        <a href="{{ route('facilities.sports') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">sports</a>
        <a href="{{ route('facilities.library') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">library</a>
        <a href="{{ route('facilities.training') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">training</a>
        <a href="{{ route('facilities.Academicblock') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Academicblock</a>
        <a href="{{ route('facilities.campusmap') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">campusmap</a>
    </div>
</div>

<!-- Careers Dropdown -->
<div class="relative group" x-data="{ open: false }" @mouseover="open = true" @mouseleave="open = false">
    <button class="dropdown-btn flex items-center text-white hover:text-blue-400 transition-colors duration-200">
        Careers
        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div class="dropdown-content absolute bg-slate-800 shadow-lg rounded-md z-10 w-48 mt-2 border border-blue-900/50"
         x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         @click.away="open = false">
        <a href="{{ route('careers.opportunities') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Job Opportunities</a>
        <a href="{{ route('careers.internships') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Internships</a>
        <a href="{{ route('careers.benefits') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Benefits</a>
    </div>
</div>

                   <!-- News & Events Dropdown -->
<div class="relative group" x-data="{ open: false }" @mouseover="open = true" @mouseleave="open = false">
    <button class="dropdown-btn flex items-center text-white hover:text-blue-400 transition-colors duration-200">
        News & Events
        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div class="dropdown-content absolute bg-slate-800 shadow-lg rounded-md z-10 w-48 mt-2 border border-blue-900/50"
         x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         @click.away="open = false">
        <a href="{{ route('news.latest') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Latest News</a>
        <a href="{{ route('news.upcoming') }}" class="block px-4 py-2 text-white hover:bg-blue-600/20 transition-colors duration-200">Upcoming Events</a>
    </div>
</div>

                  <?-- Contactus --?>
<div class="relative group">
    <a href="{{ route('ContactUs.Contactus') }}" class="flex items-center text-white hover:text-blue-400 transition-colors duration-200">
        Contact Us
        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </a>
</div>

                    <!-- Rest of the dropdowns following the same pattern -->
                    <!-- ... Previous dropdowns code with x-data added ... -->

                    <!-- Emergency Button -->
                    <button id="emergency-btn" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-full 
                        transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-400">
                        Emergency
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 bg-slate-800 rounded-lg border border-blue-900/50">
                <!-- ... Mobile menu code ... -->
            </div>
        </div>
    </nav>

    @yield('content')

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
<div class="wave-border w-full overflow-hidden relative h-24">
  <div class="waves-container absolute top-0 left-0 w-full">
    <!-- Tanzania Police-inspired waves -->
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
      <!-- Navy blue wave -->
      <path class="wave-path wave1" fill="#002D62" fill-opacity="0.9" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,90.7C672,85,768,107,864,122.7C960,139,1056,149,1152,149.3C1248,149,1344,139,1392,133.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      <!-- Gold/yellow wave -->
      <path class="wave-path wave2" fill="#FFD700" fill-opacity="0.7" d="M0,160L48,165.3C96,171,192,181,288,176C384,171,480,149,576,149.3C672,149,768,171,864,176C960,181,1056,171,1152,165.3C1248,160,1344,160,1392,160L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      <!-- Royal blue wave -->
      <path class="wave-path wave3" fill="#0047AB" fill-opacity="0.8" d="M0,224L48,213.3C96,203,192,181,288,176C384,171,480,181,576,186.7C672,192,768,192,864,170.7C960,149,1056,107,1152,96C1248,85,1344,107,1392,117.3L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      <!-- White wave -->
      <path class="wave-path wave4" fill="#FFFFFF" fill-opacity="0.6" d="M0,256L48,261.3C96,267,192,277,288,277.3C384,277,480,267,576,245.3C672,224,768,192,864,192C960,192,1056,224,1152,240C1248,256,1344,256,1392,256L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
  </div>
</div>
<!-- Footer Content Begin -->
<footer class="bg-gradient-to-b from-slate-900 to-slate-950 text-white pt-2">
  <!-- Partners Slideshow Section -->
  <div class="container mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold text-center text-white mb-8">WADAU WETU</h2>
    
    <div class="relative overflow-hidden" x-data="{ activeSlide: 0, slides: [0, 1, 2, 3] }" x-init="setInterval(() => { activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1 }, 3000)">
        <!-- Slides container -->
        <div class="flex transition-transform duration-500 ease-in-out" x-bind:style="'transform: translateX(-' + (activeSlide * 100) + '%)'">
            <!-- First slide -->
            <div class="w-full flex-shrink-0 flex justify-center items-center space-x-12 py-6">
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                    <img src="{{ asset('assets/images/partners/Ashok Leyland Logo - PNG Logo Vector Brand Downloads (SVG, EPS).jpg') }}" alt="Logo" class="max-w-full max-h-full">                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                    <img src="{{ asset('assets/images/partners/nmb.jpg') }}" alt="Logo" class="max-w-full max-h-full">                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                    <img src="{{ asset('assets/images/partners/exim.png') }}" alt="Logo" class="max-w-full max-h-full">                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                    <img src="{{ asset('assets/images/partners/stanbic.jpg') }}" alt="Logo" class="max-w-full max-h-full">                </div>
            </div>
            
            <!-- Second slide -->
            <div class="w-full flex-shrink-0 flex justify-center items-center space-x-12 py-6">
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/INTERPOL LOGO.jpg') }}" alt="Logo" class="max-w-full max-h-full">
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/November 16, 1945 - The constitution of UNESCO was….jpg') }}" alt="Logo" class="max-w-full max-h-full">
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/tbs.jpg') }}" alt="Logo" class="max-w-full max-h-full">                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/tanzania_breweries_ltd.jpg') }}" alt="Logo" class="max-w-full max-h-full">
                </div>
            </div>

              <!-- Third slide -->
            <div class="w-full flex-shrink-0 flex justify-center items-center space-x-12 py-6">
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/Bank of Tanzania (BOT) Logo PNG Vector (AI) Free Download.jpg') }}" alt="Logo" class="max-w-full max-h-full">
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/hifadhi.jpg') }}" alt="Logo" class="max-w-full max-h-full">
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/Tanesco.png') }}" alt="Logo" class="max-w-full max-h-full">                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/TAA.jpg') }}" alt="Logo" class="max-w-full max-h-full">
                </div>
            </div>
            
            <!-- forth slide -->
            <div class="w-full flex-shrink-0 flex justify-center items-center space-x-12 py-6">
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/latra.jpg') }}" alt="Logo" class="max-w-full max-h-full">
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/Tanzania Railways Corporation Logo PNG Vector (AI) Free Download.jpg') }}" alt="Logo" class="max-w-full max-h-full">
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/What Is The Commonwealth _.jpg') }}" alt="Logo" class="max-w-full max-h-full">
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md transform transition-transform hover:scale-105 w-24 h-24 flex items-center justify-center">
                     <img src="{{ asset('assets/images/partners/hanns.png') }}" alt="Logo" class="max-w-full max-h-full">
                </div>
            </div>
        </div>
        
        <!-- Indicators -->
        <div class="absolute bottom-1 left-0 right-0 flex justify-center space-x-2">
            <template x-for="(slide, index) in slides" :key="index">
                <button 
                    @click="activeSlide = index" 
                    class="w-3 h-3 rounded-full transition-colors duration-300"
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
                    <a href="{{ route('admissions.undergraduate') }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        Admissions
                    </a>
                </li>
                <li>
                    <a href="{{ route('careers.opportunities') }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        Career Opportunities
                    </a>
                </li>
                <li>
                    <a href="{{ route('links.ura-saccos') }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        URA Saccos L.T.D
                    </a>
                </li>
                <li>
                    <a href="{{ route('links.immigration') }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        Immigration Department
                    </a>
                </li>
                <li>
                    <a href="{{ route('news.latest') }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        News and Events
                    </a>
                </li>
                <li>
                    <a href="https://tps.go.tz/login" class="hover:text-blue-400 transition-colors duration-300 flex items-center" target="_blank">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        Tanzania Police School - Moshi
                    </a>
                </li>
            </ul>
            
            <!-- Social Media Links added under Important Links -->
            <div class="pt-4 mt-4 border-t border-blue-900/30">
                <h4 class="text-sm font-semibold text-blue-400 mb-3">FOLLOW US</h4>
                <div class="flex space-x-3">
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-blue-400 hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-blue-400 hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-blue-400 hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-blue-400 hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/255769067063" class="w-8 h-8 rounded-full bg-green-500 flex items-center justify-center text-white hover:bg-green-600 hover:text-white transition-all duration-300 transform hover:scale-110">
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
                    <a href="{{ route('links.moha') }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center" target="_blank">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        Ministry of Home Affairs
                    </a>
                </li>
                <li>
                    <a href="{{ route('links.nida') }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center" target="_blank">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        National Identification Authority
                    </a>
                </li>
                <li>
                    <a href="{{ route('links.tamisemi') }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center" target="_blank">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        Tamisemi
                    </a>
                </li>
                <li>
                    <a href="{{ route('links.jeshi-wananchi') }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        Jeshi la Wananchi Tanzania
                    </a>
                </li>
                <li>
                    <a href="{{ route('links.zimamoto') }}" class="hover:text-blue-400 transition-colors duration-300 flex items-center">
                        <i class="fas fa-chevron-right text-blue-500 mr-2 text-xs"></i>
                        Jeshi la Zimamoto na Uokoaji
                    </a>
                </li>
            </ul>
            
            <!-- Youtube link in its own section -->
            <div class="pt-4 mt-4 border-t border-blue-900/30">
                <h4 class="text-sm font-semibold text-blue-400 mb-3">OUR CHANNEL</h4>
                <a href="#" class="w-8 h-8 rounded-full bg-slate-800 flex items-center justify-center text-blue-400 hover:bg-red-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>

        <!-- Visitors Stats Section - 1 column with reduced vertical size -->
        <div class="space-y-3 transform transition duration-500 hover:-translate-y-1" x-data="{ visitorStats: { daily: 152, weekly: 987, monthly: 4325, total: 158764 } }">
            <h3 class="text-xl font-bold text-blue-400 border-b border-blue-800/50 pb-2">VISITORS</h3>
            <div class="space-y-3">
                <div class="bg-slate-800/50 rounded-lg p-3 border border-blue-900/20 hover:border-blue-500/40 transition-all duration-300">
                    <div class="flex justify-between items-center text-sm">
                        <span>Daily</span>
                        <span class="text-blue-400 font-bold" x-text="visitorStats.daily" 
                              x-init="setTimeout(() => { 
                                  const counter = setInterval(() => {
                                      if (visitorStats.daily < 152) visitorStats.daily++;
                                      else clearInterval(counter);
                                  }, 50);
                              }, 500)">0</span>
                    </div>
                    <div class="w-full bg-slate-700 rounded-full h-1 mt-1">
                        <div class="bg-blue-500 h-1 rounded-full" x-bind:style="'width: ' + ((visitorStats.daily / 200) * 100) + '%'"></div>
                    </div>
                </div>
                
                <div class="bg-slate-800/50 rounded-lg p-3 border border-blue-900/20 hover:border-blue-500/40 transition-all duration-300">
                    <div class="flex justify-between items-center text-sm">
                        <span>Weekly</span>
                        <span class="text-blue-400 font-bold" x-text="visitorStats.weekly"
                              x-init="setTimeout(() => {
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
                        <div class="bg-blue-500 h-1 rounded-full" x-bind:style="'width: ' + ((visitorStats.weekly / 1000) * 100) + '%'"></div>
                    </div>
                </div>
                
                <div class="bg-slate-800/50 rounded-lg p-3 border border-blue-900/20 hover:border-blue-500/40 transition-all duration-300">
                    <div class="flex justify-between items-center text-sm">
                        <span>Monthly</span>
                        <span class="text-blue-400 font-bold" x-text="visitorStats.monthly.toLocaleString()"
                              x-init="setTimeout(() => {
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
                        <div class="bg-blue-500 h-1 rounded-full" x-bind:style="'width: ' + ((visitorStats.monthly / 5000) * 100) + '%'"></div>
                    </div>
                </div>
                
                <div class="bg-slate-800/50 rounded-lg p-3 border border-blue-900/20 hover:border-blue-500/40 transition-all duration-300">
                    <div class="flex justify-between items-center text-sm">
                        <span>Total</span>
                        <span class="text-blue-400 font-bold" x-text="visitorStats.total.toLocaleString()"
                              x-init="setTimeout(() => {
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
                        <div class="bg-blue-500 h-1 rounded-full" x-bind:style="'width: ' + ((visitorStats.total / 200000) * 100) + '%'"></div>
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
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <p class="text-gray-400">© {{ date('Y') }} Tanzania Police School. All rights reserved.</p>
            </div>
        </div>
    </div>
  </div>

<style>
/* Wave animation styles */
.wave-border {
  margin-bottom: -2px; /* Ensures seamless connection with footer */
}

.waves {
  width: 100%;
  height: 100%;
  display: block;
}

.wave-path {
  animation: wave-move 8s ease-in-out infinite alternate;
  transform-origin: center bottom;
}

.wave1 {
  animation-delay: -2s;
  animation-duration: 12s;
}

.wave2 {
  animation-delay: -3s;
  animation-duration: 10s;
}

.wave3 {
  animation-delay: -4s;
  animation-duration: 11s;
}

.wave4 {
  animation-delay: -5s;
  animation-duration: 9s;
}

@keyframes wave-move {
  0% {
    transform: translateX(-25px) translateY(5px);
  }
  50% {
    transform: translateX(-15px) translateY(-5px);
  }
  100% {
    transform: translateX(0px) translateY(0px);
  }
}
</style>
</footer>
</body>
</html>