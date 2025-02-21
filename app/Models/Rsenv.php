<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rsenv extends Model
{
    protected $fillable = ['date','validation','observations','project_id','updated_at','created_at'];
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
