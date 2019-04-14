<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    // adding exact match relationship for the user
    public function user(){
        return $this->belongsTo('App\User');
    }
}
