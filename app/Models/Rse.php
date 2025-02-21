<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rse extends Model
{
    protected $fillable = ['date','code_analytique','montant_ptba','conformite_requete','conformite_tdr_ptba','observations','project_id','updated_at','created_at'];
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
