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
    public function index()
    {
        //$skills = SocialAuth::find(Auth::user()->user_id)->levels()->get();
//
//        $levels = SocialAuth::find(Auth::user()->user_id)->levels()->get();
//
//        dd($levels[0]);

//        $skills = Skill::find(1)->levels()->wherePivot('social_auth_id', Auth::user()->user_id)->get();
//           //$skills->levels()->wherePivot('social_auth_id', Auth::user()->user_id)->get();
//
//        $skill = $skills->first()->pivot->level_id;

       // $skills = SkillUser::where('social_auth_id' , '=' , Auth::user()->user_id)->get();

        $skills = Skill::with('levels')->get();
        dd($skills);

        return view('skills.index',compact('skills'));
    }

    public function create()
    {
        $workSkills = Skill::where('skill_type' , '=' , 'work')->pluck('skill_name','id');

        $personalSkills = Skill::where('skill_type' , '=' , 'personal')->pluck('skill_name','id');

        $levels = LevelSkill::pluck('level_name','id');

        return view('skills.create',compact('workSkills', 'personalSkills' ,'levels'));
    }

    public function store(Request $request)

    {
        //Auth::user()->skills()->detach();

        Auth::user()->skills()
               ->attach($request->input('skill_id'),[
                   'level_id' => $request->input('level_id'),
                   'working_years' => $request->input('working_years')
        ]);

        return redirect('skills');
    }


    public function edit()
    {

    }

    public function update()
    {

    }
}
