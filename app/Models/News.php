<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'slug', 
        'excerpt', 
        'content', 
        'category_id', 
        'read_time',
        'image_urls', // JSON field for multiple images
        'published_at'
    ];

    protected $casts = [
        'image_urls' => 'array',
        'published_at' => 'datetime',
    ];

    /**
     * Get the category that owns the news item.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the category name attribute.
     */
    public function getCategoryNameAttribute()
    {
        return $this->category ? $this->category->name : null;
    }
}