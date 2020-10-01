<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create([
            'product_name' => "দেশি গুরু",
            'product_details' => "দেশি গুরু",
            'regular_price' => "200000",
            'selling_price' => "180000",
            'discount_rate' => "10",
            'qr_code' => "1852555",
            'weight' => "200kg",
            'featured_image' => "/images/product/1.jpg",
            'product_category_id' => "1",
            'shop_id' => "1",
            'is_featured' => true,
            'cow_type' => "1",
            'product_type' => "1",
            'owner_id' => 1
        ]);
        \App\Product::create([
            'product_name' => "দেশি গুরু",
            'product_details' => "দেশি গুরু",
            'regular_price' => "2050000",
            'selling_price' => "2000000",
            'discount_rate' => "10",
            'qr_code' => "1852555",
            'weight' => "250kg",
            'featured_image' => "/images/product/2.jpg",
            'product_category_id' => "1",
            'shop_id' => "1",
            'is_featured' => true,
            'cow_type' => "1",
            'product_type' => "1",
            'owner_id' => 1

        ]);
        \App\Product::create([
            'product_name' => "দেশি গুরু",
            'product_details' => "দেশি গুরু",
            'regular_price' => "2300000",
            'selling_price' => "2000000",
            'discount_rate' => "10",
            'qr_code' => "1852555",
            'weight' => "250kg",
            'featured_image' => "/images/product/3.jpg",
            'product_category_id' => "1",
            'shop_id' => "1",
            'is_featured' => true,
            'cow_type' => "2",
            'product_type' => "3",
        ]);
        \App\Product::create([
            'product_name' => "দেশি গুরু",
            'product_details' => "দেশি গুরু",
            'regular_price' => "2500000",
            'selling_price' => "2400000",
            'discount_rate' => "10",
            'qr_code' => "1852555",
            'weight' => "250kg",
            'featured_image' => "/images/product/4.jpg",
            'product_category_id' => "1",
            'shop_id' => "2",
            'is_featured' => true,
            'cow_type' => "1",
            'product_type' => "1",
            'owner_id' => 1

        ]);
        \App\Product::create([
            'product_name' => "দেশি গুরু",
            'product_details' => "দেশি গুরু",
            'regular_price' => "3500000",
            'selling_price' => "2400000",
            'discount_rate' => "10",
            'qr_code' => "1852555",
            'weight' => "250kg",
            'featured_image' => "/images/product/5.jpg",
            'product_category_id' => "1",
            'shop_id' => "2",
            'is_featured' => true,
            'cow_type' => "2",
            'product_type' => "3",
        ]);
    }
}
