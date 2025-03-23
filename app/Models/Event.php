<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'date', 'time', 'location', 'category', 'image', 'attendees'
    ];

    // Add accessor for formatted date
    public function getFormattedDateAttribute()
    {
        $date = Carbon::parse($this->date);
        return [
            'day' => $date->format('d'),
            'month' => $date->format('M'),
            'full' => $date->format('F j, Y')
        ];
    }

    public function registrations()
{
    return $this->hasMany(EventRegistration::class);
}
}