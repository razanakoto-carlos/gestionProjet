<?php

namespace App\Http\Controllers;

use App\Models\P_ca;
use App\Models\Paiement;
use App\Models\Project;
use App\Models\Ca;
use App\Models\Dp;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CaPaiementController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('caPaiement.index');
        }

        $paiements = Paiement::whereHas('project', function ($query) use ($request) {
            $query->where('nom_projet', 'like', "%{$request->search}%");
        })->with('project') // Charger la relation 'project' pour accéder aux données du projet si nécessaire
            ->get();

        return view('Paiements.Ca.index', compact('paiements'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('isDP')) {
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
        })->with('ca')->paginate(5);

        return view('Paiements.Ca.index', compact('paiements'));
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
    public function show(Dp $ca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('isDP')) {
            abort(404);
        }
        $ca = P_ca::findorFail($id);
        return view('Paiements.Ca.edit', compact('ca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('isDP')) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'observations' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $ca = P_ca::findorFail($id);
        $paiement = $ca->paiement;

        if ($request->input('conformite_procedure') == 1 ) {
            $paiement->p_ca = 1;
            $paiement->save();
        }

        $ca->date = $request->input('date');
        $ca->conformite_procedure = $request->input('conformite_procedure');
        $ca->observations = $request->input('observations');
        $ca->save();
        notify()->success('Validation enregistrées !!!');
        return redirect()->route('caPaiement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dp $ca)
    {
        //
    }
}
