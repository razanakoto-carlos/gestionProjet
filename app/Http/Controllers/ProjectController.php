<?php

namespace App\Http\Controllers;

use App\Models\Cp;
use App\Models\Dp;
use App\Models\P_ca;
use App\Models\P_cp;
use App\Models\P_cpt;
use App\Models\P_raf;
use App\Models\P_rai;
use App\Models\P_rpm;
use App\Models\P_rse;
use App\Models\Paiement;
use App\Models\Project;
use App\Models\Raf;
use App\Models\Rai;
use App\Models\Rpm;
use App\Models\Rse;
use App\Models\Rsenv;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('dashboard');
        }
        $projects = Project::where('nom_projet', 'like', "%$searchTerm%")->get();

        return view('dashboard', compact('projects'));
    }

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
        $this->authorize('isDP');
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
        if ($request->hasFile('fichier')) {
            foreach ($request->file('fichier') as $file) {
                $filename = time() . "_" . $file->getClientOriginalName();
                $file->storeAs('uploads', $filename, 'public');
                $filesPath[] = 'uploads/' . $filename; //Ajouter le chemin du fichier au tableau
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

        //Creation de paiement
        $paiement = Paiement::create([
            'project_id' => $project->id,
            'updated_at' => date('Y-m-d\TH:i'),
            'created_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
        ]);

        P_rse::create([
            'paiement_id' => $paiement->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);

        P_cpt::create([
            'paiement_id' => $paiement->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);
        P_rpm::create([
            'paiement_id' => $paiement->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);
        P_raf::create([
            'paiement_id' => $paiement->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);
        P_rai::create([
            'paiement_id' => $paiement->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);
        P_cp::create([
            'paiement_id' => $paiement->id,
            'created_at' => date('Y-m-d\TH:i'),
            'updated_at' => date('Y-m-d\TH:i'),
            'date' => date('Y-m-d\TH:i'),
            'observations' => "",
        ]);
        P_ca::create([
            'paiement_id' => $paiement->id,
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
        $this->authorize('isDP');
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
