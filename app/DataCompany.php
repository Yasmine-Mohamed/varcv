<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataCompany extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'company_name','owner_name','industry_field',
        'address','foundation_date','current_employees_num',
    ];
}
