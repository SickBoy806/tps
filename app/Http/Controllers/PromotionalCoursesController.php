<?php
// File: app/Http/Controllers/PromotionalCoursesController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromotionalCoursesController extends Controller
{
    /**
     * Display the promotional courses page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Define the courses data
        $courses = [
            [
                'rank' => 'Corporal (CPL)',
                'duration' => '3 Months',
                'summary' => 'First step into leadership with basic supervisory skills training.',
                'description' => 'This foundational leadership course prepares officers for their first supervisory role. Learn team management, basic tactical coordination, and report writing.',
                'icon' => 'document'
            ],
            [
                'rank' => 'Sergeant (SGT)',
                'duration' => '3 Months',
                'summary' => 'Enhanced tactical and team management for mid-level supervisors.',
                'description' => 'Advanced team management and tactical operations. Focus on crime scene management, evidence collection protocols, and community policing strategies.',
                'icon' => 'team'
            ],
            [
                'rank' => 'Staff Sergeant (S/SGT)',
                'duration' => '3 Months',
                'summary' => 'Department-level coordination and advanced investigative techniques.',
                'description' => 'Department-level management and coordination. Includes advanced investigative techniques, resource allocation, and crisis management training.',
                'icon' => 'user'
            ],
            [
                'rank' => 'Sergeant Major (SGT/M)',
                'duration' => '3 Months',
                'summary' => 'Senior-level operational command and administrative leadership.',
                'description' => 'Senior non-commissioned officer training. Focuses on personnel management, resource allocation, administrative procedures, and organizational leadership.',
                'icon' => 'badge'
            ],
            [
                'rank' => 'Assistant Inspector',
                'duration' => '9 Months',
                'summary' => 'Comprehensive commissioned officer preparation with specialized training.',
                'description' => 'This extensive course prepares officers for commissioned ranks. Advanced leadership training, legal studies, strategic planning, and executive management. Includes field rotations and specialized department training.',
                'icon' => 'flag'
            ]
        ];

        // Statistics data
        $statistics = [
            [
                'value' => 95,
                'label' => 'Course Completion Rate',
                'suffix' => '%'
            ],
            [
                'value' => 500,
                'label' => 'Annual Graduates',
                'suffix' => '+'
            ],
            [
                'value' => 30,
                'label' => 'Expert Instructors',
                'suffix' => ''
            ]
        ];

        return view('admissions.promotional-courses', compact('courses', 'statistics'));
    }

    /**
     * Download application form.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadApplication()
    {
        // Path to your application form file
        $filePath = public_path('documents/police-promotional-course-application.pdf');
        
        // In a real application, you would check if the file exists
        // and return a proper response if it doesn't
        
        return response()->download($filePath, 'TanzaniaPolice-PromotionalCourse-Application.pdf');
    }
}