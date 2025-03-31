<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function upcoming(Request $request)
    {
        $query = Event::where('date', '>=', now()->format('Y-m-d'));
        
        // Apply category filter if provided
        $category = $request->query('category');
        if ($category) {
            $query->where('category', $category);
        }
        
        // Get events and paginate
        $events = $query->orderBy('date', 'asc')->paginate(6);
        
        // Get all unique categories for the filter
        $categories = Event::where('date', '>=', now()->format('Y-m-d'))
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');
        
            return view('news.upcoming', compact('events', 'categories', 'category'));
    }
    
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('news.events.show', compact('event'));
    }

    public function register(Request $request, $id)
{
    $event = Event::findOrFail($id);
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);
    
    // Create registration
    $event->registrations()->create([
        'name' => $validated['name'],
        'email' => $validated['email'],
    ]);
    
    // Increment attendees count
    $event->increment('attendees');
    
    return redirect()->back()->with('success', 'You have successfully registered for this event!');
}
}