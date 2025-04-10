@extends('layouts.app')

@section('title', 'Career Benefits - Tanzania Police Force')

@section('content')
<div class="pt-24">
    <!-- Hero Section with Parallax Effect -->
    <section class="benefits-hero relative h-96 flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/images/news&events/bg.png') }}" alt="Tanzania Police Force" class="w-full h-full object-cover">
            <div class="absolute inset-0 "></div>
        </div>
        <div class="container mx-auto px-4 z-10 text-center">
            <h1 class="text-5xl font-bold text-white mb-4 animate-fadeIn">Career Benefits</h1>
            <p class="text-xl text-white max-w-3xl mx-auto">Join the Tanzania Police Force and build a rewarding career serving your country with honor and distinction</p>
        </div>
    </section>

    <!-- Introduction with Animation -->
    <section class="py-16 bg-slate-100">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8 benefits-intro opacity-0 transition-all duration-700" id="intro-animation">
                    <h2 class="text-3xl font-bold text-blue-800 mb-4">Why Join Tanzania Police Force?</h2>
                    <p class="text-lg mb-4">Joining the Tanzania Police Force is more than just a job - it's a calling to serve and protect. We offer a career filled with meaning, opportunities for advancement, and numerous benefits to support you and your family.</p>
                    <p class="text-lg">Our officers enjoy competitive compensation, comprehensive healthcare, education benefits, and a strong sense of community that lasts throughout their careers and beyond.</p>
                </div>
                <div class="md:w-2/5 rounded-lg shadow-xl overflow-hidden benefits-image opacity-0 transition-all duration-700 delay-300" id="image-animation">
                    <img src="{{ asset('assets/images/news&events/promo1.JPG') }}" alt="Tanzania Police Team" class="w-full h-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Cards with Hover Effects -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Our Comprehensive Benefits</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Financial Benefits Card -->
                <div class="benefit-card bg-white rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="h-3 bg-blue-600"></div>
                    <div class="p-6">
                        <div class="text-4xl text-blue-600 mb-4">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Financial Benefits</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Competitive salary with regular increments</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Housing allowance or subsidized accommodation</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Risk allowance for specialized units</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Pension and retirement benefits</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Health & Wellness Card -->
                <div class="benefit-card bg-white rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="h-3 bg-green-600"></div>
                    <div class="p-6">
                        <div class="text-4xl text-green-600 mb-4">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Health & Wellness</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Comprehensive medical coverage for you and your family</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Access to police medical facilities</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Mental health support and counseling</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Fitness facilities and wellness programs</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Career Development Card -->
                <div class="benefit-card bg-white rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="h-3 bg-purple-600"></div>
                    <div class="p-6">
                        <div class="text-4xl text-purple-600 mb-4">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Career Development</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Continuous professional training and development</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Specialized training opportunities locally and abroad</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Clear promotion pathways and career progression</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Educational scholarships for further studies</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Work-Life Balance Card -->
                <div class="benefit-card bg-white rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="h-3 bg-yellow-600"></div>
                    <div class="p-6">
                        <div class="text-4xl text-yellow-600 mb-4">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Work-Life Balance</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Structured shift patterns with predictable schedules</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Annual leave and public holidays entitlement</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Family support services and resources</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Recreation facilities and social events</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Job Security Card -->
                <div class="benefit-card bg-white rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="h-3 bg-red-600"></div>
                    <div class="p-6">
                        <div class="text-4xl text-red-600 mb-4">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Job Security</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Permanent employment with job security</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Transferable skills across various police departments</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Legal protection during duty-related incidents</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Insurance coverage for work-related risks</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Community & Recognition Card -->
                <div class="benefit-card bg-white rounded-lg shadow-lg overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    <div class="h-3 bg-teal-600"></div>
                    <div class="p-6">
                        <div class="text-4xl text-teal-600 mb-4">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Community & Recognition</h3>
                        <ul class="space-y-2">
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Community respect and recognition</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Awards and commendations for outstanding service</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>Sense of belonging to police fraternity</span>
                            </li>
                            <li class="flex items-start">
                                <span class="text-green-500 mr-2">✓</span>
                                <span>National service recognition</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Testimonials Carousel -->
    <section class="py-16 bg-blue-800 text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Hear From Our Officers</h2>
            
            <div class="testimonial-carousel relative max-w-4xl mx-auto">
                <div class="testimonial-slides overflow-hidden">
                    <div class="testimonial-track flex transition-transform duration-500" id="testimonial-track">
                        <!-- Testimonial 1 -->
                        <div class="testimonial-slide w-full flex-shrink-0 px-4">
                            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-lg">
                                <div class="flex items-center mb-4">
                                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                                        <img src="{{ asset('assets/images/Logos/D$D.jpg') }}" alt="Officer Testimonial" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-bold">SSP DAMAZO</h4>
                                        <p class="text-blue-200">26 years of service</p>
                                    </div>
                                </div>
                                <p class="text-lg italic">"Joining the Tanzania Police Force was the best decision of my life. I've had opportunities to advance my education, lead important community initiatives, and make a real difference. The benefits have allowed me to provide for my family while serving my country."</p>
                            </div>
                        </div>
                        
                        <!-- Testimonial 2 -->
                        <div class="testimonial-slide w-full flex-shrink-0 px-4">
                            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-lg">
                                <div class="flex items-center mb-4">
                                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                                        <img src="{{ asset('assets/images/officer2.jpg') }}" alt="Officer Testimonial" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-bold">Sergeant James Masanja</h4>
                                        <p class="text-blue-200">8 years of service</p>
                                    </div>
                                </div>
                                <p class="text-lg italic">"The training opportunities in the Force are unmatched. I've received specialized training in cybercrime investigation that has prepared me for the modern challenges of policing. The health benefits and housing allowance have also been crucial for my family's wellbeing."</p>
                            </div>
                        </div>
                        
                        <!-- Testimonial 3 -->
                        <div class="testimonial-slide w-full flex-shrink-0 px-4">
                            <div class="bg-white/10 backdrop-blur-sm p-8 rounded-lg">
                                <div class="flex items-center mb-4">
                                    <div class="w-16 h-16 rounded-full overflow-hidden mr-4">
                                        <img src="{{ asset('assets/images/officer3.jpg') }}" alt="Officer Testimonial" class="w-full h-full object-cover">
                                    </div>
                                    <div>
                                        <h4 class="text-xl font-bold">Corporal Maria Nyambo</h4>
                                        <p class="text-blue-200">5 years of service</p>
                                    </div>
                                </div>
                                <p class="text-lg italic">"As a woman in the force, I've found equal opportunities for growth and advancement. The educational benefits helped me complete my degree while working. The camaraderie and sense of purpose make this more than just a job - it's a calling I'm proud to answer every day."</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Carousel Controls -->
                <button class="absolute left-0 top-1/2 -translate-y-1/2 bg-blue-600 hover:bg-blue-700 text-white w-12 h-12 rounded-full flex items-center justify-center focus:outline-none" id="prev-testimonial">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="absolute right-0 top-1/2 -translate-y-1/2 bg-blue-600 hover:bg-blue-700 text-white w-12 h-12 rounded-full flex items-center justify-center focus:outline-none" id="next-testimonial">
                    <i class="fas fa-chevron-right"></i>
                </button>
                
                <!-- Indicator Dots -->
                <div class="flex justify-center mt-6 space-x-2">
                    <button class="w-3 h-3 rounded-full bg-blue-200 focus:outline-none testimonial-dot active" data-index="0"></button>
                    <button class="w-3 h-3 rounded-full bg-blue-400 focus:outline-none testimonial-dot" data-index="1"></button>
                    <button class="w-3 h-3 rounded-full bg-blue-400 focus:outline-none testimonial-dot" data-index="2"></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Benefits Explorer -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-blue-800 mb-12">Explore Benefits By Department</h2>
            
            <div class="department-explorer bg-white rounded-xl shadow-xl p-6 max-w-4xl mx-auto">
                <div class="department-tabs flex flex-wrap gap-2 mb-6">
                    <button class="department-tab px-4 py-2 rounded-lg bg-blue-600 text-white font-medium focus:outline-none active" data-department="general">General Policing</button>
                    <button class="department-tab px-4 py-2 rounded-lg bg-gray-200 text-gray-700 font-medium hover:bg-gray-300 focus:outline-none" data-department="traffic">Traffic Police</button>
                    <button class="department-tab px-4 py-2 rounded-lg bg-gray-200 text-gray-700 font-medium hover:bg-gray-300 focus:outline-none" data-department="investigative">Criminal Investigation</button>
                    <button class="department-tab px-4 py-2 rounded-lg bg-gray-200 text-gray-700 font-medium hover:bg-gray-300 focus:outline-none" data-department="special">Special Units</button>
                </div>
                
                <div class="department-content">
                    <!-- General Policing Content -->
                    <div class="department-panel active" id="general-panel">
                        <div class="md:flex gap-6">
                            <div class="md:w-1/3 mb-4 md:mb-0">
                                <img src="{{ asset('assets/images/Logos/suzy.jpg') }}" alt="General Policing" class="w-full h-auto rounded-lg">
                            </div>
                            <div class="md:w-2/3">
                                <h3 class="text-xl font-bold text-blue-800 mb-3">General Policing Benefits</h3>
                                <p class="mb-4">Officers in general policing form the backbone of our force, serving communities directly and building crucial relationships with citizens.</p>
                                <ul class="space-y-2">
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Regular work schedules with predictable rotations</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Community engagement allowances</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Opportunities for specialized training and advancement</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Access to police housing in community locations</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Traffic Police Content -->
                    <div class="department-panel hidden" id="traffic-panel">
                        <div class="md:flex gap-6">
                            <div class="md:w-1/3 mb-4 md:mb-0">
                                <img src="{{ asset('assets/images/Logos/traf.jpg') }}" alt="Traffic Police" class="w-full h-auto rounded-lg">
                            </div>
                            <div class="md:w-2/3">
                                <h3 class="text-xl font-bold text-blue-800 mb-3">Traffic Police Benefits</h3>
                                <p class="mb-4">Traffic officers help ensure road safety and manage transportation infrastructure throughout Tanzania.</p>
                                <ul class="space-y-2">
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Special duty allowances for highway patrols</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Specialized vehicle operation training and certifications</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Additional weather gear and equipment provisions</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Traffic management certification opportunities</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Criminal Investigation Content -->
                    <div class="department-panel hidden" id="investigative-panel">
                        <div class="md:flex gap-6">
                            <div class="md:w-1/3 mb-4 md:mb-0">
                                <img src="{{ asset('assets/images/Logos/forensics2.jpg') }}" alt="Criminal Investigation" class="w-full h-auto rounded-lg">
                            </div>
                            <div class="md:w-2/3">
                                <h3 class="text-xl font-bold text-blue-800 mb-3">Criminal Investigation Benefits</h3>
                                <p class="mb-4">Our investigators solve crimes and bring justice through careful evidence collection and analysis.</p>
                                <ul class="space-y-2">
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Investigative allowance for active cases</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Advanced forensic training opportunities</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Specialized equipment and technology access</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>International training exchange programs</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Special Units Content -->
                    <div class="department-panel hidden" id="special-panel">
                        <div class="md:flex gap-6">
                            <div class="md:w-1/3 mb-4 md:mb-0">
                                <img src="{{ asset('assets/images/Logos/3.jpg') }}" alt="Special Units" class="w-full h-auto rounded-lg">
                            </div>
                            <div class="md:w-2/3">
                                <h3 class="text-xl font-bold text-blue-800 mb-3">Special Units Benefits</h3>
                                <p class="mb-4">Elite units handling specialized operations receive additional benefits matching their advanced training and responsibilities.</p>
                                <ul class="space-y-2">
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Risk allowance for hazardous operations</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Advanced tactical and weapons training</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Enhanced medical coverage and life insurance</span>
                                    </li>
                                    <li class="flex items-start">
                                        <span class="text-green-500 mr-2">✓</span>
                                        <span>Specialized housing considerations for rapid deployment</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section with Animation -->
    <section class="py-16 bg-gradient-to-r from-blue-900 to-blue-700 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold mb-6">Ready to Serve Tanzania?</h2>
            <p class="text-xl max-w-2xl mx-auto mb-8">Join the Tanzania Police Force and be part of a proud tradition of service, leadership, and community protection.</p>
            
            <div class="cta-buttons space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="{{ route('careers.application') }}" class="inline-block bg-white text-blue-800 hover:bg-blue-100 px-8 py-3 rounded-lg font-bold text-lg transition-all duration-300 hover:shadow-lg hover:scale-105">Apply Today</a>
                <a href="{{ route('careers.faqs') }}" class="inline-block bg-transparent border-2 border-white text-white hover:bg-white/10 px-8 py-3 rounded-lg font-bold text-lg transition-all duration-300">Learn More</a>
            </div>
        </div>
    </section>
</div>

<script>
    // Intersection Observer for animations
    document.addEventListener('DOMContentLoaded', function() {
        // Animation for intro sections
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('opacity-100');
                    if (entry.target.id === 'intro-animation') {
                        entry.target.classList.add('transform', 'translate-x-0');
                    }
                    if (entry.target.id === 'image-animation') {
                        entry.target.classList.add('transform', 'translate-x-0');
                    }
                }
            });
        }, { threshold: 0.1 });

        const introElement = document.getElementById('intro-animation');
        const imageElement = document.getElementById('image-animation');
        
        if (introElement) {
            introElement.classList.add('transform', '-translate-x-16');
            observer.observe(introElement);
        }
        
        if (imageElement) {
            imageElement.classList.add('transform', 'translate-x-16');
            observer.observe(imageElement);
        }

        // Testimonial carousel functionality
        let currentSlide = 0;
        const testimonialTrack = document.getElementById('testimonial-track');
        const slides = document.querySelectorAll('.testimonial-slide');
        const dots = document.querySelectorAll('.testimonial-dot');
        const prevButton = document.getElementById('prev-testimonial');
        const nextButton = document.getElementById('next-testimonial');
        
        function goToSlide(index) {
            if (testimonialTrack) {
                currentSlide = index;
                testimonialTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
                
                // Update active dot
                dots.forEach((dot, i) => {
                    if (i === currentSlide) {
                        dot.classList.add('bg-blue-200');
                        dot.classList.remove('bg-blue-400');
                    } else {
                        dot.classList.add('bg-blue-400');
                        dot.classList.remove('bg-blue-200');
                    }
                });
            }
        }
        
        if (prevButton) {
            prevButton.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                goToSlide(currentSlide);
            });
        }
        
        if (nextButton) {
            nextButton.addEventListener('click', () => {
                currentSlide = (currentSlide + 1) % slides.length;
                goToSlide(currentSlide);
            });
        }
        
        // Add click event to dots
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                goToSlide(index);
            });
        });
        
        // Auto-advance slides every 6 seconds
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            goToSlide(currentSlide);
        }, 6000);
        
        // Department tabs functionality
        const departmentTabs = document.querySelectorAll('.department-tab');
        const departmentPanels = document.querySelectorAll('.department-panel');
        
        departmentTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const department = tab.getAttribute('data-department');
                
                // Update active tab
                departmentTabs.forEach(t => {
                    t.classList.remove('bg-blue-600', 'text-white');
                    t.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                });
                
                tab.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300');
                tab.classList.add('bg-blue-600', 'text-white');
                
// Show corresponding panel
departmentPanels.forEach(panel => {
    panel.classList.add('hidden');
    if (panel.id === `${department}-panel`) {
        panel.classList.remove('hidden');
        panel.classList.add('active');
    }
});
            });
        });
    });
</script>
@endsection