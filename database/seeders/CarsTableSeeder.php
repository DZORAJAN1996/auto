<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cars')->delete();
        
        \DB::table('cars')->insert(array (
            0 => 
            array (
                'id' => 1,
                'brand_id' => 3,
                'model_id' => 7,
                'image' => '630cc262b9b16.jpg',
                'year' => 2018,
                'number_plate' => '354CV354',
                'color' => 'grey',
                'transmission' => 'automatic',
                'price' => 15000,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2022-08-29 13:42:58',
                'updated_at' => '2022-08-29 13:42:58',
            ),
            1 => 
            array (
                'id' => 2,
                'brand_id' => 1,
                'model_id' => 1,
                'image' => '630cc293d1ab3.jpg',
                'year' => 2000,
                'number_plate' => '49GG909',
                'color' => 'White',
                'transmission' => 'manual',
                'price' => 5000,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2022-08-29 13:43:47',
                'updated_at' => '2022-08-29 13:43:47',
            ),
            2 => 
            array (
                'id' => 3,
                'brand_id' => 2,
                'model_id' => 4,
                'image' => '630cc2cc91fb0.jpg',
                'year' => 2004,
                'number_plate' => '37PF473',
                'color' => 'blue',
                'transmission' => 'automatic',
                'price' => 7000,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => '2022-08-29 13:44:44',
                'updated_at' => '2022-08-29 13:44:44',
            ),
        ));
        
        
    }
}