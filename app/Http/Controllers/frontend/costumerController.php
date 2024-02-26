<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Utils\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class costumerController extends Controller
{
    //user account
    public function index()
    {
        $user = Auth()->user();
        $orders = Order::where('user_id', $user->id)->get();
        return view('website.pages.user.dashboard', compact('user', 'orders'));
    }

    // Update User  Account Info
    public function updateAccountInfo(Request $request)
    {
        $validation = $request->validate([
            'full_name' => 'required|string|max:255',
            'user_name' => 'string|max:255',
            'password' => 'required|password_match|min:8',
            'image'   => 'image|mimes:png,jpg',
            'phone'  => 'required|string',
        ]);

        $user = User::find(auth()->user()->id);

        if ($user) {

            if ($request->has('image')) {
                //delete the old image
                $fileToCheck = public_path('images/Users/' . $user['image']);
                if (File::exists($fileToCheck)) {
                    File::delete($fileToCheck);
                }
                $path = 'Users';
                $image = $request->file('image');
                $imageName = UploadImages::uploadImage($image, $path);
                $user->update([
                    'image' => $imageName
                ]);
            }
            $status = $user->update([
                'user_name' => $request->user_name,
                'full_name' => $request->full_name,
                'phone' => $request->phone,
            ]);

            if ($status) {
                return redirect()->back()->with('success', 'The Account info have been Updated');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    // update Address 

    public function updateAddress(Request $request)
    {
        $validation = $request->validate([
            'address' => 'string|max:255',
            'state' => 'string|max:255',
            'country' => 'string|max:255',
            'city'   => 'string|max:255',
            'code_postal' => 'string|max:255',
            'password' => 'required|password_match|min:8',

        ]);

        $user = User::find(auth()->user()->id);

        if ($user) {
            $status = $user->update([
                'address' => $request->address,
                'state' => $request->state,
                'country' => $request->country,
                'city' => $request->city,
                'code_postal' => $request->code_postal
            ]);
            if ($status) {
                return redirect()->back()->with('success', 'The Account info have been Updated');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    // Change Password 

    public function updatePassword(Request $request)
    {
        $validation = $request->validate([
            'current_password' => 'required|string|password_match|min:8',
            'new_password' => 'required|string|min:8|confirmed',

        ]);
        $user = User::find(auth()->user()->id);
        if ($user) {
            $status = $user->update(["password" => $request->new_password]);
            if ($status) {
                return redirect()->back()->with('success', 'The Password have been Updated');
            } else {
                return redirect()->back()->with('error', 'Something went wrong');
            }
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
