<?php

namespace App\Http\Controllers;
use Validator;
use Auth;
use Illuminate\Http\Request;

class UserhomeController extends Controller
{
    public function Userhome()
    {
        return view('userhome');
    }    
}
