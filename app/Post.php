<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function festival()
    {
        return $this->belongsTo('App\Festival');
    }
}
