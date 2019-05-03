<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    public $table = 'ubications';

    //one to many       //works
    public function UserUbications() {
        return $this->hasMany('App\UserUbication', 'id_ubication');
    }
}
