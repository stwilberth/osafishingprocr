<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'price',
        'stock',
        'slug'
    ];

    // Indica que Laravel debe usar el campo "slug" como clave en las rutas
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function getMainImageAttribute()
    {
        return $this->images->where('is_main', true)->first();
    }

    // Define the relationship with the Category model
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }


}
