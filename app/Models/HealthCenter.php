<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthCenter extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'overview',
        'header_image',
        'active'
    ];

    // You can have only one active health center info at a time
    public static function getActiveInfo()
    {
        return self::where('active', true)->first();
    }
}