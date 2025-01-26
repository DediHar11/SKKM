<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = RouteServiceProvider::DASHBOARD;
    // protected $redirectTo;

    // public function redirectTo()
    // {
    //     switch (Auth::user()->roles) {
    //         case 'mahasiswa':
    //             $this->redirectTo = '/dashboardmhs';
    //             return $this->redirectTo;
    //             break;
    //         case 'bem':
    //             $this->redirectTo = '/dashboardbem1';
    //             return $this->redirectTo;
    //             break;
    //         case 'adminutama':
    //             $this->redirectTo = '/dashboard3';
    //             return $this->redirectTo;
    //             break;
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
