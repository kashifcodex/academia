<?php

namespace App\Http\Controllers;

use App\classes;
use App\Degree;
use Illuminate\Http\Request;

class ClassSubjController extends Controller
{
    public function AddClass()
    {
        return view('classviews.addclass');
    }

    public function InsertClass()
    {
        $class = new Degree();

        $class->name = request('name');
        $class->description = request('description');
        $class->typeId = request('typeId');
        $class->year = request('year');

        $class->save();

        return redirect('index');
    }
//***********************************************
    public function AddSubject()
    {
        return view('classviews.addsubject');
    }

    public function InsertSubject()
    {
        $subject = new Degree();

        $subject->name = request('name');
        $subject->description = request('description');
        $subject->typeId = request('typeId');
        

        $subject->save();

        return redirect('index');
    }
}
