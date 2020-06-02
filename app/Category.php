<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // 1 category => obtenir tous ses livres
   public function products(){
        return $this->hasMany(Product::class);
    }
}
