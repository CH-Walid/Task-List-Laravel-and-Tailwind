<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        if(Auth::check()) {
            return redirect()->back();
        }
        return view('auth.login');
    }

    public function authentify(Request $request) {
        // validate data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // authentify 
        if(Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // (true) login in + redicert ->
            $request->session()->regenerate();

            return redirect()->intended('/tasks');

        }

        return redirect()->back()->withErrors([
            'email' => 'invalid email!',
            'password' => 'invalid password!'
        ])->onlyInput('email', 'remember');
        
        // (false) do not logedin + redirect back
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function register() {
        if(Auth::check()) {
            return redirect()->back();
        }
        return view('auth.register');
    }

    public function store(Request $request) {
        // validate data
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        // hash password
        $data['password'] = Hash::make($request->password);

        // store data
        User::create($data);

        // redirect to login page
        return redirect()->route('login');
    }

    public function confirm(Task $task) {
        return view('auth.delete-confirm', ['id' => $task->id]);
    }
}
