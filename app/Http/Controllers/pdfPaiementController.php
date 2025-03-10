<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class pdfPaiementController extends Controller
{
    
    public function pdf($id){

        $paiement = Paiement::where('project_id', $id)->first();
        
        return view('pdf.Paiement.index', compact('paiement'));
    }
    
    public function generatePDF($id)
    {
        $paiement = Paiement::with(['project'])->findOrFail($id);

        $pdf = Pdf::loadView('pdf.Paiement.exporter' , compact('paiement'));
        $pdf->setPaper('A4', 'portrait');
        $pdf->setOption('margin-top', 10); 
        $pdf->setOption('margin-bottom', 10); 
        
        return $pdf->download('circuit_approbation_paiement.pdf');
    }
}
