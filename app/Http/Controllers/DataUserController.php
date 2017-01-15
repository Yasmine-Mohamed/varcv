<?php

namespace App\Http\Controllers;

use App\DataUser;
use App\PhoneUser;
use App\Http\Requests\DataUserRequest;
use Auth;

class DataUserController extends Controller
{
    /**
     * Return CV's Data of Auth User
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $userData = DataUser::where('social_auth_id', '=' ,Auth::user()->user_id )->first();

        $userPhone = PhoneUser::where('social_auth_id', '=' ,Auth::user()->user_id )->first();

        return view('usersData.index',compact('userData','userPhone'));
    }

    /**
     * Return Create View To Add CV's of Auth User
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        return view('usersData.create');
    }

    /**
     * Store CV's Data into data_user table
     * @param DataUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(DataUserRequest $request)
    {
        Auth::user()->userData()->create($request->all());

        Auth::user()->phones()->create($request->all());

        return redirect('user');
    }

    /**
     * Return Data of an Auth User
     * @param $userDataId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function edit($userDataId)
    {
        $userData = DataUser::find($userDataId);

        //$userPhone = PhoneUser::where('social_auth_id', '=' , $userId )->first();

        return view('usersData.edit',compact('userData'));
    }


    /**
     * Update Auth User's Data and store it
     * @param DataUserRequest $request
     * @param $userDataId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function update(DataUserRequest $request , $userDataId)
    {
        $userData = DataUser::find($userDataId);

        $userData->update($request->all());

        //Auth::user()->phones()->update($request->except(['_method','_token']));

        return redirect('user');
    }
}
