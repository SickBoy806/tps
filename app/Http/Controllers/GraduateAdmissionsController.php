<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraduateAdmissionsController extends Controller
{
    public function index()
    {
        $courses = [
            [
                'id' => 'security-strategic-studies',
                'icon' => '🛡️',
                'title' => 'Master of Science in Security and Strategic Studies',
                'duration' => '2 Years',
                'description' => 'Advanced program developing comprehensive security analysis and strategic thinking skills.',
                'features' => [
                    'Advanced National Security Studies',
                    'Geopolitical Risk Assessment',
                    'Strategic Intelligence',
                    'Conflict Resolution',
                    'Global Security Policy'
                ],
                'details' => [
                    'overview' => 'Prepare for high-level roles in national security, strategic planning, and global risk management.',
                    'careerOpportunities' => [
                        'Senior Security Analyst',
                        'Intelligence Consultant',
                        'Strategic Policy Advisor',
                        'Risk Management Executive',
                        'Defense Strategy Specialist'
                    ],
                    'entryRequirements' => 'Bachelor\'s degree in related field with professional experience preferred'
                ]
            ],
            [
                'id' => 'cyber-security',
                'icon' => '🔒',
                'title' => 'Master of Science in Cyber Security',
                'duration' => '2 Years',
                'description' => 'Advanced cybersecurity program developing cutting-edge digital defense and threat mitigation strategies.',
                'features' => [
                    'Advanced Network Security',
                    'Cyber Threat Intelligence',
                    'Digital Forensics',
                    'Cyber Policy and Governance',
                    'Advanced Ethical Hacking'
                ],
                'details' => [
                    'overview' => 'Develop advanced skills to protect complex digital infrastructures and lead cybersecurity initiatives.',
                    'careerOpportunities' => [
                        'Chief Information Security Officer',
                        'Cyber Threat Analyst',
                        'Security Architecture Specialist',
                        'Cybersecurity Consultant',
                        'Incident Response Manager'
                    ],
                    'entryRequirements' => 'Bachelor\'s degree in Computer Science, Information Technology, or related field'
                ]
            ]
        ];

        $faqItems = [
            [
                'question' => 'What are the application deadlines?',
                'answer' => 'Applications for graduate programs open in September and close in May. Early applications are encouraged.'
            ],
            [
                'question' => 'Are scholarships available for graduate students?',
                'answer' => 'We offer research assistantships, merit-based scholarships, and financial aid for qualifying graduate students.'
            ]
        ];

        return view('admissions.graduate', compact('courses', 'faqItems'));
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
            'message' => 'Graduate Application submitted successfully!'
        ]);
    }
}