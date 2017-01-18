<?php

namespace App\Http\Controllers;

use App\LevelSkill;
use App\Skill;
use App\SkillUser;
use App\SocialAuth;
use Illuminate\Http\Request;
use Auth;

class SkillsController extends Controller
{
    /**
     * Get all user's skills (work,personal) , work skills levels and working years
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $skills = Auth::user()->skills()->get();

        return view('skills.index',compact('skills'));
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
        $userSkill = SkillUser::where('skill_id','=', $request->input('skill_id'))->first();

        if($userSkill){

           return redirect('skills');

        }else{

            Auth::user()->skills()
                ->attach($request->input('skill_id'),[
                    'level_id' => $request->input('level_id'),
                    'working_years' => $request->input('working_years')
                ]);

            return redirect('skills');
        }

    }

    /**
     * Get work skills , personal skills and levels
     * Use skill id in pivot table to get user's skill
     * @param $skillId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($skillId)
    {
        $workSkills = Skill::where('skill_type' , '=' , 'work')->pluck('skill_name','id');

        $personalSkills = Skill::where('skill_type' , '=' , 'personal')->pluck('skill_name','id');

        $levels = LevelSkill::pluck('level_name','id');

        $userSkill = SkillUser::where('skill_id','=',$skillId)->firstOrFail();

        return view('skills.edit',compact('userSkill','workSkills','personalSkills','levels'));
    }

    /**
     * Update user's skill using skill id in pivot table
     * @param Request $request
     * @param $skillId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update(Request $request , $skillId)
    {
        $userSkill = SkillUser::where('skill_id','=',$skillId)->firstOrFail();

        $userSkill->skill_id = $request->input('skill_id');

        $userSkill->level_id = $request->input('level_id');

        $userSkill->working_years = $request->input('working_years');

        $userSkill->save();

        return redirect('skills');
    }
}
