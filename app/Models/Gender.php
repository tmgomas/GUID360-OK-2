<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class Gender extends Model
{
    use HasFactory,HasRoles, Userstamps, SoftDeletes;

    protected $fillable = [
        'gender_name',
        'gender_isActive',
    ];
    protected $primaryKey = 'gender_id';
}
