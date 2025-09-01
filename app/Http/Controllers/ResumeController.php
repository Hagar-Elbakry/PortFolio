<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function __invoke() {
        $experiences = Experience::all();
        $educations = Education::all();
        $skills = Skill::all();
        return view('resume', compact('experiences', 'educations', 'skills'));
    }
}
