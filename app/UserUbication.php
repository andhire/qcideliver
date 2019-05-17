<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUbication extends Model
{

    public $table = 'user_ubication';
    public $timestamps = false;
    protected $primaryKey = 'id_user';

    //one to one    //works
    public function user() {
        return $this->belongsTO('App\Users', 'id_user');
    }

    //many to one   //works
    public function ubication() {
        return $this->belongsTo('App\Ubication', 'id_ubication');
    }

}
