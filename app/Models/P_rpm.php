<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_rpm extends Model
{
    protected $fillable = ['observations', 'created_at', 'updated_at', 'paiement_id', 'date', 'pv_Adjudication', 'contrat_convention', 'bon_de_commande', 'conformite_technique_travaux', 'pv_de_reception_travaux', 'penalite_de_retard_travaux', 'conformite_technique_biens', 'pv_de_reception_biens', 'penalite_de_retard_biens', 'conformite_rapport_facture', 'montant_paiement_actuel', 'conformite_dossier_paiement'];

    public function paiement(){
        return $this->belongsTo(Paiement::class);
    }
}
