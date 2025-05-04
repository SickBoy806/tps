@extends('layouts.app')

@section('title', 'Mission, Vision & Values')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Law Enforcement Training Programs</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .training-header {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-top: 5px;
        }

        .stat-section {
            background-color: white;
            padding: 3rem 0;
        }

        .stat-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            text-align: center;
        }

        .stat-item {
            background-color: #f8fafc;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-10px);
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: bold;
            color: #1e3c72;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #4a5568;
            font-size: 1.1rem;
        }

        .course-section-header {
            text-align: center;
            padding: 2rem 0;
            background-color: #f4f5f7;
        }

        .category-header {
            background: linear-gradient(135deg, #2a5298, #1e3c72);
            color: white;
            padding: 1.5rem;
            text-align: center;
            border-radius: 8px 8px 0 0;
            margin-top: 3rem;
        }

        .main-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .training-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .training-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            height: 450px;
            transition: transform 0.3s ease;
        }

        .training-card:hover {
            transform: translateY(-10px);
        }

        .media-container {
            position: relative;
            height: 250px;
            overflow: hidden;
            background-color: #000;
        }

        .media-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .media-placeholder {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .training-card:hover .media-placeholder {
            transform: scale(1.1);
        }

        .course-details {
            padding: 1rem;
        }

        .course-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #1e3c72;
            margin-bottom: 0.5rem;
        }

        .course-description {
            color: #4a5568;
            margin-bottom: 1rem;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 1rem;
            background-color: #f8fafc;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .course-duration, .course-level {
            font-size: 0.875rem;
            color: #718096;
        }

        .academic-card {
            background-color: #f0f4f8;
            border-left: 4px solid #1e3c72;
        }

        @media only screen and (max-width: 767px) {
            .training-header {
                padding: 2rem 1rem;
                margin-top: 20px;
            }
            
            .training-header h1 {
                font-size: 1.75rem;
            }
            
            .training-header p {
                font-size: 1rem;
            }
            
            .stat-container {
                grid-template-columns: 1fr;
                gap: 1rem;
                padding: 0 1rem;
            }
            
            .stat-item {
                padding: 1.5rem;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
            
            .course-section-header h2 {
                font-size: 1.75rem;
            }
            
            .main-content {
                padding: 0 1rem;
                margin: 1rem auto;
            }
            
            .training-grid {
                grid-template-columns: 1fr;
            }
            
            .training-card {
                height: auto;
                min-height: 400px;
            }
            
            .media-container {
                height: 200px;
            }
            
            .course-title {
                font-size: 1.1rem;
            }
            
            .course-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.25rem;
            }
        }

        @media only screen and (max-width: 374px) {
            .training-header h1 {
                font-size: 1.5rem;
            }
            
            .stat-number {
                font-size: 2rem;
            }
            
            .media-container {
                height: 180px;
            }
            
            .training-card {
                min-height: 380px;
            }
        }

        @media only screen and (min-width: 375px) and (max-width: 480px) {
            .training-card {
                min-height: 390px;
            }
        }

        @media only screen and (min-width: 481px) and (max-width: 767px) {
            .stat-container {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .training-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            }
        }
    </style>
</head>
<body>
    <header class="training-header">
        <h1 class="text-4xl font-bold mb-4">Comprehensive Law Enforcement Training</h1>
        <p class="text-xl">Empowering Officers Through Advanced Education</p>
    </header>

    <section class="stat-section">
        <div class="stat-container">
            <div class="stat-item">
                <div class="stat-number">6+</div>
                <div class="stat-label">Specialized Programs</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">1000+</div>
                <div class="stat-label">Trained Officers</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">95%</div>
                <div class="stat-label">Success Rate</div>
            </div>
        </div>
    </section>

    <!-- Indoor Training Section -->
    <section id="indoor-training">
        <div class="category-header">
            <h2 class="text-3xl font-bold">Indoor Training Programs</h2>
            <p class="text-lg mt-2">Academic courses and classroom-based training</p>
        </div>
        
        <!-- TPS Academic Section -->
        <div class="course-section-header">
            <h3 class="text-2xl font-bold text-gray-800">TPS Academic Courses</h3>
            <p class="text-gray-600 mt-2">Higher education programs for law enforcement professionals</p>
        </div>
        <main class="main-content">
            <div class="training-grid" id="academicGrid">
                <!-- Academic Courses will be inserted here -->
            </div>
        </main>
        
        <!-- Other Indoor Courses -->
        <div class="course-section-header">
            <h3 class="text-2xl font-bold text-gray-800">Classroom-Based Training</h3>
            <p class="text-gray-600 mt-2">Theory, investigation and specialized knowledge</p>
        </div>
        <main class="main-content">
            <div class="training-grid" id="indoorGrid">
                <!-- Indoor Courses will be inserted here -->
            </div>
        </main>
    </section>

    <!-- Outdoor Training Section -->
    <section id="outdoor-training">
        <div class="category-header">
            <h2 class="text-3xl font-bold">Outdoor Training Programs</h2>
            <p class="text-lg mt-2">Field exercises and practical application training</p>
        </div>
        <main class="main-content">
            <div class="training-grid" id="outdoorGrid">
                <!-- Outdoor Courses will be inserted here -->
            </div>
        </main>
    </section>

    <script>
        // Course data and creation function
        const academicCourses = [
            {
                title: 'Bachelor of Science in Security and Strategic Studies',
                description: 'Comprehensive foundation in security principles, strategic planning, and threat assessment.',
                duration: '4 Years',
                level: 'Undergraduate',
                mediaType: 'video',
                mediaSource: '/assets/images/motions/strat.mp4'
            },
            {
                title: 'Bachelor of Science in Information Technology',
                description: 'Technical training in IT systems, networking, and software applications relevant to law enforcement.',
                duration: '4 Years',
                level: 'Undergraduate',
                mediaType: 'video',
                mediaSource: '/assets/images/motions/p360.mp4'
            },
            {
                title: 'Bachelor of Science in Cyber Security',
                description: 'Focused curriculum on digital forensics, cybercrime investigation, and information security.',
                duration: '4 Years',
                level: 'Undergraduate',
                mediaType: 'video',
                mediaSource: '/assets/images/motions/videoblocks.mp4'
            },
            {
                title: 'Bachelor Degree in Records and Information Management',
                description: 'Specialized training in managing sensitive data, documentation, and information systems.',
                duration: '4 Years',
                level: 'Undergraduate',
                mediaType: 'video',
                mediaSource: '/assets/images/motions/records.mp4'
            },
            {
                title: 'Diploma in Information Technology',
                description: 'Concentrated technical training in IT fundamentals for law enforcement applications.',
                duration: '2 Years',
                level: 'Diploma',
                mediaType: 'video',
                mediaSource: '/assets/images/motions/p1.mp4'
            },
            {
                title: 'Master of Science in Security and Strategic Studies',
                description: 'Advanced research and analysis in national security, strategic planning, and policy development.',
                duration: '2 Years',
                level: 'Graduate',
                mediaType: 'video',
                mediaSource: '/assets/images/motions/ulinzi.mp4'
            },
            {
                title: 'Master of Science in Cyber Security',
                description: 'Advanced study of cyber threats, incident response, and digital security architecture.',
                duration: '2 Years',
                level: 'Graduate',
                mediaType: 'video',
                mediaSource: '/assets/images/motions/mp60.mp4'
            }
        ];

        const indoorCourses = [
            {
                title: 'Forensic Investigation Mastery',
                description: 'Comprehensive forensic techniques and crime scene analysis.',
                duration: '8 Weeks',
                level: 'Specialized',
                mediaType: 'image',
                mediaSource: '/assets/images/driving/traff/gr1.jpg'
            },
            {
                title: 'Leadership and Management',
                description: 'Strategic leadership skills for law enforcement supervisors and managers.',
                duration: '12 Weeks',
                level: 'Executive',
                mediaType: 'image',
                mediaSource: '/assets/images/driving/traff/lm.jpeg'
            },
            {
                title: 'Strategic Command Course',
                description: 'Advanced leadership and decision-making for senior officers.',
                duration: '10 Weeks',
                level: 'Senior',
                mediaType: 'image',
                mediaSource: '/assets/images/driving/traff/gic.jpeg'
            },
            {
                title: 'Cross-Cultural Conflict Resolution',
                description: 'Advanced communication and mediation skills for international missions.',
                duration: '6 Weeks',
                level: 'Specialized',
                mediaType: 'image',
                mediaSource: '/assets/images/driving/traff/com.jpg'
            }
        ];

        const outdoorCourses = [
            {
                title: 'Advanced Tactical Operations',
                description: 'Specialized training in high-risk scenario management and advanced tactical response.',
                duration: '6 Weeks',
                level: 'Advanced',
                mediaType: 'image',
                mediaSource: '/assets/images/driving/traff/Operations.jpg'
            },
            {
                title: 'Physical and Tactical Fundamentals',
                description: 'Physical fitness, self-defense, and basic tactical skills.',
                duration: '8 Weeks',
                level: 'Foundation',
                mediaType: 'image',
                mediaSource: '/assets/images/driving/traff/proficiency.png'
            },
            {
                title: 'Basic Law Enforcement Academy',
                description: 'Comprehensive foundational training for new law enforcement recruits.',
                duration: '16 Weeks',
                level: 'Entry',
                mediaType: 'image',
                mediaSource: '/assets/images/driving/traff/laws.jpg'
            },
            {
                title: 'UN Peacekeeping Mission Readiness',
                description: 'Field training and practical exercises for international peacekeeping missions.',
                duration: '10 Weeks',
                level: 'International',
                mediaType: 'image',
                mediaSource: '/assets/images/driving/traff/d8.jpeg'
            }
        ];

        function createCourseCards(courses, gridId, isAcademic = false) {
            const grid = document.getElementById(gridId);
            
            courses.forEach(course => {
                const card = document.createElement('div');
                card.className = `training-card ${isAcademic ? 'academic-card' : ''}`;
                
                // Create media container based on media type
                let mediaHTML = '';
                if (course.mediaType === 'video') {
                    mediaHTML = `
                        <div class="media-container">
                            <video class="media-placeholder" poster="/api/placeholder/400/250" muted autoplay loop playsinline>
                                <source src="${course.mediaSource}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    `;
                } else {
                    mediaHTML = `
                        <div class="media-container">
                            <img src="${course.mediaSource}" alt="${course.title}" class="media-placeholder">
                        </div>
                    `;
                }
                
                card.innerHTML = `
                    ${mediaHTML}
                    <div class="course-details">
                        <h3 class="course-title">${course.title}</h3>
                        <p class="course-description">${course.description}</p>
                    </div>
                    <div class="course-meta">
                        <span class="course-duration">Duration: ${course.duration}</span>
                        <span class="course-level">Level: ${course.level}</span>
                    </div>
                `;
                
                grid.appendChild(card);
            });
        }

        // Ensure videos play automatically and continuously
        function initializeVideos() {
            // Check if IntersectionObserver is supported
            if ('IntersectionObserver' in window) {
                const videoObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        const video = entry.target;
                        
                        // Play video when it comes into view
                        if (entry.isIntersecting) {
                            // Make sure video is ready before playing
                            if (video.readyState >= 2) {
                                video.play();
                            } else {
                                video.addEventListener('canplay', () => {
                                    video.play();
                                }, { once: true });
                            }
                        }
                    });
                }, { threshold: 0.2 });  // 20% of the video must be visible
                
                // Observe all videos
                document.querySelectorAll('.media-container video').forEach(video => {
                    videoObserver.observe(video);
                    
                    // Ensure looping works properly
                    video.addEventListener('ended', function() {
                        this.currentTime = 0;
                        this.play();
                    });
                });
            } else {
                // Fallback for browsers without IntersectionObserver
                document.querySelectorAll('.media-container video').forEach(video => {
                    video.play();
                    
                    video.addEventListener('ended', function() {
                        this.currentTime = 0;
                        this.play();
                    });
                });
            }
        }

        // Restart videos when they become visible after scrolling
        function handleScroll() {
            const videos = document.querySelectorAll('.media-container video');
            videos.forEach(video => {
                const rect = video.getBoundingClientRect();
                const isVisible = 
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth);
                
                if (isVisible && video.paused) {
                    video.play();
                }
            });
        }

        // Populate course grids and initialize video autoplay
        document.addEventListener('DOMContentLoaded', () => {
            createCourseCards(academicCourses, 'academicGrid', true);
            createCourseCards(indoorCourses, 'indoorGrid');
            createCourseCards(outdoorCourses, 'outdoorGrid');
            
            // Initialize videos after a short delay to ensure everything is loaded
            setTimeout(() => {
                initializeVideos();
            }, 500);
            
            // Add scroll listener to handle videos coming into view
            window.addEventListener('scroll', handleScroll, { passive: true });
        });
    </script>
</body>
</html>
@endsection