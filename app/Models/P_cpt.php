<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_cpt extends Model
{
   protected $fillable = ['observations', 'created_at', 'updated_at', 'paiement_id','date','qualite','prix_unitaires','total_global'];

   public function paiement(){
    return $this->belongsTo(Paiement::class);
   }
}
