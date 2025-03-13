@extends('layouts.app')

@section('title', 'Mission, Vision & Values')

@section('content')
<div class="min-h-screen flex flex-col bg-gray-100">
    <!-- Title Section with Background Image -->
    <div class="relative bg-cover bg-center text-white py-12 pt-24 shadow-md" style="background-image: url('{{ asset('assets/images/Logos/oldmission.png') }}');">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold tracking-wide uppercase mix-blend-overlay">Mission, Vision & Values</h1>
        </div>
    </div>

     <!-- Enhanced Journey Section with Advanced Styling -->
    <div class="container mx-auto px-6 py-12 bg-white">
        <h2 class="text-4xl font-bold text-center mb-12 text-gray-800 relative">
            Our Journey
            <span class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-16 h-1 bg-blue-500"></span>
        </h2>

        <div class="relative max-w-5xl mx-auto">
            <!-- Journey Timeline with Curved Design -->
            <div class="absolute inset-0 flex justify-center">
                <div class="w-1 bg-gradient-to-b from-blue-400 to-blue-600 rounded-full relative">
                    <!-- Decorative timeline markers -->
                    <div class="absolute w-6 h-6 bg-blue-500 rounded-full -left-2.5 top-0 shadow-lg"></div>
                    <div class="absolute w-6 h-6 bg-blue-500 rounded-full -left-2.5 top-1/3 shadow-lg"></div>
                    <div class="absolute w-6 h-6 bg-blue-500 rounded-full -left-2.5 top-2/3 shadow-lg"></div>
                    <div class="absolute w-6 h-6 bg-blue-500 rounded-full -left-2.5 bottom-0 shadow-lg"></div>
                </div>
            </div>

            <!-- Journey Milestones -->
            <div class="space-y-12 relative">
                <!-- Milestone 1 -->
                <div class="flex items-center justify-between w-full">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 bg-blue-500 shadow-xl w-8 h-8 rounded-full"></div>
                    <div class="order-1 bg-white rounded-lg shadow-lg w-5/12 px-6 py-4 transition duration-300 hover:scale-105 hover:shadow-xl">
                        <h3 class="mb-3 font-bold text-blue-800 text-xl">Founding Moment</h3>
                        <p class="text-sm leading-snug text-gray-600 text-opacity-100">
                            Our organization was established with a clear vision of community service and protection, marking the beginning of a transformative journey.
                        </p>
                        <span class="text-xs text-blue-500 font-medium">2005</span>
                    </div>
                </div>

                <!-- Milestone 2 -->
                <div class="flex items-center justify-between w-full">
                    <div class="order-1 bg-white rounded-lg shadow-lg w-5/12 px-6 py-4 transition duration-300 hover:scale-105 hover:shadow-xl text-right">
                        <h3 class="mb-3 font-bold text-green-800 text-xl">Community Expansion</h3>
                        <p class="text-sm leading-snug text-gray-600 text-opacity-100">
                            Launched comprehensive community outreach programs, significantly enhancing public engagement and trust.
                        </p>
                        <span class="text-xs text-green-500 font-medium">2012</span>
                    </div>
                    <div class="z-20 flex items-center order-1 bg-green-500 shadow-xl w-8 h-8 rounded-full"></div>
                    <div class="order-1 w-5/12"></div>
                </div>

                <!-- Milestone 3 -->
                <div class="flex items-center justify-between w-full">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 bg-yellow-500 shadow-xl w-8 h-8 rounded-full"></div>
                    <div class="order-1 bg-white rounded-lg shadow-lg w-5/12 px-6 py-4 transition duration-300 hover:scale-105 hover:shadow-xl">
                        <h3 class="mb-3 font-bold text-yellow-800 text-xl">Technological Advancement</h3>
                        <p class="text-sm leading-snug text-gray-600 text-opacity-100">
                            Implemented cutting-edge technology and digital systems to enhance operational efficiency and service delivery.
                        </p>
                        <span class="text-xs text-yellow-500 font-medium">2018</span>
                    </div>
                </div>

                <!-- Milestone 4 -->
                <div class="flex items-center justify-between w-full">
                    <div class="order-1 bg-white rounded-lg shadow-lg w-5/12 px-6 py-4 transition duration-300 hover:scale-105 hover:shadow-xl text-right">
                        <h3 class="mb-3 font-bold text-red-800 text-xl">Future Vision</h3>
                        <p class="text-sm leading-snug text-gray-600 text-opacity-100">
                            Continuing to innovate and adapt, with a commitment to serving our community with integrity and excellence.
                        </p>
                        <span class="text-xs text-red-500 font-medium">Ongoing</span>
                    </div>
                    <div class="z-20 flex items-center order-1 bg-red-500 shadow-xl w-8 h-8 rounded-full"></div>
                    <div class="order-1 w-5/12"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Section -->
    <div class="container mx-auto px-6 py-12">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Mission -->
            <div class="group relative bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl border-l-4 border-blue-600 transition duration-300 hover:-translate-y-1">
                <div class="absolute top-4 right-4 text-blue-600 text-3xl">
                    🎯
                </div>
                <h3 class="text-2xl font-semibold text-blue-700 mb-4 transition-all duration-300">Our Mission</h3>
                <p class="text-gray-700 leading-relaxed transition-opacity duration-300">
                    We strive to uphold the highest standards of service and discipline to ensure the safety and security of our citizens.
                </p>
            </div>

            <!-- Vision -->
            <div class="group relative bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl border-l-4 border-yellow-500 transition duration-300 hover:-translate-y-1">
                <div class="absolute top-4 right-4 text-yellow-500 text-3xl">
                    👁️
                </div>
                <h3 class="text-2xl font-semibold text-yellow-600 mb-4 transition-all duration-300">Our Vision</h3>
                <p class="text-gray-700 leading-relaxed transition-opacity duration-300">
                    To be a highly professional and well-equipped force that fosters trust and partnership with the community.
                </p>
            </div>

            <!-- Values -->
            <div class="group relative bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl border-l-4 border-green-500 transition duration-300 hover:-translate-y-1">
                <div class="absolute top-4 right-4 text-green-500 text-3xl">
                    ⚖️
                </div>
                <h3 class="text-2xl font-semibold text-green-600 mb-4 transition-all duration-300">Our Values</h3>
                <p class="text-gray-700 leading-relaxed transition-opacity duration-300">
                    Integrity, Accountability, Community Service, and Commitment to Justice.
                </p>
            </div>
        </div>
    </div>

    <!-- Community Impact Section -->
    <div class="bg-blue-50 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10 text-blue-900">Our Community Impact</h2>
            <div class="grid md:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-3">500+</div>
                    <div class="text-gray-700">Community Events</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold text-green-600 mb-3">1000+</div>
                    <div class="text-gray-700">Lives Positively Impacted</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold text-yellow-600 mb-3">95%</div>
                    <div class="text-gray-700">Community Satisfaction</div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="text-4xl font-bold text-red-600 mb-3">24/7</div>
                    <div class="text-gray-700">Emergency Response</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-400 text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-6">Join Our Mission</h2>
            <p class="text-xl mb-8">Interested in making a difference? Learn more about how you can contribute to our community.</p>
            <a href="#" class="bg-white text-blue-600 hover:bg-blue-100 px-8 py-3 rounded-full font-semibold transition duration-300 inline-block">Get Involved</a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Optional scroll-triggered animations
    document.addEventListener('DOMContentLoaded', function() {
        const milestones = document.querySelectorAll('.order-1.bg-white');
        
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        }, observerOptions);

        milestones.forEach(milestone => {
            observer.observe(milestone);
        });
    });
</script>
@endpush