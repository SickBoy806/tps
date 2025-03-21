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
                Stay updated with the most recent discoveries, achievements, and innovations at TPS Moshi.
            </p>
        </div>

        {{-- News Filter (Dynamic Categories) --}}
        <div class="flex justify-center mb-10">
            <div class="bg-white shadow-md rounded-full p-2 flex space-x-2 overflow-x-auto">
                <a href="{{ route('news.index') }}" class="px-6 py-2 rounded-full text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all {{ request()->routeIs('news.index') && !request()->category ? 'bg-blue-600 text-white' : '' }}">
                    All News
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('news.category', $cat->slug) }}" class="px-6 py-2 rounded-full text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all {{ isset($category) && $category->id == $cat->id ? 'bg-blue-600 text-white' : '' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- News Grid --}}
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $index => $newsItem)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl group">
                {{-- Image Slideshow Container --}}
                <div class="relative overflow-hidden h-56">
                    @php
                        // Get the main image from the news item
                        $mainImage = null;
                        if ($newsItem->image) {
                            // Check if the path already starts with http/https
                            if (strpos($newsItem->image, 'http') === 0) {
                                $mainImage = $newsItem->image;
                            } 
                            // If it's a storage path
                            else {
                                // Remove 'storage/' if it's at the beginning of the path
                                $imagePath = str_replace('storage/', '', $newsItem->image);
                                $mainImage = asset('storage/' . $imagePath);
                            }
                        }
                        
                        // Create an array of images (starting with the main image if it exists)
                        $images = $mainImage ? [$mainImage] : [];
                        
                        // Add additional images if they exist
                        if (isset($newsItem->image_urls) && is_array($newsItem->image_urls)) {
                            $images = array_merge($images, $newsItem->image_urls);
                        }
                        
                        // Ensure we have at least 4 images
                        if (count($images) < 4) {
                            // Fill with placeholder images if needed
                            $categoryName = $newsItem->category ? $newsItem->category->name : 'News';
                            $placeholders = [
                                '/api/placeholder/800/500?text=' . urlencode($categoryName) . '+Image+1',
                                '/api/placeholder/800/500?text=' . urlencode($categoryName) . '+Image+2',
                                '/api/placeholder/800/500?text=' . urlencode($categoryName) . '+Image+3',
                                '/api/placeholder/800/500?text=' . urlencode($categoryName) . '+Image+4'
                            ];
                            
                            // Merge existing images with placeholders
                            $images = array_merge($images, array_slice($placeholders, 0, 4 - count($images)));
                        }
                    @endphp
                    
                    @foreach($images as $imgIndex => $image)
                        <img 
                            src="{{ $image }}" 
                            alt="{{ $newsItem->title }} Image {{ $imgIndex + 1 }}" 
                            class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110 absolute top-0 left-0 slideshow-image-{{ $index }} {{ $imgIndex == 0 ? 'opacity-100' : 'opacity-0' }}"
                            data-index="{{ $imgIndex }}"
                            data-group="{{ $index }}"
                        >
                    @endforeach
                    
                    {{-- Navigation Dots --}}
                    <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2 z-10">
                        @foreach($images as $imgIndex => $image)
                            <button 
                                class="w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition-all nav-dot-{{ $index }} {{ $imgIndex == 0 ? 'bg-opacity-100' : '' }}" 
                                data-index="{{ $imgIndex }}"
                                data-group="{{ $index }}"
                                onclick="changeSlide({{ $index }}, {{ $imgIndex }})"
                            ></button>
                        @endforeach
                    </div>
                    
                    {{-- Category Badge --}}
                    <div class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm z-10">
                        {{ $newsItem->category ? $newsItem->category->name : 'News' }}
                    </div>
                </div>

                {{-- Content Container --}}
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                        {{ $newsItem->title }}
                    </h3>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $newsItem->excerpt ?? Str::limit($newsItem->content, 150) }}
                    </p>

                    {{-- Meta Information --}}
                    <div class="flex justify-between items-center text-gray-500 text-sm">
                        <span>{{ $newsItem->created_at->format('F d, Y') }}</span>
                        <span>{{ $newsItem->read_time ?? '5 min read' }}</span>
                    </div>

                    {{-- Read More Button --}}
                    <a 
                        href="{{ route('news.show', $newsItem->id) }}" 
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

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $news->links() }}
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
    
    /* Slideshow styles */
    [class^="slideshow-image-"] {
        transition: opacity 0.5s ease-in-out;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get all news items
        const newsItems = document.querySelectorAll('.news-item');
        const totalGroups = {{ $news->count() }};
        
        // Auto-rotate slideshows
        for (let group = 0; group < totalGroups; group++) {
            const images = document.querySelectorAll(`.slideshow-image-${group}`);
            if (images.length > 0) {
                let currentIndex = 0;
                
                setInterval(() => {
                    currentIndex = (currentIndex + 1) % images.length;
                    updateSlideshow(group, currentIndex);
                }, 5000); // Change image every 5 seconds
            }
        }
    });
    
    function updateSlideshow(group, newIndex) {
        // Hide all images in the group
        const images = document.querySelectorAll(`.slideshow-image-${group}`);
        images.forEach(img => {
            img.classList.remove('opacity-100');
            img.classList.add('opacity-0');
        });
        
        // Show the selected image
        if (images[newIndex]) {
            images[newIndex].classList.remove('opacity-0');
            images[newIndex].classList.add('opacity-100');
        }
        
        // Update navigation dots
        const dots = document.querySelectorAll(`.nav-dot-${group}`);
        dots.forEach((dot, index) => {
            if (index === newIndex) {
                dot.classList.add('bg-opacity-100');
            } else {
                dot.classList.remove('bg-opacity-100');
                dot.classList.add('bg-opacity-50');
            }
        });
    }
    
    function changeSlide(group, index) {
        updateSlideshow(group, index);
    }
</script>
@endpush
@endsection