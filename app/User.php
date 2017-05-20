<?php

namespace App;

use App\Notifications\MyResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username', 'confirmed', 'typeOfUser', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function sendPasswordResetNotification($token)
    {
      $this->notify(new MyResetPassword($token));
    }

    public function isAdmin(){
        return $this->typeOfUser == 'admin';
    }


    public function isPromoter(){
        return $this->typeOfUser == 'promoter';
    }

    public function isManager(){
        return $this->typeOfUser == 'manager';
    }

    public function festivals() {
        return $this->hasMany('App\Festival', 'promoter_id');
    }

    public function artists() {
        return $this->hasMany('App\Artist', 'manager_id');
    }


}
