<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    
    //CREATE TABLE product_images (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     product_id BIGINT UNSIGNED,
    //     name VARCHAR(50) NOT NULL,
    //     path VARCHAR(100) NOT NULL,
    //     url VARCHAR(100) NOT NULL,
    //     aspec_ratio VARCHAR(5) NOT NULL,
    //     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    //     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    //     FOREIGN KEY (product_id) REFERENCES products(id)
    // );

    protected $fillable = [
        'product_id',
        'name',
        'path',
        'url',
        'aspect_ratio',
    ];
    
    //aspect ratio list
    public const ASPECT_RATIO = [
        '16:9',
        '4:3',
        '1:1',
        '3:2',
        '2:3',
        '3:4',
        '9:16',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }




}
