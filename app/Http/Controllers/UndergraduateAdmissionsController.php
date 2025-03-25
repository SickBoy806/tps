<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UndergraduateAdmissionsController extends Controller
{
    public function index()
    {
        $courses = [
            [
                'id' => 'security-strategic-studies',
                'icon' => '🛡️',
                'title' => 'Bachelor of Science in Security and Strategic Studies',
                'duration' => '4 Years',
                'description' => 'Comprehensive undergraduate program developing critical security analysis and strategic thinking skills.',
                'features' => [
                    'National Security Fundamentals',
                    'Risk Assessment Techniques',
                    'Geopolitical Analysis',
                    'Conflict Resolution Strategies',
                    'Intelligence Gathering Methods'
                ],
                'details' => [
                    'overview' => 'Prepare for dynamic careers in security, intelligence, and strategic planning.',
                    'careerOpportunities' => [
                        'Security Analyst',
                        'Intelligence Specialist',
                        'Risk Management Consultant',
                        'Government Policy Advisor',
                        'Homeland Security Professional'
                    ],
                    'entryRequirements' => 'High school diploma with strong academic record in social sciences and humanities'
                ]
            ],
            [
                'id' => 'cyber-security',
                'icon' => '🔒',
                'title' => 'Bachelor of Science in Cyber Security',
                'duration' => '4 Years',
                'description' => 'Cutting-edge program developing comprehensive digital defense and cybersecurity expertise.',
                'features' => [
                    'Network Security Fundamentals',
                    'Ethical Hacking',
                    'Cybercrime Investigation',
                    'Secure System Design',
                    'Cyber Threat Intelligence'
                ],
                'details' => [
                    'overview' => 'Build advanced skills to protect digital infrastructures and combat emerging cyber threats.',
                    'careerOpportunities' => [
                        'Cybersecurity Analyst',
                        'Network Security Engineer',
                        'Digital Forensics Specialist',
                        'Information Security Consultant',
                        'Cyber Risk Manager'
                    ],
                    'entryRequirements' => 'High school diploma with strong background in mathematics and computer science'
                ]
            ],
            [
                'id' => 'information-technology',
                'icon' => '💻',
                'title' => 'Bachelor of Science in Information Technology',
                'duration' => '4 Years',
                'description' => 'Comprehensive program developing advanced technological skills and innovative problem-solving approaches.',
                'features' => [
                    'Software Development',
                    'Cloud Computing',
                    'Database Management',
                    'Network Administration',
                    'IT Project Management'
                ],
                'details' => [
                    'overview' => 'Prepare for versatile careers in technology, focusing on practical skills and emerging technologies.',
                    'careerOpportunities' => [
                        'IT Support Specialist',
                        'Systems Administrator',
                        'Network Engineer',
                        'Cloud Solutions Architect',
                        'IT Project Coordinator'
                    ],
                    'entryRequirements' => 'High school diploma with strong aptitude in mathematics and technology'
                ]
            ]
        ];

        $faqItems = [
            [
                'question' => 'What are the application deadlines?',
                'answer' => 'Applications for undergraduate programs open in September and close in June. Early applications are encouraged.'
            ],
            [
                'question' => 'Are scholarships available for undergraduate students?',
                'answer' => 'We offer merit-based scholarships, academic achievement awards, and financial aid for qualifying students.'
            ]
        ];

        return view('admissions.undergraduate', compact('courses', 'faqItems'));
    }

    public function submitApplication(Request $request)
    {
        $validatedData = $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'course' => 'required|string|max:255'
        ]);

        // In a real application, you would save this to database or send an email
        return response()->json([
            'success' => true,
            'message' => 'Undergraduate Application submitted successfully!'
        ]);
    }
}