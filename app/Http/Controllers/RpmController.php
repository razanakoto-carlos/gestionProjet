<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Rpm;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class RpmController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('rpm.index');
        }

        $projects = Project::with('rpm')->where('nom_projet', 'like', "%$searchTerm%")->get();
        return view('Requettes.Rpm.index', compact('projects'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('rpm')->paginate(5);
        return view('Requettes.Rpm.index', compact('projects'));
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
        $rpm = Rpm::findorFail($id);
        return view('Requettes.Rpm.edit', compact('rpm'));
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
        $rpm = Rpm::findorFail($id);
        $project = $rpm->project;
  
        if ($request->input('allocation_budgetaire') == 1 && $request->input('prix_unitaire_etc') == 1 && $request->input('autres')) {
            $project->r_bm = 1;
            $project->save();
        }

        $rpm->date = $request->input('date');
        $rpm->allocation_budgetaire = $request->input('allocation_budgetaire');
        $rpm->prix_unitaire_etc = $request->input('prix_unitaire_etc');
        $rpm->autres = $request->input('autres');
        $rpm->observations = $request->input('observations');
        $rpm->save();

        return redirect()->route('rpm.index')->with('message', 'Validation enregistrées !!!' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rpm $rpm)
    {
        //
    }
}
