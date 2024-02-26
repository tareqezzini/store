<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function index()
    {

        $products = Product::query();

        if (!empty($_GET['category'])) {
            $slugs = explode(',', $_GET['category']);
            $cats_ids = Category::whereIn('slug', $slugs)->pluck('id')->toArray();
            $products->whereIn('cat_id', $cats_ids);
        } else {

            $products->where('status', 'active')->where('stock', '>', 0)->orderBy('id', 'DESC');
        }

        if (!empty($_GET['sortBy'])) {
            $sortBy = $_GET['sortBy'];

            if ($sortBy == 'priceHtL') {
                $products->where('status', 'active')->orderBy('offer_price', 'DESC')->get();
            } elseif ($sortBy == 'priceLtH') {
                $products->where('status', 'active')->orderBy('offer_price', 'ASC')->get();
            } elseif ($sortBy == 'discountHtL') {
                $products = $products->where('status', 'active')->orderBy('discount', 'DESC')->get();
            } elseif ($sortBy == 'discountLtH') {
                $products->where('status', 'active')->orderBy('discount', 'ASC')->get();
            } else {
                $products->where('status', 'active')->orderBy('id', 'DESC')->get();
            }
        } else {
            $products->where('status', 'active')->orderBy('id', 'DESC');
        }

        if (!empty($_GET['sortByPrice'])) {
            $priceRange  = explode(';', $_GET['sortByPrice']);
            if (count($priceRange))
                $products->whereBetween('offer_price', $priceRange);
        }
        // Eager load the ratings associated with each product
        $products->with('rates');
        $products = $products->get();

        $max_Price = Product::max('price');

        $cats = Category::where(['status' => 'active', 'is_parent' => 1])->get();

        $products_new = Product::where(['status' => 'active', 'condition' => 'new'])->limit(6)->get()->toArray();

        return view('website.pages.products.shop', compact('products', 'cats', 'products_new', 'max_Price'));
    }





    public function shopFilter(Request $request)
    {
        $data = $request->all();

        $catUrl = "";
        if (!empty($data['category'])) {
            foreach ($data['category'] as $category) {
                if (empty($catUrl)) {
                    $catUrl .= '&category=' . $category;
                } else {
                    $catUrl .= ',' . $category;
                }
            }
        }

        if (!empty($data['sortBy'])) {
            $sortBy = '&sortBy=' . $data['sortBy'];
        }
        if (!empty($data['sortByPrice'])) {
            $sortByPrice = '&sortByPrice=' . $data['sortByPrice'];
        }
        return redirect()->route('shop', $catUrl . $sortBy . $sortByPrice);
    }
}
