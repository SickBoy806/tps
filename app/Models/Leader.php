<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;


class Leader extends Model
{
    protected $table = 'leaders';
    
    protected $fillable = [
        'position',
        'name',
        'description',
        'image',
        'responsibilities',
        'display_order'
    ];

    protected $casts = [
        'responsibilities' => 'string'
    ];

    public function getImageAttribute($value)
{
    if (!$value) {
        return null;
    }
    
    $disk = config('voyager.storage.disk', 'public');
    /** @var \Illuminate\Contracts\Filesystem\Filesystem $filesystem */
    $filesystem = Storage::disk($disk);
    return $filesystem->url($value);
}
    
    public function getResponsibilitiesAttribute($value)
    {
        return json_decode($value, true) ?: [];
    }

    public function getThumbnail($size = 'medium')
{
    if (!$this->image) {
        return null;
    }
    
    $path = $this->getRawOriginal('image');
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $thumbnailPath = str_replace('.' . $ext, '-' . $size . '.' . $ext, $path);
    
    return Storage::disk(config('voyager.storage.disk'))->url($thumbnailPath);
}
}




