<?php
 
namespace App\Http\Controllers;
use Validator;
use Auth;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function Login()
    {
        return view('login');
    }

    public function checklogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('index');
        }
        else
        {
            return back()->with('error', 'Wrong Login Details');
        }

    }

    public function Personality()
    {
        return view('pertest');
    }
    public function Index()
    {
        if(Auth::check()) {
            return view('index');
        }
        else{
            return redirect('/');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
}
