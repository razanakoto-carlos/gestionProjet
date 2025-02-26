<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Raf;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class RafController extends Controller
{
    use AuthorizesRequests;

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string|max:255',
        ]);
        $searchTerm = $request->input('search', '');

        if (empty($searchTerm)) {
            return redirect()->route('raf.index');
        }

        $projects = Project::with('raf')->where('nom_projet', 'like', "%$searchTerm%")->get();
        return view('Requettes.Raf.index', compact('projects'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('raf')->paginate(5);
        return view('Requettes.Raf.index', compact('projects'));
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
        $raf = Raf::findorFail($id);
        return view('Requettes.Raf.edit', compact('raf'));
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
        $raf = Raf::findorFail($id);
        $project = $raf->project;

        if ($request->input('validation') == 1 ) {
            $project->r_raf = 1;
            $project->save();
        }

        $raf->date = $request->input('date');
        $raf->validation = $request->input('validation');
        $raf->observations = $request->input('observations');
        $raf->save();

        return redirect()->route('raf.index')->with('message', 'Validation enregistrées !!!' );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Raf $raf)
    {
        //
    }
}
