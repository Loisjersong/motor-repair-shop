<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'brand',
        'in_stock',
        'category_id',
        'price',
        'photo'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
