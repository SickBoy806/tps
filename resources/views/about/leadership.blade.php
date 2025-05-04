@php
// Local background image selection
$backgroundImages = [
    'leadership-bg-1.jpg',
    'leadership-bg-2.jpg',
    'leadership-bg-3.jpg'
];

// Randomly select a background image
$backgroundImage = $backgroundImages[array_rand($backgroundImages)];
$backgroundUrl = asset('images/leadership/' . $backgroundImage);
@endphp

@extends('layouts.app')
@section('title', 'Leadership')
@section('content')

<!-- We'll only add padding-top on mobile, not on desktop -->
<div class="min-h-screen bg-cover bg-center relative mobile-padding-fix">
    <!-- Tree diagram background layer -->
    <div class="fixed inset-0 bg-white z-0 tree-diagram-background">
        <!-- SVG or image will be set via CSS -->
    </div>

    <!-- Overlay for better text readability - reduced opacity -->
    <div class="absolute inset-0 bg-blue-900 bg-opacity-20 z-1"></div>

    <div class="relative z-10">
        <!-- Made the entire header section transparent -->
        <div class="bg-transparent shadow-none">
            <div class="max-w-7xl mx-auto py-4 px-4 flex justify-between items-center mobile-header">
                <h1 class="text-3xl font-bold text-blue-800 animate-fade-in">
                    Tanzania Police School Moshi Leadershipi
                </h1>
                
                <!-- Leadership Stats Tooltip -->
                <div x-data="{ open: false }" class="relative">
                    <button 
                        @mouseenter="open = true" 
                        @mouseleave="open = false"
                        @click="open = !open" 
                        class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition-colors"
                    >
                    
                    </button>
                    
                    <div 
                        x-show="open"
                        x-transition
                        class="absolute right-0 top-full mt-2 w-64 bg-white rounded-lg shadow-2xl p-4 z-50"
                    >
                        <h3 class="text-xl font-bold mb-3 text-blue-800">Leadership Overview</h3>
                        <ul class="space-y-2">
                            <li class="flex justify-between">
                                <span>Total Leadership Team</span>
                                <strong>{{ count($posts) }}</strong>
                            </li>
                            <li class="flex justify-between">
                                <span>Average Experience</span>
                                <strong>15+ Years</strong>
                            </li>
                            <li class="flex justify-between">
                                <span>Advanced Degrees</span>
                                <strong>80%</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto py-12 px-4">
            <div class="space-y-24">
                @foreach($posts as $index => $post)
                <div class="opacity-0 animate-slide-up {{ $index > 0 ? 'delay-' . ($index * 200) : '' }}">
                    <div class="relative flex items-center profile-container">
                        <div class="w-[500px] h-[500px] bg-gray-200 rounded-2xl overflow-hidden shadow-2xl group profile-image">
                            @if(isset($post->image))
                                <img 
                                    src="{{ $post->image }}" 
                                    alt="{{ $post->name }}" 
                                    class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                                >
                            @endif
                            <!-- Hover Overlay -->
                            <div class="absolute inset-0 bg-blue-900 bg-opacity-0 group-hover:bg-opacity-30 transition-all duration-300 flex items-center justify-center">
                                <div class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center">
                                    <p class="text-xl font-semibold">View Profile</p>
                                </div>
                            </div>
                        </div>

                        <div class="group relative -top-1/2 -translate-y-1/2 ml-4 position-container">
                            <div class="bg-gradient-to-r from-blue-600 to-transparent text-white px-6 py-3 rounded-lg font-bold text-xl whitespace-nowrap hover:from-blue-700 transition-colors duration-300 cursor-pointer pb-2 border-b-2 border-blue-600">
                                {{ $post->position }}
                            </div>
                            
                            <!-- Mobile-only full profile view -->
                            <div class="mobile-full-profile">
                                <h3 class="text-xl font-bold text-gray-800">{{ $post->name }}</h3>
                                <p class="text-blue-600 font-semibold">{{ $post->position }}</p>
                                <p class="mt-2 text-gray-700">{{ $post->description }}</p>
                                
                                <!-- Mobile Quick Stats -->
                                <div class="grid grid-cols-3 gap-2 text-center bg-blue-50 rounded-lg p-3 mt-3">
                                    <div>
                                        <div class="text-blue-600 font-bold">15+</div>
                                        <div class="text-xs text-gray-600">Yrs Exp</div>
                                    </div>
                                    <div>
                                        <div class="text-green-600 font-bold">{{ rand(10, 20) }}</div>
                                        <div class="text-xs text-gray-600">Projects</div>
                                    </div>
                                    <div>
                                        <div class="text-purple-600 font-bold">{{ rand(3, 7) }}</div>
                                        <div class="text-xs text-gray-600">Awards</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Desktop Expanded Profile Card -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-4 w-[450px] bg-white rounded-2xl shadow-2xl p-6 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none z-50 desktop-profile">
                                <div class="flex items-center mb-4">
                                    <div class="w-20 h-20 rounded-full overflow-hidden mr-4">
                                        <img 
                                            src="{{ $post->image }}" 
                                            alt="{{ $post->name }}" 
                                            class="w-full h-full object-cover"
                                        >
                                    </div>
                                    <div>
                                        <h2 class="text-2xl font-bold text-gray-800">{{ $post->name }}</h2>
                                        <p class="text-blue-600 font-semibold">{{ $post->position }}</p>
                                    </div>
                                </div>
                                
                                <p class="text-gray-700 text-lg mb-4">{{ $post->description }}</p>
                                
                                <!-- Quick Stats -->
                                <div class="grid grid-cols-3 gap-2 text-center bg-blue-50 rounded-lg p-3">
                                    <div>
                                        <div class="text-blue-600 font-bold">15+</div>
                                        <div class="text-xs text-gray-600">Years Experience</div>
                                    </div>
                                    <div>
                                        <div class="text-green-600 font-bold">{{ rand(10, 20) }}</div>
                                        <div class="text-xs text-gray-600">Projects Led</div>
                                    </div>
                                    <div>
                                        <div class="text-purple-600 font-bold">{{ rand(3, 7) }}</div>
                                        <div class="text-xs text-gray-600">Awards</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@push('head')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@endpush

<style>
    .animate-fade-in {
        animation: fadeIn 0.8s ease-out forwards;
    }
    .animate-slide-up {
        animation: slideUp 1s ease-out forwards;
    }
    .delay-200 { animation-delay: 200ms; }
    .delay-400 { animation-delay: 400ms; }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Tree diagram background - increased opacity and moved 2cm to the right and 0.3cm down */
    .tree-diagram-background {
        background-image: url('/assets/images/organizational/MUUNDO.png');
        background-size: contain;
        background-repeat: no-repeat;
        background-position: calc(50% + 5cm) 0.3cm; /* Added 2cm right offset and kept 0.3cm top offset */
        opacity: 0.3;
        animation: subtlePulse 10s infinite alternate;
        margin-top: 0.3cm; /* Alternative approach to move background down */
    }
    
    @keyframes subtlePulse {
        0% { opacity: 0.25; }
        100% { opacity: 0.35; }
    }
    
    /* Base styles - Hide mobile-only elements by default */
    .mobile-full-profile {
        display: none;
    }
    
    /* Make heading text more visible against the background */
    .text-blue-800 {
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.8), 0 0 10px rgba(255, 255, 255, 0.7);
    }
    
    /* Mobile-only styles - Only apply these on smaller screens */
    @media (max-width: 768px) {
        /* Header spacing fix for mobile */
        .mobile-padding-fix {
            padding-top: 60px; /* Adjust to match your navbar height */
        }
        
        /* Mobile header adjustments */
        .mobile-header {
            flex-direction: column;
            text-align: center;
        }
        
        .mobile-header h1 {
            margin-bottom: 12px;
            font-size: 1.5rem;
        }
        
        /* Profile container adjustments */
        .profile-container {
            flex-direction: column;
            align-items: flex-start;
        }
        
        /* Image sizing for mobile */
        .profile-image {
            width: 100% !important;
            height: 300px !important;
        }
        
        /* Position container adjustments */
        .position-container {
            position: static !important;
            transform: none !important;
            margin-left: 0 !important;
            margin-top: 1rem !important;
            width: 100%;
        }
        
        /* Hide desktop hover card on mobile */
        .desktop-profile {
            display: none !important;
        }
        
        /* Show mobile profile on mobile */
        .mobile-full-profile {
            display: block;
            margin-top: 1rem;
            padding: 1rem;
            background-color: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        /* Ensure content doesn't overflow on mobile */
        img {
            max-width: 100%;
        }
        
        /* Fix hover states on mobile which don't work */
        .group:hover .opacity-0 {
            opacity: 0 !important;
        }
        
        /* Fix horizontal overflow issues */
        body, html {
            overflow-x: hidden;
            width: 100%;
        }
        
        /* Adjust tree diagram background for mobile */
        .tree-diagram-background {
            background-size: 200% auto;
            background-position: calc(50% + 2cm) 0.5cm; /* Shifted 2cm right for mobile too */
        }
        
        /* Reduce blue overlay opacity on mobile for better visibility */
        .bg-blue-900.bg-opacity-20 {
            background-opacity: 0.1 !important;
        }
    }
</style>
@endsection
