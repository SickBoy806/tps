<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProficiencyCoursesController extends Controller
{
    public function index(Request $request)
    {
        // Get per page parameter, default to 10
        $perPage = $request->query('perPage', 10);
        
        // Define all courses
        $allCourses = [
            ['name' => 'CID', 'mode' => 'Full time', 'duration' => '3 months'],
            ['name' => 'Stock theft prevention', 'mode' => 'Full time', 'duration' => '1 month'],
            ['name' => 'CRO', 'mode' => 'Full time', 'duration' => '1 month'],
            ['name' => 'Armory keeping', 'mode' => 'Full time', 'duration' => '1 month'],
            ['name' => 'Traffic control and management', 'mode' => 'Full time', 'duration' => '1 month'],
            ['name' => 'Peace keeping operation', 'mode' => 'Full time', 'duration' => '1 month'],
            ['name' => 'Self defenses', 'mode' => 'Full time', 'duration' => '1 month'],
            ['name' => 'Field Craft', 'mode' => 'Full time', 'duration' => '1 month'],
            ['name' => 'Dog and Horse course', 'mode' => 'Full time', 'duration' => '1 month'],
            // Add more courses as needed
        ];
        
        // Convert to collection and paginate
        $courses = collect($allCourses);
        $courses = new \Illuminate\Pagination\LengthAwarePaginator(
            $courses->forPage($request->page ?? 1, $perPage),
            $courses->count(),
            $perPage,
            $request->page ?? 1,
            ['path' => $request->url(), 'query' => $request->query()]
        );
        
        // If your view is in a subdirectory, specify the path like 'directory.filename'
        // For example, if it's in resources/views/admissions/proficiency-courses.blade.php
        return view('admissions.proficiency-courses', compact('courses'));
        
        // Or if it's directly in resources/views:
        // return view('proficiency-courses', compact('courses'));
    }
}