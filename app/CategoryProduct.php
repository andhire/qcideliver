<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    public $table = 'category_products';
    //

     //Belong to many
    //one to one    // works
    public function products() {
        return $this->hasMany('App\Products', 'id_category');
    }
}
