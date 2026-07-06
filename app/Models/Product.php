<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariant;

class Product extends Model
{
    protected $fillable = [

        'name',
        'slug',
        'category_id',
        'description',
        'price',
        'discount_price',
        'stock',
        'sku',
        'thumbnail',
        'status',

    ];

    /*
    |--------------------------------------------------------------------------
    | CATEGORY
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*
    |--------------------------------------------------------------------------
    | VARIANTS
    |--------------------------------------------------------------------------
    */

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}