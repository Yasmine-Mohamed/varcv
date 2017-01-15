<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class EducationUser extends Model
{

    public $table = 'education_node_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'social_auth_id','education_name','education_field','graduation_date','grade'
    ];


    /**
     * Return Graduation Date {"month:","year:"} Object
     * @return object
     */

    public function getGraduationDateAttribute()
    {
        return json_decode($this->attributes['graduation_date'],true);
    }

    /**
     * Set Graduation Date in a string into database
     * @param $graduationDate
     */

    public function setGraduationDateAttribute($graduationDate)
    {
        $this->attributes['graduation_date'] = json_encode($graduationDate);
    }

    /**
     * Get the education associated with given user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(SocialAuth::class);
    }



}
