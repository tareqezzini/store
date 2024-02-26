<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class aboutController extends Controller
{

    public function index()
    {
        $about = About::first();
        return view('backend.about.index', compact('about'));
    }




    public function update(Request $request)
    {
        $validation = $request->validate(
            [
                'title' => 'required|string',
                'description' => 'required|string',
            ]
        );

        $about = About::first();
        if (!$about) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        $data = $request->all();
        $status = $about->update($data);
        if ($status) {
            return redirect()->back()->with('success', 'Updated Successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
