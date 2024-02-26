<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Utils\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('rates')->orderBy('id', 'DESC')->get();
        return view('backend.products.index', compact('products'));
    }


    public function create()
    {
        $data =
            [
                'brands' => Brand::all(),
                'cats_parent' =>  Category::where('is_parent', 1)->get(),
                'vendors' => User::where('role', 'seller')->get(),
            ];
        return view('backend.products.create', $data);
    }


    public function store(Request $request)
    {

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
            'vendor_id' => 'required|numeric'

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
        $status = Product::create($data);

        if ($status) {
            return redirect()->route('product.create')->with('success', 'Record  Added Successfully.');
        } else {
            return redirect()->route('product.create')->with('error', 'Something Went Wrong.');
        }
    }


    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        $data =
            [
                'brands' => Brand::all(),
                'cats_parent' =>  Category::where('is_parent', 1)->get(),
                'product' => $product,
                'vendors' => User::where('role', 'seller')->get(),
            ];
        return view('backend.products.edit', $data);
    }


    public function update(Request $request, string $id)
    {
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
            'vendor_id' => 'required|numeric'
        ]);
        $product = Product::findOrFail($id);
        $data = $request->all();
        if ($request->has('image')) {
            //delete the old image
            $fileToCheck = public_path('images/Products/' . $product['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $path = 'Products';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
            $data['image'] = $imageName;
        }

        // make offer_price 
        $data['offer_price'] = $request->price - (($request->price * $request->discount) / 100);
        $status = $product->update($data);

        if ($status) {
            return redirect()->route('product.index')->with('success', 'Record  Edited Successfully.');
        } else {
            return redirect()->route('product.index')->with('error', 'Something Went Wrong.');
        }
    }

    //show all detail
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.product_detail', compact('product'));
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            $fileToCheck = public_path('images/Products/' . $product['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Record  Deleted successfully.');
        }
        return redirect()->route('product.index')->with('error', 'Something Went Wrong.');
    }

    //to get cats children
    public function getCatChildren($id)
    {
        $data = Category::where('parent_id', $id)->get();
        return response()->json($data);
    }
}
