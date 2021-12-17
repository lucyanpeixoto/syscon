<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i=0; $i < 10; $i++) { 
            DB::table('lots')->insert([
                'date' => $faker->date(),
                'quantity' => rand(20, 100)
            ]);
        }
    }
}
