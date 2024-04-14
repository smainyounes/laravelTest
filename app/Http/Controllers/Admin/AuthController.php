<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function loginView()
    {
        return view('admin.auth.login');
    }

    public function registerView()
    {
        return view('admin.auth.register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(!Auth::attempt($request->only('email', 'password'), $request->remember)){
            $request->flash();
            return back()->with('error', 'mauvais e-mail ou mot de passe');
        }

        return redirect()->route('dashboard');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|confirmed',
            'email' => 'required|unique:users,email',
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);

        if ($user) {
            Auth::loginUsingId($user->id);
            return redirect()->route('dashboard');
        }

        return back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
