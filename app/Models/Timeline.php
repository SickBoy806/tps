<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    // Define the table name if it's different from the default plural form
    protected $table = 'timelines';

    // Define the fillable fields (these are the fields you can mass assign)
    protected $fillable = ['title', 'slug', 'content'];

    // Optional: Define the dates that should be treated as Carbon instances
    protected $dates = ['created_at', 'updated_at'];
}
