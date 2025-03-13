<?php

namespace App\Http\Controllers;

use App\Models\P_raf;
use App\Models\Paiement;
use App\Models\Project;
use App\Models\Raf;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class RafPaiementController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('rafPaiement.index');
        }

        $paiements = Paiement::whereHas('project', function ($query) use ($request) {
            $query->where('nom_projet', 'like', "%{$request->search}%");
        })->with('project') // Charger la relation 'project' pour accéder aux données du projet si nécessaire
            ->get();

        return view('Paiements.Raf.index', compact('paiements'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isRaf')) {
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
        })->with('raf')->paginate(5);

        return view('Paiements.Raf.index', compact('paiements'));
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
    public function show(Raf $raf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('isRaf')) {
            abort(404);
        }
        $raf = P_raf::findorFail($id);
        return view('Paiements.Raf.edit', compact('raf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('isRaf')) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'observations' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $raf = P_raf::findorFail($id);
        $paiement = $raf->paiement;

        if ($request->input('avis_favorable') == 1) {
            $paiement->p_raf = 1;
            $paiement->save();
        }

        $raf->date = $request->input('date');
        $raf->avis_favorable = $request->input('avis_favorable');
        $raf->montant_payer = $request->input('montant_payer');
        $raf->observations = $request->input('observations');
        $raf->save();
        notify()->success('Validation enregistrées !!!');
        return redirect()->route('rafPaiement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Raf $raf)
    {
        //
    }
}
