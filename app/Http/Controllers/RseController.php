<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Rse;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class RseController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('rse.index');
        }

        $projects = Project::with('rse')->where('nom_projet', 'like', "%$searchTerm%")->paginate(4);
        return view('Requettes.Rse.index', compact('projects'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('rse')->paginate(4);
        return view('Requettes.Rse.index', compact('projects'));
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
        $rse = Rse::findorFail($id);
        return view('Requettes.Rse.edit', compact('rse'));
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
        $rse = Rse::findorFail($id);
        $project = $rse->project;

        if ($request->input('code_analytique') == 1 && $request->input('conformite_requete') && $request->input('conformite_tdr_ptba')) {
            $project->r_rse = 1;
            $project->save();
        }

        $rse->date = $request->input('date');
        $rse->code_analytique = $request->input('code_analytique');
        $rse->conformite_requete = $request->input('conformite_requete');
        $rse->conformite_tdr_ptba = $request->input('conformite_tdr_ptba');
        $rse->montant_ptba = $request->input('montant_ptba');
        $rse->observations = $request->input('observations');
        $rse->save();
        notify()->success('Validation enregistrées !!!');
        return redirect()->route('rse.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rse $rse)
    {
        //
    }
}
