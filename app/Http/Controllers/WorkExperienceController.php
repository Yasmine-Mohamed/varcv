<?php

namespace App\Http\Controllers;

use App\WorkExperienceUser;
use Illuminate\Http\Request;
use Auth;

class WorkExperienceController extends Controller
{
    public function index()
    {
        $userWorkExperience = WorkExperienceUser::where('social_auth_id' , '=' , Auth::user()->user_id)->get();

        return view('workExperience.index', compact('userWorkExperience'));
    }

    public function create()
    {
        return view('workExperience.create');
    }

    public function store(Request $request)
    {
        Auth::user()->worksExperience()->create($request->except(['_token']));

        return redirect('workExperience');
    }

    public function edit($workExperienceId)
    {
        $userWorkExperience = WorkExperienceUser::find($workExperienceId);

        return view('workExperience.edit' , compact('userWorkExperience'));
    }

    public function update(Request $request , $workExperienceId)
    {
        $userWorkExperience = WorkExperienceUser::find($workExperienceId);

        $userWorkExperience->update($request->all());

        return redirect('workExperience');
    }
}
