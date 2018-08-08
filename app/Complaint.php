<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    public function user(){
        return $this->belongsTo('App/User');
    }

    public function order(){
        return $this->belongsTo('App/Order');
    }
}
