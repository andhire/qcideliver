<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Products extends Model
{
    //
    use Sluggable;
    public $table = 'products';
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

     //Belong to many
    //one to one    // works
    public function category() {
        return $this->belongsTo('App\CategoryProduct', 'id_category');
    }

    public function user() {
        return $this->belongsTo('App\Users', 'id_user');
    }
}

