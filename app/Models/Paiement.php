<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = ['p_rpm', 'p_rse', 'p_cpt', 'p_raf', 'p_rai', 'p_cp', 'p_ca', 'project_id', 'updated_at', 'created_at'];
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function rse()
    {
        return $this->hasOne(P_rse::class, 'paiement_id');
    }

    public function rpm()
    {
        return $this->hasOne(P_rpm::class, 'paiement_id');
    }

    public function rai()
    {
        return $this->hasOne(P_rai::class, 'paiement_id');
    }

    public function raf(){
        return $this->hasOne(P_raf::class, 'paiement_id');
    }

    public function cpt(){
        return $this->hasOne(P_cpt::class, 'paiement_id');
    }

    public function cp(){
        return $this->hasOne(P_cp::class, 'paiement_id');
    }

    public function ca(){
        return $this->hasOne(P_ca::class, 'paiement_id');
    }
}
