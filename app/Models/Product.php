<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', 'title', 'price', 'offer_price', 'discount', 'summary', 'description',
        'status', 'cat_id', 'brand_id', 'child_cat_id', 'slug', 'condition', 'vendor_id', 'stock'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function related_products()
    {
        return $this->hasMany(Product::class, 'cat_id', 'cat_id')->where('status', 'active')->take(13);
    }
    public function rates()
    {
        return $this->hasMany(ProductRate::class, 'product_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'id');
    }
}
