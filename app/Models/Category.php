<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Check if it's an external URL
            if (str_starts_with($this->image, 'http')) {
                return $this->image;
            }

            // Otherwise it's a stored file
            return asset('storage/'.$this->image);
        }

        return 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=600&q=80';
    }

    protected $casts = [
        'status' => 'boolean',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
