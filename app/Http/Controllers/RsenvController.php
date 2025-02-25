<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Rsenv;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class RsenvController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('rsenv.index');
        }

        $projects = Project::with('rsenv')->where('nom_projet', 'like', "%$searchTerm%")->get();
        return view('Requettes.Rsenv.index', compact('projects'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('rsenv')->paginate(5);
        return view('Requettes.Rsenv.index', compact('projects'));
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
    public function show(Rsenv $rsenv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (!Gate::allows('isRsenv')) {
            abort(404);
        }
        $rsenv = Rsenv::findorFail($id);
        return view('Requettes.Rsenv.edit', compact('rsenv'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('isRsenv')) {
            abort(404);
        }
        $validator = Validator::make($request->all(), [
            'observations' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $rsenv = Rsenv::findorFail($id);
        $project = $rsenv->project;

        if ($request->input('validation') == 1 ) {
            $project->r_rsenv = 1;
            $project->save();
        }

        $rsenv->date = $request->input('date');
        $rsenv->validation = $request->input('validation');
        $rsenv->observations = $request->input('observations');
        $rsenv->save();

        return redirect()->route('rsenv.index')->with('message', 'Validation enregistrées !!!' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rsenv $rsenv)
    {
        //
    }
}
