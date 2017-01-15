<?php

namespace App\Http\Controllers;

use App\EducationUser;
use Illuminate\Http\Request;
use Auth;

class EducationUserController extends Controller
{
    /**
     * Return Education Data of Auth User
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $userEducationNode = EducationUser::where('social_auth_id' , '=' , Auth::user()->user_id)->get();

        return view('usersEducation.index', compact('userEducationNode'));
    }

    /**
     * Return Education Create View
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        return view('usersEducation.create');
    }

    /**
     * Store Education Data of Auth User
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(Request $request)
    {
        Auth::user()->educations()->create($request->except('_token'));

        return redirect('education');
    }

    /**
     * Edit Education Data of Auth User
     * @param $educationNodeId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($educationNodeId)
    {
        $userEducationNode = EducationUser::find($educationNodeId);

        return view('usersEducation.edit', compact('userEducationNode'));
    }

    /**
     * Store Updated Education Data of Auth User
     * @param Request $request
     * @param $educationNodeID
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update(Request $request , $educationNodeID)
    {
        $educationUser = EducationUser::find($educationNodeID);

        $educationUser->update($request->all());

        return redirect('education');
    }
}
