@extends('layouts.app')

@section('title', $internship['title'] . ' - Application')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 py-12 px-4">
    <div class="container mx-auto max-w-2xl">
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">
                Apply for {{ $internship['title'] }}
            </h1>

            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-700 mb-4">Internship Details</h2>
                <div class="bg-blue-50 p-4 rounded-lg">
                    <p><strong>Department:</strong> {{ $internship['department'] }}</p>
                    <p><strong>Duration:</strong> {{ $internship['duration'] }}</p>
                </div>
            </div>

            <form action="{{ route('internships.submit') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="internship_id" value="{{ $internship['id'] }}">

                <div>
                    <label for="full_name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                    <input 
                        type="text" 
                        id="full_name" 
                        name="full_name" 
                        required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div>
                    <label for="resume" class="block text-gray-700 font-medium mb-2">Upload Resume</label>
                    <input 
                        type="file" 
                        id="resume" 
                        name="resume" 
                        required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                </div>

                <div>
                    <label for="motivation" class="block text-gray-700 font-medium mb-2">Why are you interested in this internship?</label>
                    <textarea 
                        id="motivation" 
                        name="motivation" 
                        rows="4" 
                        required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    ></textarea>
                </div>

                <button 
                    type="submit" 
                    class="w-full bg-blue-500 text-white py-3 rounded-lg hover:bg-blue-600 transition-colors"
                >
                    Submit Application
                </button>
            </form>
        </div>
    </div>
</div>
@endsection