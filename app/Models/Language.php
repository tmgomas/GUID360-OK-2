<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

class Language extends Model
{
    use HasFactory, SoftDeletes, HasRoles, Userstamps;
    protected $fillable = [
        'lang_name',
        'lang_iso',
        'lang_isActive',
    ];

    protected $primaryKey = 'language_id';
}
