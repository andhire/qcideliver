<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Ubication extends Model
{
    public $table = 'ubications';

    use Sluggable; 
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }
    //one to many       //works
    public function UserUbications() {
        return $this->hasMany('App\UserUbication', 'id_ubication');
    }
}
