<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class City extends Model
{
    use HasFactory, HasRoles, Userstamps, SoftDeletes;

    protected $fillable = [
        'city_dis_id',
        'city_name_en',
        'city_name_si',
        'city_name_ta',
        'postcode',
        'city_isActive',
    ];
    protected $primaryKey = 'city_id';
}
