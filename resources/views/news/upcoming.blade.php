@extends('layouts.app')

@section('title', 'Upcoming Events - Ninter')

@section('content')
 <div class="container mx-auto px-4 sm:px-6 pb-0 sm:pb-5" style="margin-top: 64px;">
    {{-- Page Header --}}
    <div class="text-center mb-8 sm:mb-12">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 mb-3 sm:mb-4">
            <span class="text-orange-500">Upcoming</span> <span class="text-blue-600">Events</span>
        </h1>
        <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto px-2">
            Explore exciting opportunities from Tanzania Police innovation.
        </p>
    </div>

    {{-- Event Filters --}}
    @if(is_object($categories) && method_exists($categories, 'count') ? $categories->count() > 0 : !empty($categories))
    <div class="flex justify-center mb-6 sm:mb-10 overflow-x-auto pb-2">
        <div class="bg-white shadow-md rounded-full p-1 sm:p-2 flex space-x-1 sm:space-x-2 whitespace-nowrap">
            <a href="{{ route('news.upcoming') }}" class="px-3 sm:px-6 py-1.5 sm:py-2 rounded-full text-sm {{ !isset($category) || $category == null ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }} transition-all">
                All Events
            </a>
            @foreach($categories as $cat)
                @php
                    // Parse JSON if the category is a JSON string
                    if (is_string($cat) && (substr($cat, 0, 1) == '{' || substr($cat, 0, 1) == '[')) {
                        $catObj = json_decode($cat);
                        if (json_last_error() == JSON_ERROR_NONE) {
                            $catName = $catObj->name ?? null;
                            $catSlug = $catObj->slug ?? null;
                        } else {
                            $catName = $cat;
                            $catSlug = $cat;
                        }
                    } 
                    // Handle if it's already an object
                    elseif (is_object($cat)) {
                        $catName = $cat->name ?? null;
                        $catSlug = $cat->slug ?? null;
                    } 
                    // Default case
                    else {
                        $catName = $cat;
                        $catSlug = $cat;
                    }
                @endphp
                
                @if($catName && $catSlug)
                <a href="{{ route('news.upcoming', ['category' => $catSlug]) }}" 
                   class="px-3 sm:px-6 py-1.5 sm:py-2 rounded-full text-sm {{ isset($category) && ($category == $catSlug || $category == $catName) ? 'bg-blue-50 text-blue-600' : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600' }} transition-all">
                    {{ $catName }}
                </a>
                @endif
            @endforeach
        </div>
    </div>
    @endif

    {{-- Events List --}}
    <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
        @forelse($events as $event)
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-md sm:shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-102 sm:hover:scale-105 hover:shadow-xl sm:hover:shadow-2xl group">
            {{-- Event Image --}}
            <div class="relative">
                @if($event->image)
                <img 
                    src="{{ asset('storage/' . $event->image) }}" 
                    alt="{{ $event->title }}" 
                    class="w-full h-40 sm:h-48 md:h-56 object-cover transition-transform duration-500 group-hover:scale-110"
                >
                @else
                <img 
                    src="/api/placeholder/800/400" 
                    alt="{{ $event->title }}" 
                    class="w-full h-40 sm:h-48 md:h-56 object-cover transition-transform duration-500 group-hover:scale-110"
                >
                @endif
                {{-- Category Badge --}}
                @if($event->category)
                <div class="absolute top-2 sm:top-4 left-2 sm:left-4 bg-blue-600 text-white px-2 sm:px-3 py-0.5 sm:py-1 rounded-full text-xs sm:text-sm">
                    {{ $event->category }}
                </div>
                @endif
            </div>

            {{-- Event Details --}}
            <div class="p-4 sm:p-6">
                <div class="flex items-center mb-3 sm:mb-4">
                    {{-- Date Box --}}
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-blue-50 rounded-lg flex flex-col items-center justify-center mr-4 sm:mr-6 shadow-md">
                        <span class="text-2xl sm:text-3xl font-bold text-blue-600">{{ $event->formatted_date['day'] }}</span>
                        <span class="text-xs sm:text-sm text-blue-600 uppercase">{{ $event->formatted_date['month'] }}</span>
                    </div>

                    {{-- Event Info --}}
                    <div>
                        <h3 class="text-xl sm:text-2xl font-bold text-gray-900 mb-1 sm:mb-2 group-hover:text-blue-600 transition-colors line-clamp-2">
                            {{ $event->title }}
                        </h3>
                        <div class="text-gray-600 space-y-0.5 sm:space-y-1 text-sm sm:text-base">
                            @if($event->time)
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1 sm:mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $event->time }}
                            </p>
                            @endif
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1 sm:mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="line-clamp-1">{{ $event->location }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Event Description --}}
                <p class="text-sm sm:text-base text-gray-600 mb-3 sm:mb-4 line-clamp-2 sm:line-clamp-3">
                    {{ $event->description }}
                </p>

                {{-- Event Meta --}}
                <div class="flex justify-between items-center">
                    @if(isset($event->attendees) && $event->attendees > 0)
                    <div class="flex items-center text-gray-500 text-xs sm:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 mr-1 sm:mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        {{ $event->attendees }} Attendees
                    </div>
                    @else
                    <div></div>
                    @endif
                    <a 
                        href="{{ route('events.show', $event->id) }}" 
                        class="px-3 sm:px-4 py-1.5 sm:py-2 bg-blue-50 text-blue-600 rounded-lg text-sm hover:bg-blue-100 transition-all flex items-center group"
                    >
                        Register Now
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 sm:h-5 sm:w-5 ml-1 sm:ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-1 sm:col-span-2 text-center py-6 sm:py-8">
            <p class="text-lg sm:text-xl text-gray-600">No upcoming events found.</p>
        </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-6 sm:mt-10">
        {{ $events->links() }}
    </div>
</div>
@endsection