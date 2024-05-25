<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Functions\Helper as Help;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
        // dd($projects);
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
        //qui atterro da index.blade.php riga 7
        //prima di inserire nuovo proj verifico che non ci sia gia
        //se esiste ritorno a inde con mess di errore
        //se non esiste salvo ritorno a index con messaggio di successo
        $exists = Project::where('title', $request->name)->first();
        if($exists){
            return redirect()->route('admin.Project.index')->with('error', 'Progetto gia esistente');
        }else{
            $new = new Project();
            $new->title = $request->name;
            $new->slug = Help::generateSlug($new->name, Project::class);
            $new->save();
            return redirect()->route('admin.Project.index')->with('success', 'Progetto aggiunto');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
