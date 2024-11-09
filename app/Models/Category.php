<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'name',
        'description',
    ];

    // Relación muchos a muchos con productos
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_categories');
    }
}
