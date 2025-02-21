<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rai extends Model
{
    protected $fillable = ['date','conforme_aux_procedures','observations','project_id','created_at','updated_at'];
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
