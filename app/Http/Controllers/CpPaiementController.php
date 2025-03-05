<?php

namespace App\Http\Controllers;

use App\Models\P_cp;
use App\Models\Paiement;
use App\Models\Project;
use App\Models\Cp;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CpPaiementController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('cpPaiement.index');
        }

        $paiements = Paiement::whereHas('project', function ($query) use ($request) {
            $query->where('nom_projet', 'like', "%{$request->search}%");
        })->with('project') // Charger la relation 'project' pour accéder aux données du projet si nécessaire
            ->get();

        return view('Paiements.Cp.index', compact('paiements'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isCp')) {
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
        })->with('cp')->paginate(5);

        return view('Paiements.Cp.index', compact('paiements'));
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
    public function show(Cp $cp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('isCp')) {
            abort(404);
        }
        $cp = P_cp::findorFail($id);
        return view('Paiements.Cp.edit', compact('cp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('isCp')) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'observations' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cp = P_cp::findorFail($id);
        $paiement = $cp->paiement;

        if ($request->input('conformite_procedure') == 1 ) {
            $paiement->p_cp = 1;
            $paiement->save();
        }

        $cp->date = $request->input('date');
        $cp->conformite_procedure = $request->input('conformite_procedure');
        $cp->observations = $request->input('observations');
        $cp->save();

        return redirect()->route('cpPaiement.index')->with('message', 'Validation enregistrées !!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cp $cp)
    {
        //
    }
}
