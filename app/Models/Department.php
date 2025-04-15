<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'category',
        'leadership',
        'responsibilities',
        'icon'
    ];

    /**
     * Get the responsibilities as an array
     *
     * @return array
     */
    public function getResponsibilitiesArrayAttribute()
    {
        return json_decode($this->responsibilities, true) ?? [];
    }

    /**
     * Get categories as an array
     *
     * @return array
     */
    public function getCategoriesArrayAttribute()
    {
        return explode(' ', $this->category);
    }
}