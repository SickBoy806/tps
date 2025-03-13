<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(10);
        
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created news item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->published_at = $request->published_at ?? now();
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('news', 'public');
            $news->image = $imagePath;
        }
        
        $news->save();

        return redirect()->route('news.index')
            ->with('success', 'News item created successfully.');
    }

    /**
     * Display the specified news item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified news item.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified news item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'published_at' => 'nullable|date',
        ]);

        $news = News::findOrFail($id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->published_at = $request->published_at ?? $news->published_at;
        
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image && file_exists(storage_path('app/public/' . $news->image))) {
                unlink(storage_path('app/public/' . $news->image));
            }
            
            $imagePath = $request->file('image')->store('news', 'public');
            $news->image = $imagePath;
        }
        
        $news->save();

        return redirect()->route('news.index')
            ->with('success', 'News item updated successfully.');
    }

    /**
     * Remove the specified news item from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        
        // Delete news image if exists
        if ($news->image && file_exists(storage_path('app/public/' . $news->image))) {
            unlink(storage_path('app/public/' . $news->image));
        }
        
        $news->delete();

        return redirect()->route('news.index')
            ->with('success', 'News item deleted successfully.');
    }
}