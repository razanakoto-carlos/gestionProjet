<?php

namespace App\Http\Controllers;

use App\Models\P_rse;
use App\Models\Paiement;
use App\Models\Project;
use App\Models\Rse;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class RsePaiementController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('rsePaiement.index');
        }

        $paiements = Paiement::whereHas('project', function ($query) use ($request) {
            $query->where('nom_projet', 'like', "%{$request->search}%");
        })->with('project') // Charger la relation 'project' pour accéder aux données du projet si nécessaire
            ->get();

        return view('Paiements.Rse.index', compact('paiements'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isRse')) {
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
        })->with('rse')->paginate(5);

        return view('Paiements.Rse.index', compact('paiements'));
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
    public function show(Rse $rse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('isRse')) {
            abort(404);
        }
        $rse = P_rse::findorFail($id);
        return view('Paiements.Rse.edit', compact('rse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('isRse')) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'observations' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $rse = P_rse::findorFail($id);
        $paiement = $rse->paiement;

        if ($request->input('conformite_aux_activite') == 1 ) {
            $paiement->p_rse = 1;
            $paiement->save();
        }

        $rse->date = $request->input('date');
        $rse->benef_com = $request->input('benef_com');
        $rse->ref_activite_pta = $request->input('ref_activite_pta');
        $rse->conformite_aux_activite = $request->input('conformite_aux_activite');
        $rse->montant_prevu = $request->input('montant_prevu');
        $rse->observations = $request->input('observations');
        $rse->save();
        notify()->success('Validation enregistrées !!!');
        return redirect()->route('rsePaiement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rse $rse)
    {
        //
    }
}
