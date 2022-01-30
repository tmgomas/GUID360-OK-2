<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class Title extends Model
{
    use HasFactory, HasRoles, Userstamps, SoftDeletes;


    protected $fillable = [
        'titles_name',
        'titles_isActive',
    ];

    protected $primaryKey ='titles_id';
}
