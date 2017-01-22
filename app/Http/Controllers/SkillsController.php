<?php

namespace App\Http\Controllers;

use App\LevelSkill;
use App\Skill;
use App\SkillSocialAuth;
use Illuminate\Http\Request;
use Auth;
use DB;

class SkillsController extends Controller
{
    /**
     * Get all user's skills (work,personal) , work skills levels and working years
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $authUserSkills = SkillSocialAuth::with('skills','levels')
            ->where('social_auth_id','=', Auth::user()->user_id)->get();

        return view('skills.index',compact('authUserSkills'));
    }

    /**
     * Get work skills , personal skills and levels
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        $workSkills = Skill::where('skill_type' , '=' , 'work')->pluck('skill_name','id');

        $personalSkills = Skill::where('skill_type' , '=' , 'personal')->pluck('skill_name','id');

        $levels = LevelSkill::pluck('level_name','id');

        return view('skills.create',compact('workSkills', 'personalSkills' ,'levels'));
    }

    /**
     * Check if user's skill exist
     * Store user's skills (work,personal)
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(Request $request)

    {
        $existSkills = DB::table('skill_social_auth')
            ->where('social_auth_id','=',Auth::user()->user_id)
            ->where('skill_id','=',$request->input('skill_id'))
            ->first();

        if(is_null($existSkills)){

            Auth::user()->skills()
                ->attach($request->input('skill_id'),[
                        'level_id' => $request->input('level_id'),
                        'working_years' => $request->input('working_years')
                    ]
                );

            return redirect('skills');

        }else{

            return redirect('skills');

        }
    }

    /**
     * Get work skills , personal skills and levels
     * @param $userSkillId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($userSkillId)
    {
        $workSkills = Skill::where('skill_type' , '=' , 'work')->pluck('skill_name','id');

        $personalSkills = Skill::where('skill_type' , '=' , 'personal')->pluck('skill_name','id');

        $levels = LevelSkill::pluck('level_name','id');

        $userSkill = SkillSocialAuth::find($userSkillId);

        return view('skills.edit',compact('userSkill','workSkills','personalSkills','levels'));
    }

    /**
     * Update user's skill in pivot table
     * @param Request $request
     * @param $userSkillId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update(Request $request , $userSkillId)
    {
        $userSkill = SkillSocialAuth::find($userSkillId);

        $userSkill->update($request->all());

        return redirect('skills');
    }
}
