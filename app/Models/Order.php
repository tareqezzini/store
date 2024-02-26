<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'order_number', 'user_id', 'product_id', 'user_id', 'product_id', 'total_amount',
        'sub_total', 'quantity', 'delivery_charge', 'first_name', 'last_name', 'email',
        'phone', 'method_payment', 'status_payment', 'status_order', 'address', 'country',
        'state', 'city', 'code_postal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}