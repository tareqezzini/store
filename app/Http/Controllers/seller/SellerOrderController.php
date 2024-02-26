<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerOrderController extends Controller
{
    public function index()
    {
        $products_ids = Product::where('vendor_id', auth()->user()->id)->orderBy('id', 'DESC')->pluck('id');
        $orders = Order::with('user', 'product')->whereIn('product_id', $products_ids)->get();

        return view('seller_dash.orders.index', compact('orders'));
    }

    public function updateOrderStatus(Request $request)
    {
        if (auth()->user()->status == 'active') {
            $validation = $request->validate([
                'id' => 'required|numeric|exists:orders,id',
                'order_status' => 'required|in:pending,process,delivered,cancelled'
            ]);

            $order = Order::find($request->id);
            if (!$order) {
                abort('404');
            }

            $product = Product::where('id', $order->product_id)->where('vendor_id', auth()->user()->id)->first();

            if (!$product) {
                abort('404');
            }

            $status = $order->update([
                'status_order' => $request->order_status
            ]);

            if ($status) {

                return redirect()->route('seller_orders.index')->with('success', 'The Order Status has been updated successfully');
            }
            return redirect()->route('seller_orders.index')->with('error', 'Something went wrong');
        } else {
            return redirect()->route('seller.dashboard')->with('error', 'Your account is not yet activated. You cannot add products or deal with any orders. Please
                        contact us to resolve this issue.');
        }
    }

    // Get Order Details
    public function orderDetails($order_number)
    {
        $product_ids = Product::where('vendor_id', auth()->user()->id)->pluck('id');
        // return $product_ids;
        $order = Order::with('product', 'user')->whereIn('product_id', $product_ids)->where('order_number', $order_number)->first();
        if (!$order) {
            abort('404');
        }


        // make as notification read
        $notification = DB::table('notifications')->where('notifiable_id', auth()->user()->id)->where('data->order_number', $order_number);
        $notification->update(['read_at' => now()]);

        return view('seller_dash.orders.order_details', compact('order'));
    }

    // move order to Trash 

    public function OrderToTrash(Request $request)
    {
        if (auth()->user()->status == 'active') {
            $order = Order::find($request->id);
            if (!$order) {
                abort('404');
            }
            $product = Product::where('id', $order->product_id)->where('vendor_id', auth()->user()->id)->first();

            if (!$product) {
                abort('404');
            }
            $status = $order->delete();

            if ($status) {

                return redirect()->route('seller_orders.index')->with('success', 'The Order have been moved to trash');
            }
            return redirect()->route('seller_orders.index')->with('error', 'Something went wrong');
        } else {
            return redirect()->route('seller.dashboard')->with('error', 'Your account is not yet activated. You cannot add products or deal with any orders. Please
                        contact us to resolve this issue.');
        }
    }
}
