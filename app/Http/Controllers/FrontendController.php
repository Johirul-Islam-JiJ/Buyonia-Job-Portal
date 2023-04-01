<?php

namespace App\Http\Controllers;

use App\Models\Job;

class FrontendController extends Controller
{
    public function index()
    {
        $jobs = Job::orderBy('id', 'desc')->take(4)->get();
        return view('frontend.homepage',compact('jobs'));
    }
}
