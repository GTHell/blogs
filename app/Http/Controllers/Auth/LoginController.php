<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/dashboard';

    protected function authenticated(Request $request, $user)
    {
        if ($request->has('comment'))
            return redirect($request->url);
    }

    protected function sendLoginResponse(Request $request)
    {
        if($request->session()->has('comment')) {
            $request->merge([
                'comment' => $request->session()->get('comment'),
                'url' => $request->session()->get('url')
            ]);
        }
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }

//    public function authenticated()
//    {
//        if (Auth::attempt(['email' => $email, 'password' => $password])) {
//            // Authentication passed...
//            return redirect()->intended('dashboard');
//        }
//    }

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
