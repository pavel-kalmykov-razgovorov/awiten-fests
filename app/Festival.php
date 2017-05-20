<?php

namespace App;

use Jenssegers\Date\Date;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string pathLogo
 * @property string pathCartel
 * @property string location
 * @property string province
 * @property Carbon date
 * @property string permalink
 */
class Festival extends Model
{
    protected $fillable = ['name', 'pathLogo', 'pathCartel', 'location', 'province', 'date', 'permalink', 'promoter_id'];

    public function artists() {
        return $this->belongsToMany('App\Artist')->withPivot('confirmed');
    }

    public function genres() {
        return $this->belongsToMany('App\Genre');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function photos() {
        return $this->hasMany('App\Photo');
    }

    public function getRouteKey()
    {
        return $this->permalink;
    }

    public function showDateFestival($date){
        return new Date($date);
    }

    public function user(){
        return $this->belongsTo('App\User','promoter_id');
    }

}
