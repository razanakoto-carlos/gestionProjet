<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Rai;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class RaiController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('rai.index');
        }

        $projects = Project::with('rai')->where('nom_projet', 'like', "%$searchTerm%")->get();
        return view('Requettes.Rai.index', compact('projects'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('rai')->paginate(5);
        return view('Requettes.Rai.index', compact('projects'));
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
        $rai = Rai::findorFail($id);
        return view('Requettes.Rai.edit', compact('rai'));
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
        $rai = Rai::findorFail($id);
        $project = $rai->project;

        if ($request->input('conforme_aux_procedures') == 1 ) {
            $project->r_rai = 1;
            $project->save();
        }

        $rai->date = $request->input('date');
        $rai->conforme_aux_procedures = $request->input('conforme_aux_procedures');
        $rai->observations = $request->input('observations');
        $rai->save();

        return redirect()->route('rai.index')->with('message', 'Validation enregistrées !!!' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rai $rai)
    {
        //
    }
}
