@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="min-h-screen ">
    <!-- Hero Section -->
    <div class="relative h-96 lg:h-[500px] overflow-hidden">
    <div class="absolute inset-0">
        <img 
            src="{{ asset('assets/images/news&events/pared.PNG') }}" 
            alt="Tanzania Police School Moshi" 
            class="w-full"
        />
    </div>
    <div class="relative container mx-auto px-6 h-full flex items-center max-w-screen-xl">
        <div class="text-white text-center lg:text-left">
            <h1 class="text-4xl lg:text-5xl font-bold mb-2 animate-fade-in">Contact Us</h1>
            <p class="text-lg lg:text-xl opacity-90">Tanzania Police School - Moshi Campus</p>
        </div>
    </div>
</div>


    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="space-y-8">
                <div class="bg-white rounded-lg p-6 shadow-lg transform hover:scale-105 transition-transform duration-300">
                    <h2 class="text-2xl font-semibold mb-6 text-blue-800">Get in Touch</h2>
                    
                    <div class="space-y-6">
                        <!-- Contact Details -->
                        <div class="flex items-start space-x-4">
                            <div class="text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold">Email</h3>
                                <p class="text-gray-600">info@tpsmoshi.ac.tz</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold">Phone</h3>
                                <p class="text-gray-600">+255 123 456 789</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4">
                            <div class="text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold">Address</h3>
                                <p class="text-gray-600">Moshi, Kilimanjaro, Tanzania</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Map -->
                <div class="bg-gray-100 rounded-lg overflow-hidden shadow-lg h-64">
                    <!-- Add your map implementation here -->
                    <div style="width: 100%"><iframe width="100%" height="300" 
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                     src="https://maps.google.com/maps?width=100%25&amp;height=300&amp;hl=en&amp;q=tps%20moshi+
                     (TPS%20Moshi)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                    </iframe></div>
                    <div id="map" class="w-full h-full"></div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white rounded-lg p-8 shadow-lg">
                <h2 class="text-2xl font-semibold mb-6 text-blue-800">Send us a Message</h2>
                
                @if(session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-800 rounded-lg p-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-800 rounded-lg p-4">
                        <ul class="list-disc pl-4">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        >
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transform hover:scale-105 transition-all duration-300 flex items-center justify-center space-x-2"
                    >
                        <span>Send Message</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function initMap() {
        const location = { lat: -3.35, lng: 37.34 }; // Moshi coordinates
        const map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: location,
        });

        new google.maps.Marker({
            position: location,
            map: map,
            title: 'Tanzania Police School Moshi'
        });
    }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&callback=initMap">
</script>
@endpush
@endsection