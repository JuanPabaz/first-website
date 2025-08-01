<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latestProjects();
        return view('home', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function list()
    {
        $types = ProjectType::all();
        $selectedType = request()->input('type');
        
        $query = Project::query()->with('type');
        
        if ($selectedType) {
            $query->whereHas('type', function($q) use ($selectedType) {
                $q->where('id', $selectedType);
            });
        }
        
        $projects = $query->orderBy('date', 'desc')->paginate(9);
        
        return view('projects', compact('projects', 'types', 'selectedType'));
    }

    public function show(Project $project)
    {
        $project->load('images'); // carga las imágenes relacionadas
        return view('project-view', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
