<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelSkill extends Model
{
    public $table = 'level_skill';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'level_name'
    ];

    /**
     * Get Skill of given Level associated with given user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function skills()
    {
        return $this->belongsToMany(Skill::class,'skill_social_auth','level_id','skill_id');
    }

    /**
     * Get levels of skills belong to auth user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skillSocialAuth()
    {
        return $this->belongsToMany(SkillSocialAuth::class,'skill_social_auth');
    }


}
