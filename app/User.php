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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function shop(){
        return $this->belongsTo('App/Shop','owner_id');
    }

    public function order(){
        return $this->hasMany('App/Order');
    }

    public function complaint(){
        return $this->hasMany('App/Complaint');
    }

    public function order_details(){
        return $this->hasMany('App/Complaint');
    }
}
