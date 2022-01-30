<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titles')->delete();
        
        DB::table('titles')->insert(array (
            0 => 
            array (
                'titles_id' => 1,
                'titles_name' => 'Mr',
                'titles_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            1 => 
            array (
                'titles_id' => 2,
                'titles_name' => 'Miss',
                'titles_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            2 => 
            array (
                'titles_id' => 3,
                'titles_name' => 'Mrs',
                'titles_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            3 => 
            array (
                'titles_id' => 4,
                'titles_name' => 'Ms',
                'titles_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            4 => 
            array (
                'titles_id' => 5,
                'titles_name' => 'Baby',
                'titles_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),

            5 => 
            array (
                'titles_id' => 6,
                'titles_name' => 'Master',
                'titles_isActive' => 1,
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
