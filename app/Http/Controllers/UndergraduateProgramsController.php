<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UndergraduateProgramsController extends Controller
{
    public function index()
    {
        $courses = [
            [
                'id' => 'security-strategic-studies',
                'icon' => '🛡️',
                'title' => 'Bachelor of Science in Security and Strategic Studies (BSSS)',
                'duration' => '3 Years',
                'description' => 'A comprehensive program developing advanced security analysis and strategic thinking skills.',
                'features' => [
                    'National Security',
                    'Geopolitical Analysis',
                    'Risk Management',
                    'Intelligence Studies',
                    'Strategic Planning'
                ],
                'details' => [
                    'overview' => 'Prepare for critical roles in national security, strategic planning, and global risk assessment.',
                    'careerOpportunities' => [
                        'Security Analyst',
                        'Intelligence Officer',
                        'Risk Management Consultant',
                        'Policy Advisor',
                        'Strategic Planner'
                    ],
                    'entryRequirements' => 'Advanced high school diploma with strong analytical and critical thinking skills'
                ]
            ],
            [
                'id' => 'cyber-security',
                'icon' => '🔒',
                'title' => 'Bachelor of Science in Cyber Security',
                'duration' => '3 Years',
                'description' => 'Advanced program developing comprehensive cybersecurity and digital defense skills.',
                'features' => [
                    'Network Security',
                    'Ethical Hacking',
                    'Cyber Threat Analysis',
                    'Digital Forensics',
                    'Security Architecture'
                ],
                'details' => [
                    'overview' => 'Develop cutting-edge skills to protect digital infrastructures and combat cyber threats.',
                    'careerOpportunities' => [
                        'Cybersecurity Specialist',
                        'Ethical Hacker',
                        'Security Engineer',
                        'Digital Forensics Analyst',
                        'Information Security Consultant'
                    ],
                    'entryRequirements' => 'High school diploma with strong mathematics and computer science background'
                ]
            ]
        ];

        $faqItems = [
            [
                'question' => 'What are the application deadlines?',
                'answer' => 'Applications for the main intake open in January and close in June. Late applications may be considered based on availability.'
            ],
            [
                'question' => 'Are scholarships available?',
                'answer' => 'We offer merit-based scholarships and financial aid for qualifying students. Applications are reviewed on a case-by-case basis.'
            ]
        ];

        return view('undergraduate-programs', compact('courses', 'faqItems'));
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
            'message' => 'Application submitted successfully!'
        ]);
    }
}