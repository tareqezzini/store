<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NewOrder;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

use function Pest\Laravel\get;

class checkoutController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $carts = Cart::session('cart')->getContent();
        foreach ($carts as $cart) {
            $product = Product::find($cart->id);

            if ($product) {
                // Retrieve the price from the database and add it to the array
                $price = $product->offer_price;

                // Retrieve the quantity from the cart and add it to the array
                $quantity = $cart->quantity;

                // Combine the price and quantity in an array
                $cartItems[] =
                    [
                        'product_id' => $product->id,
                        'name' => $product->title,
                        'price' => $price,
                        'quantity' => $quantity,
                        'total' => $quantity * $price,
                        // Add other product details as needed
                    ];
            }
        }
        return view('website.pages.checkout.checkout', compact('cartItems', 'user'));
    }
    // to check if the product exists in the Stock
    private function checkProductAvailability($cart)
    {
        $product = Product::find($cart->id);
        return $product && $cart->quantity <= $product->stock;
    }

    // Place order 

    public function addOrder(Request $request)
    {
        $validation = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'code_postal' => 'required|numeric',

        ]);

        // check if the quantity of product exists in stock

        $user = auth()->user();
        // check the product is available in the stock
        $carts = Cart::session('cart')->getContent();
        // make Seral 

        foreach ($carts as $cart) {
            $product = Product::find($cart->id);
            if (!$product || $cart->quantity > $product->stock) {
                return redirect()->back()->with('error', 'Only ' . $product->stock . ' pieces left of this product: ' . $product->title);
            }
        }

        // create order 
        try {
            DB::beginTransaction();
        foreach ($carts as $cart) {
            $order_number = $user->user_name .  mt_rand(10000000, 99999999);
            $product = Product::find($cart->id);
            if ($product) {
                $order = Order::create([
                    'order_number' => $order_number,
                    'user_id' => $user->id,
                    'product_id' => $cart->id,
                    'total_amount' => $product->offer_price * $cart->quantity,
                    'quantity' => $cart->quantity,
                    'delivery_charge' => '6',
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'method_payment' => $request->payment_method,
                    // 'status_payment'=>'',
                    'address' => $request->address,
                    'country' => $request->country,
                    'state' => $request->state,
                    'city' => $request->city,
                    'code_postal' => $request->code_postal,
                ]);

                // Send Notification

                $seller_id = $product->vendor_id;
                $users = User::where('role', 'admin')->orWhere('id',  $seller_id)->pluck('id')->toArray();;



                $product->update([
                    'stock' => ($product->stock - $cart->quantity)
                ]);
            }
        }

        if (!empty($users)) {
            $notifiableUsers = User::whereIn('id', $users)->get();
            $costumer_name = auth()->user()->full_name;
            Notification::send($notifiableUsers, new NewOrder($costumer_name, $order_number));
        }
        DB::commit();
        if ($order) {
            Cart::session('cart')->clear();
            return view('website.pages.checkout.order_success', compact('order_number'));
        }
        } catch (Exception) {
            return redirect()->back()->with('error', 'Failed to create the order. Please try again later.');
        }
    }
}