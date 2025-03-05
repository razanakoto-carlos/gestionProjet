<?php

namespace App\Http\Controllers;

use App\Models\P_rai;
use App\Models\Paiement;
use App\Models\Project;
use App\Models\Rai;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class RaiPaiementController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('raiPaiement.index');
        }

        $paiements = Paiement::whereHas('project', function ($query) use ($request) {
            $query->where('nom_projet', 'like', "%{$request->search}%");
        })->with('project') // Charger la relation 'project' pour accéder aux données du projet si nécessaire
            ->get();

        return view('Paiements.Rai.index', compact('paiements'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isRai')) {
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
        })->with('rai')->paginate(5);

        return view('Paiements.Rai.index', compact('paiements'));
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
    public function show(Rai $rai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('isRai')) {
            abort(404);
        }
        $rai = P_rai::findorFail($id);
        return view('Paiements.Rai.edit', compact('rai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('isRai')) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'observations' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $rai = P_rai::findorFail($id);
        $paiement = $rai->paiement;

        if ($request->input('conformite_rapport') == 1 && $request->input('egalite_facture') == 1 && $request->input('controle_verification') == 1) {
            $paiement->p_rai = 1;
            $paiement->save();
        }

        $rai->date = $request->input('date');
        $rai->conformite_rapport = $request->input('conformite_rapport');
        $rai->egalite_facture = $request->input('egalite_facture');
        $rai->controle_verification = $request->input('controle_verification');
        $rai->observations = $request->input('observations');
        $rai->save();

        return redirect()->route('raiPaiement.index')->with('message', 'Validation enregistrées !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rai $rai)
    {
        //
    }
}
