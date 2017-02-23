<?php

use Illuminate\Database\Seeder;
use App\CompanyAuth;

class AuthCompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auth_company = new CompanyAuth();
        $auth_company->company_email = 'jobs.objects@eg.net';
        $auth_company->save();
    }
}
