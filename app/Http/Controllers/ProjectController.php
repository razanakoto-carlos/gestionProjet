<?php

namespace App\Http\Controllers;

use App\Models\Cp;
use App\Models\Dp;
use App\Models\Project;
use App\Models\Raf;
use App\Models\Rai;
use App\Models\Rpm;
use App\Models\Rse;
use App\Models\Rsenv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Projet.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_projet' => 'required|string|max:255',
            'date' => 'required|date',
            'fichier.*' => 'file|mimes:png,jpg,pdf,docx',
        ]);

        $filesPath = [];
        if($request->hasFile('fichier')){
            foreach ($request->file('fichier') as $file) {
                $filename = time()."_".$file->getClientOriginalName();
                $file->storeAs('uploads',$filename, 'public');
                $filesPath[] = 'uploads/'.$filename ;//Ajouter le chemin du fichier au tableau
            }
        }


        //Sauvegarder le projet
        $project = new Project;
        $project->nom_projet = $request->input('nom_projet');
        $project->date = $request->input('date');
        $project->fichier = json_encode($filesPath); // Stocker les chemins des fichiers sous forme de JSON
        $project->save();
        //Crée un requette de chaque responsable
        Rse::create([
            'project_id' => $project->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);

        Rsenv::create([
            'project_id' => $project->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);
        Rpm::create([
            'project_id' => $project->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);
        Raf::create([
            'project_id' => $project->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);
        Rai::create([
            'project_id' => $project->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);
        Cp::create([
            'project_id' => $project->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);
        Dp::create([
            'project_id' => $project->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);


        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
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
    public function destroy($id)
    {
        $project = Project::findorFail($id);

        // Supprimer l'ancienne image si elle existe
        $filePaths = json_decode($project->fichier, true);

        // Supprimer chaque fichier du système de fichiers
        if ($filePaths) {
            foreach ($filePaths as $filePath) {
                // Vérifier si le fichier existe avant de le supprimer
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                }
            }
        }
        $project->delete();
        return redirect()->route('dashboard')->with('status', 'project-deleted');
    }
}
