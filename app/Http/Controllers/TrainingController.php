<?php

namespace App\Http\Controllers;

use TCG\Voyager\Models\Post;
use TCG\Voyager\Facades\Voyager;  // Add this import
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        return view('facilities.training');
    }

    public function getTrainings()
    {
        $trainings = Post::where('status', 'PUBLISHED')
            ->where('category_id', 1)
            ->select([
                'id',
                'title',
                'excerpt as short_description',
                'image',
                'created_at'
            ])
            ->get()
            ->map(function ($training) {
                $training->image_url = $training->image ? Voyager::image($training->image) : null;
                return $training;
            });

        return response()->json($trainings);
    }
}