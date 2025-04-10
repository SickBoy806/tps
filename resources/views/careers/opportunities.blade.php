@extends('layouts.app')

@section('title', 'Tanzania Police Force - Job Opportunities')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-900 to-blue-700 py-20 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        {{-- Page Header --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-extrabold text-white sm:text-5xl md:text-6xl mb-4">
                Tanzania Police Force
            </h1>
            <p class="max-w-2xl mx-auto text-xl text-blue-200">
                Serve Your Nation. Protect Your Community. Join the Finest Force in Tanzania.
            </p>
        </div>

        {{-- Job Categories Filter --}}
        <div class="mb-10">
            <div class="flex flex-wrap justify-center gap-4">
                <button data-category="all" class="job-filter px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
                    All Positions
                </button>
                <button data-category="basic" class="job-filter px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition-colors">
                    Basic Recruits
                </button>
                <button data-category="un" class="job-filter px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition-colors">
                    UN Missions
                </button>
                <button data-category="leadership" class="job-filter px-4 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-gray-300 transition-colors">
                    Leadership Positions
                </button>
            </div>
        </div>

        {{-- Job Listings Grid --}}
        <div id="job-listings" class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Basic Recruit Job Card --}}
            <div class="job-card basic" data-category="basic">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">Basic Police Recruit</h3>
                                <p class="text-sm text-gray-500">Entry Level · Full-time</p>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-gray-600 text-sm">
                                Join the foundation of our police force. Comprehensive training 
                                program for young, motivated individuals ready to serve Tanzania.
                            </p>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Application Window Closed</span>
                            </div>
                            
                            <a href="https://ajira.tpf.go.tz/" class="px-4 py-2 bg-blue-600 text-white rounded-full text-sm hover:bg-blue-700 transition-colors">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- UN Missions Job Card --}}
            <div class="job-card un" data-category="un">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">UN Peacekeeping Missions</h3>
                                <p class="text-sm text-gray-500">International · Special Assignment</p>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-gray-600 text-sm">
                                Represent Tanzania on global peacekeeping missions. 
                                Opportunity to contribute to international peace and security.
                            </p>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Limited Positions</span>
                            </div>
                            
                            <a href="https://www.un.org/en/our-work" class="px-4 py-2 bg-blue-600 text-white rounded-full text-sm hover:bg-blue-700 transition-colors">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Leadership Positions Job Card --}}
            <div class="job-card leadership" data-category="leadership">
                <div class="bg-white shadow-lg rounded-lg overflow-hidden transform transition-all hover:scale-105 hover:shadow-xl">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mr-4">
                                <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900">Inspector Leadership Program</h3>
                                <p class="text-sm text-gray-500">Senior · Strategic Roles</p>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-gray-600 text-sm">
                                Advanced leadership track for experienced officers. 
                                Develop strategic management and investigative expertise.
                            </p>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm text-gray-600">Selective Recruitment</span>
                            </div>
                            
                            <a href="{{ route('tpf.apply', 'inspector-course') }}" class="px-4 py-2 bg-blue-600 text-white rounded-full text-sm hover:bg-blue-700 transition-colors">
                                Apply Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-12 flex justify-center">
            <nav aria-label="Pagination" class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    Previous
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    1
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-blue-600 text-white text-sm font-medium">
                    2
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    3
                </a>
                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    Next
                </a>
            </nav>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.job-filter');
        const jobCards = document.querySelectorAll('.job-card');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                const category = this.getAttribute('data-category');
                
                // Remove active state from all buttons
                filterButtons.forEach(btn => {
                    btn.classList.remove('bg-blue-600', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-800');
                });

                // Add active state to clicked button
                this.classList.remove('bg-gray-200', 'text-gray-800');
                this.classList.add('bg-blue-600', 'text-white');

                // Filter job cards
                jobCards.forEach(card => {
                    if (category === 'all' || card.getAttribute('data-category') === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush