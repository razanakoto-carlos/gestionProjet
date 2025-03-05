<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_ca extends Model
{
    protected $fillable = ['observations', 'created_at', 'updated_at', 'paiement_id','date','conformite_procedure'];

    public function paiement(){
     return $this->belongsTo(Paiement::class);
    }
}
