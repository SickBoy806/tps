<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'detailed_description',
        'media_type',
        'media_url',
        'media_thumbnail_url',
        'media_alt_text',
        'display_order',
        'is_active',
    ];
}