<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class Province extends Model
{
    use HasFactory, Userstamps, HasRoles, SoftDeletes;

    protected $fillable = [
        'pro_country_id',
        'pro_name_en',
        'pro_name_si',
        'pro_name_ta',
        'pro_isActive',
    ];
    protected $primaryKey = 'pro_id';
}
