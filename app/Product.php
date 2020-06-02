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
        'url_image',
        'status',
        'code',
        'reference'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
