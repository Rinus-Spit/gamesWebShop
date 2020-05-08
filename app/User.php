<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use HasRolesAndAbilities;
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'street', 'number', 'postcode', 'city', 'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_user');
    }
    
    public function hasOrder($order) {
        return $this->orders->contains($order);
    }

    public function orders_status($status)
    {
        $user = User::whereHas('orders', function ($query){
            global $status;
            $query->where('status', '=', $status);
        })->with('orders')->first();
        // dd($user);
        return $user;
    }

    public function active_order()
    {
        // $orders = $this->order_status('shopping')->first()->id;
        return $this->orders_status('shopping');
    }
}
