<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category',
        'image',
        'is_best_seller',
        'is_sync',
    ];

    protected $casts = [
        'price' => 'integer',
        'stock' => 'integer',
        'is_best_seller' => 'integer',
        'is_sync' => 'integer'
    ];
}
