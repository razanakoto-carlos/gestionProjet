<?php

namespace App\Http\Controllers;

use App\Models\P_rpm;
use App\Models\Paiement;
use App\Models\Project;
use App\Models\Rpm;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class RpmPaiementController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('rpmPaiement.index');
        }

        $paiements = Paiement::whereHas('project', function ($query) use ($request) {
            $query->where('nom_projet', 'like', "%{$request->search}%");
        })->with('project') // Charger la relation 'project' pour accéder aux données du projet si nécessaire
            ->get();

        return view('Paiements.Rpm.index', compact('$paiements'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isRpm')) {
            abort(404);
        }
        $paiements = Paiement::whereHas('project', function ($query) {
            $query->where('r_rse', 1)
                ->where('r_bm', 1)
                ->where('r_rsenv', 1)
                ->where('r_raf', 1)
                ->where('r_rai', 1)
                ->where('r_cp', 1)
                ->where('r_dp', 1);
        })->with('rpm')->paginate(5);

        return view('Paiements.Rpm.index', compact('paiements'));
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

    /**
     * Display the specified resource.
     */
    public function show(Rpm $rpm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('isRpm')) {
            abort(404);
        }
        $rpm = P_rpm::findorFail($id);
        return view('Paiements.Rpm.edit', compact('rpm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('isRpm')) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'observations' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $rpm = P_rpm::findorFail($id);
        $paiement = $rpm->paiement;
        if (
            $request->input('pv_Adjudication') == 1 && $request->input('contrat_convention') == 1
            && $request->input('bon_de_commande') == 1 && $request->input('conformite_technique_travaux') == 1
            && $request->input('pv_de_reception_travaux') == 1 && $request->input('penalite_de_retard_travaux') == 1 &&
            $request->input('conformite_technique_biens') == 1 && $request->input('penalite_de_retard_biens') == 1 &&
            $request->input('conformite_rapport_facture') == 1 && $request->input('conformite_dossier_paiement') == 1
        ) {
            $paiement->p_rpm = 1;
            $paiement->save();
        }

        $rpm->date = $request->input('date');
        $rpm->pv_Adjudication = $request->input('pv_Adjudication');
        $rpm->contrat_convention = $request->input('contrat_convention');
        $rpm->bon_de_commande = $request->input('bon_de_commande');
        $rpm->conformite_technique_travaux = $request->input('conformite_technique_travaux');
        $rpm->pv_de_reception_travaux = $request->input('pv_de_reception_travaux');
        $rpm->pv_de_reception_biens = $request->input('pv_de_reception_biens');
        $rpm->penalite_de_retard_travaux = $request->input('penalite_de_retard_travaux');
        $rpm->conformite_technique_biens = $request->input('conformite_technique_biens');
        $rpm->penalite_de_retard_biens = $request->input('penalite_de_retard_biens');
        $rpm->conformite_rapport_facture = $request->input('conformite_rapport_facture');
        $rpm->montant_paiement_actuel = $request->input('montant_paiement_actuel');
        $rpm->conformite_dossier_paiement = $request->input('conformite_dossier_paiement');
        $rpm->observations = $request->input('observations');
        $rpm->save();
        notify()->success('Validation enregistrées !!!');
        return redirect()->route('rpmPaiement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rpm $rpm)
    {
        //
    }
}
