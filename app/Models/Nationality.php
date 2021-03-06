<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class Nationality extends Model
{
    use HasFactory, HasRoles, SoftDeletes, Userstamps;

    protected $fillable = [
        'nati_en_short_name',
        'nationality',
        'nationaliti_isActive',
    ];
    protected $primaryKey = 'nati_id';
}
