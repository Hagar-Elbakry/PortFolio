<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function __invoke() {
        $experiences = Experience::all();
        $educations = Education::all();
        return view('resume', compact('experiences', 'educations'));
    }
}
