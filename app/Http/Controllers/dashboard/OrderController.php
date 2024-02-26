<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::withTrashed()->orderByDesc('created_at')->get();
        return view('backend.orders.index', compact('orders'));
    }

    // update Status of Order
    public function updateOrderStatus(Request $request)
    {
        $validation = $request->validate([
            'order_status' => 'required|in:pending,process,delivered,cancelled'
        ]);

        $order = Order::withTrashed()->find($request->id);
        if (!$order) {
            abort('404');
        }
        $status = $order->update([
            'status_order' => $request->order_status
        ]);
        if ($status) {

            return redirect()->route('order.index')->with('success', 'The Order Status has been updated successfully');
        }
        return redirect()->route('order.index')->with('error', 'Something went wrong');
    }

    // move order to Trash 

    public function OrderToTrash(Request $request)
    {
        $order = Order::withTrashed()->find($request->id);
        if (!$order) {
            abort('404');
        }

        $status = $order->forceDelete();

        if ($status) {

            return redirect()->route('order.index')->with('success', 'The Order have Deleted Successfully');
        }
        return redirect()->route('order.index')->with('error', 'Something went wrong');
    }


    public function orderDetails($order_number)
    {
        $order = Order::with('product', 'user')->where('order_number', $order_number)->first();



        // make as notification read
        $notification = DB::table('notifications')->where('notifiable_id', auth()->user()->id)->where('data->order_number', $order_number);
        $notification->update(['read_at' => now()]);

        return view('backend.orders.order_details', compact('order'));
    }
}
