@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-b from-blue-900 to-green-900 min-h-screen py-20">
    <div class="container mx-auto px-4">
        <!-- Header with animated badge - adjusted with more top padding -->
        <div class="flex justify-center mb-8 pt-10" x-data="{ spin: false }" 
             x-init="setInterval(() => spin = true, 5000); $watch('spin', value => { if(value) setTimeout(() => spin = false, 1000) })">
            <div class="relative">
                <div class="w-24 h-24 mb-4 mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-full h-full text-yellow-500"
                         :class="{'animate-spin': spin}">
                        <path fill="currentColor" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                    </svg>
                </div>
                <h1 class="text-4xl text-center font-bold text-white mb-2">Tanzania Police School</h1>
                <h2 class="text-2xl text-center font-semibold text-yellow-400 mb-6">Promotional Courses</h2>
            </div>
        </div>

        <!-- Introduction - Improved contrast with darker background -->
        <div class="bg-blue-950 bg-opacity-80 rounded-lg p-6 mb-12 max-w-3xl mx-auto shadow-xl">
            <p class="text-lg leading-relaxed text-white font-medium">
                The Tanzania Police School offers a comprehensive range of promotional courses designed to enhance the skills and capabilities of our officers. Each course is carefully structured to prepare officers for their new responsibilities upon promotion. Below you'll find information about our current promotional courses.
            </p>
        </div>

        <!-- Courses Section -->
        <div class="max-w-5xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($courses as $course)
                    <div x-data="{ open: false }" 
                         class="bg-blue-950 bg-opacity-90 rounded-lg overflow-hidden transform transition duration-300 hover:scale-105 shadow-lg {{ str_contains($course['rank'], 'Assistant Inspector') ? 'md:col-span-2' : '' }}"
                         @mouseenter="open = true" @mouseleave="open = false">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="bg-yellow-500 p-3 rounded-full mr-4">
                                    @if($course['icon'] === 'document')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-900" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5 3a2 2 0 012-2h6a2 2 0 012 2v1h2a2 2 0 012 2v11a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2h2V3zm10 2H5v11h10V5z" clip-rule="evenodd" />
                                        </svg>
                                    @elseif($course['icon'] === 'team')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-900" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                                        </svg>
                                    @elseif($course['icon'] === 'user')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-900" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                        </svg>
                                    @elseif($course['icon'] === 'badge')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-900" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    @elseif($course['icon'] === 'flag')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-900" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <!-- Improved color contrast for better visibility -->
                                    <h3 class="text-xl font-bold text-white mb-1">{{ $course['rank'] }}</h3>
                                    <h4 class="text-yellow-300 font-medium text-lg">{{ $course['duration'] }} Training Program</h4>
                                </div>
                            </div>
                            
                            <!-- Course Summary - Made text more visible with high contrast -->
                            <div class="mb-4">
                                <p class="font-semibold text-white text-lg">{{ $course['summary'] }}</p>
                            </div>
                            
                            <div class="flex items-center mb-3 text-yellow-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                <span>Duration: {{ $course['duration'] }}</span>
                            </div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0">
                                <p class="text-white">{{ $course['description'] }}</p>
                                <div class="mt-4 flex {{ str_contains($course['rank'], 'Assistant Inspector') ? 'justify-center' : '' }}">
                                    <button class="bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold py-2 px-4 rounded transition duration-300 {{ str_contains($course['rank'], 'Assistant Inspector') ? 'py-3 px-6 rounded-lg transform hover:scale-105' : '' }}">
                                        Apply Now
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Animated Statistics Section - with dummy data if $statistics is empty -->
        <div class="mt-16 max-w-4xl mx-auto" x-data="{ show: false }" x-intersect="show = true">
            <h3 class="text-2xl font-bold text-center text-white mb-8">Course Statistics</h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                @if(isset($statistics) && count($statistics) > 0)
                    @foreach($statistics as $stat)
                    <div class="bg-blue-950 bg-opacity-90 rounded-lg p-6 text-center">
                        <div class="text-yellow-400 text-4xl font-bold mb-2" x-data="{ value: 0 }" x-init="$watch('show', val => { if(val) { let interval = setInterval(() => { value < {{ $stat['value'] }} ? value += Math.ceil({{ $stat['value'] }}/20) : clearInterval(interval) }, 30) } })">
                            <span x-text="value">0</span>{{ $stat['suffix'] }}
                        </div>
                        <div class="text-white">{{ $stat['label'] }}</div>
                    </div>
                    @endforeach
                @else
                    <!-- Dummy Statistic 1 -->
                    <div class="bg-blue-950 bg-opacity-90 rounded-lg p-6 text-center">
                        <div class="text-yellow-400 text-4xl font-bold mb-2" x-data="{ value: 0 }" x-init="$watch('show', val => { if(val) { let interval = setInterval(() => { value < 953 ? value += 5 : clearInterval(interval) }, 20) } })">
                            <span x-text="value">0</span>+
                        </div>
                        <div class="text-white">Officers Trained Annually</div>
                    </div>
                    
                    <!-- Dummy Statistic 2 -->
                    <div class="bg-blue-950 bg-opacity-90 rounded-lg p-6 text-center">
                        <div class="text-yellow-400 text-4xl font-bold mb-2" x-data="{ value: 0 }" x-init="$watch('show', val => { if(val) { let interval = setInterval(() => { value < 92 ? value += 1 : clearInterval(interval) }, 40) } })">
                            <span x-text="value">80</span>%
                        </div>
                        <div class="text-white">Graduation Rate</div>
                    </div>
                    
                    <!-- Dummy Statistic 3 -->
                    <div class="bg-blue-950 bg-opacity-90 rounded-lg p-6 text-center">
                        <div class="text-yellow-400 text-4xl font-bold mb-2" x-data="{ value: 0 }" x-init="$watch('show', val => { if(val) { let interval = setInterval(() => { value < 27 ? value += 1 : clearInterval(interval) }, 40) } })">
                            <span x-text="value">90</span>
                        </div>
                        <div class="text-white">Years of Excellence</div>
                    </div>
                @endif
                
                <!-- Always show this statistic -->
                <div class="bg-blue-950 bg-opacity-90 rounded-lg p-6 text-center sm:col-span-3">
                    <div class="text-yellow-400 text-4xl font-bold mb-2" x-data="{ value: 0 }" x-init="$watch('show', val => { if(val) { let interval = setInterval(() => { value < 15678 ? value += 100 : clearInterval(interval) }, 10) } })">
                        <span x-text="value">0</span>
                    </div>
                    <div class="text-white">Career Advancements Since Founding</div>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="mt-16 max-w-4xl mx-auto text-center bg-blue-900 rounded-lg p-8 shadow-2xl">
            <h3 class="text-2xl font-bold text-white mb-4">Ready to Advance Your Career?</h3>
            <p class="text-white mb-6">Apply for a promotional course today and take the next step in your Tanzania Police Service journey.</p>
            <div class="flex justify-center">
                <a href="{{ route('police.download-application') }}" class="bg-yellow-500 hover:bg-yellow-400 text-blue-900 font-bold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-110 hover:rotate-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                    </svg>
                    Download Application
                </a>
            </div>
        </div>
    </div>
</div>
@endsection