<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cp extends Model
{
    protected $fillable = ['date','avis_favorable','observations','project_id','created_at','updated_at'];

    public function project(){
        return $this->belongsTo(Project::class);
    }
}
