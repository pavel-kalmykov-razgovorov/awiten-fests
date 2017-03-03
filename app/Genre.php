<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
   public function artists() {
        return $this->belongsToMany('App\Artist');
    }

    public function festivals() {
        return $this->belongsToMany('App\Festival');
    }
}
