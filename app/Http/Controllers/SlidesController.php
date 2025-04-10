<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Http\JsonResponse;

class SlidesController extends Controller
{
    /**
     * Get all active slides
     *
     * @return JsonResponse
     */
    public function getSlides(): JsonResponse
    {
        try {
            // Fetch all active slides, ordered by position
            $slides = Slide::where('status', 'ACTIVE')
                ->orderBy('position', 'asc')
                ->get();
            
            return response()->json([
                'success' => true,
                'data' => $slides
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve slides',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}