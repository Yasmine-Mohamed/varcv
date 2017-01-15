<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    //public $table = 'data_users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'social_auth_id', 'business_email' ,'first_name',
        'last_name','middle_name' , 'profile_picture','birthday','address','career_objective','rate',
    ];

    /**
     * CV's Data is belong to an Auth User
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(SocialAuth::class);
    }

    /**
     * Set Birthday Using Carbon
     * @param $birthday
     */
    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('Y-m-d', $birthday);
    }
}
