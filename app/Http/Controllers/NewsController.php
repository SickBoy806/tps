<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index()
    {
        // Fetch latest news
        $news = News::with('category')->latest()->paginate(10);

        // Fetch all categories
        $categories = Category::all();

        // Return view with both variables
        return view('news.latest', compact('news', 'categories'));
    }

    public function show($id)
    {
        try {
            // Try to find the news article
            $article = News::with('category')->findOrFail($id);
            
            // Map your model fields to template expectations
            $article->body = $article->content; // Map content to body
            $article->featured_image = $article->image_urls[0] ?? null; // Use first image as featured
            
            // Add formatted date
            $article->formatted_date = $article->published_at 
                ? $article->published_at->format('F j, Y') 
                : $article->created_at->format('F j, Y');
            
            // Set read time if not already present
            if (!$article->read_time) {
                $wordCount = str_word_count(strip_tags($article->content ?? ''));
                $article->read_time = max(1, ceil($wordCount / 200)) . ' min read';
            }
            
            return view('news.newdetail', compact('article'));
            
        } catch (\Exception $e) {
            // Log the error
            \Log::error('News article error: ' . $e->getMessage());
            
            // Return a friendly 404 page
            return abort(404, 'News article not found');
        }
    }

    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $news = News::where('category_id', $category->id)
                    ->latest()
                    ->paginate(10);
        $categories = Category::all();
        
        return view('news.latest', compact('news', 'categories', 'category'));
    }

    public function latest()
    {
        $news = News::latest()->paginate(10);
        $categories = Category::all(); // Add this line to get all categories
        return view('news.latest', compact('news', 'categories'));
    }

    public function upcoming()
    {
        // Fix: Replace 'date' with the correct column name in your database
        // Assuming you have a 'published_at' column instead of 'date'
        $events = News::where('published_at', '>=', now())
                      ->orderBy('published_at', 'asc')
                      ->paginate(10);
        
        $categories = Category::all(); // Fetch categories if needed

        return view('news.upcoming', compact('events', 'categories'));
    }

}