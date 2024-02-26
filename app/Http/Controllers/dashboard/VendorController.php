<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{

    public function index()
    {
        $vendors = User::where('role', 'seller')->orderBy('created_at', 'DESC')->get();
        return view('backend.vendors.index', compact('vendors'));
    }


    public function create()
    {
        return view('backend.vendors.create');
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'image' => 'image|mimes:png,jpg',
            'full_name' => 'required|string|max:25',
            'user_name' => 'required|string|max:25',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string',
            'status' => 'in:active,inactive',
        ]);
        $data =  $request->all();

        if ($request->has('image')) {
            $path = 'Users';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
            $data['image'] = $imageName;
        }
        $data['password'] = Hash::make($request->input('password'));
        $data['role'] = 'seller';
        $status = User::create($data);

        if ($status) {
            return redirect()->route('vendor.index')->with('success', 'Record  Added Successfully.');
        } else {
            return redirect()->route('vendor.index')->with('error', 'Something Went Wrong.');
        }
    }


    public function edit(string $id)
    {
        $vendor = User::findOrFail($id);
        return view('backend.vendors.edit', compact('vendor'));
    }


    public function update(Request $request, string $id)
    {

        $validation = $request->validate([
            'image' => 'image|mimes:png,jpg',
            'full_name' => 'required|string|max:25',
            'user_name' => 'required|string|max:25',
            'email' => 'required|email',
            'phone' => 'string',
            'status' => 'in:active,inactive',
        ]);

        $vendor = User::findOrFail($id);
        $data =  $request->all();
        if ($request->has('image')) {
            //delete the old image
            $fileToCheck = public_path('images/Users/' . $vendor['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            // Upload the new image 
            $path = 'Users';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
            $vendor->update(['image' => $imageName]);
        }

        // update the password 
        if ($request->input('password')) {
            $password = Hash::make($request->input('password'));
            $vendor->update(['password' => $password]);
        }

        $status = $vendor->update(
            [
                'full_name' => $request->full_name,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status,
            ]
        );


        if ($status) {
            return redirect()->route('vendor.index')->with('success', 'The Record Updated Successful');
        } else {

            return redirect()->route('vendor.index')->with('error', 'Something Went Wrong.');
        }
    }

    public function destroy(string $id)
    {
        $vendor = User::findOrFail($id);
        if ($vendor) {
            $vendor->delete();
            return redirect()->route('vendor.index')->with('success', 'The Record Deleted Successful');
        }
        return redirect()->route('vendor.index')->with('error', 'Something Went Wrong.');
    }
}
