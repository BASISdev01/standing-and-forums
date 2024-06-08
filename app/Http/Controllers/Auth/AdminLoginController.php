<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected string $redirectTo = '/admin/dashboard';

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
            ]);
            if (Auth::guard('admin')->attempt($request->only(['email', 'password']), $request->get('remember'))) {
                return to_route('admin.dashboard');
            }
            return back()->withInput($request->only('email', 'remember'))->with('error', ' These credentials do not match our records.');
        }
        return view("auth.admin_login");
    }

}
