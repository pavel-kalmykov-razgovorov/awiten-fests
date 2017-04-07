<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string permalink
 */
class Genre extends Model
{
    protected $fillable = ['name', 'permalink'];

    public function artists()
    {
        return $this->belongsToMany('App\Artist');
    }

    public function festivals()
    {
        return $this->belongsToMany('App\Festival');
    }

    public function getRouteKey()
    {
        return $this->permalink;
    }


}
