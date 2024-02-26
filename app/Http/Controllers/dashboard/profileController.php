<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Utils\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class profileController extends Controller
{

    public function index()
    {
        $user =  auth()->user();
        return view('backend.profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'image' => 'image|mimes:png,jpg',
            'current_password' => 'required_with:password|min:6',
            'password' => 'nullable|confirmed|min:6',
        ]);
        $user = User::find(auth()->user()->id);


        if ($request->current_password) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'The current password is incorrect.');
            }

            // Update the user's password
            if ($request->password) {
                $user->update([
                    'password' => Hash::make($request->password),
                ]);
            }
        }

        if ($request->hasFile('image')) {
            //delete the old image
            $fileToCheck = public_path('images/Users/' . $user->image);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $path = 'Users';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);

            $user->update([
                'image' => $imageName,
            ]);
        }

        // Update the user's name and email
        $user->update([
            'full _name' => $request->full_name,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
