<?php
namespace App\Http\Controllers;
use App\Models\NewsAnnouncementEvent;
use Illuminate\Http\Request;

class NewsAnnouncementEventController extends Controller
{
    /**
     * Display the news and announcements page
     */
    public function index()
    {
        // Check if we have the combined model data
        if (class_exists('App\Models\NewsAnnouncementEvent')) {
            // Using the combined model
            $announcements = NewsAnnouncementEvent::announcements()
                ->where('published', true)
                ->orderBy('date', 'desc')
                ->take(10)
                ->get()
                ->map(function ($announcement) {
                    return [
                        'id' => $announcement->id,
                        'title' => $announcement->title,
                        'content' => $announcement->content,
                        'date' => $announcement->date->format('Y-m-d')
                    ];
                });
                
            $news = NewsAnnouncementEvent::news()
                ->where('published', true)
                ->orderBy('date', 'desc')
                ->take(5)
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'title' => $item->title,
                        'content' => $item->content,
                        'summary' => $item->summary ?: substr(strip_tags($item->content), 0, 100) . '...',
                        'image' => $item->image,
                        'date' => $item->date->format('Y-m-d')
                    ];
                });
                
            $oneWeekAgo = now()->subDays(7);
            
            $events = NewsAnnouncementEvent::events()
                ->where('published', true)
                ->where('date', '>=', $oneWeekAgo)
                ->orderBy('date', 'asc')
                ->take(10)
                ->get()
                ->map(function ($event) {
                    return [
                        'id' => $event->id,
                        'title' => $event->title,
                        'description' => $event->content,
                        'date' => $event->date->format('Y-m-d'),
                        'location' => $event->location ?: 'TBD'
                    ];
                });
        } else {
            // Using the separate models
            $announcements = NewsAnnouncementEvent::orderBy('date', 'desc')
                ->take(10)
                ->get()
                ->map(function ($announcement) {
                    return [
                        'id' => $announcement->id,
                        'title' => $announcement->title,
                        'content' => $announcement->content,
                        'date' => $announcement->date->format('Y-m-d')
                    ];
                });
                
            $news = NewsAnnouncementEvent::orderBy('date', 'desc')
                ->take(5)
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'title' => $item->title,
                        'content' => $item->content,
                        'summary' => $item->summary ?: substr(strip_tags($item->content), 0, 100) . '...',
                        'image' => $item->image,
                        'date' => $item->date->format('Y-m-d')
                    ];
                });
                
            $oneWeekAgo = now()->subDays(7);
            
            $events = NewsAnnouncementEvent::where('date', '>=', $oneWeekAgo)
                ->orderBy('date', 'asc')
                ->take(10)
                ->get()
                ->map(function ($event) {
                    return [
                        'id' => $event->id,
                        'title' => $event->title,
                        'description' => $event->description,
                        'date' => $event->date->format('Y-m-d'),
                        'location' => $event->location ?: 'TBD'
                    ];
                });
        }
            
        return view('news-announcements.index', compact('announcements', 'news', 'events'));
    }
    
    // API methods for JavaScript components that might need them
    
    public function getApiAnnouncements()
    {
        if (class_exists('App\Models\NewsAnnouncementEvent')) {
            $announcements = NewsAnnouncementEvent::announcements()
                ->where('published', true)
                ->orderBy('date', 'desc')
                ->take(10)
                ->get()
                ->map(function ($announcement) {
                    return [
                        'id' => $announcement->id,
                        'title' => $announcement->title,
                        'content' => $announcement->content,
                        'date' => $announcement->date->format('Y-m-d')
                    ];
                });
        } else {
            $announcements = NewsAnnouncementEvent::orderBy('date', 'desc')
                ->take(10)
                ->get(['id', 'title', 'content', 'date'])
                ->map(function ($announcement) {
                    return [
                        'id' => $announcement->id,
                        'title' => $announcement->title,
                        'content' => $announcement->content,
                        'date' => $announcement->date->format('Y-m-d')
                    ];
                });
        }
        
        return response()->json($announcements);
    }
    
    public function getApiNews()
    {
        if (class_exists('App\Models\NewsAnnouncementEvent')) {
            $news = NewsAnnouncementEvent::news()
                ->where('published', true)
                ->orderBy('date', 'desc')
                ->take(5)
                ->get()
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'title' => $item->title,
                        'content' => $item->content,
                        'summary' => $item->summary ?: substr(strip_tags($item->content), 0, 100) . '...',
                        'image' => $item->image,
                        'date' => $item->date->format('Y-m-d')
                    ];
                });
        } else {
            $news = NewsAnnouncementEvent::orderBy('date', 'desc')
                ->take(5)
                ->get(['id', 'title', 'content', 'summary', 'image', 'date'])
                ->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'title' => $item->title,
                        'content' => $item->content,
                        'summary' => $item->summary ?: substr(strip_tags($item->content), 0, 100) . '...',
                        'image' => $item->image,
                        'date' => $item->date->format('Y-m-d')
                    ];
                });
        }
        
        return response()->json($news);
    }
    
    public function getApiEvents()
    {
        $oneWeekAgo = now()->subDays(7);
        
        if (class_exists('App\Models\NewsAnnouncementEvent')) {
            $events = NewsAnnouncementEvent::events()
                ->where('published', true)
                ->where('date', '>=', $oneWeekAgo)
                ->orderBy('date', 'asc')
                ->take(10)
                ->get()
                ->map(function ($event) {
                    return [
                        'id' => $event->id,
                        'title' => $event->title,
                        'description' => $event->content,
                        'date' => $event->date->format('Y-m-d'),
                        'location' => $event->location ?: 'TBD'
                    ];
                });
        } else {
            $events = NewsAnnouncementEvent::where('date', '>=', $oneWeekAgo)
                ->orderBy('date', 'asc')
                ->take(10)
                ->get(['id', 'title', 'description', 'date', 'location'])
                ->map(function ($event) {
                    return [
                        'id' => $event->id,
                        'title' => $event->title,
                        'description' => $event->description,
                        'date' => $event->date->format('Y-m-d'),
                        'location' => $event->location ?: 'TBD'
                    ];
                });
        }
        
        return response()->json($events);
    }
    
    // Show individual news article
    public function showNews($id)
    {
        if (class_exists('App\Models\NewsAnnouncementEvent')) {
            $news = NewsAnnouncementEvent::news()->findOrFail($id);
        } else {
            $news = NewsAnnouncementEvent::findOrFail($id);
        }
        
        return view('news-announcements.news-show', compact('news'));
    }
}