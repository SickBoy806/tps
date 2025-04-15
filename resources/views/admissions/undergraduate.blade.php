@extends('layouts.app')

@section('title', 'Undergraduate Programes')
@section('content')

<div class="relative bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/undergraduate-hero.jpg') }}');">
    <div class="container mx-auto px-6 py-20">
        <div class="max-w-4xl">
            <h1 class="text-white text-4xl md:text-5xl font-bold mb-4">Preparing Undergraduates for Success</h1>
            <p class="text-white text-xl mb-8">Discover comprehensive programes designed to nurture academic excellence and foster career readiness.</p>
            <a href="/apply" class="inline-block bg-transparent hover:bg-white/10 text-white border border-white font-semibold px-6 py-3 rounded-lg transition duration-300">Apply Now</a>
        </div>
    </div>
</div>
</div>
        </div>
        
        <br><br>

<div class="container mx-auto px-6 py-5">
    <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Featured Programes</h2>
        <p class="text-xl text-gray-300">Explore our diverse undergraduate offerings</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-blue-900/80 rounded-xl overflow-hidden shadow-xl transition-transform duration-300 hover:transform hover:scale-105">
            <video src="{{ asset('assets/images/motions/strat.mp4') }}" class="w-full h-48 object-cover" controls autoplay loop muted>
            Your browser does not support the video tag.
          </video>
            <div class="p-6">
                <h4 class="text-xl font-bold text-white mb-3">Bachelor of Science in Security and Strategic Studies</h4>
                <p class="text-gray-300 mb-4">The Bachelor of science in security and strategic studies programme is developed to provide in depth and unique insights into the changing nature and fundamental challenges of contemporary security issues from a distinctly strategic perspective. Students will be taught by prominent specialists in the field of strategic and security issues, in both theory and practice</p>
                <a href="https://iaa.ac.tz/programmes/eyJpdiI6IlN4RjF6UllLUEVXblFJWldIS3lIS2c9PSIsInZhbHVlIjoicVZBMzAyaXIwKzBNQU91QWI2V1lxZz09IiwibWFjIjoiOGY4OGM0MzQ5ODhhOWJkYWQ2MTE0OGJmN2NhNmFiZWViYzI5NDhhYzJkNGQ3NDQ3ZGVhMTMzZmE3Zjg0YzZiYiIsInRhZyI6IiJ9" target="_blank" rel="noopener noreferrer" class="inline-block text-yellow-400 hover:text-yellow-300 border border-yellow-400 hover:border-yellow-300 text-sm font-semibold px-4 py-2 rounded-lg transition duration-300">View Programe</a>
            </div> 
        </div>

        <div class="bg-blue-900/80 rounded-xl overflow-hidden shadow-xl transition-transform duration-300 hover:transform hover:scale-105">
            <video src="{{ asset('assets/images/motions/P360.mp4') }}" class="w-full h-48 object-cover" controls autoplay loop muted>
            Your browser does not support the video tag.
          </video>
            <div class="p-6">
                <h4 class="text-xl font-bold text-white mb-3">Bachelor of Science in Information Technology</h4>
                <p class="text-gray-300 mb-4">The Bachelor of science in security and strategic studies programme is developed to provide in depth and unique insights into the changing nature and fundamental challenges of contemporary security issues from a distinctly strategic perspective. Students will be taught by prominent specialists in the field of strategic and security issues, in both theory and practice</p>
                <a href="https://iaa.ac.tz/programmes/eyJpdiI6IlBrMDMrUDhkd2k2NUorOVNlZnhyK2c9PSIsInZhbHVlIjoiekQwUE02QzZYeTBIekpqakltb01nQT09IiwibWFjIjoiMzA5YTFkM2U2ZjkwMjI3NzVjZGEwNjMzODFmNmIxZGIyNGFhYzdmODlmNGE3ZDY3NWQwOTY0MmE5YTY5ZTdhNiIsInRhZyI6IiJ9" target="_blank" rel="noopener noreferrer" class="inline-block text-yellow-400 hover:text-yellow-300 border border-yellow-400 hover:border-yellow-300 text-sm font-semibold px-4 py-2 rounded-lg transition duration-300">View Programe</a>
            </div> 
        </div>


        <div class="bg-blue-900/80 rounded-xl overflow-hidden shadow-xl transition-transform duration-300 hover:transform hover:scale-105">
        <video src="{{ asset('assets/images/motions/videoblocks.mp4') }}" class="w-full h-48 object-cover" controls autoplay loop muted>
            Your browser does not support the video tag.
          </video>
    <div class="p-6">
        <h4 class="text-xl font-bold text-white mb-3">Bachelor of Science in Cyber Security</h4>
        <p class="text-gray-300 mb-4">Cyber security degree combines three sought after streams of computing: networking, cyber security & digital forensics. It gives you a thorough understanding of socio-technical systems & skills to prevent or respond to cyber security incidents.
        And develops your ability to critically analyse & apply digital solutions to security examination and digital forensic investigations.</p>
        <a href="https://iaa.ac.tz/programmes/eyJpdiI6IjlQM29kcTFBaWFLUGk0OHh3aGhpQmc9PSIsInZhbHVlIjoiOHFtTUQzbWVITSs4alhXNURkeEFwdz09IiwibWFjIjoiZWQ2OTRjYTcwOTZiMjJlMmU5OWMyNTlkNzFjYjIxMzUyZTg0MTU5MzBhMTkxNTg2ZTdiYThkYzEyNjQyMGZmYyIsInRhZyI6IiJ9" target="_blank" rel="noopener noreferrer" class="inline-block text-yellow-400 hover:text-yellow-300 border border-yellow-400 hover:border-yellow-300 text-sm font-semibold px-4 py-2 rounded-lg transition duration-300">View Programe</a>
    </div>
</div>

<div class="bg-blue-900/80 rounded-xl overflow-hidden shadow-xl transition-transform duration-300 hover:transform hover:scale-105">
        <video src="{{ asset('assets/images/motions/records.mp4') }}" class="w-full h-48 object-cover" controls autoplay loop muted>
            Your browser does not support the video tag.
          </video>
    <div class="p-6">
        <h4 class="text-xl font-bold text-white mb-3">Bachelor Degree in Records and Information Management</h4>
        <p class="text-gray-300 mb-4">Cyber security degree combines three sought after streams of computing: networking, cyber security & digital forensics. It gives you a thorough understanding of socio-technical systems & skills to prevent or respond to cyber security incidents.
        And develops your ability to critically analyse & apply digital solutions to security examination and digital forensic investigations.</p>
        <a href="https://iaa.ac.tz/programmes/eyJpdiI6IkU0Z3BhZmlHTi9zTUhHOW4ydWRERnc9PSIsInZhbHVlIjoiaDRqNnJYalFRRzRGb0hSSzFJdGpoQT09IiwibWFjIjoiYTVjZDcyMTdiYzNlNzZjZmY4ZWY3MzNjNjlkNjhjMWIzYzQ1N2M3MTQyYTM2Y2VhNDE4ODE0YjJiOWQ3ZDQ3NSIsInRhZyI6IiJ9" class="inline-block text-yellow-400 hover:text-yellow-300 border border-yellow-400 hover:border-yellow-300 text-sm font-semibold px-4 py-2 rounded-lg transition duration-300">View Programe</a>
    </div>
</div>


        
        <div class="bg-blue-900/80 rounded-xl overflow-hidden shadow-xl transition-transform duration-300 hover:transform hover:scale-105">
             <video src="{{ asset('assets/images/motions/P1.mp4') }}" class="w-full h-48 object-cover" controls autoplay loop muted>
            Your browser does not support the video tag.
          </video>
            <div class="p-6">
                <h4 class="text-xl font-bold text-white mb-3">Diploma in Information Technology</h4>
                <p class="text-gray-300 mb-4">With the ongoing rapid changes in science and technology, the transformation in accounting practices is inevitable. The development in Information Technology has brought big changes in the way traditional accounting has been practiced.
              IT networks and laptop structures have shortened the time required to perform accountant’s functions. This evolving change in technology has highly affected the functions of accountants. </p>
                <a href="https://iaa.ac.tz/programmes/eyJpdiI6Im8wbmtjTHA5VjJ1dTI4Y0J3SHJCNnc9PSIsInZhbHVlIjoiZzduZ290bmJyVmhiV2tyRjhld2JzZz09IiwibWFjIjoiMDBhY2E2NTYyM2NhYzdkY2Q3MTU0ZTUzMmQzOTQ4MDQzNGYxYjM0ZWMzODcxY2U5ZTFjYTI4MDg0ZDUzNmU5MiIsInRhZyI6IiJ9" class="inline-block text-yellow-400 hover:text-yellow-300 border border-yellow-400 hover:border-yellow-300 text-sm font-semibold px-4 py-2 rounded-lg transition duration-300">View Programe</a>
            </div>
        </div>
</div>


<br><br>
<div class="bg-gradient-to-r from-blue-900 to-blue-700 py-16">
    <div class="container mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Begin Your Journey?</h2>
            <p class="text-xl text-white/80 mb-8">Take the first step toward a transformative undergraduate experience.</p>
            <div class="space-x-4">
                <a href="/apply" class="inline-block bg-yellow-600 hover:bg-yellow-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300">Apply Now</a>
                <a href="/visit" class="inline-block bg-transparent hover:bg-white/10 text-white border border-white font-semibold px-6 py-3 rounded-lg transition duration-300">Schedule a Visit</a>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">What Our Students Say</h2>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-blue-900/50 rounded-xl p-6 shadow-xl">
            <div class="flex items-center mb-6">
                <img src="{{ asset('assets/images/people/emma.jpg') }}" alt="Student" class="w-16 h-16 rounded-full object-cover mr-4">
                <div>
                    <h5 class="text-xl font-bold text-white">Emma Rodriguez</h5>
                    <p class="text-gray-400">Class of 2024</p>
                </div>
            </div>
            <p class="text-gray-300">"The undergraduate research opportunities have been incredible. I've worked alongside professors on meaningful projects since my sophomore year, giving me valuable experience for graduate school."</p>
        </div>
        
        <div class="bg-blue-900/50 rounded-xl p-6 shadow-xl">
            <div class="flex items-center mb-6">
                <img src="{{ asset('assets/images/people/james.jpg') }}" alt="Student" class="w-16 h-16 rounded-full object-cover mr-4">
                <div>
                    <h5 class="text-xl font-bold text-white">James wambura</h5>
                    <p class="text-gray-400">Class of 2023</p>
                </div>
            </div>
            <p class="text-gray-300">"The supportive community and hands-on learning experiences have prepared me for my career in ways I never expected. The faculty truly care about your success and go above and beyond to help."</p>
        </div>
    </div>
</div>
</div>

@endsection