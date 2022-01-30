<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateGenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->delete();
        
        DB::table('genders')->insert(array (
            0 => 
            array (
                'gender_id' => 1,
                'gender_name' => 'Male',
                'gender_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            1 => 
            array (
                'gender_id' => 2,
                'gender_name' => 'Female',
                'gender_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            2 => 
            array (
                'gender_id' => 3,
                'gender_name' => 'Rather not say',
                'gender_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            3 => 
            array (
                'gender_id' => 4,
                'gender_name' => 'Custom',
                'gender_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            
        ));
    }

}
