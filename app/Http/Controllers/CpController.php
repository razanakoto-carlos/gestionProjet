<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Cp;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CpController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('cp.index');
        }

        $projects = Project::with('cp')->where('nom_projet', 'like', "%$searchTerm%")->get();
        return view('Requettes.Cp.index', compact('projects'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('cp')->paginate(5);
        return view('Requettes.Cp.index', compact('projects'));
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
        $cp = Cp::findorFail($id);
        return view('Requettes.Cp.edit', compact('cp'));
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
        $cp = Cp::findorFail($id);
        $project = $cp->project;

        if ($request->input('avis_favorable') == 1 ) {
            $project->r_cp = 1;
            $project->save();
        }

        $cp->date = $request->input('date');
        $cp->avis_favorable = $request->input('avis_favorable');
        $cp->observations = $request->input('observations');
        $cp->save();
        notify()->success('Validation enregistrées !!!');
        return redirect()->route('cp.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cp $cp)
    {
        //
    }
}
