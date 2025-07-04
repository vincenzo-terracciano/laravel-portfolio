<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // restituisco la lista dei progetti
    public function index()
    {
        $projects = Project::with('type')->paginate(6);

        return response()->json([
            "success" => true,
            "data" => $projects
        ]);
    }

    // restituisco un singolo progetto
    public function show(Project $project)
    {
        $project->load('type', 'technologies');

        return response()->json([
            "success" => true,
            "data" => $project
        ]);
    }
}
