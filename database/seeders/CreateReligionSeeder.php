<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('religions')->delete();
        
        DB::table('religions')->insert(array (
            0 => 
            array (
                'religion_id' => 1,
                'religion_name' => 'Buddhism',
                'religion_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
           
            1 => 
            array (
                'religion_id' => 2,
                'religion_name' => 'Hinduism',
                'religion_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            2 => 
            array (
                'religion_id' => 3,
                'religion_name' => 'Christianity',
                'religion_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            3 => 
            array (
                'religion_id' => 4,
                'religion_name' => 'Islam',
                'religion_isActive' => 1,
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
