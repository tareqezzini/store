<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\ProductRate;
use Illuminate\Http\Request;

class ProductRateController extends Controller
{
    public function productRate(Request $request, $id)
    {
        $validation = $request->validate([
            "rate" => 'required|numeric',
            'comment' => 'string|required',
            'product_id' => 'required|numeric|exists:products,id',
        ]);

        $user_id = auth()->user()->id;
        $productRate = ProductRate::where(['user_id' => $user_id, 'product_id' => $request->product_id])->first();
        if ($productRate) {

            $status = $productRate->update([
                'comment'       => $request->comment,
                'rate'          => $request->rate,
            ]);

            if ($status) {
                return redirect()->back()->with('success', 'Thank you for rate this product');
            }
            return redirect()->back()->with('error', 'Something went wrong');
        }

        $status = ProductRate::create([
            'user_id'       => $user_id,
            'product_id'    => $request->product_id,
            'comment'       => $request->comment,
            'rate'          => $request->rate,
        ]);

        if ($status) {
            return redirect()->back()->with('success', 'Thank you for rate this product');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }
}
