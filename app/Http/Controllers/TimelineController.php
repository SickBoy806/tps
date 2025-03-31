<?php
// app/Http/Controllers/TimelineController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class TimelineController extends Controller
{
    public function getContent($slug)
    {
        // Fetch content from Voyager based on the slug
        $content = Voyager::model('Page')->where('slug', $slug)->first();

        if ($content) {
            return response()->json([
                'title' => $content->title, // Pass title
                'content' => $content->body,
                'image' => $content->image_path,  // Corrected: use $content instead of $timeline
                'video' => $content->video_url,   // Corrected: use $content instead of $timeline
            ]);
        }

        return response()->json([
            'error' => 'Content not found'
        ], 404);
    }

    public function history()
    {
        return view('about.history');
    }
}
