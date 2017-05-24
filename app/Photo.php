<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['name', 'permalink', 'festival_id'];

    public function festival() {
        return $this->belongsTo('App\Festival');
    }    
}
