<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category; // Add this import for the Category model

class Post extends Model
{
    use HasFactory;
    // You need to add the Translatable trait here if you're using it
    // use Translatable;

    protected $table = 'posts';

    protected $translatable = ['title', 'body', 'slug', 'excerpt'];

    protected $fillable = [
        'title',
        'body',
        'excerpt',
        'slug',
        'meta_description',
        'meta_keywords',
        'status',
        'featured',
        'category_id',
        'image'
    ];

    // Get the featured image
    public function getImageAttribute($value)
    {
        if (!$value) {
            return null;
        }
        
        return Str::startsWith($value, 'http') ? $value : asset('storage/' . $value);
    }
    
    // Get HTML formatted content with media paths properly resolved
    public function getFormattedBodyAttribute()
    {
        $body = $this->body;
        
        // Replace Voyager media URLs
        $body = preg_replace_callback('/src="\/storage\/(.+?)"/', function ($matches) {
            return 'src="' . asset('storage/' . $matches[1]) . '"';
        }, $body);
        
        return $body;
    }
    
    // Relationship with categories
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    // Get all images from post content
    public function getContentImagesAttribute()
    {
        preg_match_all('/<img.+?src="(.+?)".+?>/i', $this->body, $matches);
        
        return $matches[1] ?? [];
    }
}