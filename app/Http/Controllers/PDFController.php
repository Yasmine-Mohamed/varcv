<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use Auth;

class PDFController extends Controller
{
    public function createPdf(Request $request)
    {
        $userData = DB::table('data_users')->where('social_auth_id' , '=' , Auth::user()->user_id)->first();

        view()->share('userData',$userData);

        if($request->has('download')){

            $pdf = PDF::loadView('pdfs.cv');

            return $pdf->download($userData->first_name . $userData->middle_name . $userData->last_name . '.pdf');
        }

        return view('pdfs.cv');
    }
}
