<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;


class ClientSeeder extends Seeder
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
            DB::table('clients')->insert([
                'name' => $faker->name(),
                'birthdate' => $faker->date(),
                'cpf' => $faker->cpf(false)
            ]);
        }
    }
}
