<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class pdfRequetteController extends Controller
{
    
    public function pdf($id){
        $project = Project::findorFail($id);
        
        return view('pdf.Requette.index', compact('project'));
    }
    
    public function generatePDF($id)
    {
        $project = Project::findOrFail($id);

        $pdf = Pdf::loadView('pdf.Requette.exporter' , compact('project'));
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOption('margin-top', 10); 
        $pdf->setOption('margin-bottom', 10); 
        
        return $pdf->download('circuit_approbation_requetes.pdf');
    }
}
