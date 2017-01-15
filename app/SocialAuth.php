<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SocialAuth extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $table =

        'auth_users'
    ;



    protected $fillable = [
        'user_id', 'email', 'provider',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * Change the default primary key form increment to string
     * @var string
     */
    protected $primaryKey = 'user_id';
    public $incrementing = false;


    /**
     * Auth User has his own CV's Data
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function userData()
    {
        return $this->hasOne(DataUser::class);
    }

    /**
     * User has many Phones
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function phones()
    {
        return $this->hasMany(PhoneUser::class);
    }

    /**
     * User has many Education Node
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function educations()
    {
        return $this->hasMany(EducationUser::class);
    }

    /**
     * User has many Work Experience
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function worksExperience()
    {
        return $this->hasMany(WorkExperienceUser::class);
    }

    /**
     * Get the templates associated with given user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function templates()
    {
        return $this->belongsToMany(Template::class);
    }

    /**
     * Get the skills associated with given user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function levels()
    {
        return $this->hasManyThrough(LevelSkill::class , Skill::class);
    }
}
