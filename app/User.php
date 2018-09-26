<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id',
        'active', 'is_admin','telefono',
        'cognome', 'indirizzio','purchase','image','date_purchase','ip','last_login'
    ];
    protected $dates = ['date_purchase','last_login'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function usersTable()
    {
        return $this->hasMany('App\\UserTable');
    }
    public function secondBox()
    {
        return $this->hasMany('App\\SecondBox');
    }
    public function thirdBox()
    {
        return $this->hasMany('App\\ThirdBox');
    }

    public function isAdmin(){
        return $this->is_admin;
    }
}
