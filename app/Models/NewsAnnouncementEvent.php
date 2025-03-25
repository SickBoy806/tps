<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsAnnouncementEvent extends Model
{
    use HasFactory;
    
    protected $table = 'news_announcement_events';
    
    protected $fillable = [
        'title',
        'content',
        'type', // 'news', 'announcement', or 'event'
        'summary',
        'image',
        'date',
        'location',
        'published'
    ];
    
    protected $casts = [
        'date' => 'date',
        'published' => 'boolean'
    ];
    
    // Scope to get only news items
    public function scopeNews($query)
    {
        return $query->where('type', 'news');
    }
    
    // Scope to get only announcements
    public function scopeAnnouncements($query)
    {
        return $query->where('type', 'announcement');
    }
    
    // Scope to get only events
    public function scopeEvents($query)
    {
        return $query->where('type', 'event');
    }
}