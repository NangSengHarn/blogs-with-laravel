<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
        $formData=request()->validate([
            'name'=>'required|min:3',
            'email'=>['required','email',Rule::unique('users','email')],
            'username'=>['required','min:3',Rule::unique('users','username')],
            'password'=>'required|min:8'
        ]);
        $user=User::create($formData);
        //login
        auth()->login($user);

        return redirect('/')->with('success','Welcome dear, '.$user->name);
    }
    public function logout(){
        auth()->logout();

        return redirect('/')->with('success','Good bye'); 
    }
    public function login(){
        return view('auth.login');
    }
    public function post_login(){
        //validation
        $formData=request()->validate([
            'email'=>['required','email','max:255',Rule::exists('users','email')],
            'password'=>['required','min:8','max:255']
        ]);
        //auth attempt
        if(auth()->attempt($formData)){
        //if uset credentials correct -> redirect home
            return redirect('/')->with('success','Welcome back');
        }else{
        //if user credentials fail -> redirect back to form with error
            return redirect()->back()->withErrors([
                'email'=>'User Credentials wrong'
            ]);
        }
    }
}
