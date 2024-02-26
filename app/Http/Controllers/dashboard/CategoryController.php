<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Utils\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('backend.category.index', compact('categories'));
    }


    public function create()
    {
        $cats_parent = Category::where('is_parent', 1)->get();
        return view('backend.category.create', compact('cats_parent'));
    }


    public function store(Request $request)
    {

        $validation = $request->validate([
            'image' => 'image|mimes:png,jpg',
            'title' => 'string|required',
            'summary' => 'string|nullable',
            'status' => 'nullable|in:active,inactive',
            'is_parent' => 'sometimes|in:1',
            'parent_id' => 'nullable'
        ]);

        $imageName = "";
        if ($request->has('image')) {
            $path = 'Categories';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
        }
        //make slug

        $slug = Str::slug($request->title);
        $slug_count = Category::where('slug', $slug)->count();
        if ($slug_count > 0) {
            $slug = time() . '_' . $slug;
        }
        $data = $request->all();
        $data['image'] = $imageName;
        $data['slug'] = $slug;
        if ($request->is_parent == 1) {
            $data['is_parent'] = 1;
            $data['parent_id'] = null;
        } else {
            $data['is_parent'] = 0;
        }
        $status = Category::create($data);


        if ($status) {
            return redirect()->route('category.index')->with('success', 'Record  Added Successfully.');
        } else {
            return redirect()->route('category.index')->with('error', 'Something Went Wrong.');
        }
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $cats_parent = Category::where('is_parent', 1)->get();
        return view('backend.category.edit', compact('category', 'cats_parent'));
    }


    public function update(Request $request, string $id)
    {

        $validation = $request->validate([
            'image' => 'image|mimes:png,jpg',
            'title' => 'string|required',
            'summary' => 'string|nullable',
            'status' => 'nullable|in:active,inactive',
            'is_parent' => 'sometimes|in:1',
            'parent_id' => 'nullable'
        ]);

        $category = Category::findOrFail($id);
        $data = $request->all();

        //check the image is exists
        if ($request->has('image')) {
            //delete the old image
            $fileToCheck = public_path('images/Categories/' . $category['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $path = 'Categories';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
            $data['image'] = $imageName;
        }
        if ($request->is_parent == 1) {
            $data['is_parent'] = 1;
            $data['parent_id'] = null;
        } else {
            $data['is_parent'] = 0;
        }
        $status = $category->update($data);


        if ($status) {
            return redirect()->route('category.index')->with('success', 'Record  Edit Successfully.');
        } else {
            return redirect()->route('category.index')->with('error', 'Something Went Wrong.');
        }
    }


    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category) {
            $fileToCheck = public_path('images/Categories/' . $category['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Record  Deleted successfully.');
        }
        return redirect()->route('category.index')->with('error', 'Something Went Wrong.');
    }
}
