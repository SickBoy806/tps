<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $newsItem = News::with('category')->findOrFail($id);
        
        return view('news.show', compact('newsItem'));
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
}

