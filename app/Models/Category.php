<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'is_parent', 'summary', 'status', 'parent_id', 'slug'];


    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }
}
