<!-- resources/views/admissions/proficiency-courses.blade.php -->
@extends('layouts.app')

@section('title', 'Proficiency Courses - Tanzania Police School Moshi')

@section('styles')
<style>
    html, body {
        background-color: white !important;
        background: white !important;
    }
    
    .course-card {
        transition: all 0.3s ease;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        background: #fff;
    }
    
    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
    
    .course-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
        color: #1a56db;
    }
    
    .course-header {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        color: white;
        padding: 15px;
        text-align: center;
        font-weight: bold;
    }
    
    .course-content {
        padding: 20px;
    }
    
    .fade-in {
        animation: fadeIn 0.6s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .course-detail {
        display: flex;
        margin-bottom: 10px;
        align-items: center;
    }
    
    .detail-icon {
        margin-right: 10px;
        color: #1a56db;
        width: 20px;
    }
    
    .course-summary {
        margin-top: 15px;
        font-size: 0.9rem;
        color: #4b5563;
        text-align: justify;
    }

    /* Override any parent container backgrounds */
    .container, .content-wrapper, main, #app, .main-content, .page-content {
        background-color: white !important;
        background: white !important;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto px-4 py-8" style="background-color: white !important;">
    <h1 class="text-3xl font-bold mb-2 text-center fade-in">Tanzania Police School Moshi</h1>
    <h2 class="text-xl text-gray-600 mb-8 text-center fade-in">Proficiency Courses</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="coursesGrid">
        @foreach($courses as $index => $course)
        <div class="course-card fade-in" style="animation-delay: {{ $index * 0.1 }}s">
            <div class="course-header">
                <span class="text-sm bg-blue-900 px-2 py-1 rounded-full">{{ $loop->iteration }}</span>
            </div>
            <div class="course-content">
                <div class="text-center">
                    @switch($course['name'])
                        @case('CID')
                            <i class="fas fa-search course-icon fa-fade"></i>
                            @break
                        @case('Stock theft prevention')
                            <i class="fas fa-shield-alt course-icon fa-beat"></i>
                            @break
                        @case('CRO')
                            <i class="fas fa-database course-icon fa-pulse"></i>
                            @break
                        @case('Armory keeping')
                            <i class="fas fa-shield-virus course-icon fa-flip"></i>
                            @break
                        @case('Traffic control and management')
                            <i class="fas fa-traffic-light course-icon fa-bounce"></i>
                            @break
                        @case('Peace keeping operation')
                            <i class="fas fa-dove course-icon fa-fade"></i>
                            @break
                        @case('Self defenses')
                            <i class="fas fa-fist-raised course-icon fa-shake"></i>
                            @break
                        @case('Field Craft')
                            <i class="fas fa-mountain course-icon fa-flip"></i>
                            @break
                        @case('Dog and Horse course')
                            <i class="fas fa-paw course-icon fa-bounce"></i>
                            @break
                        @default
                            <i class="fas fa-graduation-cap course-icon"></i>
                    @endswitch
                </div>
                
                <h3 class="text-xl font-bold mb-4 text-center">{{ $course['name'] }}</h3>
                
                <div class="course-detail">
                    <i class="fas fa-clock detail-icon"></i>
                    <span>{{ $course['mode'] }}</span>
                </div>
                
                <div class="course-detail">
                    <i class="fas fa-calendar-alt detail-icon"></i>
                    <span>{{ $course['duration'] }}</span>
                </div>
                
                <div class="course-summary">
                    @switch($course['name'])
                        @case('CID')
                            Training in criminal investigation techniques, evidence collection, interrogation methods, and case management for effective criminal investigation.
                            @break
                        @case('Stock theft prevention')
                            Specialized training in livestock identification, rural crime prevention, community engagement, and investigation of stock theft cases.
                            @break
                        @case('CRO')
                            Criminal Records Office training focusing on database management, record keeping, information security, and criminal data analysis.
                            @break
                        @case('Armory keeping')
                            Course covering weapons inventory management, storage security, maintenance procedures, and regulatory compliance for police armories.
                            @break
                        @case('Traffic control and management')
                            Training in traffic laws, accident investigation, crowd control techniques, and safe management of vehicle and pedestrian movement.
                            @break
                        @case('Peace keeping operation')
                            International standards training for conflict resolution, civilian protection, cross-cultural communication, and operational protocols in peace missions.
                            @break
                        @case('Self defenses')
                            Physical and tactical training on defensive techniques, threat assessment, non-lethal control methods, and officer safety procedures.
                            @break
                        @case('Field Craft')
                            Training in survival skills, terrain navigation, outdoor operations, concealment techniques, and tactical field operations.
                            @break
                        @case('Dog and Horse course')
                            Specialized training in handling, care and deployment of police service animals for patrol, search and rescue, and crowd control operations.
                            @break
                        @default
                            Comprehensive professional development program designed to enhance specialized skills and knowledge for law enforcement personnel.
                    @endswitch
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set white background with !important to override any other styles
        document.body.style.backgroundColor = "white";
        document.body.style.setProperty('background-color', 'white', 'important');
        document.body.style.setProperty('background', 'white', 'important');
        
        // Add inline style to html element as well
        document.documentElement.style.setProperty('background-color', 'white', 'important');
        document.documentElement.style.setProperty('background', 'white', 'important');
        
        // Remove any overlay or darkening effect that might be present
        const overlays = document.querySelectorAll('.overlay, .darkened-background, .bg-overlay');
        overlays.forEach(overlay => {
            overlay.remove();
        });
        
        // Target common parent containers that might have background colors
        const containers = document.querySelectorAll('.container, .content-wrapper, main, #app, .main-content, .page-content');
        containers.forEach(container => {
            container.style.setProperty('background-color', 'white', 'important');
            container.style.setProperty('background', 'white', 'important');
        });
        
        // Animate cards on scroll
        const observerOptions = {
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.course-card').forEach(card => {
            observer.observe(card);
        });
    });
</script>
@endsection