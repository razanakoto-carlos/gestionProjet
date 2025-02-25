<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rpm extends Model
{
    protected $fillable = ['date','allocation_budgetaire','prix_unitaire_etc','autres','observations','project_id','created_at','updated_at'];
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
