<?php

use Illuminate\Database\Seeder;
use App\User;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = App\User::all();
        foreach ($users as $user) 
        {
            if ($user->id >= 1) 
            {
                $nr = rand(1, 2);
                $nr_products = rand(1, 5);
                $products_nrs = array();
                for ($i=1;$i<=$nr_products;$i++) $products_nrs[]=rand(1,12);
                $order = factory(App\Order::class, $nr)->create([
                    'user_id' => $user->id,
                    'delivery_street' => $user->street,
                    'delivery_number' => $user->number,
                    'delivery_postcode' => $user->postcode,
                    'delivery_city' => $user->city,
                    'delivery_country' => $user->country,
                ])->each(function($o) {
                    factory(App\OrderLine::class, 1)->create([
                        'order_id' => $o->id,
                        'user_id' => $o->user_id,
                        'created_at' => $o->created_at,
                        'updated_at' => $o->updated_at
                        ]);
                });
                $orders = App\Order::all();
                foreach ($orders as $order) $order->update_amount();
            }
        }
    }
}
