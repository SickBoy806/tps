<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InternshipApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'internship_id',
        'internship_title',
        'full_name',
        'email',
        'resume_path',
        'motivation',
        'status'
    ];

    // Set a default status when creating a new application
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->status = $model->status ?? 'pending';
        });
    }

    // Optional: Add scopes for easier querying
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeAccepted($query)
    {
        return $query->where('status', 'accepted');
    }

    // Optional: Method to check current status
    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isAccepted()
    {
        return $this->status === 'accepted';
    }
}