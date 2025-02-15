<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rpm extends Model
{
    public function project(){
        return $this->belongsTo(Rpm::class);
    }
}
