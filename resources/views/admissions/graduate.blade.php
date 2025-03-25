@extends('layouts.app')

@section('title', 'graduate')
@section('meta_description', 'Explore diverse')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graduate Admissions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="min-h-screen bg-gray-50">
    
    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-blue-900 to-blue-700 text-white pt-24 pb-16 text-center">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Advance Your Expertise</h1>
            <p class="text-xl max-w-2xl mx-auto mb-8">
                Explore advanced graduate programs designed to elevate your professional capabilities and research skills.
            </p>
            <a href="#courses" class="bg-yellow-400 text-blue-900 px-8 py-3 rounded-full font-bold hover:bg-yellow-500 transition">
                Explore Graduate Programs
            </a>
        </div>
    </header>

    <!-- Courses Section -->
    <section id="courses" class="container mx-auto px-4 py-16">
        <h2 class="text-3xl font-bold text-center mb-12 text-blue-900">Our Graduate Programs</h2>
        
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($courses as $course)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition hover:scale-105">
                <div class="bg-blue-900 text-white p-6 text-center">
                    <div class="text-6xl mb-4">{{ $course['icon'] }}</div>
                    <h3 class="text-xl font-bold">{{ $course['title'] }}</h3>
                    <span class="text-sm bg-blue-700 px-3 py-1 rounded-full">
                        {{ $course['duration'] }}
                    </span>
                </div>
                
                <div class="p-6">
                    <p class="mb-4 text-gray-600">{{ $course['description'] }}</p>
                    
                    <ul class="mb-6 space-y-2">
                        @foreach($course['features'] as $feature)
                        <li class="flex items-center text-blue-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            {{ $feature }}
                        </li>
                        @endforeach
                    </ul>
                    
                    <button 
                        onclick="openModal('{{ $course['id'] }}', '{{ $course['title'] }}')"
                        class="w-full bg-blue-100 text-blue-900 py-3 rounded-lg hover:bg-blue-200 transition flex items-center justify-center"
                    >
                        View Details & Apply
                    </button>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-blue-900">Frequently Asked Questions</h2>
            
            <div class="max-w-2xl mx-auto space-y-4">
                @foreach($faqItems as $index => $faq)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div 
                        onclick="toggleFAQ({{ $index }})"
                        class="flex justify-between items-center p-6 cursor-pointer hover:bg-gray-50"
                    >
                        <h3 class="font-semibold text-blue-900">{{ $faq['question'] }}</h3>
                        <span class="text-blue-500" id="faq-toggle-{{ $index }}">+</span>
                    </div>
                    
                    <div 
                        id="faq-answer-{{ $index }}" 
                        class="p-6 pt-0 text-gray-600 hidden"
                    >
                        {{ $faq['answer'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Application Modal -->
    <div 
        id="applicationModal" 
        class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 hidden"
    >
        <div class="bg-white rounded-lg max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <div class="bg-blue-900 text-white p-6 flex justify-between items-center">
                <h2 id="modalTitle" class="text-2xl font-bold"></h2>
                <button 
                    onclick="closeModal()"
                    class="text-3xl hover:text-gray-300"
                >
                    &times;
                </button>
            </div>
            
            <form id="applicationForm" class="p-8">
                @csrf
                <div class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-2">Full Name</label>
                            <input 
                                type="text" 
                                name="fullName"
                                class="w-full border rounded p-2" 
                                required 
                            />
                        </div>
                        <div>
                            <label class="block mb-2">Email</label>
                            <input 
                                type="email" 
                                name="email"
                                class="w-full border rounded p-2" 
                                required 
                            />
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2">Phone Number</label>
                        <input 
                            type="tel" 
                            name="phone"
                            class="w-full border rounded p-2" 
                            required 
                        />
                    </div>

                    <input 
                        type="hidden" 
                        name="course" 
                        id="selectedCourse"
                    />

                    <button 
                        type="submit"
                        class="w-full bg-blue-900 text-white py-3 rounded-lg hover:bg-blue-800 transition"
                    >
                        Submit Graduate Application
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Back to Top Button -->
    <button 
        onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
        class="fixed bottom-8 right-8 bg-blue-900 text-white p-4 rounded-full shadow-lg hover:bg-blue-800 transition"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>

    <script>
        function openModal(courseId, courseTitle) {
            document.getElementById('applicationModal').classList.remove('hidden');
            document.getElementById('applicationModal').classList.add('flex');
            document.getElementById('modalTitle').textContent = courseTitle + ' Application';
            document.getElementById('selectedCourse').value = courseTitle;
        }

        function closeModal() {
            document.getElementById('applicationModal').classList.remove('flex');
            document.getElementById('applicationModal').classList.add('hidden');
        }

        function toggleFAQ(index) {
            const answer = document.getElementById(`faq-answer-${index}`);
            const toggle = document.getElementById(`faq-toggle-${index}`);
            
            if (answer.classList.contains('hidden')) {
                answer.classList.remove('hidden');
                toggle.textContent = '−';
            } else {
                answer.classList.add('hidden');
                toggle.textContent = '+';
            }
        }

        document.getElementById('applicationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            fetch('{{ route('graduate.apply') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                closeModal();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    </script>
</body>
</html>
@endsection