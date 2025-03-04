<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_raf extends Model
{
    protected $fillable = ['observations', 'created_at', 'updated_at', 'paiement_id','date','avis_favorable','montant_payer'];

    public function paiement(){
        return $this->belongsTo(Paiement::class);
    }
}
