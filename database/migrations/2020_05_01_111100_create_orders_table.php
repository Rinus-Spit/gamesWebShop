<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default('shopping');
            $table->float('amount')->default(0);
            $table->float('tax_amount')->default(0);
            $table->string('delivery_street')->nullable();
            $table->string('delivery_number')->nullable();
            $table->string('delivery_postcode')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_country')->nullable();
            $table->string('invoice_street')->nullable();
            $table->string('invoice_number')->nullable();
            $table->string('invoice_postcode')->nullable();
            $table->string('invoice_city')->nullable();
            $table->string('invoice_country')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
