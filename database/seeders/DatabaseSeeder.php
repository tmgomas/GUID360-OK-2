<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CreateUserPermissionSeeder::class,
            CreateUserAdminSeeder::class,
            CreateCountrySeeder::class,
            CreateProvinceSeeder::class,
            CreateDistrictSeeder::class,
            CreateCitySeeder::class,
            CreateNationalitiesSeeder::class,
            CreateLanguagesSeeder::class
        ]);
    }
}
