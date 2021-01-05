<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    public function __construct() {

    }

    public function index() {

        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return redirect()->back()->with('error', 'Oppes! You have entered invalid credentials');
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('login')->with('success', 'successfully logout!');
    }
}
