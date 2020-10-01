<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->string('product_name');
            $table->string('product_slug')->nullable();
            $table->string('qr_code')->nullable();
            $table->longText('product_details')->nullable();
            $table->double('regular_price');
            $table->double('selling_price')->nullable();
            $table->double('discount_rate')->nullable();
            $table->string('stock_status')->nullable();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('height')->nullable();
            $table->string('length_class')->nullable();
            $table->string('weight')->nullable();
            $table->string('weight_class')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_color')->nullable();
            $table->string('featured_image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->integer('product_type')->default(1);
            $table->boolean('publish_status')->default(true);
            $table->integer('minimum_order_quantity')->default(1);
            $table->string('product_category_id');
            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->longText('product_tags')->nullable();
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('owner_id')->nullable();//Will be deleted
            $table->unsignedBigInteger('cow_type')->default(1);//Will be deleted
            $table->string('certification')->nullable();
            $table->string('video')->nullable();
            $table->string('age')->nullable();
            $table->string('teeth')->nullable();
            $table->string('identity')->nullable();
            $table->text('disease')->nullable();
            $table->string('gender')->nullable();



            $table->unsignedBigInteger('division_id')->nullable(1);
            $table->unsignedBigInteger('district_id')->nullable(1);
            $table->unsignedBigInteger('upazila_id')->nullable(1);
            $table->unsignedBigInteger('union_id')->nullable(1);
            $table->timestamps();
            /*    $table->foreign('product_category_id')->references('category_id')->on('product_categories');*/

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
