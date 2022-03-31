<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class AuthController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
        $formData=request()->validate([
            'name'=>'required|min:3',
            'email'=>['required','email',Rule::unique('users','email')],
            'username'=>['required','min:3',Rule::unique('users','username')],
            'password'=>'required|min:8'
        ]);

        User::create($formData);
        return redirect('/');
    }
}
