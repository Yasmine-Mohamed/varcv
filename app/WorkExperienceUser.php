<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperienceUser extends Model
{

    public $table = 'work_experience_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'social_auth_id','job_title','job_description','company_name','start_date','end_date'
    ];

    /**
     * Return Start Date {"month:","year:"} Object
     * @return object
     */

    public function getStartDateAttribute()
    {
        return json_decode($this->attributes['start_date'],true);
    }

    /**
     * Set Start Date in a string into database
     * @param $startDate
     */

    public function setStartDateAttribute($startDate)
    {
        $this->attributes['start_date'] = json_encode($startDate);
    }

    /**
     * Return End Date {"month:","year:"} Object
     * @return object
     */

    public function getEndDateAttribute()
    {
        return json_decode($this->attributes['end_date'],true);
    }

    /**
     * Set End Date in a string into database
     * @param $endDate
     */

    public function setEndDateAttribute($endDate)
    {
        $this->attributes['end_date'] = json_encode($endDate);
    }

    /**
     * Get the work experience associated with given user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(SocialAuth::class);
    }
}
