<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use illuminate\Support\Str;
use PhpParser\Node\Stmt\Return_;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = request()->input('status', 'all');

    if ($status === 'all') {
        $projects = Project::all();
    } else {
        $projects = Project::where('status', $status)->get();
    }

    return view('admin.projects.index', compact('projects'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data= $request->all();
        //oppure al posto di request->all(), 
        //mettiamo $request->validated() in modo da prendere solo i dati che sono stati validati

        //controllo se c'è il file cover_image nel request
        if($request->hasFile('cover_image')) {
            //salvo il file nel strorage
            $image_path = Storage::put('post_images', $request->cover_image);
            // salvo il path del file nei dati da inserire nel daabase
            $data['cover_image'] = $image_path;
        }

        $project= new Project();
        $project->fill($data);
        $project->slug = Str::slug($request->title);
        $project->save();
        return redirect()-> route('admin.projects.show', $project->slug);
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
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->all();
        $project->slug = Str::slug($request->title);

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }
            $image_path = Storage::put('post_images', $request->cover_image);
            $data['cover_image'] = $image_path;
        }
        $project->update($data);
        return redirect()->route('admin.projects.show', $project->slug)->with('message',  $project->title .  ' è stato modificato');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        
        // Se il post ha l'immagine, cancelliamola
        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }
        
        
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', $project->title . ' è stato eliminato');
    }


//controller per file in eliminazione

    public function trash()
    {
        dd('Reached here');
    
        return view('admin.projects.trash');
    }

}


