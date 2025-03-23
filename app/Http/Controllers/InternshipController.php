<?php

namespace App\Http\Controllers;

use App\Models\InternshipApplication;
use App\Notifications\InternshipApplicationReceived;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Str;

class InternshipController extends Controller
{
    public function index()
    {
        $internships = $this->getInternships();
        
        // Add logging to help diagnose any issues
        Log::info('Internships loaded', ['count' => count($internships)]);
        
        // Explicitly pass internships to the view
        return view('careers.internships', ['internships' => $internships]);
    }

    public function apply(string $id)
    {
        $internship = collect($this->getInternships())
            ->firstWhere('id', $id);

        if (!$internship) {
            Log::warning("Internship not found with ID: {$id}");
            abort(404, 'Internship not found');
        }

        return view('careers.internship-application', compact('internship'));
    }

    public function submit(Request $request): RedirectResponse
    {
        try {
            $validated = $request->validate([
                'internship_id' => 'required|string',
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'resume' => 'required|file|mimes:pdf,doc,docx|max:5120',
                'motivation' => 'required|string|max:1000'
            ]);

            $internship = collect($this->getInternships())
                ->firstWhere('id', $validated['internship_id']);

            if (!$internship) {
                Log::warning("Invalid internship selected", ['internship_id' => $validated['internship_id']]);
                return back()->withErrors(['internship_id' => 'Invalid internship selected']);
            }

            $resumePath = null;
            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $filename = Str::slug($validated['full_name']) . '-resume-' . time() . '.' . $file->getClientOriginalExtension();
                
                $resumePath = $file->storeAs('internship-applications', $filename, 'public');
            }

            $application = InternshipApplication::create([
                'internship_id' => $validated['internship_id'],
                'internship_title' => $internship['title'],
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'resume_path' => $resumePath,
                'motivation' => $validated['motivation']
            ]);

            $this->sendApplicationNotification($application);

            Log::info('Internship application submitted', [
                'internship_id' => $validated['internship_id'],
                'applicant_email' => $validated['email']
            ]);

            return redirect()->route('internships.index')
                ->with('success', 'Your application for ' . $internship['title'] . ' has been submitted successfully!');
        } catch (\Exception $e) {
            Log::error('Internship application submission failed', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return back()->withErrors(['submit' => 'An unexpected error occurred. Please try again.']);
        }
    }

    protected function sendApplicationNotification($application)
    {
        $adminEmail = config('app.admin_email', 'admin@yourcompany.com');
        
        try {
            FacadesNotification::route('mail', $adminEmail)
                ->notify(new InternshipApplicationReceived($application));
            
            Log::info('Internship application notification sent', [
                'application_id' => $application->id,
                'admin_email' => $adminEmail
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send internship application notification', [
                'message' => $e->getMessage(),
                'application_id' => $application->id
            ]);
        }
    }

    // Changed from private to public to ensure accessibility
    public function getInternships(): array
    {
        return [
            [
                'id' => 'research',
                'title' => 'Summer Research Internship',
                'description' => 'Join our summer research program and work on cutting-edge projects across various disciplines.',
                'duration' => '3 Months',
                'department' => 'Research & Development',
                'category' => 'research'
            ],
            [
                'id' => 'teaching',
                'title' => 'Educational Development Internship',
                'description' => 'Contribute to curriculum design and educational innovation in our learning programs.',
                'duration' => '4 Months',
                'department' => 'Education',
                'category' => 'teaching'
            ],
            [
                'id' => 'accounting',
                'title' => 'Financial Analysis Internship',
                'description' => 'Gain practical experience in financial reporting, budgeting, and analysis.',
                'duration' => '3 Months',
                'department' => 'Finance',
                'category' => 'accounting'
            ],
            [
                'id' => 'it',
                'title' => 'Software Development Internship',
                'description' => 'Work with our engineering team on real-world software development projects.',
                'duration' => '4 Months',
                'department' => 'Technology',
                'category' => 'it'
            ],
            [
                'id' => 'veterinarian',
                'title' => 'Veterinary Care Internship',
                'description' => 'Assist in animal healthcare, learn about veterinary practices and animal wellness.',
                'duration' => '3 Months',
                'department' => 'Veterinary Services',
                'category' => 'veterinarian'
            ],
            [
                'id' => 'agriculture',
                'title' => 'Agricultural Research Internship',
                'description' => 'Contribute to sustainable farming techniques and agricultural innovation.',
                'duration' => '4 Months',
                'department' => 'Agricultural Research',
                'category' => 'agriculture'
            ],
            [
                'id' => 'medical',
                'title' => 'Medical Research Internship',
                'description' => 'Participate in groundbreaking medical research and clinical support.',
                'duration' => '6 Months',
                'department' => 'Medical Research',
                'category' => 'medical'
            ]
        ];
    }
}