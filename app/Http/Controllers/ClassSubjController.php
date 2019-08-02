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
//*********************************************************
    public function AddChapter()
    {
        return view('classviews.addchapter');
    }

    public function InsertChapter()
    {
        $chapter = new Degree();

        $chapter->name = request('name');
        $chapter->description = request('description');
        $chapter->typeId = request('typeId');
        

        $chapter->save();

        return redirect('index');
    }

    //*********************************************************
    public function AddMCQS()
    {
        return view('classviews.addmcqs');
    }

    public function InsertMCQS()
    {
        $mcqs = new Degree();

        $mcqs->mcqsstatement = request('msqsstatement');
        $mcqs->option1 = request('option1');
        $mcqs->option2 = request('option2');
        $mcqs->option3 = request('option3');
        $mcqs->option4 = request('option4');
        

        $mcqs->save();

        return redirect('index');
    }
}
