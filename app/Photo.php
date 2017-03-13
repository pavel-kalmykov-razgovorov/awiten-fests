<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function festival() {
        return $this->belongsTo('App\Festival');
    }    
}
