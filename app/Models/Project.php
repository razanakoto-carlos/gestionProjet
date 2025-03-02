<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ["nom_projet","fichier","date","r_paiement"];

    public function Rse(){
        return $this->hasOne(Rse::class, 'project_id');
    }

    public function Cp(){
        return $this->hasOne(Cp::class, 'project_id');
    }

    public function Dp(){
        return $this->hasOne(Dp::class, 'project_id');
    }

    public function Raf(){
        return $this->hasOne(Raf::class, 'project_id');
    }

    public function Rai(){
        return $this->hasOne(Rai::class, 'project_id');
    }

    public function Rpm(){
        return $this->hasOne(Rpm::class, 'project_id');
    }

    public function Rsenv(){
        return $this->hasOne(Rsenv::class, 'project_id');
    }

    public function Paiement(){
        return $this->hasOne(Paiement::class, 'project_id');
    }

}
