<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formField = $request->validate([
            'name'=>['required','min:3'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>'required|confirmed|min:6'
        ]);

        //hashPassword
        $formField['password']=bcrypt($formField['password']);
        $user= User::create($formField);
        auth()->login($user);
        return redirect('/')->with('message','User Login Successfully!');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function logout(Request $request)
    {
        $user= auth()->user()->name;
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message',$user. 'have been Logged Out!');
    }

    public function login(){
        return view('users.login');
    }
    public function authenticate(Request $request){
        $formFields = $request->validate([
            
            'email'=>['required','email'],
            'password'=>'required'
        ]);
        if (auth()->attempt($formFields)) {
           $request->session()->regenerateToken();
           return redirect('/')->with('message', 'You are now Logged In!');
        }
        return back()->withErrors(['email'=>'Invalid Credentials'])->onlyInput('email');
    }
}
