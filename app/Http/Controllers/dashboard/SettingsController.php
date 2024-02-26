<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Settings;
use App\Http\Controllers\Controller;
use App\Utils\UploadImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingsController extends Controller
{

    public function index()
    {
        $settings = Settings::first();
        return view('backend.settings.index', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name_app' => 'required|',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'facebook' => 'required|url',
            'instagram' => 'required|url',
            'description' => 'required|',
            'logo' => 'image|mimes:png',
            'fave_icon' => 'image|mimes:png',
        ]);

        $settings = Settings::where('id', $id)->first();
        if (!$settings) {
            return redirect()->route('settings.index')->with('error', 'Something Went Wrong.');
        }
        $data = $request->all();
        if ($request->has('logo')) {
            //delete the old image
            $fileToCheck = public_path('images/Logo/' . $settings['logo']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }

            $path = 'Logo';
            $image = $request->file('logo');
            $imageName = UploadImages::uploadImage($image, $path);
            $data['logo'] = $imageName;
        }
        if ($request->has('fave_icon')) {
            //delete the old image
            $fileToCheck = public_path('images/Logo/' . $settings['fave_icon']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }

            $path = 'Logo';
            $image = $request->file('fave_icon');
            $imageName = UploadImages::uploadImage($image, $path);
            $data['fave_icon'] = $imageName;
        }
        $status = $settings->update($data);
        if ($status) {
            return redirect()->route('settings.index')->with('success', 'The Settings have been updated Successfully.');
        }
        return redirect()->route('settings.index')->with('error', 'Something Went Wrong.');
    }
}
