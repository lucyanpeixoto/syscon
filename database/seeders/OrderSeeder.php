<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pt_BR');

        DB::table('orders')->insert([
            'client_id' => rand(2, 25),
            'seller_id' => rand(2, 25),
            'amount' =>  $faker->randomFloat(2, 0, 150)
        ]);

        DB::table('orders_products')->insert([
            'order_id' => 1,
            'product_id' => rand(2, 25),
            'quantity' =>  1
        ]);

        for ($i=2; $i < 30; $i++) { 
            DB::table('orders')->insert([
                'client_id' => rand(2, 25),
                'seller_id' => rand(2, 25),
                'amount' =>  $faker->randomFloat(2, 0, 150)
            ]);
            DB::table('orders_products')->insert([
                'order_id' => $i,
                'product_id' => rand(2, 25),
                'quantity' =>  1
            ]);
        }
    }
}
