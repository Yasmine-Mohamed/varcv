<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Mail;

class MailsController extends Controller
{
    public function createMail()
    {
        return view('mails.create');
    }

    public function sendMail(Request $request)
    {
        $to = $request->input('to');

        $email = $request->except(['to','_token']);

//        dd($request->file('attachment'));

        Mail::to($to)->send(new SendMail($email));

        echo "Email is sent successfully";
    }
}
