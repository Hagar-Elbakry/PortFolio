<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __invoke() {
        $projects = Project::paginate(5);
        return view('projects', compact('projects'));
    }
}
