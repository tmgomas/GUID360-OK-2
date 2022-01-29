<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class Country extends Model
{
    use HasFactory, HasRoles, Userstamps, SoftDeletes;

    protected $fillable = [
        'coun_name_en',
        'coun_code',
        'coun_isActive',
    ];

    protected $primaryKey = 'coun_id';
}
