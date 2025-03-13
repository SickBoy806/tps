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

<div class="min-h-screen bg-cover bg-center relative" style="background-image: url('{{ $backgroundUrl }}')">
    <!-- Overlay for better text readability -->
    <div class="absolute inset-0 bg-blue-900 bg-opacity-50"></div>

    <div class="relative z-10">
        <div class="bg-white bg-opacity-90 shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-blue-800 animate-fade-in">
                    Tanzania Police School Moshi Leadership
                </h1>
                
                <!-- Leadership Stats Tooltip -->
                <div x-data="{ open: false }" class="relative">
                    <button 
                        @mouseenter="open = true" 
                        @mouseleave="open = false"
                        class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700 transition-colors"
                    >
                        Leadership Insights
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
                    <div class="relative flex items-center">
                        <div class="w-[500px] h-[500px] bg-gray-200 rounded-2xl overflow-hidden shadow-2xl group">
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

                        <div class="group relative -top-1/2 -translate-y-1/2 ml-4">
                            <div class="bg-gradient-to-r from-blue-600 to-transparent text-white px-6 py-3 rounded-lg font-bold text-xl whitespace-nowrap hover:from-blue-700 transition-colors duration-300 cursor-pointer pb-2 border-b-2 border-blue-600">
                                {{ $post->position }}
                            </div>
                            
                            <!-- Expanded Profile Card -->
                            <div class="absolute left-full top-1/2 -translate-y-1/2 ml-4 w-[450px] bg-white rounded-2xl shadow-2xl p-6 opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none z-50">
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
</style>
@endsection