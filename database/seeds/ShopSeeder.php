<?php

use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Shop::create([
            'shop_name'=>"Bengal Meat",
            'shop_phone'=>"01825435612",
            'shop_email'=>"abc@gmail.com",
            'user_id'=>2,
            'shop_image'=>"/shop/1.jpg"
        ]);
       /* \App\Shop::create([
            'shop_name'=>"Kenar Hat",
            'shop_phone'=>"01825435615",
            'shop_email'=>"abc@gmail.com",
            'shop_address'=>"Mohakhali",
            'shop_image'=>"/shop/2.jpg"
        ]);
        \App\Shop::create([
            'shop_name'=>" Chatdal",
            'shop_phone'=>"01825435617",
            'shop_email'=>"abc@gmail.com",
            'shop_address'=>"Dhanmondi",
            'shop_image'=>"/shop/3.jpg"
        ]);
        \App\Shop::create([
            'shop_name'=>"Dharaz",
            'shop_phone'=>"01825435616",
            'shop_email'=>"abc@gmail.com",
            'shop_address'=>"Panthapath",
            'shop_image'=>"/shop/4.jpg"
        ]);
        \App\Shop::create([
            'shop_name'=>"Priyo Shop",
            'shop_phone'=>"01825435609",
            'shop_email'=>"abc@gmail.com",
            'shop_address'=>"Panthapath",
            'shop_image'=>"/shop/5.jpg"
        ]);*/
    }
}
