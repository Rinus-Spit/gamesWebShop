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

    public function update_amount()
    {
        $amount = 0;
        $tax_amount = 0;
        foreach ($this->order_lines as $order_line)
        {
            $amount += $order_line->quantity * $order_line->price;
            $tax_amount += $order_line->tax_amount;
        }
        //$update_array = array('amount' => $amount, 'tax_amount' => $tax_amount);
        $this->update(array('amount' => $amount, 'tax_amount' => $tax_amount));
        return $this->hasMany(OrderLine::class);
    }
    
}
