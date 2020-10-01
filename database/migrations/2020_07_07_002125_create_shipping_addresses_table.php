<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->increments('shipping_address_id');
            $table->string('shipping_address_name')->nullable();
            $table->string('shipping_address_phone')->nullable();
            $table->string('shipping_address_postcode')->nullable();
            $table->longText('shipping_address_address')->nullable();
            $table->string('shipping_address_town')->nullable();
            $table->longText('shipping_address_notes')->nullable();
            $table->string('payment_track_id');

            $table->unsignedBigInteger('division_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->unsignedBigInteger('union_id')->nullable();
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
        Schema::dropIfExists('promotional_sliders');
    }
}
