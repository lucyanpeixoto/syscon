<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pt_BR');

        for ($i=0; $i < 30; $i++) { 
            DB::table('products')->insert([
                'name' => $faker->word(),
                'price' => $faker->randomFloat(2, 0, 150),
                'description' => $faker->text(150),
                'color_id' => rand(1,3),
                'lot_id' => rand(1,10),
            ]);
        }
    }
}
