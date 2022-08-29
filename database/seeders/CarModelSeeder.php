<?php

namespace Database\Seeders;

use App\Models\CarModel;
use App\Models\User;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public const Models = [
        [
            'brand_id' => 1,
            'name' => 'w202',
        ],
        [
            'brand_id' => 1,
            'name' => 'w203',
        ],
        [
            'brand_id' => 1,
            'name' => 'W223',
        ],
        [
            'brand_id' => 2,
            'name' => 'e46'
        ],
        [
            'brand_id' => 2,
            'name' => 'e90'
        ],
        [
            'brand_id' => 2,
            'name' => 'e92'
        ],
        [
            'brand_id' => 3,
            'name' => 'A6'

        ],
        [
            'brand_id' => 3,
            'name' => 'A4'
        ],
        [
            'brand_id' => 3,
            'name' => 'e-tron'
        ]


    ];

    public function run()
    {
        $user = User::where('role', User::RoleAdmin)->first();
        if (!is_null($user)) {
            foreach (self::Models as $model) {
                CarModel::create([
                    'name' => $model['name'],
                    'brand_id' => $model['brand_id'],
                    'created_by' => $user->id,
                    'updated_by' => $user->id,
                ]);
            }
        }
    }
}
