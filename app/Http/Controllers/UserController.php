<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|unique:users,name',
            'email'=> 'required|unique:users,email',
            'password'=> 'required',

        ]);

        

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('welcome');
        }

        return back()->withErrors(['name' => 'this name is already taken']);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function signUpView()
    {
        return view('register');
    }

    protected function create(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:users,name',
            'email'=> 'required|unique:users,email',
            'password'=> 'required|string|min:8',

        ]);


        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        return view('welcome');
    }

   
}
