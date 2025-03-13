@extends('layouts.app')

@section('title', 'Upcoming Events - Ninter')

@section('content')
<div class="container mx-auto px-4 pt-20 pb-12">
    {{-- Page Header --}}
    <div class="text-center mb-12">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-4">
            <span class="text-orange-500">Upcoming</span> <span class="text-blue-600">Events</span>
        </h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Explore exciting opportunities for learning, networking, and innovation.
        </p>
    </div>

    {{-- Event Filters --}}
    <div class="flex justify-center mb-10">
        <div class="bg-white shadow-md rounded-full p-2 flex space-x-2">
            <button class="px-6 py-2 rounded-full text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all">
                All Events
            </button>
            <button class="px-6 py-2 rounded-full text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all">
                Academic
            </button>
            <button class="px-6 py-2 rounded-full text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all">
                Ceremonies
            </button>
        </div>
    </div>

    {{-- Events List --}}
    <div class="grid md:grid-cols-1 lg:grid-cols-2 gap-8">
        @foreach([
            [
                'date' => '15',
                'month' => 'FEB',
                'title' => 'Annual Technology Summit',
                'time' => '9:00 AM - 5:00 PM',
                'location' => 'Main Auditorium',
                'description' => 'Join us for our annual technology summit featuring industry leaders and innovative tech presentations.',
                'category' => 'Technology',
                'attendees' => 250,
                'image' => '/api/placeholder/800/400'
            ],
            [
                'date' => '20',
                'month' => 'FEB',
                'title' => 'Research Symposium',
                'time' => '10:00 AM - 4:00 PM',
                'location' => 'Research Center',
                'description' => 'A comprehensive showcase of groundbreaking research projects by our faculty and talented students.',
                'category' => 'Academic',
                'attendees' => 150,
                'image' => '/api/placeholder/800/400'
            ],
            [
                'date' => '05',
                'month' => 'MAR',
                'title' => 'Innovation Workshop',
                'time' => '2:00 PM - 6:00 PM',
                'location' => 'Innovation Lab',
                'description' => 'Hands-on workshop exploring cutting-edge technologies and collaborative problem-solving.',
                'category' => 'Technology',
                'attendees' => 100,
                'image' => '/api/placeholder/800/400'
            ],
            [
                'date' => '07',
                'month' => 'march',
                'title' => 'PassingOut Ceremony',
                'time' => '10:00 AM',
                'location' => 'Kambapori',
                'description' => 'Celebrating the achievements of our graduating class, honoring their hard work and dedication.',
                'category' => 'Ceremonies',
                'attendees' => 500,
                'image' => '/api/placeholder/800/400'
            ]
        ] as $event)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-2xl group">
            {{-- Event Image --}}
            <div class="relative">
                <img 
                    src="{{ $event['image'] }}" 
                    alt="{{ $event['title'] }}" 
                    class="w-full h-56 object-cover transition-transform duration-500 group-hover:scale-110"
                >
                {{-- Date Badge --}}
                <div class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm">
                    {{ $event['category'] }}
                </div>
            </div>

            {{-- Event Details --}}
            <div class="p-6">
                <div class="flex items-center mb-4">
                    {{-- Date Box --}}
                    <div class="w-20 h-20 bg-blue-50 rounded-lg flex flex-col items-center justify-center mr-6 shadow-md">
                        <span class="text-3xl font-bold text-blue-600">{{ $event['date'] }}</span>
                        <span class="text-blue-600 uppercase">{{ $event['month'] }}</span>
                    </div>

                    {{-- Event Info --}}
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                            {{ $event['title'] }}
                        </h3>
                        <div class="text-gray-600 space-y-1">
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $event['time'] }}
                            </p>
                            <p class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                {{ $event['location'] }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Event Description --}}
                <p class="text-gray-600 mb-4 line-clamp-3">
                    {{ $event['description'] }}
                </p>

                {{-- Event Meta --}}
                <div class="flex justify-between items-center">
                    <div class="flex items-center text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        {{ $event['attendees'] }} Attendees
                    </div>
                    <a 
                        href="#" 
                        class="px-4 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all flex items-center group"
                    >
                        Register Now
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Load More Button --}}
    <div class="text-center mt-12">
        <a 
            href="#" 
            class="px-8 py-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-all shadow-lg"
        >
            View More Events
        </a>
    </div>
</div>
@endsection