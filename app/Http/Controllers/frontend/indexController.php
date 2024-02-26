<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    public function index()
    {
        $data =
            [
                'topRatedProduct' => Product::with('rates')
                    ->select('products.id', 'products.title', 'products.description', 'products.price', 'products.offer_price', 'products.slug', 'products.image', DB::raw('AVG(product_rates.rate) as average_rating'))
                    ->join('product_rates', 'products.id', '=', 'product_rates.product_id')
                    ->groupBy('products.id', 'products.title', 'products.description', 'products.price', 'products.offer_price', 'products.slug', 'products.image')
                    ->orderByDesc('average_rating')
                    ->limit(8)->get(),


                'topSellingProducts' =>  Product::select('products.id', 'products.title', 'products.description', 'products.price', 'products.offer_price', 'products.slug', 'products.image', DB::raw('AVG(product_rates.rate) as average_rating'))
                    ->withCount('orders')
                    ->leftJoin('product_rates', 'products.id', '=', 'product_rates.product_id')
                    ->groupBy('products.id', 'products.title', 'products.description', 'products.price', 'products.offer_price', 'products.slug', 'products.image')
                    ->orderByDesc('orders_count')
                    ->take(8)
                    ->get(),
                'banners' => Banner::where('status', 'active')->where('condition', 'banner')->get(),
                'brands' => Brand::where('status', 'active')->limit(6)->get(),
                'cats' => Category::where('status', 'active')->where('is_parent', '1')->limit(16)->get(),

                'new_products' => Product::select('products.*')
                    ->selectSub('( SELECT AVG(rate)  FROM product_rates  
                        WHERE product_rates.product_id = products.id )', 'avg_rating')
                    ->where(['condition' => 'new', 'status' => 'active'])
                    ->limit(10)
                    ->get()



            ];
        return view('website.index', $data);
    }



    // Get product related to Category and filter them
    public function getProductCat(Request $request, $slug)
    {
        $cat = Category::where('slug', $slug)->first();

        if ($cat) {
            $products = Product::with(['rates' => function ($query) {
                $query->selectRaw('product_id, AVG(rate) as avg_rating')
                    ->groupBy('product_id');
            }])
                ->where(['cat_id' => $cat->id, 'status' => 'active'])
                ->when($request->sort, function ($query) use ($request) {

                    if ($request->sort === 'price') {
                        return $query->orderBy('price', 'DESC');
                    } elseif ($request->sort === 'discount') {
                        return $query->orderBy('discount', 'DESC');
                    }

                    return $query->orderBy('created_at', 'DESC');
                })
                ->get();
            return view('website.pages.products.products_cats', compact('cat', 'products'));
        }

        abort(404);
    }

    // get product details 

    public function productDetails($slug)
    {
        $product_details = Product::with('related_products')->where('slug', $slug)->first();

        if (!$product_details) {
            abort(404);
        }

        // Fetch rates for the main product
        $mainProductRates = ProductRate::with('user')
            ->where('product_id', $product_details->id)
            ->limit(3)
            ->get();

        $mainProductAllRates = ProductRate::with('user')
            ->where('product_id', $product_details->id)
            ->get();

        // Calculate the average rate and the total number of rates for the main product
        $mainProductAverageRate = $mainProductAllRates->avg('rate');
        $mainProductTotalRates = $mainProductAllRates->count();

        // Fetch rates for all related products
        $relatedProducts = $product_details->related_products;
        $averageRatesForRelatedProducts = [
            'id' => '',
            'rate' => ''
        ];

        foreach ($relatedProducts as $relatedProduct) {
            $relatedProductRates = ProductRate::where('product_id', $relatedProduct->id)->get();
            $averageRate = $relatedProductRates->avg('rate');
            $averageRatesForRelatedProducts[$relatedProduct->id] = $averageRate;
        }


        

        return view('website.pages.products.product_details', compact('product_details', 'mainProductRates', 'mainProductAverageRate', 'mainProductTotalRates', 'averageRatesForRelatedProducts'));
    }


    // redirect to login and register

    public function login()
    {
        return view('website.auth.login');
    }
    public function register()
    {
        return view('website.auth.register');
    }
}