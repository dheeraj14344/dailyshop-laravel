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
            $table->string('customers_id');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('pincode');
            $table->string('coupon_code');
            $table->string('coupon_value');
            $table->string('order_status');
            $table->string('payment_type');
            $table->string('payment_status');
            $table->string('total_amt');
            $table->string('payment_id');
            $table->timestamps();
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
