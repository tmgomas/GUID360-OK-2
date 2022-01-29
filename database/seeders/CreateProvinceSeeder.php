<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->delete();
        
        DB::table('provinces')->insert(array (
            0 => 
            array (
                'pro_id' => 1,
                'pro_country_id' => 205,
                'pro_name_en' => 'Western',
                'pro_name_si' => 'බස්නාහිර',
                'pro_name_ta' => 'மேல்',
                'pro_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'pro_id' => 2,
                'pro_country_id' => 205,
                'pro_name_en' => 'Central',
                'pro_name_si' => 'මධ්‍යම',
                'pro_name_ta' => 'மத்திய',
                'pro_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'pro_id' => 3,
                'pro_country_id' => 205,
                'pro_name_en' => 'Southern',
                'pro_name_si' => 'දකුණු',
                'pro_name_ta' => 'தென்',
                'pro_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'pro_id' => 4,
                'pro_country_id' => 205,
                'pro_name_en' => 'North Western',
                'pro_name_si' => 'වයඹ',
                'pro_name_ta' => 'வட மேல்',
                'pro_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'pro_id' => 5,
                'pro_country_id' => 205,
                'pro_name_en' => 'Sabaragamuwa',
                'pro_name_si' => 'සබරගමුව',
                'pro_name_ta' => 'சபரகமுவ',
                'pro_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'pro_id' => 6,
                'pro_country_id' => 205,
                'pro_name_en' => 'Eastern',
                'pro_name_si' => 'නැගෙනහිර',
                'pro_name_ta' => 'கிழக்கு',
                'pro_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'pro_id' => 7,
                'pro_country_id' => 205,
                'pro_name_en' => 'Uva',
                'pro_name_si' => 'ඌව',
                'pro_name_ta' => 'ஊவா',
                'pro_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            7 => 
            array (
                'pro_id' => 8,
                'pro_country_id' => 205,
                'pro_name_en' => 'North Central',
                'pro_name_si' => 'උතුරු මැද',
                'pro_name_ta' => 'வட மத்திய',
                'pro_isActive' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            8 => 
            array (
                'pro_id' => 9,
                'pro_country_id' => 205,
                'pro_name_en' => 'Northern',
                'pro_name_si' => 'උතුරු',
                'pro_name_ta' => 'வட',
                'pro_isActive' => 1,
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
