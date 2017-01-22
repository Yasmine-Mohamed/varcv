<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillSocialAuth extends Model
{
    public $table = 'skill_social_auth';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [

        'social_auth_id','skill_id','level_id','working_years'
    ];

    /**
     * Get all users in the pivot table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function users()
    {
        return $this->belongsToMany(SocialAuth::class);
    }

    /**
     * Get all skills in the pivot table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function skills()
    {
        return $this->belongsToMany(Skill::class,'skill_social_auth','id','skill_id');
    }

    /**
     * Get all levels in the pivot table
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function levels()
    {
        return $this->belongsToMany(LevelSkill::class,'skill_social_auth','id','level_id');
    }
}
