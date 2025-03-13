<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the events.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->location = $request->location;
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
        }
        
        $event->save();

        return redirect()->route('events.index')
            ->with('success', 'Event created successfully.');
    }

    /**
     * Display the specified event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->location = $request->location;
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($event->image && file_exists(storage_path('app/public/' . $event->image))) {
                unlink(storage_path('app/public/' . $event->image));
            }
            
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
        }
        
        $event->save();

        return redirect()->route('events.index')
            ->with('success', 'Event updated successfully.');
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // Delete event image if exists
        if ($event->image && file_exists(storage_path('app/public/' . $event->image))) {
            unlink(storage_path('app/public/' . $event->image));
        }
        
        $event->delete();

        return redirect()->route('events.index')
            ->with('success', 'Event deleted successfully.');
    }
}