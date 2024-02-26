<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        // get the latest orders of seller 
        $latestOrders = Order::withTrashed()->join('products', 'orders.product_id', '=', 'products.id')
            ->where('products.vendor_id', auth()->user()->id)
            ->orderBy('orders.created_at', 'desc')
            ->take(8)
            ->get();

        // Get the Earning money of Seller 

        $earning = Order::withTrashed()->join('products', 'orders.product_id', '=', 'products.id')
            ->where('products.vendor_id', auth()->user()->id)->where('orders.status_order', 'delivered')
            ->sum('orders.total_amount');


        // get Number of Product of seller
        $numberProducts = Product::where('vendor_id', auth()->user()->id)->count();

        // Get Number of products Sealed


        $SealedProducts =  Order::withTrashed()->join('products', 'orders.product_id', '=', 'products.id')
            ->where('products.vendor_id', auth()->user()->id)->where('orders.status_order', 'delivered')
            ->sum('orders.quantity');

        return view('seller_dash.index', compact('latestOrders', 'earning', 'numberProducts', 'SealedProducts'));
    }
}
