<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $table = 'skills';

    protected $fillable = [
        'skill_name','skill_type',
    ];


    /**
     * Get the Users associated with given Skill
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function users()
    {
        return $this->belongsToMany(SocialAuth::class);
    }

    /**
     * Get Level of Skill associated with given User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function levels()
    {
        return $this->belongsToMany(LevelSkill::class , 'skill_social_auth','skill_id','level_id');
    }

    /**
     * Get Skills with levels belong to auth user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skillSocialAuth()
    {
        return $this->belongsToMany(SkillSocialAuth::class,'skill_social_auth');
    }

    public function companies()
    {
        return $this->belongsToMany(CompanyAuth::class);
    }
}
