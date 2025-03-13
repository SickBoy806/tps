<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function index()
    {
        $posts = Leader::orderBy('created_at', 'desc')->get();
            
            return view('about.leadership', compact('posts'));
    }
    
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'PUBLISHED')
            ->firstOrFail();
            
        return view('posts.show', compact('post'));
    }
}



