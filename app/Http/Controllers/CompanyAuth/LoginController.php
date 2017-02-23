<?php

namespace App\Http\Controllers\CompanyAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\CompanyAuth;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating usersData for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect usersData after login.
     *
     * @var string
     */
    protected $redirectTo = '/company_home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('company-auth.login');
    }

    public function login(Request $request)
    {
        $email = $request->input('email');

        $company = CompanyAuth::where('company_email','=', $email)->first();

        if(!$company) {

            $company = CompanyAuth::create([
                'company_email' => $email,
            ]);

        }

        Auth::guard('auth_company')->login($company);
        return redirect()->to('/company_home');

    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('auth_company');
    }
}
