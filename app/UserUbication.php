<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUbication extends Model
{

    public $table = 'user_ubication';

    //one to one    //works
    public function user() {
        return $this->belongsTO('App\Users', 'id_user');
    }

    //many to one   //works
    public function ubication() {
        return $this->belongsTo('App\Ubication', 'id_ubication');
    }

}
