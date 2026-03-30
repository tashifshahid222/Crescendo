<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'image',
        'stock',
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

        // Default images by category
        $defaultImages = [
            1 => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500&q=80',
            2 => 'https://images.unsplash.com/photo-1445205170230-053b83016050?w=500&q=80',
            3 => 'https://images.unsplash.com/photo-1532012197267-da84d127e765?w=500&q=80',
            4 => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=500&q=80',
            5 => 'https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=500&q=80',
            6 => 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=500&q=80',
        ];

        return $defaultImages[$this->category_id] ?? 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=500&q=80';
    }

    public function getImageForDisplayAttribute()
    {
        return $this->image_url;
    }

    protected $casts = [
        'price' => 'decimal:2',
        'status' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
