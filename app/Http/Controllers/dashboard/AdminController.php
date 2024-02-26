<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function admin()
    {
        // Get the latest Orders 
        $latestOrders = Order::withTrashed()->latest()->take(8)->get();
        // get the date of Today
        $now = Carbon::now();

        // Get Total Earning in month
        $earning = Order::withTrashed()->where('status_order', 'delivered')
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('total_amount');
        $numberProductSales = Order::withTrashed()->where('status_order', 'delivered')
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->sum('quantity');
        $numberVendors = count(User::where('status', 'active')
            ->where('role', 'seller')
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->get());
        $numberCostumer = count(User::where('status', 'active')
            ->where('role', 'costumer')
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->get());

        return view('backend.dashboard', compact('latestOrders', 'earning', 'numberVendors', 'numberProductSales', 'numberCostumer'));
    }
}
