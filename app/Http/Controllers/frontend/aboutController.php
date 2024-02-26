<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Team;

class aboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        $teams = Team::where('status', 'active')->get();
        return view('website.pages.aboutus.index', compact('about', 'teams'));
    }
}
