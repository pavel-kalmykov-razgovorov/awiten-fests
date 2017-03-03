<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    public function festivals() {
        return $this->belongsToMany('App\Festival');
    }
}
