<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }

    public function create(){
        return view('registration.registration');
    }

    public function store(){

        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:4|confirmed'
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($user);

        return redirect()->home();
    }
}
