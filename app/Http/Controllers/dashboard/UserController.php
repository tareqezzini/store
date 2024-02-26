<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('backend.users.index', compact('users'));
    }


    public function create()
    {
        return view('backend.users.create');
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'image' => 'required|image|mimes:png,jpg',
            'full_name' => 'required|string|max:25',
            'user_name' => 'required|string|max:25',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string',
            'status' => 'in:active,inactive',
            'role' => 'in:admin,vendor,customer',
        ]);
        $data =  $request->all();

        $imageName = null;
        if ($request->has('image')) {
            $path = 'Users';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
        }
        $data['image'] = $imageName;
        $data['password'] = Hash::make($request->input('password'));
        $status = User::create($data);

        if ($status) {
            return redirect()->route('user.index')->with('success', 'Record  Added Successfully.');
        } else {
            return redirect()->route('user.index')->with('error', 'Something Went Wrong.');
        }
    }



    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.edit', compact('user'));
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
            'role' => 'in:admin,vendor,customer',
        ]);

        $user = User::findOrFail($id);
        $data =  $request->all();
        if ($request->has('image')) {
            //delete the old image
            $fileToCheck = public_path('images/Users/' . $user['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            // Upload the new image 
            $path = 'Users';
            $image = $request->file('image');
            $data['image'] = UploadImages::uploadImage($image, $path);
        }

        // update the password 
        if ($request->input('password')) {
            $data['password'] = Hash::make($request->input('password'));
        }
        $status = $user->update($data);
        if ($status) {
            return redirect()->route('user.index')->with('success', 'The Record Updated Successful');
        } else {

            return redirect()->route('user.index')->with('error', 'Something Went Wrong.');
        }
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        if ($user) {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'The Record Deleted Successful');
        }
        return redirect()->route('user.index')->with('error', 'Something Went Wrong.');
    }
}
