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

    /**
     * Send the message
     * @param Request $request
     */

    public function sendMail(Request $request)
    {
        $to = $request->input('to');

        $email = $request->except(['to','_token']);

        Mail::to($to)->send(new SendMail($email));

        echo "Email is sent successfully";
    }
}
