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
        'address','foundation_date','current_employees_num','company_id'
    ];

    /**
     * Company's data is belongs to an auth company
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(CompanyAuth::class);
    }
}
