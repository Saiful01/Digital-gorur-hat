<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \App\User::create([
            'name' => "Motiur",
            'email' => "memotiur@gmail.com",
            'phone' => "01717849968",
            'user_type' => 1,
            'password' => Hash::make('123456')
        ]);

        \App\User::create([
            'name' => "Company Admin",
            'email' => "saiful0131@gmail.com",
            'phone' => "01861472439",
            'user_type' => 2,
            'password' => Hash::make('123456')
        ]);
        \App\User::create([
            'name' => "Motiur",
            'email' => "saiful0131@gmail.com",
            'phone' => "01825013101",
            'user_type' => 1,
            'password' => Hash::make('123456')
        ]);
        \App\User::create([
            'name' => "Aman",
            'email' => "aman@gmail.com",
            'phone' => "01776107995",
            'user_type' => 1,
            'password' => Hash::make('123456')
        ]);
    }
}
