<?php

namespace Database\Seeders;

use App\Models\Data;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        $data = [];
        for ($i = 1; $i <= 20; $i++) {
            Data::updateOrCreate([
                'id' => $i,
            ], [
                'id' => $i,
                'title' => $faker->sentence(1),
                'status' => $faker->randomElement(['Pending', 'Completed', 'In Progress']),
                'note' => $faker->sentence(1),
            ]);
        }
    }
}
