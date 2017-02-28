<?php

namespace App\Http\Controllers;

use App\CompanyAuth;
use App\Skill;
use Illuminate\Http\Request;
use Auth;

class CompaniesController extends Controller
{
    /**
     * Get Data and Skills Searched for of an Auth Company
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $companyData = CompanyAuth::findOrFail(Auth::guard('auth_company')->user()->id)->companyData;

        $skills = CompanyAuth::findorFail(Auth::guard('auth_company')->user()->id)->skills;

        return view('company.index',compact('companyData','skills'));
    }

    /**
     * Get all skills passing to view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $skills = Skill::pluck('skill_name','id');

        return view('company.create',compact('skills'));
    }

    /**
     * Store Auth company's data and skills that is searching for
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Auth::guard('auth_company')->user()->companyData()->create($request->all());

        Auth::guard('auth_company')->user()->skills()->attach($request->input('skills'));

        return redirect('company');

    }

    /**
     * Get skills passing to view
     * Get Data and Skills Searched for of an Auth Company
     * Convert $companySkills object into $companySkillsArray passing to view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $skills = Skill::pluck('skill_name','id');

        $companyData = CompanyAuth::findOrFail(Auth::guard('auth_company')->user()->id)->companyData;

        $companySkills = CompanyAuth::findorFail(Auth::guard('auth_company')->user()->id)->skills;

        $companySkillsArray = $companySkills->pluck('id')->toArray();

        return view('company.edit',compact('skills','companyData','companySkillsArray'));
    }

    /**
     * Update An Auth company's data and skills that is searching for
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        Auth::guard('auth_company')->user()->companyData()->update($request->except(['_method','_token','skills']));

        Auth::guard('auth_company')->user()->skills()->sync($request->input('skills'));

        return redirect('company');
    }
}
