<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('destroy');
    }

    public function create(){
        return view('sessions.login');
    }

    public function store(){

        if(!auth()->attempt(request(['email','password']))){
            return back()->withErrors([
                'message' => 'Nieprawidłowy login lub hasło'
            ]);
        }else{
            return redirect()->home();
        }
    }

    public function destroy(){
        auth()->logout();
        
        return redirect()->home();
    }
}
