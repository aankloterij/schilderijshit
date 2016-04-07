<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    protected $username = 'id';

    public function showLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        return $this->login($request);
    }

    public function doLogout()
    {
        return $this->logout();
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request) {
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required',
        ];

        $this->validate($request, $rules);

        /*
        $data = array_set(
            $request->only(array_except(array_keys($rules), 'password_confirmation')),
            'password',
            bcrypt($request->password)
        );

          */

        $data = $request->only(['name', 'username', 'email', 'password']);

        $data['password'] = bcrypt($request->password);

        Auth::login(User::create($data));

        return redirect()->route('search');
    }

    public function redirectPath()
    {
        return url()->route('search');
    }
}
