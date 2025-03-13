<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class HistoryEvent extends Model
{
    use Resizable;

    protected $fillable = [
        'year',
        'month',
        'title',
        'description',
        'image',
        'background'
    ];

    protected $casts = [
        'year' => 'integer',
        'month' => 'integer'
    ];

    public function getImageAttribute($value)
    {
        return $value ? storage_path('app/public/' . $value) : null;
    }
}