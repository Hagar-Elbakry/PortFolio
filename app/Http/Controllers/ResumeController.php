<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index() {
        $experiences = Experience::all();
        $educations = Education::all();
        $skills = Skill::all();
        $languages = Language::all();
        return view('resume', compact('experiences', 'educations', 'skills', 'languages'));
    }

    public function download() {
        $resumes = Resume::all();
         return Storage::download($resumes[0]->resume, 'resume.pdf');
    }
}
