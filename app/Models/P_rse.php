<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_rse extends Model
{
    protected $fillable = ['date','benef_com','ref_activite_pta','conformite_aux_activite','montant_prevu','observations','created_at','updated_at','paiement_id'];

    public function paiement(){
        return $this->belongsTo(Paiement::class);
    }
}
