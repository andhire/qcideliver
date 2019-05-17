<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    //
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }

    //Belong to many
    //one to one    // works
    public function userUbication() {
        return $this->hasOne('App\UserUbication', 'id_user');
    }

    public function products() {
        return $this->hasMany('App\Products', 'id_user');
    }

    protected $fillable = ['name','apellidoP','apellidoM', 'tipo','estado','foto','usuario', 'password','email','phone','slug'];
    
}
