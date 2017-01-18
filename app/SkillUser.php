<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillUser extends Model
{
    public $table = 'skill_social_auth';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'working_years'
    ];
}
