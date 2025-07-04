<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // preno i tipi
        $types = Type::all();

        // prendo le tecnologie
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newProject = new Project();

        $newProject->title = $data["title"];
        $newProject->type_id = $data["type_id"];
        $newProject->description = $data["description"];
        $newProject->image = $data["image"];
        $newProject->github_url = $data["github_url"];
        $newProject->site_url = $data["site_url"];

        $newProject->save();

        // verifico se ricevo le tecnologie
        if ($request->has("technologies")) {

            // aggiungo alla tabella pivot tutti le tecnologie selezionate collegate al progetto in questione
            $newProject->technologies()->attach($data["technologies"]);
        }

        return redirect()->route('projects.show', $newProject->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();

        // prendo le tecnologie
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->title = $data["title"];
        $project->type_id = $data["type_id"];
        $project->description = $data["description"];
        $project->image = $data["image"];
        $project->github_url = $data["github_url"];
        $project->site_url = $data["site_url"];

        $project->update();

        // verifico se ricevo le tecnologie
        if ($request->has("technologies")) {

            // sincronizzo le tecnologie della tabella pivot
            $project->technologies()->sync($data["technologies"]);
        } else {

            // se non ricevo le tecnologie allora elimino dalla tavella pivot tutte le tecnologie collegate al progetto in questione
            $project->technologies()->detach();
        }

        return redirect()->route('projects.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
