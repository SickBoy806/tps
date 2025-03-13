<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TPFRecruitmentController extends Controller
{
    public function index()
    {
        return view('jobs.tpf');
    }

    public function apply($category)
    {
        // Validate the recruitment category
        $validCategories = [
            'basic-recruit',
            'un-missions',
            'inspector-course'
        ];

        if (!in_array($category, $validCategories)) {
            abort(404, 'Invalid recruitment category');
        }

        // You can add specific logic for each category if needed
        // For now, redirect to a general application portal
        return redirect()->away('https://recruitment.tpf.go.tz');
    }
}