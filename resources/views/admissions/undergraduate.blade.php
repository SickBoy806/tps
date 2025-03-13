@extends('layouts.app')

@section('title', 'Undergraduate Programs')
@section('content')

<div class="relative bg-cover bg-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/undergraduate-hero.jpg') }}');">
    <div class="container mx-auto px-6 py-20">
        <div class="max-w-4xl">
            <h1 class="text-white text-4xl md:text-5xl font-bold mb-4">Preparing Undergraduates for Success</h1>
            <p class="text-white text-xl mb-8">Discover comprehensive programs designed to nurture academic excellence and foster career readiness.</p>
            <a href="#programs" class="inline-block bg-blue-900 hover:bg-blue-800 text-white font-semibold px-6 py-3 rounded-lg mr-4 transition duration-300">Explore Programs</a>
            <a href="/apply" class="inline-block bg-transparent hover:bg-white/10 text-white border border-white font-semibold px-6 py-3 rounded-lg transition duration-300">Apply Now</a>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-16">
    <div class="text-center max-w-3xl mx-auto mb-16">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Your Undergraduate Journey Starts Here</h2>
        <p class="text-xl text-gray-100">Our undergraduate programs combine academic rigor with hands-on learning experiences, preparing you for success in your chosen field.</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="programs">
        <div class="bg-gradient-to-br from-blue-900 to-blue-800 rounded-xl shadow-xl overflow-hidden">
            <div class="p-8 text-center">
                <i class="fas fa-graduation-cap text-5xl text-white mb-6"></i>
                <h3 class="text-2xl font-bold text-white mb-4">Learn</h3>
                <p class="text-white">Engage with expert faculty in state-of-the-art facilities. Our curriculum emphasizes critical thinking and problem-solving skills essential for today's workforce.</p>
            </div>
            <div class="bg-white p-4 text-center">
                <a href="/programs" class="inline-block text-blue-900 hover:text-blue-800 border border-blue-900 hover:border-blue-800 font-semibold px-4 py-2 rounded-lg transition duration-300">Academic Programs</a>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-yellow-600 to-yellow-500 rounded-xl shadow-xl overflow-hidden">
            <div class="p-8 text-center">
                <i class="fas fa-users text-5xl text-white mb-6"></i>
                <h3 class="text-2xl font-bold text-white mb-4">Connect</h3>
                <p class="text-white">Join a vibrant community of scholars, researchers, and peers. Participate in student organizations, research opportunities, and networking events.</p>
            </div>
            <div class="bg-white p-4 text-center">
                <a href="/student-life" class="inline-block text-yellow-600 hover:text-yellow-700 border border-yellow-600 hover:border-yellow-700 font-semibold px-4 py-2 rounded-lg transition duration-300">Student Life</a>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-blue-700 to-blue-600 rounded-xl shadow-xl overflow-hidden">
            <div class="p-8 text-center">
                <i class="fas fa-rocket text-5xl text-white mb-6"></i>
                <h3 class="text-2xl font-bold text-white mb-4">Succeed</h3>
                <p class="text-white">Access career services, internship placements, and alumni networks. We're committed to your success during your studies and beyond graduation.</p>
            </div>
            <div class="bg-white p-4 text-center">
                <a href="/career" class="inline-block text-blue-700 hover:text-blue-600 border border-blue-700 hover:border-blue-600 font-semibold px-4 py-2 rounded-lg transition duration-300">Career Resources</a>
            </div>
        </div>
    </div>
</div>

<div class="bg-blue-950 py-16">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold text-white mb-6">Why Choose Our Undergraduate Programs?</h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-yellow-500 mt-1 mr-3"></i>
                        <span class="text-gray-200">Expert faculty dedicated to undergraduate teaching excellence</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-yellow-500 mt-1 mr-3"></i>
                        <span class="text-gray-200">Small class sizes and personalized learning experiences</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-yellow-500 mt-1 mr-3"></i>
                        <span class="text-gray-200">Research opportunities starting in your first year</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-yellow-500 mt-1 mr-3"></i>
                        <span class="text-gray-200">Comprehensive support services for academic and personal success</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-yellow-500 mt-1 mr-3"></i>
                        <span class="text-gray-200">Strong industry connections for internships and job placements</span>
                    </li>
                </ul>
                <a href="/about" class="inline-block mt-6 bg-yellow-600 hover:bg-yellow-700 text-white font-semibold px-6 py-3 rounded-lg transition duration-300">Learn More</a>
            </div>
            <div class="aspect-w-16 aspect-h-9 rounded-xl overflow-hidden shadow-xl">
                <iframe src="https://www.youtube.com/embed/YOUR_VIDEO_ID" title="Undergraduate Experience" allowfullscreen class="w-full h-full object-cover"></iframe>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto px-6 py-5">
    <div class="text-center mb-16">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Featured Programs</h2>
        <p class="text-xl text-gray-300">Explore our diverse undergraduate offerings</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-blue-900/80 rounded-xl overflow-hidden shadow-xl transition-transform duration-300 hover:transform hover:scale-105">
            <video src="{{ asset('assets/images/motions/P360.mp4') }}" class="w-full h-48 object-cover" controls autoplay loop muted>
            Your browser does not support the video tag.
          </video>
            <div class="p-6">
                <h4 class="text-xl font-bold text-white mb-3">Bachelor of Science in Security and Strategic Studies</h4>
                <p class="text-gray-300 mb-4">The Bachelor of science in security and strategic studies programme is developed to provide in depth and unique insights into the changing nature and fundamental challenges of contemporary security issues from a distinctly strategic perspective. Students will be taught by prominent specialists in the field of strategic and security issues, in both theory and practice</p>
                <a href="/programs/science" class="inline-block text-yellow-400 hover:text-yellow-300 border border-yellow-400 hover:border-yellow-300 text-sm font-semibold px-4 py-2 rounded-lg transition duration-300">View Programs</a>
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
        <a href="/programs/science" class="inline-block text-yellow-400 hover:text-yellow-300 border border-yellow-400 hover:border-yellow-300 text-sm font-semibold px-4 py-2 rounded-lg transition duration-300">View Programs</a>
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
                <a href="/programs/humanities" class="inline-block text-yellow-400 hover:text-yellow-300 border border-yellow-400 hover:border-yellow-300 text-sm font-semibold px-4 py-2 rounded-lg transition duration-300">View Programs</a>
            </div>
        </div>

    <div class="text-center mt-12">
        <a href="/programs" class="inline-block bg-blue-900 hover:bg-blue-800 text-white font-semibold px-6 py-3 rounded-lg transition duration-300">See All Programs</a>
    </div>
</div>

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

@endsection