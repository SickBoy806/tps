<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthCenterService extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image',
        'order',
        'active'
    ];

    // Get all active services ordered by the order field
    public static function getActiveServices()
    {
        return self::where('active', true)->orderBy('order')->get();
    }
}