<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Rse;
use Illuminate\Http\Request;

class RseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('rse')->paginate(5);
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
        $rse = Rse::findorFail($id);
        return view('Requettes.Rse.edit',compact('rse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rse $rse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rse $rse)
    {
        //
    }
}
