<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = [
        'title', 'image', 'category', 'description', 'order', 'status'
    ];
    
    // If you're using Laravel 7 or newer with mass assignment protection:
    // protected $guarded = [];
}