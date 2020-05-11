<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'status', 
        'amount', 
        'tax_amount', 
        'delivery_street', 
        'delivery_number',
        'delivery_postcode',
        'delivery_city',
        'delivery_country',
        'invoice_street', 
        'invoice_number',
        'invoice_postcode',
        'invoice_city',
        'invoice_country'
    ];

    public function order_lines()
    {
        return $this->hasMany(OrderLine::class);
    }
    
}
