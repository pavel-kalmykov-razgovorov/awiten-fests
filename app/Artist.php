<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @property mixed name
 * @property mixed soundcloud
 * @property mixed website
 * @property mixed country
 * @property string permalink
 */
class Artist extends Model
{
    protected $fillable = ['name', 'soundcloud', 'website', 'country', 'permalink'];

    public function festivals() {
        return $this->belongsToMany('App\Festival');
    }

    public function genres() {
        return $this->belongsToMany('App\Genre');
    }

    public function getRouteKey()
    {
        return $this->permalink;
    }
}
