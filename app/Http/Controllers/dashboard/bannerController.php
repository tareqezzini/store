<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Utils\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class bannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('backend.banners.index', compact('banners'));
    }


    public function create()
    {
        return view('backend.banners.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'image' => 'required|image|mimes:png,jpg',
            'title' => 'string|required',
            'description' => 'string|nullable',
            'status' => 'nullable|in:active,inactive',
            'condition' => 'nullable|in:banner,promo'
        ]);
        //make slug

        $slug = Str::slug($request->title);
        $slug_count = Banner::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '_' . $slug;
        }

        if ($request->has('image')) {
            $path = 'Banners';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
        }

        $status = Banner::create([
            'image' => $imageName,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'condition' => $request->condition,
            'slug' => $slug
        ]);


        if ($status) {
            return redirect()->route('banner.index')->with('success', 'Record  Added Successfully.');
        } else {
            return redirect()->route('banner.index')->with('error', 'Something Went Wrong.');
        }
    }





    public function edit(string $id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banners.edit', compact('banner'));
    }


    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'image' => 'image|mimes:png,jpg',
            'title' => 'string|required',
            'description' => 'string|nullable',
            'status' => 'nullable|in:active,inactive',
            'condition' => 'nullable|in:banner,promo'
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->has('image')) {
            //delete the old image
            $fileToCheck = public_path('images/Banners/' . $banner['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $path = 'Banners';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
            $banner->update([
                'image' => $imageName,
            ]);
        }

        $status = $banner->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'condition' => $request->condition,
        ]);
        if ($status) {
            return redirect()->route('banner.index')->with('success', 'Record  Updated Successfully.');
        } else {
            return redirect()->route('banner.index')->with('error', 'Something Went Wrong.');
        }
    }


    public function destroy(string $id)
    {
        $banner = Banner::findOrFail($id);
        if ($banner) {
            $fileToCheck = public_path('images/Banners/' . $banner['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $banner->delete();
            return redirect()->route('banner.index')->with('success', 'Record  Deleted successfully.');
        }
        return redirect()->route('banner.index')->with('error', 'Something Went Wrong.');
    }
}
