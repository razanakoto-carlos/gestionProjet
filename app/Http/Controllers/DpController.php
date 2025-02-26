<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Dp;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class DpController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('dp.index');
        }

        $projects = Project::with('dp')->where('nom_projet', 'like', "%$searchTerm%")->get();
        return view('Requettes.Dp.index', compact('projects'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('dp')->paginate(5);
        return view('Requettes.Dp.index', compact('projects'));
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
    public function show(Dp $dp)
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
        $dp = Dp::findorFail($id);
        return view('Requettes.Dp.edit', compact('dp'));
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
        $dp = Dp::findorFail($id);
        $project = $dp->project;

        if ($request->input('approbation') == 1 ) {
            $project->r_dp = 1;
            $project->save();
        }

        $dp->date = $request->input('date');
        $dp->approbation = $request->input('approbation');
        $dp->observations = $request->input('observations');
        $dp->save();

        return redirect()->route('dp.index')->with('message', 'Validation enregistrées !!!' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dp $dp)
    {
        //
    }
}
