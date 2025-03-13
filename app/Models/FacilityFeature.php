<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityFeature extends Model
{
    protected $fillable = ['feature'];

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}