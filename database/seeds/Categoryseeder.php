<?php

use Illuminate\Database\Seeder;

class Categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\ParentCategory::create([
            'category_name'=>"Parent category"
        ]);



        \App\ProductCategory::create([
            'category_name'=>"গরু",
            'category_name_bn'=>"Bangla category"
        ]);
        \App\ProductCategory::create([
            'category_name'=>"খাসি",
            'category_name_bn'=>"Bangla category"
        ]);
    }
}
