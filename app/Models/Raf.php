<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raf extends Model
{
  protected $fillable = ['date','validation','observations','project_id','created_at','updated_at'];
  
  public function project(){
     return $this->belongsTo(Project::class);
   }
}
