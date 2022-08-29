<?php

namespace Database\Seeders;

use App\Models\Brands;
use App\Models\User;
use Illuminate\Database\Seeder;

class BrandsSeeder extends Seeder
{
    public const ListBrands = ['Mercedes benz','BMW','Audi'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('role', User::RoleAdmin)->first();
        if (!is_null($user)) {
            foreach (self::ListBrands as $brand){
                Brands::create([
                    'name' => $brand,
                    'created_by' => $user->id,
                    'updated_by' => $user->id,
                ]);
            }

        }
    }
}
