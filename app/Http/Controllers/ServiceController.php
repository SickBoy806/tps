<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Facades\Voyager;

class ServiceController extends Controller
{
    public function index()
    {
        // Main services listing page
        return view('services.index');
    }

    public function drivingSchool()
    {
        return view('services.driving-school');
    }

    public function healthCenter()
    {
        return view('services.health-center');
    }

    public function poultry()
    {
        // Get services from Voyager's Post model
        $services = Post::where('type', 'poultry_service')
            ->where('status', 'PUBLISHED')
            ->orderBy('order', 'ASC')
            ->get();
        
        // Get gallery images from Voyager's Post model
        $gallery_images = Post::where('type', 'poultry_gallery')
            ->where('status', 'PUBLISHED')
            ->orderBy('order', 'ASC')
            ->get();
        
        return view('services.poultry', compact('services', 'gallery_images'));
    }

    public function dogsHorses()
    {
        return view('services.dogs-horses');
    }

    public function catering()
    {
        return view('services.catering');
    }

    public function poultryContact(Request $request)
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'service' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        
        // Save contact form submission to database
        // You could create a ContactEnquiry model and save there
        
        // For now, just return with success message
        return redirect()->back()->with('success', 'Thank you for your message! The Tanzania Police School Poultry Services team will contact you shortly.');
    }
}