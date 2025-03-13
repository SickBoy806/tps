@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen pt-20 pb-12">
    <div class="container mx-auto px-4">
        {{-- Page Header --}}
        <div class="text-center mb-12">
            <h1 class="text-5xl font-extrabold text-gray-900 mb-4 animate-fade-in-down">
                Latest <span class="text-blue-600">News</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto animate-fade-in-up">
                Stay updated with the most recent discoveries, achievements, and innovations at Ninter.
            </p>
        </div>

        {{-- News Filter (Optional) --}}
        <div class="flex justify-center mb-10">
            <div class="bg-white shadow-md rounded-full p-2 flex space-x-2">
                <button class="px-6 py-2 rounded-full text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all">
                    All News
                </button>
                <button class="px-6 py-2 rounded-full text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all">
                    Research
                </button>
                <button class="px-6 py-2 rounded-full text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all">
                    Academic
                </button>
            </div>
        </div>

        {{-- News Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                [
                    'category' => 'Research',
                    'title' => 'New AI Research Center Opens',
                    'excerpt' => 'Groundbreaking facility set to push boundaries of artificial intelligence research.',
                    'date' => 'February 10, 2025',
                    'image' => '/api/placeholder/800/500',
                    'readTime' => '5 min read'
                ],
                [
                    'category' => 'Academic',
                    'title' => 'Student Innovation Awards',
                    'excerpt' => 'Our brilliant students win national competition with revolutionary project.',
                    'date' => 'February 8, 2025',
                    'image' => '/api/placeholder/800/500',
                    'readTime' => '4 min read'
                ],
                [
                    'category' => 'Technology',
                    'title' => 'Breakthrough in Quantum Computing',
                    'excerpt' => 'Ninter researchers make significant advancement in quantum technology.',
                    'date' => 'February 5, 2025',
                    'image' => '/api/placeholder/800/500',
                    'readTime' => '6 min read'
                ]
            ] as $newsItem)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl group">
                {{-- Image Container --}}
                <div class="relative overflow-hidden">
                    <img 
                        src="{{ $newsItem['image'] }}" 
                        alt="{{ $newsItem['title'] }}" 
                        class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110"
                    >
                    <div class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm">
                        {{ $newsItem['category'] }}
                    </div>
                </div>

                {{-- Content Container --}}
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                        {{ $newsItem['title'] }}
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $newsItem['excerpt'] }}
                    </p>

                    {{-- Meta Information --}}
                    <div class="flex justify-between items-center text-gray-500 text-sm">
                        <span>{{ $newsItem['date'] }}</span>
                        <span>{{ $newsItem['readTime'] }}</span>
                    </div>

                    {{-- Read More Button --}}
                    <a 
                        href="#" 
                        class="mt-4 block text-center bg-blue-50 text-blue-600 hover:bg-blue-100 py-2 rounded-lg transition-all group-hover:bg-blue-600 group-hover:text-white"
                    >
                        Read Full Article
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination or Load More --}}
        <div class="text-center mt-12">
            <a 
                href="#" 
                class="px-8 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-all shadow-lg"
            >
                Load More News
            </a>
        </div>
    </div>
</div>

@push('styles')
<style>
    @keyframes fade-in-down {
        0% { opacity: 0; transform: translateY(-20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-down { animation: fade-in-down 0.6s ease-out; }
    .animate-fade-in-up { animation: fade-in-up 0.6s ease-out; }
</style>
@endpush