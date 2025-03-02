<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_rse extends Model
{
    public function paiement(){
        return $this->belongsTo(Paiement::class);
    }
}
