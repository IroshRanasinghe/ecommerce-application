<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect admin after login
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new LoginController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Firstly validating the user input for email and password.
     * Then using @Auth facade to define our admin guard and then making the attempt to authenticate the admin
     * if the authentication is successful redirecting the admin to dashboard if the authentication is not successful
     * then returning the user back to login page
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get('remember'))) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }


    /**
     * If admin will logout from dashboard then admin session will invalidate and redirect to Login page.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
}
