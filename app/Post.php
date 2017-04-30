<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string permalink
 */
class Post extends Model
{
    protected $fillable = ['title', 'lead', 'body', 'permalink'];

    public function festival()
    {
        return $this->belongsTo('App\Festival');
    }

    public function getRouteKey()
    {
        return $this->permalink;
    }
}
