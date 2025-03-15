<?php

namespace App\Http\Controllers;

use App\Models\P_cpt;
use App\Models\Paiement;
use App\Models\Project;
use App\Models\Cpt;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CptPaiementController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('cptPaiement.index');
        }

        $paiements = Paiement::whereHas('project', function ($query) use ($searchTerm) {
            $query->where('nom_projet', 'like', "%{$searchTerm}%")
                  ->where('r_rse', 1)
                  ->where('r_bm', 1)
                  ->where('r_rsenv', 1)
                  ->where('r_raf', 1)
                  ->where('r_rai', 1)
                  ->where('r_cp', 1)
                  ->where('r_dp', 1);
        })
        ->with('project')
        ->paginate(4);

        return view('Paiements.Cpt.index', compact('paiements'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isCpt')) {
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
        })->with('cpt')->paginate(4);

        return view('Paiements.Cpt.index', compact('paiements'));
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
    public function show(P_cpt $cpt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('isCpt')) {
            abort(404);
        }
        $cpt = P_cpt::findorFail($id);
        return view('Paiements.Cpt.edit', compact('cpt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('isCpt')) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'observations' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $cpt = P_cpt::findorFail($id);
        $paiement = $cpt->paiement;

        if ($request->input('qualite') == 1 && $request->input('prix_unitaires') == 1 && $request->input('total_global')) {
            $paiement->p_cpt = 1;
            $paiement->save();
        }

        $cpt->date = $request->input('date');
        $cpt->qualite = $request->input('qualite');
        $cpt->prix_unitaires = $request->input('prix_unitaires');
        $cpt->total_global = $request->input('total_global');
        $cpt->observations = $request->input('observations');
        $cpt->save();
        notify()->success('Validation enregistrées !!!');
        return redirect()->route('cptPaiement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(P_cpt $cpt)
    {
        //
    }
}
