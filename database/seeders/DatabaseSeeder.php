<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BrandsSeeder;
use Database\Seeders\CarModelSeeder;
use Database\Seeders\CarsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(BrandsSeeder::class);
        $this->call(CarModelSeeder::class);
        $this->call(CarsTableSeeder::class);
    }
}
