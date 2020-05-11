<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'order_id', 
        'product_id', 
        'quantity', 
        'price', 
        'line_number',
        'tax_amount'
    ];
}
