<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Utils\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SellerProductController extends Controller
{

    public function index()
    {
        $products = Product::with('rates')->where('vendor_id', auth()->user()->id)->orderBy('id', 'DESC')->get();

        return view('seller_dash.products.index', compact('products'));
    }


    public function create()
    {
        $data =
            [
                'brands' => Brand::all(),
                'cats_parent' =>  Category::where('is_parent', 1)->get(),
            ];

        if (auth()->user()->status == 'active') {
            return view('seller_dash.products.create', $data);
        } else {
            return redirect()->route('seller.dashboard')->with('error', 'Your account is not yet activated. You cannot add products or deal with any orders. Please
                        contact us to resolve this issue.');
        }
    }


    public function store(Request $request)
    {

        if (auth()->user()->status == 'active') {
            $validation = $request->validate([
                'image' => 'required|image|mimes:png,jpg',
                'title' => 'required|string',
                'price' => 'required|numeric',
                'discount' => 'required|numeric',
                'summary' => 'nullable|string',
                'description' => 'nullable|string',
                'status' => 'nullable|in:active,inactive',
                'cat_id' => 'required|numeric',
                'brand_id' => 'required|numeric',
                'child_cat_id' => 'required|numeric',
                'condition' => 'required|in:new,popular,winter',
            ]);
            $data = $request->all();
            $imageName = "";
            if ($request->has('image')) {
                $path = 'Products';
                $image = $request->file('image');
                $imageName = UploadImages::uploadImage($image, $path);
            }
            // make offer_price 
            $data['offer_price'] = $request->price - (($request->price * $request->discount) / 100);
            //make slug
            $slug = Str::slug($request->title);
            $slug_count = Product::where('slug', $slug)->count();
            if ($slug_count > 0) {
                $slug = time() . '_' . $slug;
            }
            $data['image'] = $imageName;
            $data['slug'] = $slug;
            $data['vendor_id'] = auth()->user()->id;
            $status = Product::create($data);

            if ($status) {
                return redirect()->route('seller_products.create')->with('success', 'Record  Added Successfully.');
            } else {
                return redirect()->route('seller_products.create')->with('error', 'Something Went Wrong.');
            }
        } else {
            return redirect()->route('seller.dashboard')->with('error', 'Your account is not yet activated. You cannot add products or deal with any orders. Please
                        contact us to resolve this issue.');
        }
    }


    public function edit(string $id)
    {

        $product = Product::where('id', $id)->where('vendor_id', auth()->user()->id)->first();
        if ($product) {

            $data =
                [
                    'brands' => Brand::all(),
                    'cats_parent' =>  Category::where('is_parent', 1)->get(),
                    'product' => $product,
                    'vendors' => User::where('role', 'seller')->get(),
                ];
            return view('seller_dash.products.edit', $data);
        }
        abort('404');
    }


    public function update(Request $request, string $id)
    {
        if (auth()->user()->status == 'active') {
            $validation = $request->validate([
                'image' => 'image|mimes:png,jpg',
                'title' => 'required|string',
                'price' => 'required|numeric',
                'discount' => 'required|numeric',
                'summary' => 'nullable|string',
                'description' => 'nullable|string',
                'status' => 'nullable|in:active,inactive',
                'cat_id' => 'required|numeric',
                'brand_id' => 'required|numeric',
                'child_cat_id' => 'required|numeric',
                'condition' => 'required|in:new,popular,winter',
            ]);
            $product = Product::where('id', $id)->where('vendor_id', auth()->user()->id)->first();
            if (!$product) {
                abort(404);
            }
            $data = $request->all();

            if ($request->hasFile('image')) {
                // Delete the old image
                $oldImagePath = public_path('images/Products/' . $product->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }

                $path = 'Products';
                $image = $request->file('image');
                $imageName = UploadImages::uploadImage($image, $path);
                $data['image'] = $imageName;
            }


            // Calculate and set the offer_price
            $data['offer_price'] = $data['price'] - (($data['price'] * $data['discount']) / 100);
            $data['vendor_id'] = auth()->user()->id;
            $status = $product->update($data);
            if ($status) {
                return redirect()->route('seller_products.index')->with('success', 'Record  Edited Successfully.');
            }
            return redirect()->route('seller_dash.index')->with('error', 'Something Went Wrong.');
        } else {
            return redirect()->route('seller.dashboard')->with('error', 'Your account is not yet activated. You cannot add products or deal with any orders. Please
                        contact us to resolve this issue.');
        }
    }

    //show all detail
    public function show($id)
    {
        $product = Product::where('id', $id)->where('vendor_id', auth()->user()->id)->first();
        if (!$product) {
            abort(404);
        }
        return view('seller_dash.products.product_detail', compact('product'));
    }

    public function destroy(string $id)
    {
        if (auth()->user()->status == 'active') {
            $product = Product::where('id', $id)->where('vendor_id', auth()->user()->id)->first();
            if (!$product) {
                return redirect()->route('seller_products.index')->with('error', 'Something Went Wrong.');
            }

            $fileToCheck = public_path('images/Products/' . $product['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $product->delete();
            return redirect()->route('seller_products.index')->with('success', 'Record  Deleted successfully.');
        } else {
            return redirect()->route('seller.dashboard')->with('error', 'Your account is not yet activated. You cannot add products or deal with any orders. Please
                        contact us to resolve this issue.');
        }
    }

    //to get cats children
    public function getCatChildren($id)
    {
        $data = Category::where('parent_id', $id)->get();
        return response()->json($data);
    }
}
