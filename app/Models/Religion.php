<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class Religion extends Model
{
    use HasFactory, SoftDeletes, Userstamps, HasRoles;

    protected $fillable = [
        'religion_name',
        'religion_isActive',
        
    ];

    protected $primaryKey ='religion_id';
}
