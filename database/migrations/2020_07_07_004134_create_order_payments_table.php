<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_payments', function (Blueprint $table) {
            $table->bigIncrements("order_payment_id");
            $table->string("tran_id");
            $table->string("amount")->nullable();
            $table->string("store_amount")->nullable();
            $table->string("tran_date")->nullable();
            $table->string("currency")->nullable();
            $table->string("card_issuer_country")->nullable();
            $table->string("card_issuer_country_code")->nullable();
            $table->string("store_id")->nullable();
            $table->string("is_online_payment")->nullable();
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
        Schema::dropIfExists('order_payments');
    }
}
