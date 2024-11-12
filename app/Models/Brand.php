<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        //'slug',
    ];

    // // Indica que Laravel debe usar el campo "slug" como clave en las rutas
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
