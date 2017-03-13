<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New extends Model
{
    public function festival() {
        return $this->belongsTo('App\Festival');
    }  
}
