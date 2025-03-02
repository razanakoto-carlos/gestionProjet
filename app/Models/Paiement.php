<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = ['p_rpm','p_rse','p_cpt','p_raf','p_rai','p_cp','p_ca','project_id','updated_at','created_at'];
    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function rse(){
        return $this->hasOne(P_rse::class, 'paiement_id');
    }
}
