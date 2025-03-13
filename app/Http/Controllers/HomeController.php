<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Facades\Voyager;

class HomeController extends Controller
{
    public function index()
    {
        // Get slides from Voyager posts (keeping your original code)
        $rawSlides = Post::where('status', 'PUBLISHED')
            ->orderBy('created_at', 'desc')
            ->get();

        // Transform the slides to include full image URLs
        $slides = $rawSlides->map(function ($slide) {
            return [
                'title' => $slide->title,
                'subtitle' => $slide->excerpt ?? '', // Make excerpt optional
                'image' => Voyager::image($slide->image), // Convert image path to full URL
                'button_text' => $slide->button_text ?? '', // Make button text optional
                'button_link' => $slide->button_link ?? '#' // Default to # if no link provided
            ];
        });

        // Get the latest news items
        $newsItems = News::latest()->take(2)->get();

        // Get upcoming events
        $events = Event::where('date', '>=', now())
                       ->orderBy('date')
                       ->take(3)
                       ->get();
        
        // Pass all data to the home view
        return view('home', compact('slides', 'newsItems', 'events'));
    }

    //our services 
    
}