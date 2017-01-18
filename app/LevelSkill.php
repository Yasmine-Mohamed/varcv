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
        return $this->belongsToMany(Skill::class);
    }


}
