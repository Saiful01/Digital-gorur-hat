<?php

use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Slider::create([
            'slider_image' => "/slider_image/1.jpg",
            'slider_title' => "Welcome to Gorurr hat"
        ]);
        \App\Slider::create([
            'slider_image' => "/slider_image/2.jpg",
            'slider_title' => "Welcome to Gorurr hat"
        ]);



        \App\PromotionalSlider::create([
            'slider_image' => "1594001362.jpg",
            'slider_title' => "Welcome to Gorurr hat"
        ]);

        \App\PromotionalSlider::create([
            'slider_image' => "1594001423.jpg",
            'slider_title' => "Welcome to Gorurr hat"
        ]);



    }
}
