<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'brand',
        'in_stock',
        'category_id',
        'price',
        'photo'
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::created(function($product) {
    //         $product->logHistory('created');
    //     });

    //     static::updated(function($product) {
    //         $product->logHistory('updated');
    //     });

    //     static::deleted(function($product) {
    //         $product->logHistory('deleted');
    //     });

    // }

    public function logHistory($action)
    {
        ProductHistory::create([
            'product_id' => $this->id,
            'user' => Auth::user()->first_name,
            'photo' => $this->photo,
            'title' => $this->title,
            'brand' => $this->brand,
            'category' => $this->category->name,
            'in_stock' => $this->in_stock,
            'price' => $this->price,
            'action' => $action
        ]);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
