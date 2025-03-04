<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_rai extends Model
{
    protected $fillable = ['observations', 'created_at', 'updated_at', 'paiement_id','date','conformite_rapport','egalite_facture','controle_verification',];

    public function paiement(){
        return $this->belongsTo(Paiement::class);
    }
}
