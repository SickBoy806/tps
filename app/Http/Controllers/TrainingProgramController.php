<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;

class TrainingProgramController extends Controller
{
    public function index()
    {
        // Fetch courses from Voyager categories
        $courseData = [
            'proficiency' => $this->getCoursesByCategory('proficiency-courses'),
            'promotion' => $this->getCoursesByCategory('promotion-courses'),
            'recruit' => $this->getCoursesByCategory('recruit-courses'),
            'peacekeeping' => $this->getCoursesByCategory('peacekeeping-courses')
        ];

        return view('facilities.training', [
            'courseData' => $courseData
        ]);
    }
    
    private function getCoursesByCategory($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->first();
        
        if (!$category) {
            return [];
        }
        
        return $category->posts->map(function ($post) {
            return [
                'title' => $post->title,
                'description' => $post->excerpt,
                'duration' => $post->meta_description ?? '8 Weeks', // Fallback to original
                'level' => $post->meta_keywords ?? 'Advanced', // Fallback to original
                'image' => $post->image ?? '/api/placeholder/400/250', // Fallback to original placeholder
                'images' => json_decode($post->additional_images ?? '[]') // Optional multiple images
            ];
        })->toArray();
    }
}