<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryProduct extends Model
{
    public $table = 'category_products';
    //


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
    public function products() {
        return $this->hasMany('App\Products', 'id_category');
    }
}
