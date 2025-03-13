<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;
use App\Models\LiveScore;

class SportsController extends Controller
{
    public function index()
{
    $sports = Sport::orderBy('created_at', 'desc')->get();
    $categories = Sport::select('category')->distinct()->pluck('category');
    $liveScores = LiveScore::where('status', 'live')->get();
    
    return view('facilities.sports', compact('sports', 'categories', 'liveScores'));
}
}


