<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function doLogin(Request $request)
    {
        $this->validate($request, ['id' => 'required', 'password' => 'required']);

        $user = User::where('username', $request->id)->orWhere('email', $request->id)->first();

        if (\Hash::check($request->password, $user->password)) Auth::login($user);

        else return redirect()
            ->route('login')
            ->withInput()
            ->withErrors(new MessageBag(['username' => 'Those credentials didn\'t match our records.']));

        return "Je moeder";
    }

    public function doLogout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function doRegister(Request $request)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required|',
        ];

        $this->validate($request, $rules);

        $data = $request->only(array_except(array_keys($rules), 'password_confirmation'));

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        Auth::login($user);

        return redirect()->route('home');
    }
}
