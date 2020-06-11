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

    public function ratings()
    {
        return $this->belongsToMany(User::class, 'ratings')->withPivot('rating');
    }

    public function reviews()
    {
        return $this->belongsToMany(User::class, 'reviews')->withPivot(['body','id']);
    }

    public function showStars($count = 0)
    {
        $show = '<div class="ratingbox  text-warning">';
        $rating = floor($count * 20);
        $show .= '<i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
        $show .= '<div class="rating" style="width:'.$rating.'%;"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>';
        $show .= '</div>';
        return $show;
    }

}
