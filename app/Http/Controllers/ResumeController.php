<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function __invoke() {
        $experiences = Experience::all();
        return view('resume', compact('experiences'));
    }
}
