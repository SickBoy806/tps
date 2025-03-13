<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class YourController extends Controller
{
    // Admissions Methods
    public function undergraduate()
    {
        return view('admissions.undergraduate');
    }

    public function graduate()
    {
        return view('admissions.graduate');
    }

    // News Methods
    public function latest()
    {
        return view('news.latest');
    }

    public function upcoming()
    {
        return view('news.upcoming');
    }

    // Facilities Methods
    public function sports()
    {
        return view('facilities.sports');
    }

    public function training()
    {
        return view('facilities.training');
    }

    public function library()
    {
        return view('facilities.library');
    }

    public function Academicblock()
    {
        return view('facilities.Academicblock');
    }

    public function campusMap()
    {
        return view('facilities.campusmap');
    }

    // Careers Methods
    public function opportunities()
    {
        return view('careers.opportunities');
    }

    public function internships()
    {
        return view('careers.internships');
    }

    public function benefits()
    {
        return view('careers.benefits');
    }

    // About Methods
    public function history()
    {
        return view('about.history');
    }

    public function mission()
    {
        return view('about.mission');
    }

    public function leadership()
    {
        return view('about.leadership');
    }

       // Contact Us Method
    public function contactus()
    {
    return view('contactUs.contactus');
    }
}




