<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        if(Auth::check())
        {
            return redirect(route('home'));
        }
        return view('login');
    }
    public function homePage()
    {
        
        return view('welcome');
    }


    public function registrationPage()
    {
        if(Auth::check())
        {
            return redirect(route('home'));
        }
        return view('registration');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials))
        {
            return redirect()->intended(route('home'));
          // return view('welcome');
        }
        return redirect(route('login'))->with("error","Login details are not valid");

    }
    public function registrationPost(Request $request)
    {
        
        $request->validate([
            'fname'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required'
        ]);
       
        $data['name']=$request->fname;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $user=User::create($data);
        if(!$user)
        {
            return redirect(route('registration'))->with('error','Registration failed.try again!');
          // return view('registration');
        }
        return redirect(route('login'))->with('success','Registration Success.login to access the app');
        }
       // return redirect(route('login'))->with('success','Registration Success.login to access the app');
      
    
    public function logOut()
    {
        Session()->flush();
        Auth::logout();
        return redirect(route('login'));
    }
    public function profilePage()
    {
        return view('profile');
    }
}
