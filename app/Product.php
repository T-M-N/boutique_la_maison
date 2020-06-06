<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'size',
        'code',        
        'reference',
        'status',
        'genre',
        'category_id'   
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
