<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'excerpt', 'body', 'price', 'stock', 'on_sale'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product');
    }
    
    public function hasCategory($category) {
        return $this->categories->contains($category);
    }    

}
