@extends('layouts.app')

@section('title', 'Sports')

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
    margin-top: 40px; /* Adjust this value based on your navbar height */
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
        }

        .course-section-header {
            text-align: center;
            padding: 2rem 0;
            background-color: #f4f5f7;
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
        }

        .course-duration, .course-level {
            font-size: 0.875rem;
            color: #718096;
        }

        /* ... (rest of the previous CSS remains the same) */
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

    <section id="proficiency-courses">
        <div class="course-section-header">
            <h2 class="text-3xl font-bold text-gray-800">Proficiency Courses</h2>
            <p class="text-gray-600 mt-2">Advanced skills and specialized training</p>
        </div>
        <main class="main-content">
            <div class="training-grid" id="proficiencyGrid">
                <!-- Proficiency Courses will be inserted here -->
            </div>
        </main>
    </section>

    <section id="promotion-courses">
        <div class="course-section-header">
            <h2 class="text-3xl font-bold text-gray-800">Promotion Preparation Courses</h2>
            <p class="text-gray-600 mt-2">Career advancement and leadership development</p>
        </div>
        <main class="main-content">
            <div class="training-grid" id="promotionGrid">
                <!-- Promotion Courses will be inserted here -->
            </div>
        </main>
    </section>

    <section id="basic-recruit-courses">
        <div class="course-section-header">
            <h2 class="text-3xl font-bold text-gray-800">Basic Recruit Training</h2>
            <p class="text-gray-600 mt-2">Foundation of law enforcement skills</p>
        </div>
        <main class="main-content">
            <div class="training-grid" id="recruitGrid">
                <!-- Basic Recruit Courses will be inserted here -->
            </div>
        </main>
    </section>

    <section id="un-peacekeeping-courses">
        <div class="course-section-header">
            <h2 class="text-3xl font-bold text-gray-800">UN Peacekeeping Preparation</h2>
            <p class="text-gray-600 mt-2">International mission readiness training</p>
        </div>
        <main class="main-content">
            <div class="training-grid" id="peacekeepingGrid">
                <!-- UN Peacekeeping Courses will be inserted here -->
            </div>
        </main>
    </section>

    <script>
        // Course data and creation function remain the same as in the previous version
        const courseData = {
            proficiency: [
                {
                    title: 'Advanced Tactical Operations',
                    description: 'Specialized training in high-risk scenario management and advanced tactical response.',
                    duration: '6 Weeks',
                    level: 'Advanced',
                    image: '/api/placeholder/400/250'
                },
                {
                    title: 'Forensic Investigation Mastery',
                    description: 'Comprehensive forensic techniques and crime scene analysis.',
                    duration: '8 Weeks',
                    level: 'Specialized',
                    image: '/api/placeholder/400/250'
                }
            ],
            promotion: [
                {
                    title: 'Leadership and Management',
                    description: 'Strategic leadership skills for law enforcement supervisors and managers.',
                    duration: '12 Weeks',
                    level: 'Executive',
                    image: '/api/placeholder/400/250'
                },
                {
                    title: 'Strategic Command Course',
                    description: 'Advanced leadership and decision-making for senior officers.',
                    duration: '10 Weeks',
                    level: 'Senior',
                    image: '/api/placeholder/400/250'
                }
            ],
            recruit: [
                {
                    title: 'Basic Law Enforcement Academy',
                    description: 'Comprehensive foundational training for new law enforcement recruits.',
                    duration: '16 Weeks',
                    level: 'Entry',
                    image: '/api/placeholder/400/250'
                },
                {
                    title: 'Physical and Tactical Fundamentals',
                    description: 'Physical fitness, self-defense, and basic tactical skills.',
                    duration: '8 Weeks',
                    level: 'Foundation',
                    image: '/api/placeholder/400/250'
                }
            ],
            peacekeeping: [
                {
                    title: 'UN Peacekeeping Mission Readiness',
                    description: 'Comprehensive preparation for international peacekeeping missions.',
                    duration: '10 Weeks',
                    level: 'International',
                    image: '/api/placeholder/400/250'
                },
                {
                    title: 'Cross-Cultural Conflict Resolution',
                    description: 'Advanced communication and mediation skills for international missions.',
                    duration: '6 Weeks',
                    level: 'Specialized',
                    image: '/api/placeholder/400/250'
                }
            ]
        };

        function createCourseCards(courses, gridId) {
            const grid = document.getElementById(gridId);
            
            courses.forEach(course => {
                const card = document.createElement('div');
                card.className = 'training-card';
                
                card.innerHTML = `
                    <div class="media-container">
                        <img src="${course.image}" alt="${course.title}" class="media-placeholder">
                    </div>
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

        // Populate course grids
        document.addEventListener('DOMContentLoaded', () => {
            createCourseCards(courseData.proficiency, 'proficiencyGrid');
            createCourseCards(courseData.promotion, 'promotionGrid');
            createCourseCards(courseData.recruit, 'recruitGrid');
            createCourseCards(courseData.peacekeeping, 'peacekeepingGrid');
        });
    </script>
</body>
</html>
@endsection