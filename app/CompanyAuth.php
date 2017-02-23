<?php

namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CompanyAuth extends Authenticatable
{

//    protected $guard = 'auth_company';

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

    public $table = 'auth_companies';


    /**
     * Get the Skills that given Company is looking for
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function companyData()
    {
        return $this->hasOne(DataCompany::class);
    }
}
