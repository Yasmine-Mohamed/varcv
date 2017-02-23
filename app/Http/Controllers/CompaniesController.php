<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;
use Auth;

class CompaniesController extends Controller
{
    public function index()
    {
        return view('company.index');
    }

    public function create()
    {
        $skills = Skill::pluck('skill_name','id');

        return view('company.create',compact('skills'));
    }

    public function store(Request $request)
    {
        dd(Auth::user()->id);
    }
}
