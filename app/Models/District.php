<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class District extends Model
{
    use HasFactory, HasRoles, Userstamps, SoftDeletes;

    protected $fillable = [
        'dist_pro_id',
        'dist_name_en',
        'dist_name_si',
        'dist_name_ta',
        'dist_isActive',
    ];
    protected $primaryKey = 'dist_id';
}
