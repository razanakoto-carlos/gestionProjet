<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dp extends Model
{
    public function project(){
        return $this->belongsTo(Project::class);
    }
}
