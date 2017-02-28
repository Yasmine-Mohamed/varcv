<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CompanyAuth extends Authenticatable
{

    public $table = 'auth_companies';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'company_email'
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
     * An auth company has some data
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function companyData()
    {
        return $this->hasOne(DataCompany::class);
    }

    /**
     * Get the Skills that given Company is looking for
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class,'auth_company_skill','company_auth_id','skill_id')->withTimestamps();
    }


}
