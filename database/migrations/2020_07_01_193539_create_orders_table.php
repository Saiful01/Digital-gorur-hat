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
            $table->bigIncrements('order_id');
            $table->string('order_invoice');
            $table->double('total')->nullable();
            $table->double('shipping_cost')->default(0);
            $table->double('processing_cost')->default(0);
            $table->double('booking_money')->default(0);
            $table->double('vat')->default(0);
            $table->double('sub_total');
            $table->double('paid_amount')->default(0);
            $table->double('coupon')->default(0);
            $table->double('discount')->default(0);
            $table->double('other_cost')->default(0);//hasil cost
            $table->unsignedBigInteger('customer_id');
            $table->integer('delivery_status')->default(0);  //0=pending, 1=Done, 2=Cancel
            $table->string('comment')->nullable();
            $table->string('delivery_type')->nullable();
            $table->string('expected_delivery_date')->nullable();
            $table->string('is_inside_dhaka')->nullable();
            $table->string('cow_delivery_type')->nullable();
            $table->string('is_full_payment')->nullable();
            $table->unsignedBigInteger('shop_id')->nullable();
            $table->boolean('payment_status')->default(false);
            $table->string('payment_track_id')->nullable();
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
