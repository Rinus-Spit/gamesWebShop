<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Order;
use App\OrderLine;

class BouncerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bouncer::allow('admin')->everything();

        Bouncer::allow('contributor')->toManage( App\Product::class);
        Bouncer::allow('contributor')->toManage( App\Category::class);
        Bouncer::allow('contributor')->to('view', App\Order::class);
        Bouncer::allow('customer')->toManage( App\Order::class);
        Bouncer::allow('customer')->toManage( App\OrderLine::class);
        Bouncer::allow('customer')->to('view', App\Category::class);
    }
}
