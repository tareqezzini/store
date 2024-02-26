<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Utils\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->get();
        return view('backend.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.brands.create');
    }


    public function store(Request $request)
    {

        $validation = $request->validate([
            'image' => 'image|mimes:png,jpg',
            'title' => 'string|required',
            'status' => 'nullable|in:active,inactive',
        ]);
        $imageName = null;
        if ($request->has('image')) {
            $path = 'Brands';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
        }

        //make slug
        $slug = Str::slug($request->title);
        $slug_count = Brand::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '_' . $slug;
        }
        $data = $request->all();
        $data['image'] = $imageName;
        $data['slug'] = $slug;

        $status = Brand::create($data);
        if ($status) {
            return redirect()->route('brand.index')->with('success', 'Record  Added Successfully.');
        } else {
            return redirect()->route('brand.index')->with('error', 'Something Went Wrong.');
        }
    }


    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brands.edit', compact('brand'));
    }


    public function update(Request $request, string $id)
    {


        $validation = $request->validate([
            'image' => 'image|mimes:png,jpg',
            'title' => 'string|required',
            'status' => 'nullable|in:active,inactive',
        ]);
        $brand = Brand::findOrFail($id);
        $data = $request->all();
        if ($request->has('image')) {
            $fileToCheck = public_path('images/Brands/' . $brand['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $path = 'Brands';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
            $data['image'] = $imageName;
        }

        $status = $brand->update($data);
        if ($status) {
            return redirect()->route('brand.index')->with('success', 'Record  Edited Successfully.');
        } else {
            return redirect()->route('brand.index')->with('error', 'Something Went Wrong.');
        }
    }


    public function destroy(string $id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            $fileToCheck = public_path('images/Brands/' . $brand['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $brand->delete();
            return redirect()->route('category.index')->with('success', 'Record  Deleted successfully.');
        }
        return redirect()->route('category.index')->with('error', 'Something Went Wrong.');
    }
}
