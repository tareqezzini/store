<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Utils\UploadImages;
use Illuminate\Support\Facades\File;

class teamController extends Controller
{

    public function index()
    {
        $team = Team::all();
        return view('backend.team.index', compact('team'));
    }


    public function create()
    {
        return view('backend.team.create');
    }


    public function store(Request $request)
    {
        $validation = $request->validate([
            'image' => 'required|image|mimes:png,jpg',
            'full_name' => 'required|string',
            'position' => 'required|string',
            'status' => 'sometimes|in:active,inactive'
        ]);
        $imageName = null;
        if ($request->has('image')) {
            $path = 'Team';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
        }
        $data = $request->all();
        $data['image'] = $imageName;

        $status = Team::create($data);
        if ($status) {
            return redirect()->route('team.index')->with('success', 'Record  Added Successfully.');
        } else {
            return redirect()->route('team.index')->with('error', 'Something Went Wrong.');
        }
    }



    public function edit(string $id)
    {
        $team = Team::find($id);
        return view('backend.team.edit', compact('team'));
    }


    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'image' => 'required|image|mimes:png,jpg',
            'full_name' => 'required|string',
            'position' => 'required|string',
            'status' => 'sometimes|in:active,inactive'
        ]);

        $team = Team::find($id);
        if (!$team) {
            return redirect()->back()->with('error', 'Something Went Wrong.');
        }
        $data = $request->all();

        if ($request->hasFile('image')) {
            //delete the old image
            $fileToCheck = public_path('images/Team/' . $team['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $path = 'Team';
            $image = $request->file('image');
            $imageName = UploadImages::uploadImage($image, $path);
            $data['image'] = $imageName;
        }

        $status = $team->update($data);
        if ($status) {
            return redirect()->route('team.index')->with('success', 'Record  Updated Successfully.');
        } else {
            return redirect()->route('team.index')->with('error', 'Something Went Wrong.');
        }
    }


    public function destroy(string $id)
    {
        $team = Team::find($id);
        if ($team) {
            $fileToCheck = public_path('images/Team/' . $team['image']);
            if (File::exists($fileToCheck)) {
                File::delete($fileToCheck);
            }
            $status = $team->delete();
            if ($status) {
                return redirect()->route('team.index')->with('success', 'Record  Deleted Successfully.');
            }
            return redirect()->route('team.index')->with('error', 'Something Went Wrong.');
        }
        return redirect()->route('team.index')->with('error', 'Something Went Wrong.');
    }
}
