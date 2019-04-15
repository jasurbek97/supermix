<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','image','status','slug','name_uz','name_ru'
    ];

    protected $casts = [
        'name' => 'array'
    ];

    protected $table = 'categories';


    public function products()
    {
        return $this->hasMany(Product::class,'cat_id','id');
    }
}
