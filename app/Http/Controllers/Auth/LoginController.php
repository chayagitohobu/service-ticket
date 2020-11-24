<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Middleware;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:client')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // $inputVal = $request->all();

        // $this->validate($request, [
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        // if (auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))) {
        //     if (auth()->user()->role_id == 2) {
        //         return redirect()->route('admin');
        //     } else {
        //         return redirect()->route('operator');
        //     }
        // } else {
        //     return redirect()->route('login')
        //         ->with('error', 'Email & Password are incorrect.');
        // }
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('client')->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))) {
            // if (auth()->user()->role_id == 2) {
            //     return redirect()->route('admin');
            // } else {
            //     return redirect()->route('operator');
            // }
            return redirect()->route('client');
        } else {
            return redirect()->route('login')
                ->with('error', 'Email & Password are incorrect.');
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/login')
            ->withSuccess('Anda berhasil logout !');
    }
}
