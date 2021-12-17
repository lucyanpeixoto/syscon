<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pt_BR');

        DB::table('users')->insert([
            'name' => "Vendendor 1",
            'email' => "vendendor@email.com",
            'password' => Hash::make('12345'),
        ]);

        DB::table('sellers')->insert([
            'user_id' => 1,
        ]);

        for ($i=2; $i < 30; $i++) { 
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make('12345'),
            ]);
            DB::table('sellers')->insert([
                'user_id' => $i,
            ]);
        }
    }
}
