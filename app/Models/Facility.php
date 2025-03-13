<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'name',
        'description',
        'icon',
        'features'
    ];

    protected $casts = [
        'features' => 'array'
    ];

    public function images()
    {
        return $this->hasMany(FacilityImage::class);
    }
}