<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'user_id', 'body'
    ];

}
